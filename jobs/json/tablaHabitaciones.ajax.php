<?php

require_once "../../controllers/habitaciones.controller.php";
require_once "../../models/habitaciones.model.php";

class TablaHabitaciones{

    /*********************************************************
	****** TABLA DE HABITACIONES DE CATEGORÍA DEL HOTEL ******
	**********************************************************/ 

	public function mostrarTabla(){

		$habitaciones = ControladorHabitaciones::ctrMostrarHabitaciones(null);

		if(count($habitaciones)== 0){

 			$datosJson = '{"data": []}';

			echo $datosJson;

			return;

 		}

 		$datosJson = '{

	 	"data": [ ';

	 	foreach ($habitaciones as $key => $value) {

            /******************************************************
            ***** ESTADO GENERAL DE LA CATEGORÍAS HABITACIÓN *****
            *******************************************************/
            if($value["estado"] == 0){

				$estado = "<h6><span class='badge rounded-pill badge-secondary'>No Disponible para Cliente</span></h6>";

			}else{

				$estado = "<h6><span class='badge rounded-pill badge-success'>Disponible para Cliente</span></h6>";
			}

			/*******************************
            ***** ACCIONES DISPONIBLES *****
            ********************************/

			$acciones = "<a href='index.php?pagina=habitaciones&id_h=".$value["id_h"]."' class='btn btn-secondary btn-sm'><i class='far fa-eye'></i></a>";	


			$datosJson.= '[
							
						"'.($key+1).'",
						"'.$value["tipo"].'",
						"'.$estado.'",
						"'.$value["estilo"].'",
						"'.$acciones.'"
						
				],';

		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']

		}';

		echo $datosJson;

	}

}

/*=============================================
Tabla Habitaciones
=============================================*/ 

$tabla = new TablaHabitaciones();
$tabla -> mostrarTabla();