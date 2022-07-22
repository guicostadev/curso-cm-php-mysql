<?php
    require_once '../database/fabricantes.php';

    $id = 0;
    if(array_key_exists('id', $_GET))
        $id = intval($_GET['id']);
    
    
    if($id > 0)
        excluirFabricante($id);


    header ("location: index.php");
?>