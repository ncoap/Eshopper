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

    public function sp_listar_marcas_categorias(){
        $marcas_categorias = array("marcas"=>'',"categorias"=>'');
        $marcas_categorias['marcas'] = $this->sp_marca();
        $marcas_categorias['categorias'] = $this->sp_categoria();
        return $marcas_categorias;
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

    public function sp_marca(){
        $db_cone = new Conexion();
        $pdo = $db_cone->getConexion();
        $stm = $pdo->prepare(" call sp_marca()");
        $stm->execute(array());
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function sp_registrar_producto($data){

        $respuesta = array('msj' => 'OK','id'=>1, 'error' => '');
        try {
            $db_cone = new Conexion();
            $pdo = $db_cone->getConexion();
            $stm = $pdo->prepare("CALL sp_registrar_producto(?,?,?,?,?,?)");
            $pro = $data->producto;
            $stm->execute(array($pro->categoria->id,$pro->marca->id,$pro->nombre,$pro->descripcion,$pro->precio,$pro->cantidad));
            $res = $stm->fetch(PDO::FETCH_OBJ);
            $respuesta['id'] = $res->newid;

        } catch (PDOException $e) {
            $respuesta['msj'] = 'KO';
            $respuesta['error'] = $e->getMessage();
        }
        return $respuesta;
    }

}