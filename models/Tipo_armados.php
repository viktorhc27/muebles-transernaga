<?php

class Tipo_armados {

    private $tip_id, $tip_nombre, $tip_precio, $create_time, $update_time;

    public function getTip_id() {
        return $this->tip_id;
    }

    public function getTip_nombre() {
        return $this->tip_nombre;
    }

    public function getTip_precio() {
        return $this->tip_precio;
    }

    public function getCreate_time() {
        return $this->create_time;
    }

    public function getUpdate_time() {
        return $this->update_time;
    }

    public function setTip_id($tip_id) {
        $this->tip_id = $tip_id;
    }

    public function setTip_nombre($tip_nombre) {
        $this->tip_nombre = $tip_nombre;
    }

    public function setTip_precio($tip_precio) {
        $this->tip_precio = $tip_precio;
    }

    public function setCreate_time($create_time) {
        $this->create_time = $create_time;
    }

    public function setUpdate_time($update_time) {
        $this->update_time = $update_time;
    }
    public function agregar()
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("insert into tipo_armados(tip_id, tip_nombre, tip_precio, create_time, update_time) values(:id,:nombre,:precio,:create_time,:update_time)");
            $sql->bindParam(':id', $this->tip_id);
            $sql->bindParam(':nombre', $this->tip_nombre);
            $sql->bindParam(':precio', $this->tip_precio);
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
            $sql = $con->prepare("select * from tipo_armados");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}
