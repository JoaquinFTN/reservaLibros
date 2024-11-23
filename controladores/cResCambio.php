<?php
    class CResCambio{
        private $objMReservas;
        private $dato;

        public function __construct($dato){
            include 'modelos/mReservas.php';
            $this->objMReservas = new MReservas();
            $this->dato = $dato;
        }
        public function cambio(){
            return $this->objMReservas->procesar($this->dato);
        }
    }