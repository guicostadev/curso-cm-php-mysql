<?php

    require_once 'conexao_db.php';

    function listarClientes()
    {
        $database = ConexaoDB::instancia();

        $stmt = "SELECT * FROM clientes";
        $query = $database->prepare($stmt);

        $query->execute();
        $clientes = $query->fetchAll(PDO::FETCH_ASSOC);

        return $clientes;      
    }

	function consultarCliente($id)
    {        
        $database = ConexaoDB::instancia();

        $stmt = "SELECT * FROM clientes WHERE id = :id";
        $query = $database->prepare($stmt);
        $query->bindValue(':id', $id);

        $query->execute();
        $cliente = $query->fetch(PDO::FETCH_ASSOC);
        
        return $cliente;
    } 

    function cadastrarCliente($nome, $telefone, $logradouro ) 
    {
        $stmt  = "INSERT INTO clientes (`nome`, `telefone`, `logradouro`) VALUES ";
        $stmt .= "(:nome, :telefone, :logradouro)";

        $database = ConexaoDB::instancia();
        $query = $database->prepare($stmt);
        $query->bindValue(':nome', $nome, PDO::PARAM_STR);
        $query->bindValue(':telefone', $telefone, PDO::PARAM_STR);
        $query->bindValue(':logradouro', $logradouro, PDO::PARAM_STR);

        $query->execute();
        $id = $database->lastInsertId();
        
        $cliente = consultarCliente($id);
        return $cliente;
    }

    function alterarCliente($id, $nome, $telefone, $logradouro ) 
    {    
        $cliente = consultarCliente($id);

        $stmt  = "UPDATE clientes SET ";
        $stmt .= "nome = :nome, telefone = :telefone, logradouro = :logradouro ";
        $stmt .= "WHERE id = :id";

        $database = ConexaoDB::instancia();
        $query = $database->prepare($stmt);
        $query->bindValue(':nome', $nome, PDO::PARAM_STR);
        $query->bindValue(':telefone', $telefone, PDO::PARAM_STR);
        $query->bindValue(':logradouro', $logradouro, PDO::PARAM_STR);
        $query->bindValue(':id', $cliente->id, PDO::PARAM_INT);

        $query->execute();
                
        $clienteAlterado = consultarCliente($cliente->id);
        return $clienteAlterado;
    }

    function excluirCliente($id) 
    {
        $cliente = consultarCliente($id);
        
        $stmt = "DELETE FROM clientes WHERE id = :id";

        $database = ConexaoDB::instancia();
        $query = $database->prepare($stmt);
        $query->bindValue(':id', $cliente->id, PDO::PARAM_INT);
        $query->execute();
    }
?>
