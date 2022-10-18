<?php

require_once "connection/conexion.php";

class ModeloPlantillaAlphus{

    /******************************************************
	********* MOSTRAR TODA LA PLANILLA EN GENERAL *********
	*******************************************************/
	static public function mdlMostrarPlantilla($tabla, $item, $valor){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetch();	

		$stmt = null;

	}

    /*************************************************
	******** CAMBIAR MODO LUZ DE LA PLANTILLA ********
	**************************************************/

	static public function ctrActualizarModoPlantilla($tabla, $item, $valor, $modo){

        /** MODO = 1 entonces aplicamos modo oscuro 
         *  MODO = 2 entonces aplicamos modo light */

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $tabla.modoOscuroDashboard = $modo WHERE $item = :$item");

        $stmt->bindParam(":".$item, $valor, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());

		}

		$stmt = null;

	}

}