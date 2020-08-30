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
    function validarSenha();
    function validarUsuario();
}

class User implements Cadastro, Validacao
{
    private $name;
    private $idade;
    private $senha;
    private $email;

    function __construct($nome=null, $idade=null, $senha=null, $email=null)
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

    public function cadastrarLogradouro(...$dados)
    {
        if($this->validarSenha($dados['senha'])){
            return [...$dados];
        }else {
            return "Não pode cadastar";
        }
    }
    public function cadastrarFerramentas(...$dados)
    {
        if($this->validarSenha($dados['senha'])){
            return [...$dados];
        }else {
            return "Não pode cadastar";
        }
    }

    public function validarSenha(...$senha)
    {
        return $this->senha == $senha;
    }
    public function validarUsuario(...$user)
    {
        return $this->user == $user;
    }
}