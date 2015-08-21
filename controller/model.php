<?php
include 'Conexion.php';

class model{

    private $pdo;

    public function __CONSTRUCT(){
        $db_cone = new Conexion();
        $this->pdo = $db_cone->getConexion();
    }

    public function Listar_mv(){
        $stm = $this->pdo->prepare("call sp_lista_mv()");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function Lista_cat($id){
        $stm = $this->pdo->prepare(" call sp_lista_cat(?)");
        $stm->execute(array($id));
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function sp_listar_productos($id){
        $stm = $this->pdo->prepare(" call sp_listar_productos()");
        $stm->execute(array());
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function Busca_prod($id){
        $stm = $this->pdo->prepare(" call sp_busca_prod(?)");
        $stm->execute(array($id));
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function Lista_vid(){
        $stm = $this->pdo->prepare(" call sp_lista_vid()");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function Lista_cli(){
        $stm = $this->pdo->prepare(" call sp_lista_cli()");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function Lista_ban(){
        $stm = $this->pdo->prepare(" call sp_lista_ban()");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }
}