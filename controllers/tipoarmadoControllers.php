<?php
require_once '../models/Conexion.php';
require_once '../models/Tipo_armado.php';


$accion = $_REQUEST['accion'];
switch ($accion) {
    case 'agregar':

        $c = new Tipo_armado();
        $c->setTip_id(0); 
        $c->setTip_nombre($_REQUEST["nombre"]);
        $c->setTip_precio($_REQUEST["precio"]);
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
