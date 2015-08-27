<?php

include 'model.php';

class Controller {

    private $model;

    public function __CONSTRUCT(){
        $this->model = new model();
    }

    public function __call($method, $args){
        if(method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $args);
        }else{
            return call_user_func_array(array($this, 'Index'), $args);
        }
    }

    public function Index(){
        header('Location: ../view/index.php');
    }

    public function sp_listar_productos(){
        return $this->model->sp_listar_productos();
    }

    public function sp_listar_por_categoria($id){
        return $this->model->sp_listar_por_categoria($id);
    }

    public function sp_get_producto($id){
        return $this->model->sp_get_producto($id);
    }

    public function sp_categoria(){
        return $this->model->sp_categoria();
    }

    public function Contacto(){

        $email = addslashes($_POST['cor']);
        $consulta = addslashes($_POST['msj']);
        $para      = "ventas@inprorsac.com";
        $titulo    = "Consulta desde Pagina Web";
        $mensaje   = "Datos de consulta\n\n"
            . "Email: $email\n"
            . "Consulta: $consulta\n\n";
        $cabeceras = "From: $email" . "\n" .
            "Reply-To: $email" . "\n" .
            "X-Mailer: PHP/" . phpversion();
        if(mail($para, $titulo, $mensaje, $cabeceras)){
            echo json_encode('ok');
        }else{
            echo json_encode('fail');
        }
    }

}