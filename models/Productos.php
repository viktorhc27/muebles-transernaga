<?php

class Productos
{

    private $pro_id;
    private $pro_nombre; //
    private $pro_precio_compra; //
    private $pro_precio_venta; //
    private $pro_modelo; //
    private $pro_altura;
    private $pro_ancho;
    private $pro_profundidad;
    private $pro_descripcion;
    private $pro_peso;
    private $pro_stock;
    private $pro_slug;
    private $pro_img; //
    private $create_time;
    private $update_time;
    private $tipo_armado_tip_id;
    private $categoria_cat_id;
    private $pro_color;
    private $despachos_des_id;
    private $marcas_ma_id;
    private $employees_em_id;
    private $estados_productos;

    public function getPro_color()
    {
        return $this->getPro_color;
    }

    public function getPro_id()
    {
        return $this->pro_id;
    }

    public function getPro_nombre()
    {
        return $this->pro_nombre;
    }

    public function getPro_precio_compra()
    {
        return $this->pro_precio_compra;
    }

    public function getPro_precio_venta()
    {
        return $this->pro_precio_venta;
    }

    public function getPro_modelo()
    {
        return $this->pro_modelo;
    }

    public function getPro_altura()
    {
        return $this->pro_altura;
    }

    public function getPro_ancho()
    {
        return $this->pro_ancho;
    }

    public function getPro_profundidad()
    {
        return $this->pro_profundidad;
    }

    public function getPro_descripcion()
    {
        return $this->pro_descripcion;
    }

    public function getPro_peso()
    {
        return $this->pro_peso;
    }

    public function getPro_stock()
    {
        return $this->pro_stock;
    }

    public function getPro_slug()
    {
        return $this->pro_slug;
    }

    public function getPro_img()
    {
        return $this->pro_img;
    }

    public function getCreate_time()
    {
        return $this->create_time;
    }

    public function getUpdate_time()
    {
        return $this->update_time;
    }

    public function getTipo_armado_tip_id()
    {
        return $this->tipo_armado_tip_id;
    }

    public function getCategoria_cat_id()
    {
        return $this->categoria_cat_id;
    }


    public function getDespachos_des_id()
    {
        return $this->despachos_des_id;
    }

    public function getMarcas_ma_id()
    {
        return $this->marcas_ma_id;
    }

    public function getEmployees_em_id()
    {
        return $this->employees_em_id;
    }

    public function getEstados_productos()
    {
        return $this->estados_productos;
    }
    public function setPro_color($pro_color)
    {
        $this->pro_color = $pro_color;
    }
    public function setPro_id($pro_id)
    {
        $this->pro_id = $pro_id;
    }

    public function setPro_nombre($pro_nombre)
    {
        $this->pro_nombre = $pro_nombre;
    }

    public function setPro_precio_compra($pro_precio_compra)
    {
        $this->pro_precio_compra = $pro_precio_compra;
    }

    public function setPro_precio_venta($pro_precio_venta)
    {
        $this->pro_precio_venta = $pro_precio_venta;
    }

    public function setPro_modelo($pro_modelo)
    {
        $this->pro_modelo = $pro_modelo;
    }

    public function setPro_altura($pro_altura)
    {
        $this->pro_altura = $pro_altura;
    }

    public function setPro_ancho($pro_ancho)
    {
        $this->pro_ancho = $pro_ancho;
    }

    public function setPro_profundidad($pro_profundidad)
    {
        $this->pro_profundidad = $pro_profundidad;
    }

    public function setPro_descripcion($pro_descripcion)
    {
        $this->pro_descripcion = $pro_descripcion;
    }

    public function setPro_peso($pro_peso)
    {
        $this->pro_peso = $pro_peso;
    }

    public function setPro_stock($pro_stock)
    {
        $this->pro_stock = $pro_stock;
    }

    public function setPro_slug($pro_slug)
    {
        $this->pro_slug = $pro_slug;
    }

    public function setPro_img($pro_img)
    {
        $this->pro_img = $pro_img;
    }

    public function setCreate_time($create_time)
    {
        $this->create_time = $create_time;
    }

    public function setUpdate_time($update_time)
    {
        $this->update_time = $update_time;
    }

    public function setTipo_armado_tip_id($tipo_armado_tip_id)
    {
        $this->tipo_armado_tip_id = $tipo_armado_tip_id;
    }

    public function setCategoria_cat_id($categoria_cat_id)
    {
        $this->categoria_cat_id = $categoria_cat_id;
    }


