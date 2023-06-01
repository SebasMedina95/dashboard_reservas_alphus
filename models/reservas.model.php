<?php

require_once "connection/conexion.php";

class ModeloReservas{

/*=============================================
MOSTRAR USUARIOS-RESERVAS CON INNER JOIN
=============================================*/

static public function mdlMostrarReservas($tabla1, $tabla2, $item, $valor){

    if($item != null && $valor != null){

        $stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.* FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_u = $tabla2.id_usuario WHERE $item = :$item");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetchAll();

    }else{

        $stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.* FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_u = $tabla2.id_usuario ORDER BY $tabla2.id_reserva DESC");

        $stmt -> execute();

        return $stmt -> fetchAll();

    }

    $stmt = null;

}

}