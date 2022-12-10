<?php

require_once "connection/conexion.php";

class ModeloCategorias{

    /*******************************************
	***** MOSTRAR CATEGORÍAS DE HABITACIÓN *****
	********************************************/

	static public function mdlMostrarCategorias($tabla, $item, $valor){

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

	/**********************************************************
	***** MOSTRAR COMODIDADES DE CATEGORÍAS DE HABITACIÓN *****
	***********************************************************/

	static public function mdlMostrarComodidadesCategorias($tabla, $item, $valor){

		if($item != null && $valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado = '1' ORDER BY comodidad ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt = null;

	}

	/******************************************************************
	********* ACTIVAR - DESACTIVAR - CATEGORÍAS DE HABITACIÓN *********
	*******************************************************************/

	static public function mdlHabilitarCategorias($tabla, $item1, $valor1, $item2, $valor2){

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

	/***************************************************************************************
	********* INSERTAR DETALLES DE CATEGORÍA DE HABITACIÓN -> INSERTAR COMODIDADES *********
	****************************************************************************************/
	static public function mdlInsertarComodidadesCategorias($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_categoria, id_comodidad, estado) VALUES (:id_categoria, :id_comodidad, :estado)");

		$stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
		$stmt->bindParam(":id_comodidad", $datos["id_comodidad"], PDO::PARAM_INT);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());
		
		}

		$stmt = null;

	}

	/*********************************************************
	***** MOSTRAR DETALLES DE LA CATEGORÍA DE HABITACIÓN *****
	**********************************************************/

	static public function mdlMostrarDetallesCategorias($tabla, $item, $valor){

		if($item != null && $valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetchAll(); //Podría traer varios ...

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt = null;

	}

	/****************************************************
	******** REGISTRO DE CATEGORÍA DE HABITACIÓN ********
	*****************************************************/

	static public function mdlRegistroCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ruta, color, tipo, img, descripcion ,  continental_alta, continental_baja, americano_alta, americano_baja, estado) VALUES (:ruta, :color, :tipo, :img, :descripcion, :continental_alta, :continental_baja, :americano_alta, :americano_baja, :estado)");

		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":color", $datos["color"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":img", $datos["img"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":continental_alta", $datos["continental_alta"], PDO::PARAM_STR);
		$stmt->bindParam(":continental_baja", $datos["continental_baja"], PDO::PARAM_STR);
		$stmt->bindParam(":americano_alta", $datos["americano_alta"], PDO::PARAM_STR);
		$stmt->bindParam(":americano_baja", $datos["americano_baja"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());
		
		}

		$stmt = null;

	}

	/**************************************************************************
	********** ELIMINACIÓN DE DETALLES DE COMODIDAD PARA RE ISERCIÓN **********
	***************************************************************************/

	static public function mdlEliminarDetalleCatergoriaReInsert($tabla, $id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_categoria = :id");

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

?>