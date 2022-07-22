<?php
    require_once '../database/produtos.php';

    $fabricantes_id = $_POST['fabricantes_id'];
    $nome = $_POST['nome'];
    $codigo = $_POST['codigo'];
    $valor = $_POST['valor'];

    $id = 0;
    if(array_key_exists('id', $_POST))
        $id = intval($_POST['id']);
        
    if($id > 0)
        alterarProduto($id, $fabricantes_id, $nome, $codigo, $valor);
    else
        cadastrarProduto($fabricantes_id, $nome, $codigo, $valor);

    header ("location: index.php");
?>