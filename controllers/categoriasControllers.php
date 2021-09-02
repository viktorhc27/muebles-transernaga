<?php
require_once '../models/Conexion.php';
require_once '../models/Categorias.php';


$accion = $_REQUEST['accion'];
switch ($accion) {
    case 'agregar':

        $c = new Categorias();
        $c->setCat_id(0);
        $c->setCat_nombre($_REQUEST["nombre"]);
        $c->setCat_img($_FILES['img']['name']);
        $c->setUpdate_time(date("Y-m-d H:i:s"));
        $c->setCreate_time(date("Y-m-d H:i:s"));
        $archivo = $_FILES['img']['tmp_name']; // obtiene el archivo
        $ruta = "../resources/imagenes";
        $ruta = $ruta . "/" . $c->getCat_img(); //imagen/imagen.tipo       

        $res = $c->agregar($archivo, $ruta);


        if ($res == 1) {
            echo "<script>";
            echo "location.href='" . $_SERVER["HTTP_REFERER"] . "';";
            echo "</script>";
        } else {
            echo "<script>";

            echo "location.href='" . $_SERVER["HTTP_REFERER"] . "';";
            echo "</script>";
        }



        //header('Content-Type:apllication/json');
        /*  if ($res == 1) {
            //array para convertir a JSON
            $datos = array(
                'datos' => 'agregado'
            );
            
        } else {
            $datos = array(
                'datos' => 'error'
            );
        } 
        echo " <script> window.locationf=http://localhost/muebles-transernaga/views/admin/home/home.php?param=categorias_agregar </script>";
        //enviar JSON al servidor para recibirlo en ajax
       // echo json_encode($datos, JSON_FORCE_OBJECT);*/

        break;

    case "eliminar":

        $res = (new Categorias)->eliminar($_REQUEST['id']);
        echo $res;
         if ($res == 1) {
            echo "<script>";
            echo "location.href='" . $_SERVER["HTTP_REFERER"] . "';";
            echo "</script>";
        } else {
            echo "<script>";
            
            echo "location.href='" . $_SERVER["HTTP_REFERER"] . "';";
            echo "</script>";
        }
        break;
}
