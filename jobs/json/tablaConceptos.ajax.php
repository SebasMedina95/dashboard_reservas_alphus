<?php 

require_once "../../controllers/conceptos.controller.php";
require_once "../../models/conceptos.model.php";

require_once "../../controllers/contratosEmpleados.controller.php";
require_once "../../models/contratosEmpleados.model.php";

class TablaConceptos{

	/*=============================================
	Tabla Conceptos
	=============================================*/ 

	public function mostrarTabla(){
        /**Programamos que si enviamos doble null, nos va a mostrar a todos ... */
		$respuesta = ControladorConceptos::ctrMostrarConceptos(null, null);

		if(count($respuesta) == 0){

			$datosJson = '{"data":[]}';

			echo $datosJson;

			return;

		}

		$datosJson = '{
	
		"data":[';

		foreach ($respuesta as $key => $value) {

			/**Vamos a buscar primero si el concepto está siendo usado en alguna ficha */
			$itemConcepto = "id_concepto";
			$valorConcepto = $value["id"];
			$respuestaConcepto = ControladorContratoEmpleados::ctrMostrarDetallesConceptoGeneral($itemConcepto, $valorConcepto);

            /**---------------------------------------------CAPITULO VAL */
            if($value["capitulo"] == "1"){
				$capituloNomi = "Salario";
			}else if($value["capitulo"] == "2"){
				$capituloNomi = "Deducciones";
			}else if($value["capitulo"] == "3"){
				$capituloNomi = "Prestaciones";
			}else if($value["capitulo"] == "4"){
				$capituloNomi = "Otros";
			}else if($value["capitulo"] == "5"){
				$capituloNomi = "Compensación Flexible";
            }else if($value["capitulo"] == "6"){
				$capituloNomi = "Apoyo Económico";
			}else{
				$capituloNomi = "Provisiones";
			}

            /**---------------------------------------------ESTADO VAL */
			if($value["estado"] == 0){

				$estado = "<button id='botonCamEstConcepto".$value["id"]."' class='btn btn-dark btn-sm btnActivarConceptoNomina' onclick='gestionarEstConceptosNomi(".$value["id"].")' estadoConceptoNomina='1' idConceptoNomina='".$value["id"]."'>Desactivado</button>";

			}else{

				$estado = "<button id='botonCamEstConcepto".$value["id"]."' class='btn btn-info btn-sm btnActivarConceptoNomina' onclick='gestionarEstConceptosNomi(".$value["id"].")' estadoConceptoNomina='0' idConceptoNomina='".$value["id"]."'>Activado</button>";
			}

			if(is_array($respuestaConcepto) && $respuestaConcepto["id_concepto"] == $value["id"]){ /**El concepto está siendo usado, no podemos tener la opción de eliminar! */

				$acciones = "<div class='btn-group'><button title='Actualizar Concepto Nomina' onclick='botonActualizarConcepto(".$value["id"].");' id='botonActualizarConcepto".$value["id"]."' class='btn btn-warning btn-sm editarConceptoNomina' idConceptoNomina='".$value["id"]."'><i class='fas fa-pencil-alt text-white'></i></button></div>";

			}else{

				$acciones = "<div class='btn-group'><button title='Actualizar Concepto Nomina' onclick='botonActualizarConcepto(".$value["id"].");' id='botonActualizarConcepto".$value["id"]."' class='btn btn-warning btn-sm editarConceptoNomina' idConceptoNomina='".$value["id"]."'><i class='fas fa-pencil-alt text-white'></i></button><button title='Eliminar Concepto Nomina' onclick='botonEliminarConceptoNomina(".$value["id"].");' id='botonEliminarConceptoNomina".$value["id"]."' class='btn btn-danger btn-sm eliminarConceptoNomina' idConceptoNomina='".$value["id"]."'><i class='fas fa-trash-alt'></i></button></div>";

			}
		
		
		$datosJson .='[
					  "'.($key+1).'",
					  "'.$acciones.'",
				      "'.$capituloNomi.'",
				      "'.$value["concepto"].'",
				      "'.$value["porcentaje"].'",
				      "'.$value["descripcion"].'",
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
Tabla Conceptos
=============================================*/ 

$tabla = new TablaConceptos();
$tabla -> mostrarTabla();