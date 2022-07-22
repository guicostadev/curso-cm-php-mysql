<?php

    require_once 'conexao_db.php';
    require_once 'fabricantes.php';

    function listarProdutos()
    {
        $database = ConexaoDB::instancia();

        $stmt = "SELECT * FROM produtos";
        $query = $database->prepare($stmt);

        $query->execute();
        $produtos = $query->fetchAll(PDO::FETCH_ASSOC);

        return $produtos;      
    }

	function consultarProduto($id)
    {        
        $database = ConexaoDB::instancia();

        $stmt = "SELECT * FROM produtos WHERE id = :id";
        $query = $database->prepare($stmt);
        $query->bindValue(':id', $id);

        $query->execute();
        $produto = $query->fetch(PDO::FETCH_ASSOC);
        
        return $produto;
    } 

    function cadastrarProduto($fabricantes_id, $nome, $codigo, $valor ) 
    {
        $fabricante = consultarFabricante($fabricantes_id);

        $stmt  = "INSERT INTO produtos (`nome`, `fabricantes_id`, `codigo`, `valor`) VALUES ";
        $stmt .= "(:nome, :fabricantes_id, :codigo, :valor)";

        $database = ConexaoDB::instancia();
        $query = $database->prepare($stmt);
        $query->bindValue(':nome', $nome, PDO::PARAM_STR);
        $query->bindValue(':fabricantes_id', $fabricante->id, PDO::PARAM_INT);
        $query->bindValue(':codigo', $codigo, PDO::PARAM_STR);
        $query->bindValue(':valor', $valor);

        $query->execute();
        $id = $database->lastInsertId();
        
        $produto = consultarProduto($id);
        return $produto;
    }

    function alterarProduto($id, $fabricantes_id, $nome, $codigo, $valor ) 
    {    
        $produto = consultarProduto($id);
        $fabricante = consultarFabricante($fabricantes_id);

        $stmt  = "UPDATE produtos SET fabricantes_id = :fabricantes_id ";
        $stmt .= "nome = :nome, codigo = :codigo, valor = :valor ";
        $stmt .= "WHERE id = :id";

        $database = ConexaoDB::instancia();
        $query = $database->prepare($stmt);
        $query->bindValue(':nome', $nome, PDO::PARAM_STR);
        $query->bindValue(':fabricantes_id', $fabricante->id, PDO::PARAM_INT);
        $query->bindValue(':codigo', $codigo, PDO::PARAM_STR);
        $query->bindValue(':valor', $valor);
        $query->bindValue(':id', $produto->id, PDO::PARAM_INT);

        $query->execute();
                
        $produtoAlterado = consultarProduto($produto->id);
        return $produtoAlterado;
    }

    function excluirProduto($id) 
    {
        $produto = consultarProduto($id);
        
        $stmt = "DELETE FROM produtos WHERE id = :id";

        $database = ConexaoDB::instancia();
        $query = $database->prepare($stmt);
        $query->bindValue(':id', $produto->id, PDO::PARAM_INT);
        $query->execute();
    }
?>
