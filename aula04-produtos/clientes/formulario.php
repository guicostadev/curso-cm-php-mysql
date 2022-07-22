<?php

    require_once '../database/clientes.php';

    $id = 0;
    if(array_key_exists('id', $_GET))
        $id = intval($_GET['id']);

    $cliente = null;
    if($id > 0) 
    {
       $cliente = consultarCliente($id);
    }
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
            <?php if($cliente == null):?>
                <h1 class="mt-5">Cadastro de Clientes</h1>
            <?php else: ?>
                <h1 class="mt-5">Alteração de Clientes</h1>
            <?php endif;?>

            <form class="form" action="salvar_cliente.php" method="POST">
                <div class="">
                    <label>Nome</label>
                    <input type="text" class="form-control" 
                        name="nome" value="<?= $cliente == null ? "" : $cliente['nome'];?>"  />
                </div>
                <div class="">
                    <label>Telefone</label>
                    <input type="text" class="form-control" 
                        name="telefone" value="<?= $cliente == null ? "" : $cliente['telefone'];?>"  />
                </div>
                <div class="">
                    <label>Endereço</label>
                    <input type="text" class="form-control" 
                        name="logradouro" value="<?= $cliente == null ? "" : $cliente['logradouro'];?>" />
                </div>
                <div class="">
                    <?php if($cliente != null):?>
                        <input type="hidden" name="id" value="<?php echo $cliente['id'] ?>" />
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