<?php

class Client
{
    private $nome;
    private $idade;
    private $carteira;


    function __construct($nome=null, $idade=null, $carteira=0)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->carteira = $carteira;

    }
    public function upMoney($money)
    {
        $this->carteira += $money;
        echo "  A adição de valores foi efetuada com sucesso    ";
    }

    public function getMoney()
    {
        $valorCarteira = "O valor atual na carteira é: $this->carteira";
        return $valorCarteira;
    }
    public function subMoney($sub)
    {
        $this->carteira -= $sub;
        echo "  >> A subtração de valores foi efetuada com sucesso ";
    }
}

$lucca = new Client("Lucca", 18, 442);

$valor = $lucca->getMoney();
echo $valor;
$lucca->upMoney(44);
echo "\n". $lucca->getMoney();
echo "\n". $lucca->subMoney(333);
echo "\n" .$lucca->getMoney();