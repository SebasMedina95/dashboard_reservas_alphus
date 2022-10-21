<?php

require_once "connection/conexion.php";

class ModeloContratoEmpleados{

    /****************************************
	********* MOSTRAR LOS CONTRATOS *********
	*****************************************/
	static public function mdlMostrarContratoEmpleados($tabla, $item, $valor){

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

	/***********************************************************************
	********** INSERTAR CONTRATOS PARA EMPLEADOS/ADMINISTRADORES ***********
	************************************************************************/
	static public function mdlRegistroContrato($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_admin, codigo_contrato, salario_basico, cuenta_ahorros, porcentaje_riesgo, periodo_pago, tipo_contrato, fecha_inicio, fecha_fin, id_cargo, estado, anotaciones_contrato) VALUES (:id_admin, :codigo_contrato, :salario_basico, :cuenta_ahorros, :porcentaje_riesgo, :periodo_pago, :tipo_contrato, :fecha_inicio, :fecha_fin, :id_cargo, :estado, :anotaciones_contrato)");

		$stmt->bindParam(":id_admin", $datos["id_admin"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo_contrato", $datos["codigo_contrato"], PDO::PARAM_STR);
		$stmt->bindParam(":salario_basico", $datos["salario_basico"], PDO::PARAM_STR);
		$stmt->bindParam(":cuenta_ahorros", $datos["cuenta_ahorros"], PDO::PARAM_STR);
		$stmt->bindParam(":porcentaje_riesgo", $datos["porcentaje_riesgo"], PDO::PARAM_STR);
		$stmt->bindParam(":periodo_pago", $datos["periodo_pago"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_contrato", $datos["tipo_contrato"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_fin", $datos["fecha_fin"], PDO::PARAM_STR);
		$stmt->bindParam(":id_cargo", $datos["id_cargo"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":anotaciones_contrato", $datos["anotaciones_contrato"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());
		
		}

		$stmt = null;

	}

}