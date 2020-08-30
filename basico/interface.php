<?php

/**
 * A INTERFACE PRATICAMENTE SÃO DEFINIÇÕES DE ORBRIGAÇÃO
 * COM AS INTERFACES VOCÊ CONTROLA O QUE VAI SER IMPLEMENTADO 
 * EM SUA CLASSE TENDO UM CONTROLE E FRAGMENTADO AS INFORMAÇÕES
 * E OS FORMATOS DE IMPLEMENTAÇÃO DOS BLOCOS DA CLASSE
 */
interface Cadastro
{
    function cadastrarUsuario();
    function cadastrarLogradouro();
    function cadastrarFerramentas();
}

interface Validacao
{
    function validarSenha(): bool; //uma interface consegue padronizar o tipo de retorno tbm
    function validarUsuario(): bool;
}

class User implements Cadastro, Validacao
{
    private $name;
    private $idade;
    private $senha;
    private $email;

    function __construct(string $nome=null, int $idade=null, string $senha=null,string $email=null)
    {
        $this->name = $nome;
        $this->idade = $idade;
        $this->senha = $senha;
        $this->email = $email;
    }
    public function cadastrarUsuario()
    {
       return ["user"=> $this->name, "idade"=> $this->senha, "email" => $this->email];
    }

    public function cadastrarLogradouro($senha=null, ...$dados)
    {
        if($this->validarSenha($senha)){
            return [...$dados];
        }else {
            return "Não pode cadastar";
        }
    }
    public function cadastrarFerramentas($senha=null, ...$dados)
    {
        if($this->validarSenha($senha)){
            return [...$dados];
        }else {
            return "Não pode cadastar";
        }
    }

    function validarSenha($senha=null): bool
    {
        return $this->senha == $senha;
    }
    function validarUsuario($user=null): bool
    {
        return $this->user == $user;
    }
}

$carlos = new User("carlos", 30, "1234567", "lupback@gmail.com");
print_r($carlos->cadastrarLogradouro("1234567", ["casa"=> "Narnia Bool Pack", "rua"=> "hogwarts", "numero"=> "9 3/4"]));