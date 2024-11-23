<?php
    include_once 'controladores/cReservas.php';
    $objCReserva = new CReservas();
    $clases = $objCReserva->curso();
    $etapas = $objCReserva->etapa();
    include_once 'vistas/principal.php';