<?php 

require_once "../../controllers/cargos.controller.php";
require_once "../../models/cargos.model.php";

require_once "../../controllers/contratosEmpleados.controller.php";
require_once "../../models/contratosEmpleados.model.php";

class TablaCargos{

	/*=============================================
	Tabla Cargos
	=============================================*/ 

	public function mostrarTabla(){
        /**Programamos que si enviamos doble null, nos va a mostrar a todos ... */
		$respuesta = ControladorCargos::ctrMostrarCargos(null, null);

		if(count($respuesta) == 0){

			$datosJson = '{"data":[]}';

			echo $datosJson;

			return;

		}

		$datosJson = '{
	
		"data":[';

		foreach ($respuesta as $key => $value) {

			$itemCargo = "id_cargo";
			$valorCargo = $value["id"];
			$respuestaContratos = ControladorContratoEmpleados::ctrMostrarContratoEmpleados($itemCargo , $valorCargo);

			if($value["estado"] == 0){

				$estado = "<button onclick='gestionarEstCargoEmp(".$value["id"].")' id='botonCamEstCarg".$value["id"]."' class='btn btn-dark btn-sm btnActivarCargoEmp' estadoCargo='1' idCargo='".$value["id"]."'>Desactivado</button>";

			}else{

				$estado = "<button onclick='gestionarEstCargoEmp(".$value["id"].");' id='botonCamEstCarg".$value["id"]."' class='btn btn-info btn-sm btnActivarCargoEmp' estadoCargo='0' idCargo='".$value["id"]."'>Activado</button>";
			}

			/**Si algún cargo ya se está usando, no podemos dejarlo eliminar ... */
			if(!$respuestaContratos || count($respuestaContratos) == 0){
				$acciones = "<div class='btn-group'><button title='Actualizar Cargo' onclick='botonActualizarCarg(".$value["id"].");' id='botonActualizarCarg".$value["id"]."' class='btn btn-warning btn-sm editarCargo' idCargo='".$value["id"]."'><i class='fas fa-pencil-alt text-white'></i></button><button title='Eliminar Cargo' onclick='botonEliminarCarg(".$value["id"].");' id='botonEliminarCarg".$value["id"]."' class='btn btn-danger btn-sm eliminarCargo' idCargo='".$value["id"]."'><i class='fas fa-trash-alt'></i></button></div>";
			}else{
				$acciones = "<div class='btn-group'><button title='Actualizar Cargo' onclick='botonActualizarCarg(".$value["id"].");' id='botonActualizarCarg".$value["id"]."' class='btn btn-warning btn-sm editarCargo' idCargo='".$value["id"]."'><i class='fas fa-pencil-alt text-white'></i></button></div>";
			}

			
		
		$datosJson .='[
					  "'.($key+1).'",
					  "'.$acciones.'",
				      "'.$value["cargo"].'",
				      "'.$value["alias"].'",
				      "'.$estado.'",
				      "'.$value["fecha"].'"
				    ],';

		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson .= ']}';


		echo $datosJson;

	}

}

/*=============================================
Tabla Cargos
=============================================*/ 

$tabla = new TablaCargos();
$tabla -> mostrarTabla();