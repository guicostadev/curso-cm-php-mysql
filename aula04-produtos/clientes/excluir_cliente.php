<?php
    require_once '../database/clientes.php';

    $id = 0;
    if(array_key_exists('id', $_GET))
        $id = intval($_GET['id']);
    
    
    if($id > 0)
        excluirCliente($id);


    header ("location: index.php");
?>