<?php

private $pdo;

public function admin($data, $local, $hora){
    global $pdo;
    
    $sql = $pdo->prepare("SELECT nomedacoluna FROM tabela WHERE cpf = :cadcpf");

    $sql->bindValue(":cadcpf", $cpf);
    $sql->execute();

    if($sql->rowCount() > 0){
        return false;
    }else{
        $sql = $pdo->prepare("INSERT INTO nomedatabela (nomesdascolunas) VALUES(:data, :local, :hora)");

        $sql->bindValue(":data", $data);
        $sql->bindValue(":local", $local);
        $sql->bindValue(":hora", $hora);

        $sql->execute();
        return true;
    }
}

    public function consulta($data, $local, $hora){
        //consulta do usuário, com informações da data, hora e local agendados para a vacina
        global $pdo;

        $sql = $pdo->prepare("SELECT nomedacoluna FROM nomedatabela WHERE cpf = :cadcpf");

        $sql->bindValue(":data", $data);
        $sql->bindValue(":local", $local);
        $sql->bindValue(":hora", $hora);
        
        }



?>