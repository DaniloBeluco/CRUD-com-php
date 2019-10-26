<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Contatos</h1>
        <a href='adicionar.php'>Adicionar</a>
        <hr/>
        <table border='1' width='500'>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>Ações</th>
            </tr>

            <?php
            require 'contato.php';

            $contato = new contato();
            
            $lista = $contato->getAll();
            foreach ($lista as $item) {
                
            ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['nome']; ?></td>
                <td><?php echo $item['email']; ?></td>
                <td>
                    <a href='editar.php?id=<?php echo $item['id']; ?>'>Editar</a> - 
                    <a href='excluir.php?id=<?php echo $item['id']; ?>'>Excluir</a>   <!--Envia a id para a outra página por url-->
                </td>
            </tr>
            <?php
           }
           
            ?> 
        </table>
    </body>
</html>
