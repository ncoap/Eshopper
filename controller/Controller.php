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

    public function Listar_mv(){
        $lista = $this->model->Listar_mv();
        echo json_encode($lista);
    }

    public function Lista_cat($cat){
        return $productos = $this->model->Lista_cat($cat);
    }

    public function sp_listar_productos($scat){
        return $this->model->sp_listar_productos($scat);
    }

    public function Busca_prod($id){
        return $producto = $this->model->Busca_prod($id);
    }

    public function Lista_vid(){
        return $lista_vid = $this->model->Lista_vid();
    }

    public function Lista_cli(){
        return $lista_cli = $this->model->Lista_cli();
    }

    public function Lista_ban(){
        return $lista_ban = $this->model->Lista_ban();
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