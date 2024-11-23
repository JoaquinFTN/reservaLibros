<?php
include_once 'controladores/cResFiltro.php';
if(!empty($_POST)){
    $objCResFiltr = new CResFiltro($_POST);
    $datos = $objCResFiltr->filtro();
}
include_once 'vistas/gestionReservas.php';