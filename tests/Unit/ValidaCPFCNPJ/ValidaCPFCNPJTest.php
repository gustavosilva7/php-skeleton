<?php

declare(strict_types=1);

use App\Challengers\ValidateCPFCNPJ\ValidaCPFCNPJ;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ValidaCPFCNPJTest extends TestCase
{
    #[DataProvider('validationDataProvider')]
    public function testValidation(string $input, bool $expected): void
    {
        $validator = new ValidaCPFCNPJ($input);

        $this->assertSame($expected, $validator->valida());
    }

    public static function validationDataProvider(): iterable
    {
        yield 'CPF com espaços e letras misturadas' => [' 529.982aa247-25 ', true];
        yield 'CPF válido sem pontuação' => ['52998224725', true];
        yield 'CPF válido formatado' => ['529.982.247-25', true];
        yield 'CPF outro válido' => ['123.456.789-09', true];
        yield 'CPF inválido (DV errado)' => ['529.982.247-24', false];
        yield 'CPF apenas caracteres especiais' => ['...---', false];
        yield 'CPF sequência repetida' => ['111.111.111-11', false];
        yield 'CPF com mais dígitos' => ['529982247251234', false];
        yield 'CPF com menos dígitos' => ['5299822472', false];
        yield 'CPF com 12 dígitos' => ['529982247252', false];
        yield 'CPF com letras' => ['abc.def.ghi-jk', false];
        yield 'CPF com 10 dígitos' => ['5299822472', false];
        yield 'CPF vazio string' => ['', false];

        yield 'CNPJ válido formatado' => ['71.569.042/0001-96', true];
        yield 'CNPJ válido sem pontuação' => ['71569042000196', true];
        yield 'CNPJ com espaços' => [' 71.569.0 42/0001-96 ', true];
        yield 'CNPJ outro válido' => ['11.222.333/0001-81', true];
        yield 'CNPJ inválido (DV errado)' => ['71.569.042/0001-95', false];
        yield 'CNPJ sequência repetida' => ['00.000.000/0000-00', false];
        yield 'CNPJ com mais dígitos' => ['715690420001961234', false];
        yield 'CNPJ apenas caracteres especiais' => ['..//-', false];
        yield 'CNPJ sequência 111' => ['11.111.111/1111-11', false];
        yield 'CNPJ com menos dígitos' => ['7156904200019', false];
        yield 'CNPJ com 15 dígitos' => ['715690420001961', false];
        yield 'CNPJ com 13 dígitos' => ['7156904200019', false];
        yield 'CNPJ vazio' => ['', false];
    }

    #[DataProvider('formattingDataProvider')]
    public function testFormatting(string $input, string|false $expected): void
    {
        $validator = new ValidaCPFCNPJ($input);
        $this->assertSame($expected, $validator->formata());
    }

    public static function formattingDataProvider(): iterable
    {
        yield 'CPF válido para formatação' => ['52998224725', '529.982.247-25'];
        yield 'CPF já formatado válido' => ['529.982.247-25', '529.982.247-25'];
        yield 'CPF sequência formata' => ['11111111111', '111.111.111-11'];
        yield 'CPF inválido não formata' => ['529.982.247-24', false];
        yield 'CPF com poucos dígitos' => ['123456', false];
        yield 'CPF vazio string' => ['', false];

        yield 'CNPJ válido para formatação' => ['71569042000196', '71.569.042/0001-96'];
        yield 'CNPJ já formatado válido' => ['71.569.042/0001-96', '71.569.042/0001-96'];
        yield 'CNPJ sequência formata' => ['00000000000000', '00.000.000/0000-00'];
        yield 'CNPJ inválido não formata' => ['71.569.042/0001-95', false];
        yield 'CNPJ com poucos dígitos' => ['123456789', false];
        yield 'CNPJ vazio' => ['', false];
    }
}
