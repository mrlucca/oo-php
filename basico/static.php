<?php

/**
 * A PRINCIPAL DIFERNÇA DO STATIC E OS NÃO STATIC
 * É QUE COM O STATIC É SÓ UM VALOR QUE VAI SER ALOCADO NA MEMORIA PARA TODAS AS
 * INSTANCIAS PERFEITA PARA CONSTANTES OU VARIAVIES DE AMBIENTES
 * OS NÃO ESTATICOS GERAM UMA COPIA PARA TODAS AS INSTANCIAS
 */
class MembrosStaticos
{
    public $naoStaticos = "hello world";
    public static $static = "HELLO WORD";

    public function apresentar(){
        echo $this->naoStaticos . "\n" . self::$static;
    }
}

$obj = new MembrosStaticos();
$obj->apresentar();

class Operacao
{
    public function OperacoesDisponiveis($a, $b)
    {
        return [
            "soma"          => self::soma($a, $b),
            "subtração"     => self::sub($a, $b),
            "divisão"       => self::div($a, $b),
            "multiplicação" => self::mult($a, $b),
        ];
    }

    // NÃO PRECISA INSTANCIAR PARA ACESSAR AS FUNÇÕES TANTO QUE O $THIS NÃO FUNCIONA NO STATIC
    public static function soma($a, $b)
    {
        return $a + $b;
    }
    public static function sub($a, $b)
    {
        return $a - $b;
    }
    public static function div($a, $b)
    {
        return $a / $b;
    }
    public static function mult($a, $b)
    {
        return $a * $b;
    }
}


echo Operacao::soma(3, 5);
echo Operacao::mult(4, 7);
$data = new Operacao;
print_r($data->OperacoesDisponiveis(34, 55));