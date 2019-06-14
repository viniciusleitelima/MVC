<?php


class ProdutoDAO {

    public function insert(produtoVO $value){

        $codigo = $value->getCodigo();
        $nome = $value->getNome() ;
        $descricao = $value->getDescricao() ;
        $preco = $value->getPreco();
        $SQL = "INSERT INTO produto (codigo,nome,descricao,preco) VALUES(";
        $SQL.= "?,?,?,?)";
        $DB= new DB();
        $DB->getConnection();
        $pstm = $DB->execSQL($SQL);
        $pstm->bind_param("ssss", $codigo, $nome, $descricao, $preco );

        if ($pstm->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update(produtoVO $value){
        $SQL = "UPDATE produto SET codigo=?, nome=?,descricao=?, preco=? WHERE id=?";
        $codigo = $value->getCodigo();
        $nome = $value->getNome() ;
        $descricao = $value->getDescricao() ;
        $preco = $value->getPreco();
        $id = $value->getId();
        $DB= new DB();
        $DB->getConnection();
        $pstm = $DB->execSQL($SQL);
        $pstm->bind_param("ssssi", $codigo, $nome, $descricao, $preco,$id);

        if ($pstm->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete(produtoVO $value){
        $SQL = "DELETE FROM produto WHERE id=?";
        $DB= new DB();
        $DB->getConnection();
        $pstm = $DB->execSQL($SQL);
        $id = $value->getId();
        $pstm->bind_param("i", $id);

        if ($pstm->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getById($id){
        $SQL = "SELECT * FROM produto WHERE id=". addslashes($id);
        $DB= new DB();
        $DB->getConnection();

        if ($query = $DB->execReader($SQL)){
            $vo= new produtoVO();
            while($reg = $query->fetch_assoc()){
                $vo->setId($reg["id"]);
                $vo->setCodigo($reg["codigo"]);
                $vo->setNome($reg["nome"]);
                $vo->setDescricao($reg["descricao"]);
                $vo->setPreco($reg["preco"]);
            }
        }else{
            echo "erro executar script";
        }
        return $vo;

    }


    public function getAll(){
        $SQL = "SELECT * FROM produto";
        $DB= new DB();
        $DB->getConnection();
        $array = array();
        if ($query = $DB->execReader($SQL)){
            while($row = $query->fetch_assoc()){
            $array[]= array($row["id"],$row["codigo"],$row["nome"],$row["descricao"],$row["preco"]);
            }
        }else{
            echo "erro executar script";
        }
        return $array;
    }
}