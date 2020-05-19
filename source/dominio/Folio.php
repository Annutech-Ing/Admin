<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Folio
 *
 * @author Jose
 */
class Folio {
    private $cantidad33 = 0;
    private $cantidad39 = 0;
    private $cantidad56 = 0;
    private $cantidad61 = 0;
    
    function getCantidad33() {
        return $this->cantidad33;
    }

    function getCantidad39() {
        return $this->cantidad39;
    }

    function getCantidad56() {
        return $this->cantidad56;
    }

    function getCantidad61() {
        return $this->cantidad61;
    }

    function setCantidad33($cantidad33) {
        $this->cantidad33 = $cantidad33;
    }

    function setCantidad39($cantidad39) {
        $this->cantidad39 = $cantidad39;
    }

    function setCantidad56($cantidad56) {
        $this->cantidad56 = $cantidad56;
    }

    function setCantidad61($cantidad61) {
        $this->cantidad61 = $cantidad61;
    }


}
