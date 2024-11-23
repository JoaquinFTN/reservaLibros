<?php
    class CReservas{
        private $objMReservas;

        public function __construct(){
            include_once 'modelos/mReservas.php';
            $this->objMReservas = new MReservas();
        }
        public function todo(){
            return $this->objMReservas->todo();
        }
        public function curso(){
            return $this->objMReservas->curso();
        }
        public function etapa(){
            return $this->objMReservas->etapa();
        }
        
    }