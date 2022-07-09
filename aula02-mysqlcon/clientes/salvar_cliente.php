<?php
    require '../database.php';

    //var_dump($_POST);    
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $id = 0;
    if(array_key_exists('id', $_POST))
        $id = intval($_POST['id']);
    
    
    if($id > 0)
        alterarCliente($id, $nome, $telefone, $endereco);
    else
        cadastrarCliente($nome, $telefone, $endereco);


    header ("location: index.php");
?>