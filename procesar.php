<?php
include_once 'controladores/cResCambio.php';
if(!empty($_POST)){
    $objCResCam = new CResCambio($_POST);
    echo $objCResCam->cambio();
}else{
    echo 'Error al enviar datos';
}