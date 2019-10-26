<?php
include 'contato.php';
$contato = new contato();

if (!empty($_GET['id'])) {
    $id = $_GET['id'];    
    
    $info = $contato->getInfo($id);
    
    if (empty($info['email'])) {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}

?>

<h1>Editar</h1><br/>


<form method='POST' action="editar_submit.php">
    <input type="hidden" name="id" value="<?php echo $info['id'];  ?>" />
    
    Nome: <br/>
    <input type='text' name='nome' value="<?php echo $info['nome']; ?>"/><br/>
    E-mail:<br/>
    <input type='email' name='email' value='<?php echo $info['email']; ?>'/>
    
    <input type="submit" value='Adicionar'/>
    
</form>

