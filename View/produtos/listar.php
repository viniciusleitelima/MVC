<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CRUD DE PRODUTOS</title>

    <meta name="description" content="CRUD DE PRODUTOS">
    <meta name="author" content="CRUD!">

    <link href="../../MVC/assets/src/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../MVC/assets/src/css/style.css" rel="stylesheet">
    <?php
    if ($_SESSION["msg"]!=null){
        ?>
        <script>
            function msg() {
                alert(<?php echo $_SESSION["msg"]?>);
            }
        </script>
    <?php } ?>

</head>
<body onload="msg()">
<script>
    function apagar(id)
    {
        if(window.confirm("Deseja realmente excluir?")){
            window.location = 'http://localhost/MVC/?Controller=Produto&Action=delete&id='+id;
        }

    }
</script>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12"><br />
            <a href="novo" class="btn btn-success" type="button">Novo produto</a><br /><br />
            <table class="table table-striped table-hover table-sm table-bordered">
                <thead>
                <tr>
                    <th>
                        CÓDIGO
                    </th>
                    <th>
                        NOME
                    </th>
                    <th>
                        DESCRIÇÃO
                    </th>
                    <th>
                        PREÇO
                    </th>
                    <th>
                        EDITAR
                    </th>
                    <th>
                        EXCLUIR
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $retorno=$_SESSION["data"];
                    foreach ($retorno as $value){
                ?>
                        <tr>
                            <td><?php echo $value[1];?></td>
                            <td><?php echo $value[2];?></td>
                            <td><?php echo $value[3];?></td>
                            <td><?php echo $value[4];?></td>
                            <td><a href="#" onclick="apagar('<?php echo $value[0];?>');">Apagar</a></td>
                            <td><a href="editar/<?php echo $value[0];?>">Editar</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <form role="form" enctype="multipart/form-data" action="salvar" method="POST">
                <div class="form-group">

                    <label for="exampleInputFile">
                        Importar arquivo
                    </label>
                    <input type="file" class="form-control-file" name="userfile" id="userfile" />
                    <p class="help-block">
                        Escolha arquivo xml.
                    </p>
                </div>
                <button type="submit" class="btn btn-primary">
                    Enviar arquivo
                </button>
            </form>
        </div>
    </div>
</div>

<script src="../../MVC/assets/src/js/jquery.min.js"></script>
<script src="../../MVC/assets/src/js/bootstrap.min.js"></script>
<script src="../../MVC/assets/src/js/scripts.js"></script>
</body>
</html>
