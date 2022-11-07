<?php

require_once "connection/conexion.php";

class ModeloConceptos{

	/**************************************************
	********* MOSTRAR LOS CONCEPTOS DEL HOTEL *********
	***************************************************/
	static public function mdlMostrarConceptos($tabla, $item, $valor){

		/**MUESTRE LA DATA QUE COINCIDE CON LA FILA Y EL VALOR RESPECTIVO */
		if($item != null && $valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
		
		/**MUESTRE TODA LA DATA */
		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt = null;

	}

	/***********************************************
	********* MOSTRAR LOS CARGOS DEL HOTEL LIMITADOS*********
	************************************************/
	// static public function mdlMostrarCargosLimit($tabla, $limit){

	// 	/**MOSTRAREMOS LA DATA CON UN LIMITADOR */
	// 	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $tabla.estado = $limit ORDER BY $tabla.cargo ASC");

	// 	$stmt -> execute();

	// 	return $stmt -> fetchAll();

	// 	$stmt = null;

	// }

    /************************************************************
	********** INSERTAR CONCEPTO CONTABLE PARA NÓMINA ***********
	*************************************************************/
	static public function mdlRegistroConcepto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(capitulo, concepto, porcentaje, descripcion, estado) VALUES (:capitulo, :concepto, :porcentaje, :descripcion, :estado)");

		$stmt->bindParam(":capitulo", $datos["capitulo"], PDO::PARAM_STR);
		$stmt->bindParam(":concepto", $datos["concepto"], PDO::PARAM_STR);
		$stmt->bindParam(":porcentaje", $datos["porcentaje"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());
		
		}

		$stmt = null;

	}

	/************************************************************
	*********** EDICIÓN CONCEPTO CONTABLE PARA NÓMINA ***********
	*************************************************************/
	static public function mdlEditarConceptos($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET capitulo = :capitulo, concepto = :concepto , porcentaje = :porcentaje, descripcion = :descripcion WHERE id = :id");

		$stmt->bindParam(":capitulo", $datos["capitulo"], PDO::PARAM_STR);
		$stmt->bindParam(":concepto", $datos["concepto"], PDO::PARAM_STR);
		$stmt->bindParam(":porcentaje", $datos["porcentaje"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());

		}

		$stmt = null;

	}

	/******************************************************
	****** ACTIVAR - DESACTIVAR - CONCEPTO DE NÓMINA ******
	*******************************************************/

	static public function mdlHabilitarConcepto($tabla, $item1, $valor1, $item2, $valor2){

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

	/**************************************************
	******* ELIMINAR CARGO EMPLEADO DEL SISTEMA *******
	***************************************************/

	static public function mdlEliminarConceptos($tabla, $id){

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