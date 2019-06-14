<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CRUD DE PRODUTOS</title>

    <meta name="description" content="CRUD DE PRODUTOS">
    <meta name="author" content="CRUD!">

    <link href="../assets/src/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/src/css/style.css" rel="stylesheet">
    <link href="../assets/src/css/estilo.css" rel="stylesheet">

</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form role="form" name="" class="form form-control " method="post" action="salvarUm">

                <div class="form-group">
                    <label for="Codigo">
                        Codigo
                    </label>
                    <input type="text" class="form-control form-input" name="codigo" />
                </div>
                <div class="form-group">
                    <label for="Nome">
                        Nome
                    </label>
                    <input type="text" class="form-control form-input" name="nome" />
                </div>
                <div class="form-group">
                    <label for="Descricao">
                        Descrição
                    </label>
                    <input type="text" class="form-control form-input" name="descricao" />
                </div>
                <div class="form-group">
                    <label for="Codigo">
                        Preco
                    </label>
                    <input type="text" class="form-control form-input" name="preco" />
                </div>

                <button type="submit" class="btn btn-primary">
                    Salvar
                </button>
                <a href="listar" class="btn btn-warning" type="button">Voltar</a>
            </form>
        </div>
    </div>
</div>
<script src="../assets/src/js/jquery.min.js"></script>
<script src="../assets/src/js/bootstrap.min.js"></script>
<script src="../assets/src/js/scripts.js"></script>
</body>
</html>
</body>
</html>