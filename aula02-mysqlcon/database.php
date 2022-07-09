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

	function consultarClientes($id){
        $conn = openConnection();

        $clientesDB = mysqli_query($conn, "SELECT * FROM clientes WHERE id = $id");
        $clientes = mysqli_fetch_all($clientesDB, MYSQLI_ASSOC);

        mysqli_close($conn);
        return $clientes[0];      
    } 

    function cadastrarCliente($nome, $telefone, $endereco ) {
        $conn = openConnection();

        $stmt  = "INSERT INTO clientes (`nome`, `telefone`, `endereco`) VALUES ";
        $stmt .= "('$nome', '$telefone', '$endereco')";

        $result = mysqli_query($conn, $stmt);
        mysqli_close($conn);
        return $result;
    }

    function alterarCliente($id, $nome, $telefone, $endereco ) {
        $conn = openConnection();

        $stmt  = "UPDATE clientes SET ";
        $stmt .= "nome = '$nome', ";
        $stmt .= "telefone = '$telefone', ";
        $stmt .= "endereco = '$endereco' ";
        $stmt .= "WHERE id = $id";

        // echo $stmt; die;
        $result = mysqli_query($conn, $stmt);
        mysqli_close($conn);
        return $result;
    }

    function excluirCliente($id) {
        $conn = openConnection();
        
        $stmt = "DELETE FROM clientes WHERE id = $id";
        mysqli_query($conn, $stmt);
        mysqli_close($conn);
    }
?>