    public function setDespachos_des_id($despachos_des_id)
    {
        $this->despachos_des_id = $despachos_des_id;
    }

    public function setMarcas_ma_id($marcas_ma_id)
    {
        $this->marcas_ma_id = $marcas_ma_id;
    }

    public function setEmployees_em_id($employees_em_id)
    {
        $this->employees_em_id = $employees_em_id;
    }

    public function setEstados_productos($estados_productos)
    {
        $this->estados_productos = $estados_productos;
    }

    function slugify($text)
    {
        // Strip html tags
        $text = strip_tags($text);
        // Replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // Transliterate
        setlocale(LC_ALL, 'en_US.utf8');
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // Remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // Trim
        $text = trim($text, '-');
        // Remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        // Lowercase
        $text = strtolower($text);
        // Check if it is empty
        if (empty($text)) {
            return 'n-a';
        }
        // Return result
        return $text;
    }

    public function listar()
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("select * from productos");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function agregar($archivo_img, $ruta_img, $ruta_modelo, $archivo_modelo)
    {
        move_uploaded_file($archivo_modelo, $ruta_modelo);
        move_uploaded_file($archivo_img, $ruta_img);
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("insert into productos ("
                . "pro_id, "
                . "pro_nombre, "
                . "pro_precio_compra,"
                . "pro_precio_venta,"
                . "pro_modelo,"
                . "pro_altura, "
                . "pro_ancho,"
                . "pro_profundidad,"
                . "pro_descripcion,"
                . "pro_peso,"
                . "pro_stock,"
                . "pro_slug,"
                . "pro_img, "
                . "pro_color, "
                . "create_time,"
                . "update_time, "
                . "tipo_Armados_tip_id,"
                . "categoria_cat_id,"
                . "despachos_des_id, "
                . "marcas_ma_id, "
                . "employees_em_id,"
                . "estados_productos_ep_id)"
                . "values("
                . ":id,"
                . ":nombre,"
                . ":compra,"
                . ":venta,"
                . ":modelo,"
                . ":altura,"
                . ":ancho,"
                . ":profundidad,"
                . ":descripcion,"
                . ":peso,"
                . ":stock,"
                . ":slug,"
                . ":img,"
                . ":color,"
                . ":create_time,"
                . ":update_time,"
                . ":armado,"
                . ":categoria,"
                . ":despacho,"
                . ":marca,"
                . ":employees,"
                . ":estado)");
            $sql->bindParam(":id", $this->pro_id);
            $sql->bindParam(":nombre", $this->pro_nombre);
            $sql->bindParam(":compra", $this->pro_precio_compra);
            $sql->bindParam(":venta", $this->pro_precio_venta);
            $sql->bindParam(":modelo", $this->pro_modelo);
            $sql->bindParam(":altura", $this->pro_altura);
            $sql->bindParam(":ancho", $this->pro_ancho);
            $sql->bindParam(":profundidad", $this->pro_profundidad);
            $sql->bindParam(":descripcion", $this->pro_descripcion);
            $sql->bindParam(":peso", $this->pro_peso);
            $sql->bindParam(":stock", $this->pro_stock);
            $sql->bindParam(":slug", $this->pro_slug);
            $sql->bindParam(":img", $this->pro_img);
            $sql->bindParam(":color", $this->pro_color);
            $sql->bindParam(":create_time", $this->create_time);
            $sql->bindParam(":update_time", $this->update_time);
            $sql->bindParam(":armado", $this->tipo_armado_tip_id);
            $sql->bindParam(":categoria", $this->categoria_cat_id);
            $sql->bindParam(":despacho", $this->despachos_des_id);
            $sql->bindParam(":marca", $this->marcas_ma_id);
            $sql->bindParam(":employees", $this->employees_em_id);
            $sql->bindParam(":estado", $this->estados_productos);
            $res = $sql->execute();

            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function buscar($id)
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT * FROM productos WHERE pro_id = :id");
            $sql->bindParam(':id', $id);
            $sql->execute();
            $res = $sql->fetch();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function modificar_estado()
    {
        try {
            $con = (new Conexion())->Conectar();

            $sql = $con->prepare("update productos set estados_productos_ep_id= :estado, update_time =:update_time WHERE pro_id = :id");

            $sql->bindParam(':id', $this->pro_id);
            $sql->bindParam(':estado', $this->estados_productos);
            $sql->bindParam(':update_time', $this->update_time);

            $res = $sql->execute();
            if ($sql->rowCount() == 1) {

                return $res;
            } else {
                return $res;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
