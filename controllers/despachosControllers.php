<?php
require_once '../models/Conexion.php';
require_once '../models/Despachos.php';


$accion = $_REQUEST['accion'];
switch ($accion) {
    case 'agregar':

        $c = new Despachos();
        $c->setDes_id(0); 
        $c->setDes_nombre($_REQUEST["nombre"]);
        $c->setDes_precio($_REQUEST["precio"]);
        $c->setUpdate_time(date("Y-m-d H:i:s"));
        $c->setCreate_time(date("Y-m-d H:i:s"));
     
      
        $res= $c->agregar();
       
        //header('Content-Type:apllication/json');
        if ($res == 1) {
            //array para convertir a JSON
            $datos = array(
                'datos' => 'agregado'
            );
        } else {
            $datos = array(
                'datos' => 'error'
            );
        }
        //enviar JSON al servidor para recibirlo en ajax
       // echo json_encode($datos, JSON_FORCE_OBJECT);
        
        break;
}
