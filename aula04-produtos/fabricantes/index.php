<?php
    require_once '../database/fabricantes.php';
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
            <h1 class="mt-5">Fabricantes do Sistema</h1>
            <div class="table-responsive">
                <div class="my-2">
                    <a href="formulario.php" class="btn btn-primary">
                        Novo Fabricante
                    </a>
                </div>
                <table class="table table-sm table-hover">
                    <thead>
                       <th class="text-center">ID</th> 
                       <th class="text-left">Nome</th> 
                       <th class="text-center">Ações</th> 
                    </thead>
                    <tbody>
                        <?php $fabricantes = listarFabricantes(); ?>
                        <?php if(count($fabricantes) > 0): ?>
                            <?php foreach($fabricantes as $fabricante): ?>
                                <tr>
                                    <td class="text-center"><?php echo $fabricante['id']; ?></td>
                                    <td class="text-left"><?php echo $fabricante['nome']; ?></td>
                                    <td class="text-center">
                                        <a href="formulario.php?id=<?= $fabricante['id']?>" class="btn btn-primary">
                                            Alterar
                                        </a>
                                        <a href="excluir_fabricante.php?id=<?= $fabricante['id']?>" class="btn btn-danger ml-2">
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