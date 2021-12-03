<?php

class usuario {
    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host, $cpf){
        global $pdo;
        global $msgErro;
        try{
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$cpf)
        } catch (PDOException $e) {
            $msgErro = $e->getMessage(); 

        }
        
    }

    public function cadastrar($nome, $telefone, $cpf, $nascimento, $email, $cep, $rua, $numero, $bairro, $cidade){
        global $pdo;
        
        $sql = $pdo->prepare("SELECT nomedacoluna FROM tabela WHERE cpf = :cadcpf");

        $sql->bindValue(":cadcpf", $cpf);
        $sql->execute();

        if($sql->rowCount() > 0){
            return false;
        }else{
            $sql = $pdo->prepare("INSERT INTO nomedatabela (nomesdascolunas) VALUES(:nm, :tel, :cadcpf, :nas, :ema, :cep, :rua, :num, :bai, :cid)");

            $sql->bindValue(":nm", $nome);
            $sql->bindValue(":tel", $telefone);
            $sql->bindValue(":cadcpf", $cpf);
            $sql->bindValue(":nas", $nascimento);
            $sql->bindValue(":ema", $email);
            $sql->bindValue(":cep", $cep);
            $sql->bindValue(":rua", $rua);
            $sql->bindValue(":num", $numero);
            $sql->bindValue(":bai", $bairro);
            $sql->bindValue(":cid", $cidade);

            $sql->execute();
            return true;
        }

    }

    public function logar($cpf){
        global $pdo;

        $sql = $pdo->prepare("SELECT nomedacoluna FROM nomedatabela WHERE cpf = :cadcpf");
        $sql->bindValue(":cadcpf", $cpf);
        $sql->execute();

        if($sql->rowCount() > 0){
            //pode entrar na consulta de agendamento
        }else{
            
        }
    }



        }

?>