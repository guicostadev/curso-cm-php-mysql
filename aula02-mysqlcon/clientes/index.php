<?php
  require '../database.php';
?>

<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="itsguicosta">
    <title>Curso-CM - Clientes</title>

    <!-- Bootstrap core CSS -->
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/project.css" rel="stylesheet" />
</head>
<body class="d-flex flex-column h-100"> 
    <?php require '../header.php'; ?>

    <main class="flex-shrink-0">
        <div class="container">
            <h1 class="mt-5">Clientes do Sistema</h1>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                       <th>Nome</th> 
                       <th>Telefone</th> 
                       <th>Endereço</th> 
                    </thead>
                    <tbody>
                        <?php $clientes = listarClientes(); ?>
                        <?php if(count($clientes) > 0): ?>
                            <?php foreach($clientes as $cliente): ?>
                                <tr>
                                    <td><?= $cliente['nome']; ?></td>
                                    <td><?= $cliente['telefone']; ?></td>
                                    <td><?= $cliente['endereco']; ?></td>
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