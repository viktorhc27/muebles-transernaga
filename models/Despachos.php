<?php

class Despachos
{

    private $des_id, $des_precio, $des_nombre, $create_time, $update_time;

    public function getDes_id()
    {
        return $this->des_id;
    }

    public function getDes_precio()
    {
        return $this->des_precio;
    }

    public function getDes_nombre()
    {
        return $this->des_nombre;
    }

    public function getCreate_time()
    {
        return $this->create_time;
    }

    public function getUpdate_time()
    {
        return $this->update_time;
    }

    public function setDes_id($des_id)
    {
        $this->des_id = $des_id;
    }

    public function setDes_precio($des_precio)
    {
        $this->des_precio = $des_precio;
    }

    public function setDes_nombre($des_nombre)
    {
        $this->des_nombre = $des_nombre;
    }

    public function setCreate_time($create_time)
    {
        $this->create_time = $create_time;
    }

    public function setUpdate_time($update_time)
    {
        $this->update_time = $update_time;
    }
    public function agregar()
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("insert into despachos( des_id, des_precio, des_nombre, create_time, update_time ) values(:id,:precio,:nombre,:create_time,:update_time)");
            $sql->bindParam(':id', $this->des_id);
            $sql->bindParam(':nombre', $this->des_nombre);
            $sql->bindParam(':precio', $this->des_precio);

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
            $sql = $con->prepare("select * from despachos");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
