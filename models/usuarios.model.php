<?php

require_once "connection/conexion.php";

class ModeloUsuarios{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarUsuarios($tabla, $item, $valor){

		if($item != null && $valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT (SELECT COUNT(x.id_reserva) FROM reservas x WHERE x.id_usuario = a.id_u) AS CantidadReservas, (SELECT COUNT(y.id_testimonio) FROM testimonios y WHERE y.id_usuario_t = a.id_u AND y.testimonio <> '') AS CantidadTestimonios , a.* FROM $tabla a WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT (SELECT COUNT(x.id_reserva) FROM reservas x WHERE x.id_usuario = a.id_u) AS CantidadReservas, (SELECT COUNT(y.id_testimonio) FROM testimonios y WHERE y.id_usuario_t = a.id_u AND y.testimonio <> '') AS CantidadTestimonios , a.* FROM $tabla a ORDER BY a.nombre");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt = null;

	}

    //SELECT (SELECT COUNT(x.id_reserva) FROM reservas x WHERE x.id_usuario = a.id_u) AS CantidadReservas, (SELECT COUNT(y.id_testimonio) FROM testimonios y WHERE y.id_usuario_t = a.id_u AND y.testimonio <> '') AS CantidadTestimonios , a.* FROM $tabla a ORDER BY a.nombre;


}