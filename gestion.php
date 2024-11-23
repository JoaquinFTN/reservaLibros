<?php
require_once 'controladores/cReservas.php';
$objCReserva = new CReservas();
$dato=$objCReserva->todo();
require_once 'vistas/gesResTodo.php';