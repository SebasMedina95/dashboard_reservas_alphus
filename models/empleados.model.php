<?php

require_once "connection/conexion.php";

class ModeloEmpleados{

    /*****************************************************
	********* MOSTRAR LOS EMPLEADOOS DEL SISTEMA *********
	******************************************************/
	static public function mdlMostrarEmpleados($tabla, $item, $valor){

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

	/****************************************
	********** INSERTAR EMPLEADOS ***********
	*****************************************/
	static public function mdlRegistroEmpleados($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(perfil, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, tipo_documento, documento, email, telefono_fijo, telefono_movil, direccion, fecha_nacimiento, estado_civil, tipo_regimen, tipo_persona, usuario, password, foto, estado, anotaciones) VALUES (:perfil, :primer_nombre, :segundo_nombre,  :primer_apellido, :segundo_apellido, :tipo_documento, :documento, :email, :telefono_fijo, :telefono_movil, :direccion, :fecha_nacimiento, :estado_civil, :tipo_regimen, :tipo_persona, :usuario, :password, :foto, :estado, :anotaciones)");

		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":primer_nombre", $datos["primer_nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":segundo_nombre", $datos["segundo_nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":primer_apellido", $datos["primer_apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":segundo_apellido", $datos["segundo_apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_documento", $datos["tipo_documento"], PDO::PARAM_STR);
		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono_fijo", $datos["telefono_fijo"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono_movil", $datos["telefono_movil"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":estado_civil", $datos["estado_civil"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_regimen", $datos["tipo_regimen"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_persona", $datos["tipo_persona"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":anotaciones", $datos["anotaciones_usuario"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());
		
		}

		$stmt = null;

	}

}

?>