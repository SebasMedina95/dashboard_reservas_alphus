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

	/*************************************************************
	*********** EDICIÓN GENÉRICA DE CONTRATOS DE ADMIN ***********
	**************************************************************/
	static public function mdlActualizarContrato($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cuenta_ahorros = :cuenta_ahorros, porcentaje_riesgo = :porcentaje_riesgo, periodo_pago = :periodo_pago, tipo_contrato = :tipo_contrato, fecha_fin = :fecha_fin, id_cargo = :id_cargo, anotaciones_contrato = :anotaciones_contrato WHERE id = :id");

		$stmt->bindParam(":cuenta_ahorros", $datos["cuenta_ahorros"], PDO::PARAM_STR);
		$stmt->bindParam(":porcentaje_riesgo", $datos["porcentaje_riesgo"], PDO::PARAM_STR);
		$stmt->bindParam(":periodo_pago", $datos["periodo_pago"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_contrato", $datos["tipo_contrato"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_fin", $datos["fecha_fin"], PDO::PARAM_STR);
		$stmt->bindParam(":id_cargo", $datos["id_cargo"], PDO::PARAM_STR);
		$stmt->bindParam(":anotaciones_contrato", $datos["anotaciones_contrato"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());

		}

		$stmt = null;

	}

	/*******************************************************************
	********** INSERTAR FICHA CONTRATOS PARA ADMINISTRADORES ***********
	********************************************************************/
	static public function mdlRegistroFicha($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_contrato, codigo_ficha, estado) VALUES (:id_contrato, :codigo_ficha, :estado)");

		$stmt->bindParam(":id_contrato", $datos["id_contrato"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo_ficha", $datos["codigo_ficha"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());
		
		}

		$stmt = null;

	}

	/*********************************************
	****** ACTIVAR - DESACTIVAR - CONTRATOS ******
	**********************************************/

	static public function mdlHabilitarContrato($tabla, $item1, $valor1, $item2, $valor2){

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
	********* MOSTRAR LAS FICHAS DE EMPLEADOS *********
	***************************************************/
	static public function mdlMostrarFichas($tabla, $item, $valor){

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

	/***************************************************************
	************* MOSTRAR DETALLES CONCEPTOS APLICADOS *************
	****************************************************************/
	/**	Tabla1 = ficha 				*/
	/**	Tabla2 = conceptos 			*/
	/**	Tabla3 = detalle_conceptos 	*/
	static public function mdlMostrarDetallesConcepto($tabla1, $tabla2, $tabla3, $item, $valor){

		/**MUESTRE LA DATA QUE COINCIDE CON LA FILA Y EL VALOR RESPECTIVO */
		if($item != null && $valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT $tabla1.* , $tabla2.* , $tabla3.* FROM $tabla1 INNER JOIN $tabla3 ON $tabla1.id = $tabla3.id_ficha INNER JOIN $tabla2 ON $tabla2.id = $tabla3.id_concepto WHERE $item = :$item");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll(); /**Por que puedo tener varios conceptos ... */
		
		/**MUESTRE TODA LA DATA */
		}else{

			$stmt = Conexion::conectar()->prepare("SELECT $tabla1.* , $tabla2.* , $tabla3.* FROM $tabla1 INNER JOIN $tabla3 ON $tabla1.id = $tabla3.id_ficha INNER JOIN $tabla2 ON $tabla2.id = $tabla3.id_concepto");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt = null;

	}

	/*******************************************************************************************************************
							MOSTRAR LOS CONCEPTOS LIMITADOS  -> Aplicación especializada
	Requerimos mostrar a todos los conceptos disponibles para detalle ficha, PERO, que no se hayan registrado
	anteriormente, esto con la finalidad de evitar duplicidad de la información. Para ello el apartado IF NOT EXISTs
	MUY SIMILAR al que se usa en el PL SQL.

	$tabla1 = conceptos
	$tabla2 = detalle_conceptos
	$item   = id_ficha
	$valor  = valor de ficha
	********************************************************************************************************************/
	static public function mdlMostrarConceptosLimit($tabla1, $tabla2, $valor){

		/**MUESTRE LA DATA QUE COINCIDE CON LA FILA Y EL VALOR RESPECTIVO */
		$stmt = Conexion::conectar()->prepare("SELECT w.* FROM $tabla1 w WHERE NOT EXISTS(SELECT a.* FROM $tabla2 a WHERE w.id = a.id_concepto AND a.id_ficha = :$valor) AND w.estado = 1 ORDER BY w.concepto ASC");

		$stmt->bindParam(":".$valor, $valor, PDO::PARAM_STR);
		
		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt = null;

	}

	/***********************************************************
	********** INSERTAR DETALLE DE CONCEPTO CONTABLE ***********
	************************************************************/
	static public function mdlRegistroDetalleCptoFicha($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_concepto, id_ficha, estado, notas_concepto) VALUES (:id_concepto, :id_ficha, :estado, :notas_concepto)");

		$stmt->bindParam(":id_concepto", $datos["id_concepto"], PDO::PARAM_STR);
		$stmt->bindParam(":id_ficha", $datos["id_ficha"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":notas_concepto", $datos["notas_concepto"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());
		
		}

		$stmt = null;

	}

	/*****************************************
	****** ACTIVAR - DESACTIVAR - FICHA ******
	******************************************/
	static public function mdlAjaxActivarFicha($tabla, $item, $itemEdit, $valorEdit){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $tabla.estado = :$valorEdit WHERE $item = :$itemEdit");

		$stmt -> bindParam(":".$valorEdit, $valorEdit, PDO::PARAM_STR);
		$stmt -> bindParam(":".$itemEdit, $itemEdit, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());

		}

		$stmt = null;

	}

}