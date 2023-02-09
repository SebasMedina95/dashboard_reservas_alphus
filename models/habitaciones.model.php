<?php

require_once "connection/conexion.php";

class ModeloHabitaciones{

    /*************************************************************
	******* MOSTRAR CATEGORIAS-HABITACIONES CON INNER JOIN *******
	**************************************************************/

	static public function mdlMostrarHabitaciones($tabla1, $tabla2, $valor){

		if($valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.* FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id = $tabla2.tipo_h WHERE id_h = :id_h");

			$stmt -> bindParam(":id_h", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.* FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id = $tabla2.tipo_h ORDER BY $tabla2.id_h DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt = null;

	}

	/****************************************************
	******* REGISTRAR NUEVA HABITACIÓN AL SISTEMA *******
	*****************************************************/
	static public function mdlNuevaHabitacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tipo_h, estilo, galeria, video, recorrido_virtual, descripcion_h, estado) VALUES (:tipo_h, :estilo, :galeria, :video, :recorrido_virtual, :descripcion_h, :estado)");

		$stmt->bindParam(":tipo_h", $datos["tipo_h"], PDO::PARAM_STR);
		$stmt->bindParam(":estilo", $datos["estilo"], PDO::PARAM_STR);
		$stmt->bindParam(":galeria", $datos["galeria"], PDO::PARAM_STR);
		$stmt->bindParam(":video", $datos["video"], PDO::PARAM_STR);
		$stmt->bindParam(":recorrido_virtual", $datos["recorrido_virtual"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion_h", $datos["descripcion_h"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());
		
		}

		$stmt = null;

	}

	/**************************************************************
	******* ACTUALIZAR UNA HABITACIÓN REGISTRADA AL SISTEMA *******
	***************************************************************/
	static public function mdlEditarHabitacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tipo_h = :tipo_h, estilo = :estilo, galeria = :galeria, video = :video, recorrido_virtual = :recorrido_virtual, descripcion_h = :descripcion_h WHERE id_h = :id_h");

		$stmt->bindParam(":id_h", $datos["id_h"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_h", $datos["tipo_h"], PDO::PARAM_STR);
		$stmt->bindParam(":estilo", $datos["estilo"], PDO::PARAM_STR);
		$stmt->bindParam(":galeria", $datos["galeria"], PDO::PARAM_STR);
		$stmt->bindParam(":video", $datos["video"], PDO::PARAM_STR);
		$stmt->bindParam(":recorrido_virtual", $datos["recorrido_virtual"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion_h", $datos["descripcion_h"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());
		
		}

		$stmt = null;

	}

	/******************************************************************
	******* ELIMINACIÓN DE UNA HABITACIÓN REGISTRADA AL SISTEMA *******
	*******************************************************************/

	static public function mdlEliminarHabitacion($tabla, $id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_h = :id_h");

		$stmt -> bindParam(":id_h", $id, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());

		}

		$stmt = null;

	}

	/**********************************************************************************
	******* MOSTRAR MANTENIMIENTOS/ASEOS CATEGORIAS-HABITACIONES CON INNER JOIN *******
	***********************************************************************************/
	/**
	 * $tabla1 = categorias 
	 * $tabla2 = habitaciones
	 * $tabla3 = administradores
	 * $tabla4 = mantenimientos
	 */

	static public function mdlMostrarMantenimientos($tabla1, $tabla2, $tabla3, $tabla4, $valor){

		if($valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.*, $tabla3.*, $tabla4.* FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id = $tabla2.tipo_h INNER JOIN $tabla4 ON $tabla4.id_habitacion = $tabla2.id_h INNER JOIN $tabla3 ON $tabla3.id = $tabla4.id_encargado  WHERE $tabla4.id_mant = :id");

			$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.*, $tabla3.*, $tabla4.* FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id = $tabla2.tipo_h INNER JOIN $tabla4 ON $tabla4.id_habitacion = $tabla2.id_h INNER JOIN $tabla3 ON $tabla3.id = $tabla4.id_encargado ORDER BY $tabla4.id_mant DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt = null;

	}

	/************************************************************************
	******* REGISTRAR UN NUEVO MANTENIMIENTO DE HABITACIÓN AL SISTEMA *******
	*************************************************************************/
	static public function mdlNuevoMantenimientoAseo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_encargado, id_habitacion, tipo_gestion, jornada, hora_inicio, hora_fin, fecha_gestion, descripcion, estado) VALUES (:id_encargado, :id_habitacion, :tipo_gestion, :jornada, :hora_inicio, :hora_fin, :fecha_gestion, :descripcion, :estado)");

		$stmt->bindParam(":id_encargado", $datos["mantAseoEncargado"], PDO::PARAM_STR);
		$stmt->bindParam(":id_habitacion", $datos["mantAseoHabitacion"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_gestion", $datos["mantAseoRadios"], PDO::PARAM_STR);
		$stmt->bindParam(":jornada", $datos["mantAseoJornada"], PDO::PARAM_STR);
		$stmt->bindParam(":hora_inicio", $datos["mantAseoHoraIni"], PDO::PARAM_STR);
		$stmt->bindParam(":hora_fin", $datos["mantAseoHoraFin"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_gestion", $datos["mantAseoFecha"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["mantAseoDescripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());
		
		}

		$stmt = null;

	}

}