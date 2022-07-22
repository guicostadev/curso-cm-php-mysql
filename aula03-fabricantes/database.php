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

    function cadastrarCliente($nome, $telefone, $logradouro ) {
        $conn = openConnection();

        $stmt  = "INSERT INTO clientes (`nome`, `telefone`, `logradouro`) VALUES ";
        $stmt .= "('$nome', '$telefone', '$logradouro')";

        $result = mysqli_query($conn, $stmt);
        mysqli_close($conn);
        return $result;
    }

    function alterarCliente($id, $nome, $telefone, $logradouro ) {
        $conn = openConnection();

        $stmt  = "UPDATE clientes SET ";
        $stmt .= "nome = '$nome', ";
        $stmt .= "telefone = '$telefone', ";
        $stmt .= "logradouro = '$logradouro' ";
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

	function listarFabricantes(){
        $conn = openConnection();

        $fabricantesDB = mysqli_query($conn, "SELECT * FROM fabricantes");
        $fabricantes = mysqli_fetch_all($fabricantesDB, MYSQLI_ASSOC);

        mysqli_close($conn);
        return $fabricantes;      
    }

	function consultarFabricante($id){
        $conn = openConnection();

        $fabricantesDB = mysqli_query($conn, "SELECT * FROM fabricantes WHERE id = $id");
        $fabricantes = mysqli_fetch_all($fabricantesDB, MYSQLI_ASSOC);

        mysqli_close($conn);
        return $fabricantes[0];      
    } 

    function cadastrarFabricante($nome) {
        $conn = openConnection();

        $stmt  = "INSERT INTO fabricantes (`nome`) VALUES ";
        $stmt .= "('$nome')";

        $result = mysqli_query($conn, $stmt);
        mysqli_close($conn);
        return $result;
    }

    function alterarFabricante($id, $nome ) {
        $conn = openConnection();

        $stmt  = "UPDATE clientes SET ";
        $stmt .= "nome = '$nome' ";
        $stmt .= "WHERE id = $id";

        // echo $stmt; die;
        $result = mysqli_query($conn, $stmt);
        mysqli_close($conn);
        return $result;
    }

    function excluirFabricante($id) {
        $conn = openConnection();
        
        $stmt = "DELETE FROM fabricantes WHERE id = $id";
        mysqli_query($conn, $stmt);
        mysqli_close($conn);
    }
?>