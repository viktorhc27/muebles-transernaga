<?php
class Colores
{

    private $col_id;
    private $col_nombre, $col_codigo, $create_time, $update_time;
    public function getCol_id()
    {
        return $this->col_id;
    }

    public function getCol_nombre()
    {
        return $this->col_nombre;
    }

    public function getCol_codigo()
    {
        return $this->col_codigo;
    }

    public function getCreate_time()
    {
        return $this->create_time;
    }

    public function getUpdate_time()
    {
        return $this->update_time;
    }

    public function setCol_id($col_id)
    {
        $this->col_id = $col_id;
    }

    public function setCol_nombre($col_nombre)
    {
        $this->col_nombre = $col_nombre;
    }

    public function setCol_codigo($col_codigo)
    {
        $this->col_codigo = $col_codigo;
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
            $sql = $con->prepare("insert into colores(col_id,col_nombre,col_codigo,create_time,update_time) values(:id,:nombre,:codigo,:create_time,:update_time)");
            $sql->bindParam(':id', $this->col_id);
            $sql->bindParam(':nombre', $this->col_nombre);
            $sql->bindParam(':codigo', $this->col_codigo);
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
            $sql = $con->prepare("select * from colores");

            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
