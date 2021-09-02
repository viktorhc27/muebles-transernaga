<?php

class Categorias
{

    private $cat_id, $cat_nombre, $cat_estado, $cat_slug, $cat_img, $create_time, $update_time;

    public function getCat_id()
    {
        return $this->cat_id;
    }

    public function getCat_nombre()
    {
        return $this->cat_nombre;
    }

    public function getCat_estado()
    {
        return $this->cat_estado;
    }

    public function getCat_slug()
    {
        return $this->cat_slug;
    }

    public function getCat_img()
    {
        return $this->cat_img;
    }

    public function getCreate_time()
    {
        return $this->create_time;
    }

    public function getUpdate_time()
    {
        return $this->update_time;
    }

    public function setCat_id($cat_id)
    {
        $this->cat_id = $cat_id;
    }

    public function setCat_nombre($cat_nombre)
    {
        $this->cat_nombre = $cat_nombre;
    }

    public function setCat_estado($cat_estado)
    {
        $this->cat_estado = $cat_estado;
    }

    public function setCat_slug($cat_slug)
    {
        $this->cat_slug = $cat_slug;
    }

    public function setCat_img($cat_img)
    {
        $this->cat_img = $cat_img;
    }

    public function setCreate_time($create_time)
    {
        $this->create_time = $create_time;
    }

    public function setUpdate_time($update_time)
    {
        $this->update_time = $update_time;
    }

    public function agregar($archivo, $ruta)
    {
        move_uploaded_file($archivo, $ruta);
        try {

            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("insert into categoria (cat_id, cat_nombre, cat_estado, cat_slug, cat_img, create_time, update_time) values(:id,:nombre,:estado,:slug, :img,:create_time,:update_time)");
            $sql->bindParam(':id', $this->cat_id);
            $sql->bindParam(':nombre', $this->cat_nombre);
            $sql->bindParam(':estado', $this->cat_estado);
            $sql->bindParam(':slug', $this->cat_slug);
            $sql->bindParam(':img', $this->cat_img);
            $sql->bindParam(':create_time', $this->create_time);
            $sql->bindParam(':update_time', $this->update_time);

            $res = $sql->execute();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function listar()
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("select * from categoria");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function eliminar($id)
    {

        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("DELETE FROM categoria WHERE cat_id = :id");
            $sql->bindParam(":id", $id);
            $res = $sql->execute();
            return $res;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    public function buscar($id){
        try{
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("select * from categoria where  cat_id = :id");
            $sql->bindparam(':id',$id);
            $sql->execute();
            $res= $sql->fetch();
            return $res;
        }catch (PDOException $ex){
            return $ex->getMessage();
        }
    }
}
