<?php
    require '../database.php';

    //var_dump($_POST);    
    $nome = $_POST['nome'];

    $id = 0;
    if(array_key_exists('id', $_POST))
        $id = intval($_POST['id']);
    
    
    if($id > 0)
        alterarFabricante($id, $nome);
    else
        cadastrarFabricante($nome);


    header ("location: index.php");
?>