<?php

class Employees
{

    //atributos de la tabla de la base de datos
    private $em_id;
    private $em_nombre;
    private $em_apellido;
    private $em_correo;
    private $em_password;
    private $em_telefono;
    private $estados;
    private $roles;
    private $em_sexo;
    private $create_time;
    private $update_time;

    public function getConexion()
    {
        return $this->conexion;
    }

    public function getEm_id()
    {
        return $this->em_id;
    }

    public function getEm_nombre()
    {
        return $this->em_nombre;
    }

    public function getEm_apellido()
    {
        return $this->em_apellido;
    }

    public function getEm_correo()
    {
        return $this->em_correo;
    }

    public function getEm_password()
    {
        return $this->em_password;
    }

    public function getEm_telefono()
    {
        return $this->em_telefono;
    }

    public function getEstados()
    {
        return $this->estados;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function getCreate_time()
    {
        return $this->create_time;
    }

    public function getUpdate_time()
    {
        return $this->update_time;
    }

    public function getEm_sexo()
    {
        return $this->em_sexo;
    }

    public function setConexion($conexion)
    {
        $this->conexion = $conexion;
    }

    public function setEm_id($em_id)
    {
        $this->em_id = $em_id;
    }

    public function setEm_nombre($em_nombre)
    {
        $this->em_nombre = $em_nombre;
    }

    public function setEm_apellido($em_apellido)
    {
        $this->em_apellido = $em_apellido;
    }

    public function setEm_correo($em_correo)
    {
        $this->em_correo = $em_correo;
    }

    public function setEm_password($em_password)
    {
        $this->em_password = $em_password;
    }

    public function setEm_telefono($em_telefono)
    {
        $this->em_telefono = $em_telefono;
    }

    public function setEstados($estados)
    {
        $this->estados = $estados;
    }

    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    public function setCreate_time($create_time)
    {
        $this->create_time = $create_time;
    }

    public function setUpdate_time($update_time)
    {
        $this->update_time = $update_time;
    }

    public function setEm_sexo($em_sexo)
    {
        $this->em_sexo = $em_sexo;
    }

    public function login()
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT * FROM employees where em_correo = :correo");
            $sql->bindParam(':correo', $this->em_correo);
            $sql->execute();
            $res = $sql->fetch();

            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function agregar()
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("insert into employees ("
                . "em_id,"
                . "em_nombre, "
                . "em_apellido, "
                . "em_correo, "
                . "em_password, "
                . "em_telefono, "
                . "estado_employees_esm_id, "
                . "roles_ro_id, create_time, "
                . "update_time,"
                . "em_sexo)"
                . "values("
                . ":id, "
                . ":nombre, "
                . ":apellido, "
                . ":correo, "
                . ":password, "
                . ":telefono, "
                . ":estados, "
                . ":roles,"
                . ":create_time,"
                . ":update_time,"
                . ":sexo)");
            $sql->bindParam(':id', $this->em_id);
            $sql->bindParam(':nombre', $this->em_nombre);
            $sql->bindParam(':apellido', $this->em_apellido);
            $sql->bindParam(':correo', $this->em_correo);
            $sql->bindParam(':password', $this->em_password);
            $sql->bindParam(':telefono', $this->em_telefono);
            $sql->bindParam(':estados', $this->estados);
            $sql->bindParam(':roles', $this->roles);
            $sql->bindParam(':create_time', $this->create_time);
            $sql->bindParam(':update_time', $this->update_time);
            $sql->bindParam(":sexo", $this->em_sexo);
            $res = $sql->execute();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function modificar()
    {
        try {
            $con = (new Conexion())->Conectar();

            $sql = $con->prepare("update employees set "
                . "em_nombre= :nombre, "
                . "em_apellido=:apellido, "
                . "em_correo=:correo, "
                . "em_telefono = :telefono,"
                . "em_sexo = :sexo,"
                . "estado_employees_esm_id = :estados,"
                . "roles_ro_id = :roles, "
                . "update_time = :update_time WHERE em_id = :id");

            $sql->bindParam(':id', $this->em_id);
            $sql->bindParam(':nombre', $this->em_nombre);
            $sql->bindParam(':apellido', $this->em_apellido);
            $sql->bindParam(':correo', $this->em_correo);
            $sql->bindParam(':telefono', $this->em_telefono);
            $sql->bindParam(':sexo', $this->em_sexo);
            $sql->bindParam(':estados', $this->estados);
            $sql->bindParam(':roles', $this->roles);
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

    public function eliminar()
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("DELETE FROM employees WHERE em_id = :id");
            $sql->bindParam(':id', $this->em_id, PDO::PARAM_INT);
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
            $sql = $con->prepare("SELECT * FROM employees WHERE em_id = :id");
            $sql->bindParam(':id', $id);
            $sql->execute();
            $res = $sql->fetch();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function listar()
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("select * from Employees");
            $sql->execute();
            $res = $sql->fetchAll();
            return $res;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function verificar_correo()
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT * FROM Employees WHERE em_correo = :correo");
            $sql->bindParam(':correo', $this->em_correo);
            $sql->execute();
            if ($sql->rowCount() == 1) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function verificar_correo_modificar()
    {
        try {
            $con = (new Conexion())->Conectar();
            $sql = $con->prepare("SELECT * FROM Employees WHERE em_correo = :correo and em_nombre = :nombre" );
            $sql->bindParam(':correo', $this->em_correo);
            $sql->bindParam(':nombre', $this->em_nombre);
            $sql->execute();
            if ($sql->rowCount() == 1) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
}
