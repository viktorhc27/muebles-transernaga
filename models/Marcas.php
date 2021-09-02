<?php

class Marcas
{

    private $ma_id, $ma_nombre, $ma_img, $create_time, $update_time;

    public function getMa_id()
    {
        return $this->ma_id;
    }

    public function getMa_nombre()
    {
        return $this->ma_nombre;
    }

    public function getMa_img()
    {
        return $this->ma_img;
    }

    public function getCreate_time()
    {
        return $this->create_time;
    }

    public function getUpdate_time()
    {
        return $this->update_time;
    }

    public function setMa_id($ma_id)
    {
        $this->ma_id = $ma_id;
    }

    public function setMa_nombre($ma_nombre)
    {
        $this->ma_nombre = $ma_nombre;
    }

    public function setMa_img($ma_img)
    {
        $this->ma_img = $ma_img;
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
    {move_uploaded_file($archivo, $ruta);
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("insert into marcas(ma_id, ma_nombre,ma_img, create_time, update_time) values(:id,:nombre,:img,:create_time,:update_time)");
            $sql->bindParam(':id', $this->ma_id);
            $sql->bindParam(':nombre', $this->ma_nombre);
            $sql->bindParam(':img', $this->ma_img);
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
            $sql = $con->prepare("select * from marcas");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function buscar($id){
        try{
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("select * from marcas where ma_id = :id");
            $sql->bindParam(':id',$id);
            $sql->execute();
            $res=$sql->fetch();

            return $res;

        }catch (PDOException $e){
            return $e->getMessage();
        }
    }
}
