<?php
include ("Model/ProdutoModel.php");
include ("Model/produtoVO.php");
include ("Model/ProdutoDAO.php");
include ("Model/DB.php");
class ProdutoController{

    public function ProdutoController(){

    }

    public function salvar(){
        $convertxml = simplexml_load_file($_FILES['userfile']['tmp_name']);

        $model = new ProdutoModel();
        $vo = new produtoVO();

        foreach ($convertxml as $dados) {
            $vo->setCodigo($dados->codigo);
            $vo->setNome($dados->nome);
            $vo->setDescricao($dados->descricao);
            $vo->setPreco($dados->preco);
            if ($model->insertModel($vo)) {
                $_SESSION["msg"] = "Produto cadastrado com sucesso.";
            } else {
                $_SESSION["msg"] = "Erro ao cadastrar produto.";
            }
        }

        header("Location:http://localhost/MVC/produto/listar");
    }

    public function salvarUm(){
        $model = new ProdutoModel();
        $vo = new produtoVO();
        $vo->setCodigo($_POST["codigo"]);
        $vo->setNome($_POST["nome"]);
        $vo->setDescricao($_POST["descricao"]);
        $vo->setPreco($_POST["preco"]);
        if ($model->insertModel($vo)) {
            $_SESSION["msg"] = "Produto cadastrado com sucesso.";
        } else {
            $_SESSION["msg"] = "Erro ao cadastrar produto.";
        }

        header("Location:http://localhost/MVC/produto/listar");
    }

    public function listar()
    {
        $model = new ProdutoModel();
        $_SESSION["data"] = $model->getAllModel();
        include ("View/produtos/listar.php");
    }

    public function novo(){
        include ("View/produtos/insert.php");
    }

    public function editar(){
        $model = new ProdutoModel();
        $vo = $model->getByIdModel($_GET["id"]);
        $_SESSION["id"] = $vo->getId();
        $_SESSION["codigo"] = $vo->getCodigo();
        $_SESSION["nome"] = $vo->getNome();
        $_SESSION["descricao"] = $vo->getDescricao();
        $_SESSION["preco"] = $vo->getPreco();

        include("View/produtos/editar.php");
    }
    public function delete(){
        $model = new ProdutoModel();
        $vo = $model->getByIdModel($_GET["id"]);
         if ($model->deleteModel($vo)){
             header("Location:http://localhost/MVC/produto/listar");
         }else{
             include("View/produtos/error.php");
         }
    }

    public function update()
    {
        $model = new ProdutoModel();
        $vo = new produtoVO();
        $vo->setId($_GET['id']);
        $vo->setCodigo($_POST["codigo"]);
        $vo->setNome($_POST["nome"]);
        $vo->setDescricao($_POST["descricao"]);
        $vo->setPreco($_POST["preco"]);

        if ($model->updateModel($vo)) {
            $_SESSION["msg"] = "Produto atualizado com sucesso.";
        } else {
            $_SESSION["msg"] = "Erro ao atualizar produto.";
        }
        header("Location:http://localhost/MVC/produto/listar");
    }
}

?>

