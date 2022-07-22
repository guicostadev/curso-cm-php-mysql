<?php
    require_once '../database/produtos.php';

    $id = 0;
    if(array_key_exists('id', $_GET))
        $id = intval($_GET['id']);
    
    
    if($id > 0)
        excluirProduto($id);


    header ("location: index.php");
?>