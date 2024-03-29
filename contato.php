<?php

class contato {

    private $pdo;
   
    public function __construct() {
        $this->pdo = new PDO("mysql:dbname=crudOO;host=localhost", "root", "");
    }

    public function adicionar($email, $nome) {
  
            $sql = "INSERT INTO contatos (nome, email) VALUES (:nome, :email)";

            $sql = $this->pdo->prepare($sql);
            
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->execute();

    }

    public function getInfo($id) {
        $sql = "SELECT * FROM contatos WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            return $sql->fetch();
        } else {
           return array(); 
        }
    }


    public function getAll() {     //método que pega e retorna toda a tabela
        $sql = "SELECT * FROM contatos";
        $sql = $this->pdo->query($sql);

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return array();
        }
    }

    public function editar($nome, $email, $id) {
        
      if ($this->existeEmail($email) == false) {  //só altera se o email não existir
      $sql = "UPDATE contatos SET nome = :nome, email = :email WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':id', $id);
            $sql->execute();
            
            return true;
    } else {
        return false;
    }
    } 
public function existeEmail ($email) {
    
    $sql = "SELECT * FROM contatos WHERE email = '$email'";
    $sql = $this->pdo->query($sql);
    if ($sql->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}
    public function excluir($id) {
      
        $sql = "DELETE FROM contatos WHERE id = :id";
        $sql = $this->pdo->prepare($sql);

        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
 
}
