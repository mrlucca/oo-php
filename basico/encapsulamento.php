<?php

/**
 * + NIVEIS DE VISIBILIDADE:
 *      > public: pode ser acessado de todas as formas diferentes
 *
 *      > protected: só pode ser acessado pela classe ou suas classes filhos
 *
 *      > private: só pode ser acessado pela classe
 *
 */


class Usuario
{
    public $email;
    protected $name;
    protected $age;
    static protected $password;
    private $token = "223j3h2jdjjss89230";


    function __construct($nome, $idade, $mail, $senha)
    {
        $this->name = $nome;
        $this->age = $idade;
        $this->email = $mail;
        $this->password = $senha;
    }

    private function validarSenha($senha)
    {
        return ($this->password === $senha) ? $this->token : false;
    }

    public function info()
    {
        return "Login: $this->name:$this->email";
    }

    public function trocarSenha($senha, $newPassword)
    {
        $result = $this->validarSenha($senha);
        if($result === $this->token)
        {
            $this->password = $newPassword;
        }else{
            echo "Tente novamente";
        }
    }

    protected function trocarEmail($senha, $newEmail)
    {
        $ok = $this->validarSenha($senha) == $this->token;
        if($ok){
            $this->email = $newEmail;
        }
    }

    protected function infoCompleta()
    {
        return [
            "nome" => $this->name,
            "idade" => $this->age,
            "senha" => $this->password,
            "token" => $this->token

        ];

    }

}


class Max extends Usuario
{

    function __construct($nome, $idade, $mail, $senha)
    {
        // COM O PARENT PODE PEGAR DADOS DA SUA CLASSE PAI
        parent::__construct($nome, $idade, $mail, $senha);
    }

    function troca($newMail){
        $this->trocaEmail($this->password, $newMail);
        echo "a troca foi realizada, novo email é $newMail";
    }

    public function apresentar()
    {
        return $this->infoCompleta();
    }
}

$lucca = new Usuario("lucca", 18,"hajs@hotmail.com", "123456");
echo $lucca->info();

$master = new Max("lucca", 16, "laxus@hotmail.com", 2343432);
var_dump($master->apresentar());