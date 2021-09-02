<?php

class Estados_employees{
    
    private $esm_id,$esm_nombre;
    
    public function getEsm_id() {
        return $this->esm_id;
    }

    public function getEsm_nombre() {
        return $this->esm_nombre;
    }

    public function setEsm_id($esm_id) {
        $this->esm_id = $esm_id;
    }

    public function setEsm_nombre($esm_nombre) {
        $this->esm_nombre = $esm_nombre;
    }


}