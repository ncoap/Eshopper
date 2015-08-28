<?php
include '../../../controller/model.php';

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$accion = $request->accion;

$model = new model();
$respuesta = call_user_func(array($model, $accion),$request->data);
echo json_encode($respuesta);
