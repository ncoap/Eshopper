<?php
include 'Conexion.php';

class model{

    public function sp_listar_productos(){
        $db_cone = new Conexion();
        $pdo = $db_cone->getConexion();
        $stm = $pdo->prepare(" call sp_listar_productos()");
        $stm->execute(array());
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function sp_listar_por_categoria($id){
        $db_cone = new Conexion();
        $pdo = $db_cone->getConexion();
        $stm = $pdo->prepare(" call sp_listar_por_categoria(?)");
        $stm->execute(array($id));
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function sp_get_producto($id){
        $db_cone = new Conexion();
        $pdo = $db_cone->getConexion();
        $stm = $pdo->prepare(" call sp_get_producto(?)");
        $stm->execute(array($id));
        return $stm->fetch(PDO::FETCH_OBJ);
    }


    public function sp_categoria(){
        $db_cone = new Conexion();
        $pdo = $db_cone->getConexion();
        $stm = $pdo->prepare(" call sp_categoria()");
        $stm->execute(array());
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

}