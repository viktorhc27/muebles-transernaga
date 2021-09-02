<?php 
class Roles{

private $ro_id,$ro_nombre,$crate_time,$update_time,$estados;


public function getRo_id() {
    return $this->ro_id;
}

public function getRo_nombre() {
    return $this->ro_nombre;
}

public function getCrate_time() {
    return $this->crate_time;
}

public function getUpdate_time() {
    return $this->update_time;
}

public function getEstados() {
    return $this->estados;
}

public function setRo_id($ro_id) {
    $this->ro_id = $ro_id;
}

public function setRo_nombre($ro_nombre) {
    $this->ro_nombre = $ro_nombre;
}

public function setCrate_time($crate_time) {
    $this->crate_time = $crate_time;
}

public function setUpdate_time($update_time) {
    $this->update_time = $update_time;
}

public function setEstados($estados) {
    $this->estados = $estados;
}

public function agregar()
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("insert into roles(ro_id,ro_nombre,crate_time,update_time,estados) values(:id,:nombre,:create_time,:update_time,:estados)");
            $sql->bindParam(':id', $this->ro_id);
            $sql->bindParam(':nombre', $this->ro_nombre);
            $sql->bindParam(':estados', $this->estados);
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
            $sql = $con->prepare("select * from roles");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function Buscar($id){ 
        try {
            $con =(new Conexion())->Conectar();
            $sql=$con->prepare("select * from roles where ro_id=:id");
            $sql->bindParam(":id",$id);
            $sql->execute();
            $res= $sql->fetch();
            return $res;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

}

?>