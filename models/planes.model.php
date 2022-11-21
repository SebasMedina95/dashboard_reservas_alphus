<?php

require_once "connection/conexion.php";

class ModeloPlanes{

	/*************************************************
	********** MOSTRAR LOS PLANES DEL HOTEL **********
	**************************************************/

	static public function mdlMostrarPlanes($tabla, $item, $valor){

		if($item != null && $valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt = null;

	}

	/************************************************
	********* ACTIVAR - DESACTIVAR - PLANES *********
	*************************************************/

	static public function mdlHabilitarPlanes($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item2 = :$item2 WHERE $item1 = :$item1");

		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());

		}

		$stmt = null;

	}

	/*********************************************
	********* REGISTRO GENERAL DE PLANES *********
	**********************************************/

	static public function mdlRegistroPlan($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tipo, img, min_descripcion, precio_alta, precio_baja, estado) VALUES (:tipo, :img, :min_descripcion, :precio_alta, :precio_baja, :estado)");

		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":img", $datos["img"], PDO::PARAM_STR);
		$stmt->bindParam(":min_descripcion", $datos["min_descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_alta", $datos["precio_alta"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_baja", $datos["precio_baja"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());
		
		}

		$stmt = null;

	}

	/*************************************************
	********** EDICIÓN DE PLAN SELECCIONADO **********
	**************************************************/

	static public function mdlEditarPlan($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tipo = :tipo, img = :img, min_descripcion = :min_descripcion, precio_alta = :precio_alta, precio_baja = :precio_baja  WHERE id = :id");

		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":img", $datos["img"], PDO::PARAM_STR);
		$stmt->bindParam(":min_descripcion", $datos["min_descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_alta", $datos["precio_alta"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_baja", $datos["precio_baja"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());

		}

		$stmt = null;

	}

	/***********************************
	********* ELIMINAR EL PLAN *********
	************************************/

	static public function mdlEliminarPlan($tabla, $id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());

		}

		$stmt = null;

	}

}