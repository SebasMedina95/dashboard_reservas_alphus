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

	/*******************************************************************************************************************
							MOSTRAR LOS EMPLEADOS LIMITADOS  -> Aplicación especializada
	Requerimos mostrar a todos los empleados disponibles para contrato, PERO, que no se hayan registrado
	anteriormente, esto con la finalidad de evitar duplicidad de la información. Para ello el apartado IF NOT EXISTs
	MUY SIMILAR al que se usa en el PL SQL.
	********************************************************************************************************************/
	static public function mdlMostrarAdministradoresLimit($tabla1, $tabla2, $estado){

		/**MUESTRE LA DATA QUE COINCIDE CON LA FILA Y EL VALOR RESPECTIVO */
		// $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla1 WHERE $tabla1.estado = $estado ORDER BY $tabla1.primer_nombre ASC");
		$stmt = Conexion::conectar()->prepare("SELECT w.* FROM $tabla1 w WHERE NOT EXISTS(SELECT x.id_admin FROM $tabla2 x WHERE x.id_admin = w.id) AND w.estado = '1' ORDER BY w.primer_nombre ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt = null;

	}

	/********************************************************
	********** INSERTAR EMPLEADOS/ADMINISTRADORES ***********
	*********************************************************/
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

	/********************************************************
	*********** EDICIÓN EMPLEADOS/ADMINISTRADORES ***********
	*********************************************************/
	static public function mdlEditarEmpleados($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET perfil = :perfil, primer_nombre = :primer_nombre, segundo_nombre = :segundo_nombre,  primer_apellido = :primer_apellido,  segundo_apellido = :segundo_apellido,  tipo_documento = :tipo_documento,  documento = :documento,  email = :email,  telefono_fijo = :telefono_fijo,  telefono_movil = :telefono_movil,  direccion = :direccion, fecha_nacimiento = :fecha_nacimiento, estado_civil = :estado_civil, tipo_regimen = :tipo_regimen, tipo_persona = :tipo_persona,   usuario = :usuario,  password = :password,  foto = :foto, anotaciones = :anotaciones WHERE id = :id");

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
		$stmt->bindParam(":anotaciones", $datos["anotaciones_usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());

		}

		$stmt = null;

	}

	/**********************************************************
	****** ACTIVAR - DESACTIVAR - EMPLEADO/ADMINISTRADOR ******
	***********************************************************/

	static public function mdlHabilitarEmpleado($tabla, $item1, $valor1, $item2, $valor2){

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

	/*************************************************
	******* ELIMINAR ADMINISTRADOR DEL SISTEMA *******
	**************************************************/

	static public function mdlEliminarEmpleado($tabla, $id){

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

?>