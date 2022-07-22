<?php
    require_once '../database/produtos.php';
?>

<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="itsguicosta">
    <title>Curso-CM - Produtos</title>

    <!-- Bootstrap core CSS -->
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/project.css" rel="stylesheet" />
</head>
<body class="d-flex flex-column h-100"> 
    <?php require '../header.php'; ?>

    <main class="flex-shrink-0">
        <div class="container">
            <h1 class="mt-5">Produtos do Sistema</h1>
            <div class="table-responsive">
                <div class="my-2">
                    <a href="formulario.php" class="btn btn-primary">
                        Novo Produto
                    </a>
                </div>
                <table class="table table-sm table-hover">
                    <thead>
                       <th class="text-center">ID</th> 
                       <th class="text-left">Nome</th> 
                       <th class="text-left">Codigo</th> 
                       <th class="text-right">Valor</th> 
                       <th class="text-center">Ações</th> 
                    </thead>
                    <tbody>
                        <?php $produtos = listarProdutos(); ?>
                        <?php if(count($produtos) > 0): ?>
                            <?php foreach($produtos as $produto): ?>
                                <tr>
                                    <td class="text-center"><?php echo $produto['id']; ?></td>
                                    <td class="text-left"><?php echo $produto['nome']; ?></td>
                                    <td class="text-left"><?php echo $produto['codigo']; ?></td>
                                    <td class="text-left">R$ <?php echo $produto['valor']; ?></td>
                                    <td class="text-center">
                                        <a href="formulario.php?id=<?= $produto['id']?>" class="btn btn-primary">
                                            Alterar
                                        </a>
                                        <a href="excluir_produto.php?id=<?= $produto['id']?>" class="btn btn-danger ml-2">
                                            Excluir
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <?php require '../footer.php' ; ?>
    
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js" ></script>
</body>
</html>