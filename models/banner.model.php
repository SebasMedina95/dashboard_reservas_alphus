<?php

require_once "connection/conexion.php";

class ModeloBanner{

	/**********************************************
	********** MOSTRAR LISTADO DE BANNER **********
	***********************************************/

	static public function mdlMostrarBanner($tabla, $item, $valor){

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

	/*******************************************
	********** REGISTRAR NUEVO BANNER **********
	********************************************/

	static public function mdlRegistroBanner($tabla, $ruta){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(img, estado) VALUES (:img , '1')");

		$stmt->bindParam(":img", $ruta, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());
		
		}

		$stmt = null;

	}

	/*************************************
	******** ACTUALIZAR EL BANNER ********
	**************************************/

	static public function mdlEditarBanner($tabla, $id, $ruta){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET img = :img WHERE id = :id");

		$stmt->bindParam(":img", $ruta, PDO::PARAM_STR);
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());

		}

		$stmt = null;

	}

	/***********************************
	******** ELIMINAR EL BANNER ********
	************************************/

	static public function mdlEliminarBanner($tabla, $id){

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

	/************************************************
	********* ACTIVAR - DESACTIVAR - BANNER *********
	*************************************************/

	static public function mdlHabilitarBanner($tabla, $item1, $valor1, $item2, $valor2){

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


}