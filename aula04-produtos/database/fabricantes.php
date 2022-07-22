<?php

    require_once 'conexao_db.php';

    function listarFabricantes()
    {
        $database = ConexaoDB::instancia();

        $stmt = "SELECT * FROM fabricantes";
        $query = $database->prepare($stmt);

        $query->execute();
        $fabricantes = $query->fetchAll(PDO::FETCH_ASSOC);

        return $fabricantes;      
    }

	function consultarFabricante($id)
    {        
        $database = ConexaoDB::instancia();

        $stmt = "SELECT * FROM fabricantes WHERE id = :id";
        $query = $database->prepare($stmt);
        $query->bindValue(':id', $id);

        $query->execute();
        $fabricante = $query->fetch(PDO::FETCH_ASSOC);
        
        return $fabricante;
    } 

    function cadastrarFabricante($nome) 
    {
        $stmt  = "INSERT INTO fabricantes (`nome`) VALUES ";
        $stmt .= "(:nome)";

        $database = ConexaoDB::instancia();
        $query = $database->prepare($stmt);
        $query->bindValue(':nome', $nome, PDO::PARAM_STR);

        $query->execute();
        $id = $database->lastInsertId();
        
        $fabricante = consultarFabricante($id);
        return $fabricante;
    }

    function alterarFabricante($id, $nome) 
    {    
        $fabricante = consultarFabricante($id);

        $stmt  = "UPDATE fabricantes SET nome = :nome ";
        $stmt .= "WHERE id = :id";

        $database = ConexaoDB::instancia();
        $query = $database->prepare($stmt);
        $query->bindValue(':nome', $nome, PDO::PARAM_STR);
        $query->bindValue(':id', $fabricante->id, PDO::PARAM_INT);

        $query->execute();

        $fabricanteAlterado = consultarFabricante($fabricante->id);
        return $fabricanteAlterado;
    }

    function excluirFabricante($id) 
    {
        $fabricante = consultarFabricante($id);
        
        $stmt = "DELETE FROM fabricantes WHERE id = :id";

        $database = ConexaoDB::instancia();
        $query = $database->prepare($stmt);
        $query->bindValue(':id', $fabricante->id, PDO::PARAM_INT);
        $query->execute();
    }
?>
