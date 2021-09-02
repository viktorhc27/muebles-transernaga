<?php 
class Estados_productos{
    
    private $ep_id,$ep_nombre;
    public function getEp_id() {
        return $this->ep_id;
    }

    public function getEp_nombre() {
        return $this->ep_nombre;
    }

    public function setEp_id($ep_id) {
        $this->ep_id = $ep_id;
    }

    public function setEp_nombre($ep_nombre) {
        $this->ep_nombre = $ep_nombre;
    }


    public function listar(){
        try {
            $con =(new Conexion())->Conectar();
           $sql = $con->prepare("select * from estados_productos");
           $sql ->execute();
           $res = $sql ->fetchAll();
           return $res;

        }catch(PDOException $e){
            return $e->getmessage();
        }
    }

}
