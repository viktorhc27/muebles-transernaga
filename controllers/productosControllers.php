<?php
require_once '../models/Conexion.php';
require_once '../models/Productos.php';


$accion = $_REQUEST['accion'];
switch ($accion) {
    case 'agregar':

        session_start();
        $p = new Productos();
        $p->setPro_id(0);
        $p->setPro_nombre($_REQUEST['nombre']); //
        $p->setPro_precio_compra($_REQUEST['precio_compra']); //
        $p->setPro_precio_venta($_REQUEST['precio_venta']); //
        $p->setPro_modelo($_FILES['modelo']['name']); //
        $p->setPro_altura($_REQUEST['altura']); //
        $p->setPro_ancho($_REQUEST['ancho']); //
        $p->setPro_profundidad($_REQUEST['profundidad']);
        $p->setPro_descripcion($_REQUEST['descripcion']);
        $p->setPro_peso($_REQUEST['peso']); //
        $p->setPro_stock($_REQUEST['stock']); //
        $p->setPro_slug($p->slugify($p->getPro_nombre())); //
        $p->setPro_img($_FILES['imagen']['name']); //
        $p->setCreate_time(date("Y-m-d H:i:s")); //
        $p->setUpdate_time(date("Y-m-d H:i:s")); //
        $p->setTipo_armado_tip_id($_REQUEST['tipo_armado']); //
        $p->setCategoria_cat_id($_REQUEST['categoria']); //
        $p->setPro_color($_REQUEST['color']);
        $p->setDespachos_des_id($_REQUEST['tipo_despacho']); //
        $p->setMarcas_ma_id($_REQUEST['marca']); //
        $p->setEmployees_em_id($_SESSION['user']['id']); //
        $p->setEstados_productos($_REQUEST['estado']); //

        //imagenes
        $archivo_img = $_FILES['imagen']['tmp_name']; // obtiene el archivo
        $ruta = "../resources/imagenes";
        $ruta_img = $ruta . "/" . $p->getPro_img(); //imagen/imagen.tipo       

        //modelo
        $archivo_modelo = $_FILES['modelo']['tmp_name']; // obtiene el archivo
        $ruta = "../resources/modelos3d";
        $ruta_modelo = $ruta . "/" . $p->getPro_modelo(); //imagen/imagen.tipo       


        $res = $p->agregar($archivo_img, $ruta_img, $ruta_modelo, $archivo_modelo);

        if ($res == 1) {
            header("Location:http://localhost/muebles-transernaga/views/admin/home/home.php?param=productos_agregar");
        } else {
            echo "<script>";
            echo 'aler(Hubo un error al agregar usuario)';
            echo "location.href='" . $_SERVER["HTTP_REFERER"] . "';";
            echo "</script>";
        }


        break;
    case 'cambiar':

        $productos = new Productos();
        $productos->setPro_id($_REQUEST['id']);
        $productos->setEstados_productos($_REQUEST['estado']);
        $productos->setUpdate_time(date("Y-m-d H:i:s"));
        $res =  $productos->modificar_estado();

        if ($res == 1) {
            echo "<script>";
            echo "location.href='" . $_SERVER["HTTP_REFERER"] . "';";

            echo "</script>";
        } else {
            echo "<script>";
            echo 'aler(Hubo un error al agregar usuario)';
            echo "location.href='" . $_SERVER["HTTP_REFERER"] . "';";
            echo "</script>";
        }



        break;
}
