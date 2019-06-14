<?php


class ProdutoModel{

    public function insertModel(produtoVO $value){

        $prod = new ProdutoDAO();
        return $prod->insert($value);

    }

    public function updateModel(produtoVO $value){
        $prod = new ProdutoDAO();

        return $prod->update($value);

    }

    public function deleteModel(produtoVO $value){
        $prod = new ProdutoDAO();

        return $prod->delete($value);
    }

    public function getByIdModel($id){
        $prod = new ProdutoDAO();
        $vo = $prod->getById($id);

        if ($_GET["Action"]!="editar") {
            $vo->setPreco("R$ " . number_format($vo->getPreco(), 2, ',', '.'));
        }

        return $vo;

    }

    public function getAllModel(){
        $prod = new ProdutoDAO();
        return $prod->getAll();
    }
}