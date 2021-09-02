<?php

class Estados_roles {

    private $er_id, $er_nombre;

    public function getEr_id() {
        return $this->er_id;
    }

    public function getEr_nombre() {
        return $this->er_nombre;
    }

    public function setEr_id($er_id) {
        $this->er_id = $er_id;
    }

    public function setEr_nombre($er_nombre) {
        $this->er_nombre = $er_nombre;
    }

}
