<?php

    require_once '../database/fabricantes.php';

    $id = 0;
    if(array_key_exists('id', $_GET))
        $id = intval($_GET['id']);

    $fabricante = null;
    if($id > 0) 
    {
       $fabricante = consultarFabricante($id);
    }
?>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="itsguicosta">
    <title>Curso-CM - Fabricantes</title>

    <!-- Bootstrap core CSS -->
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/project.css" rel="stylesheet" />
</head>
<body class="d-flex flex-column h-100"> 
    <?php require '../header.php'; ?>

    <main class="flex-shrink-0">
        <div class="container">
            <?php if($fabricante == null):?>
                <h1 class="mt-5">Cadastro de Fabricantes</h1>
            <?php else: ?>
                <h1 class="mt-5">Alteração de Fabricantes</h1>
            <?php endif;?>

            <form class="form" action="salvar_fabricante.php" method="POST">
                <div class="">
                    <label>Nome</label>
                    <input type="text" class="form-control" 
                        name="nome" value="<?= $fabricante == null ? "" : $fabricante['nome'];?>"  />
                </div>
                <div class="">
                    <?php if($fabricante != null):?>
                        <input type="hidden" name="id" value="<?php echo $fabricante['id'] ?>" />
                    <?php endif; ?>
                    <input type="submit" class="btn btn-primary" value="Enviar" />
                </div>
            </form>
        </div>
    </main>

    <?php require '../footer.php' ; ?>
    
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js" ></script>
</body>
</html>