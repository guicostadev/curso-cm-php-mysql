<?php

    require_once '../database/produtos.php';
    require_once '../database/fabricantes.php';

    $id = 0;
    if(array_key_exists('id', $_GET))
        $id = intval($_GET['id']);

    $produto = null;
    if($id > 0) 
    {
       $produto = consultarProduto($id);
    }

    $fabricantes = listarFabricantes();
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
            <?php if($produto == null):?>
                <h1 class="mt-5">Cadastro de Produtos</h1>
            <?php else: ?>
                <h1 class="mt-5">Alteração de Produtos</h1>
            <?php endif;?>

            <form class="form" action="salvar_produto.php" method="POST">
                <div class="">
                    <label>Nome</label>
                    <input type="text" class="form-control" 
                        name="nome" value="<?= $produto == null ? "" : $produto['nome'];?>"  />
                </div>
                <div class="">
                    <label>Codigo</label>
                    <input type="text" class="form-control" 
                        name="codigo" value="<?= $produto == null ? "" : $produto['codigo'];?>"  />
                </div>
                <div class="">
                    <label>Fabricante</label>
                    <select name="fabricantes_id" class="form-control">
                        <option value="">Selecione o Fabricante</option>
                        <?php if($fabricantes != null && count($fabricantes) > 0 ): ?>
                            <?php foreach($fabricantes as $fabricante): ?>
                                <option value="<?= $fabricante['id']?>" <?= $fabricante['id'] == $produto['fabricantes_id'] ? 'selected="selected"' : '' ?>>
                                    <?= $fabricante['nome']?>
                                </option>
                            <?php endforeach;?>
                        <?php endif;?>
                    </select>
                </div>
                <div class="">
                    <label>Valor</label>
                    <input type="number" class="form-control" 
                        name="valor" value="<?= $produto == null ? "" : $produto['valor'];?>"  />
                </div>
                <div class="">
                    <?php if($produto != null):?>
                        <input type="hidden" name="id" value="<?php echo $produto['id'] ?>" />
                    <?php endif; ?>
                    <input type="submit" class="btn btn-primary" value="Enviar" />
                </div>
            </form>
        </div>
    </main>

    <?php require '../footer.php' ; ?>
    
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js" ></script>
</body>
</html>