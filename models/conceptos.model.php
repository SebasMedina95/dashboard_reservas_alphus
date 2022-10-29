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

    /**********************************************
	********** INSERTAR CARGO DEL HOTEL ***********
	***********************************************/
	// static public function mdlRegistroCargo($tabla, $datos){

	// 	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cargo, alias, estado) VALUES (:cargo, :alias, :estado)");

	// 	$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":alias", $datos["alias"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

	// 	if($stmt->execute()){

	// 		return "ok";

	// 	}else{

	// 		echo "\nPDO::errorInfo():\n";
    // 		print_r(Conexion::conectar()->errorInfo());
		
	// 	}

	// 	$stmt = null;

	// }

	/***********************************************
	*********** EDICIÓN CARGOS DEL HOTEL ***********
	************************************************/
	// static public function mdlEditarCargos($tabla, $datos){

	// 	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cargo = :cargo, alias = :alias WHERE id = :id");

	// 	$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":alias", $datos["alias"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

	// 	if($stmt -> execute()){

	// 		return "ok";

	// 	}else{

	// 		echo "\nPDO::errorInfo():\n";
    // 		print_r(Conexion::conectar()->errorInfo());

	// 	}

	// 	$stmt = null;

	// }

	/***************************************************
	****** ACTIVAR - DESACTIVAR - CARGOS EMPLEADO ******
	****************************************************/

	// static public function mdlHabilitarCargo($tabla, $item1, $valor1, $item2, $valor2){

	// 	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item2 = :$item2 WHERE $item1 = :$item1");

	// 	$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
	// 	$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);

	// 	if($stmt -> execute()){

	// 		return "ok";
		
	// 	}else{

	// 		echo "\nPDO::errorInfo():\n";
    // 		print_r(Conexion::conectar()->errorInfo());

	// 	}

	// 	$stmt = null;

	// }

	/**************************************************
	******* ELIMINAR CARGO EMPLEADO DEL SISTEMA *******
	***************************************************/

	// static public function mdlEliminarCargo($tabla, $id){

	// 	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

	// 	$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

	// 	if($stmt -> execute()){

	// 		return "ok";
		
	// 	}else{

	// 		echo "\nPDO::errorInfo():\n";
    // 		print_r(Conexion::conectar()->errorInfo());

	// 	}

	// 	$stmt = null;

	// }
	
}