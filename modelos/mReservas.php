<?php
    class MReservas{
        private $conexion;
        public function __construct(){
            include_once 'configuraciones/configDB.php';
            $this->conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
            $this->conexion->set_charset('utf8');
        }
        public function todo(){
            $sql='SELECT r.idReserva, nombre, apellidos, estadoPago, metodoPago, codCurso, idClase, fechaReserva, titulo, fechaEntrega, asignado, correo FROM reserva r 
                LEFT JOIN reserva_libro rl ON r.idReserva = rl.idReserva
                LEFT JOIN libro l ON rl.isbn = l.isbn;';
                
            $resultado = $this->conexion -> query($sql);

            while($fila=$resultado->fetch_assoc()){
                $datos[] = $fila;
	        }
            return $datos;
        }
        public function curso(){
            $sql = 'SELECT codCurso, nombreCurso FROM curso;';
            $resultado = $this->conexion -> query($sql);
            while($fila=$resultado->fetch_assoc()){
                $datos[] = $fila;
	        }
            return $datos;
        }
        public function etapa(){
            $sql = 'SELECT idEtapa, nombreEtapa FROM etapa;';
            $resultado = $this->conexion -> query($sql);
            while($fila=$resultado->fetch_assoc()){
                $datos[] = $fila;
	        }
            return $datos;
        }
        public function filtro($formulario) {
            if(!empty($formulario["nombre"]) && !isset($formulario["etapa"]) && !isset($formulario["curso"])){
                $sql = "SELECT r.idReserva, nombre, apellidos, estadoPago, metodoPago, r.codCurso, r.idClase, fechaReserva, titulo, fechaEntrega, asignado, correo FROM reserva r 
                INNER JOIN clase cl ON r.codCurso = cl.codCurso AND r.idClase = cl.idClase
                INNER JOIN curso cur ON cl.codCurso = cur.codCurso
                LEFT JOIN reserva_libro rl ON r.idReserva = rl.idReserva
                LEFT JOIN libro l ON rl.isbn = l.isbn
                WHERE nombre = '".$formulario["nombre"]."' AND idEtapa = '".$formulario["etapa"]."' AND cur.codCurso = '".$formulario["curso"]."';";
            }else{
                if(!empty($formulario["nombre"])){
                    $sql = "SELECT r.idReserva, nombre, apellidos, estadoPago, metodoPago, r.codCurso, r.idClase, fechaReserva, titulo, fechaEntrega, asignado, correo FROM reserva r 
                    INNER JOIN clase cl ON r.codCurso = cl.codCurso AND r.idClase = cl.idClase
                    INNER JOIN curso cur ON cl.codCurso = cur.codCurso
                    LEFT JOIN reserva_libro rl ON r.idReserva = rl.idReserva
                    LEFT JOIN libro l ON rl.isbn = l.isbn
                    WHERE nombre = '".$formulario["nombre"]."';";
                }else{
                    if(isset($formulario["etapa"])){
                        $sql = "SELECT r.idReserva, nombre, apellidos, estadoPago, metodoPago, r.codCurso, r.idClase, fechaReserva, titulo, fechaEntrega, asignado, correo FROM reserva r 
                        INNER JOIN clase cl ON r.codCurso = cl.codCurso AND r.idClase = cl.idClase
                        INNER JOIN curso cur ON cl.codCurso = cur.codCurso
                        LEFT JOIN reserva_libro rl ON r.idReserva = rl.idReserva
                        LEFT JOIN libro l ON rl.isbn = l.isbn
                        WHERE idEtapa = '".$formulario["etapa"]."';";
                    }else{
                        if(isset($formulario["curso"])){
                            $sql = "SELECT r.idReserva, nombre, apellidos, estadoPago, metodoPago, r.codCurso, r.idClase, fechaReserva, titulo, fechaEntrega, asignado, correo FROM reserva r 
                            INNER JOIN clase cl ON r.codCurso = cl.codCurso AND r.idClase = cl.idClase
                            INNER JOIN curso cur ON cl.codCurso = cur.codCurso
                            LEFT JOIN reserva_libro rl ON r.idReserva = rl.idReserva
                            LEFT JOIN libro l ON rl.isbn = l.isbn
                            WHERE cur.codCurso = '".$formulario["curso"]."';";
                        }
                    }
                }
            }
            $resultado = $this->conexion -> query($sql);
            while($fila=$resultado->fetch_assoc()){
                $dato[] = $fila;
	        }
            return $dato;
        }
        public function procesar($dato){
            switch($dato["accion"]){
                case 'NOTIFICAR':
                    return $this->notificar($dato);
                case 'RECHAZAR':
                    return $this->rechazar($dato);
                case 'VERIFICAR':
                    return $this->verificar($dato);
                case 'ENTREGADO':
                    return $this->entregado($dato);
                default:
                    return 'DATOS ERRONEOS';
            }
        }
        private function notificar($datos){
            return 'no disponible.';
        }
        private function rechazar($datos){
            $sql = 'DELETE FROM reserva WHERE idReserva = '.$datos["id"].';';
            $this->conexion -> query($sql);
            if($this->conexion->affected_rows > 0){
                return 'Rechazada correctamente.';
            }else{
                return 'Ha ocurrido un error a la hora de rechhazar la reserva.';
            }
        }
        private function verificar($datos){
            $sql = 'UPDATE reserva SET estadoPago = 1 WHERE idReserva = '.$datos["id"].';';
            $this->conexion -> query($sql);
            if($this->conexion->affected_rows > 0){
                return 'Verificado correctamente.';
            }else{
                return 'Ha ocurrido un error a la hora de verificar la reserva o ya estaba verificada.';
            }
        }
        private function entregado($datos){
            $sql = 'UPDATE reserva_libro SET asignado = 1 WHERE idReserva = '.$datos["id"].';';
            $this->conexion -> query($sql);
            if($this->conexion->affected_rows > 0){
                return 'Movimiento realizado correctamente correctamente.';
            }else{
                return 'Ha ocurrido un error a la hora de realizar la accion.';
            }
        }
}