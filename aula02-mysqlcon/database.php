<?php

    function openConnection() {
        $conn = mysqli_connect("localhost", "root", "", "curso_php_cm");
        mysqli_query($conn, "SET NAMES 'utf8'");
        return $conn;
    }

	function listarClientes(){
        $conn = openConnection();

        $clientesDB = mysqli_query($conn, "SELECT * FROM clientes");
        $clientes = mysqli_fetch_all($clientesDB, MYSQLI_ASSOC);

        mysqli_close($conn);
        return $clientes;      
    } 
?>