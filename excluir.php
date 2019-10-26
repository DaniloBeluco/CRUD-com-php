<?php
echo "Entrando no excluir";
include 'contato.php';
$contato = new contato();
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    
    $contato->excluir($id);
   header("Location: index.php");
echo "ID: ".$_GET['id'];    
} else {
    header ("Location: index.php");
}