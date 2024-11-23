<?php
    class CResFiltro{
        private $objMReservas;
        private $form;

        public function __construct($form){
            include 'modelos/mReservas.php';
            $this->objMReservas = new MReservas();
            $this->form = $form;
        }
        public function filtro(){
            return $this->objMReservas->filtro($this->form);
        }
    }