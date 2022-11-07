<?php

require_once "../../controllers/planes.controller.php";
require_once "../../models/planes.model.php";

class TablaPlanes{

	/*=============================================
	Tabla Planes
	=============================================*/ 

	public function mostrarTabla(){

		$planes = ControladorPlanes::ctrMostrarPlanes(null, null);

		if(count($planes)== 0){

 			$datosJson = '{"data": []}';

			echo $datosJson;

			return;

 		}

 		$datosJson = '{

	 	"data": [ ';

	 	foreach ($planes as $key => $value) {

	 		/*********************************
			************* IMAGEN *************
			**********************************/	

			$imagen = "<img style='width:50%;' src='".$value["img"]."' class='img-fluid'>";

            if($value["estado"] == 0){

				$estado = "<button id='botonCamEsBanner".$value["id"]."' class='btn btn-dark btn-sm btnActivarBanner' onclick='gestionarEstBanner(".$value["id"].")' estadoBanner='1' idBanner='".$value["id"]."'>Oculto para Cliente</button>";

			}else{

				$estado = "<button id='botonCamEsBanner".$value["id"]."' class='btn btn-info btn-sm btnActivarBanner' onclick='gestionarEstBanner(".$value["id"].")' estadoBanner='0' idBanner='".$value["id"]."'>Visible para Cliente</button>";
			}
			
			/***********************************
			************* ACCIONES *************
			************************************/

			$acciones = "<div class='btn-group'><button class='btn btn-warning btn-sm editarPlan' data-toggle='modal' data-target='#editarPlan' idPlan='".$value["id"]."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm eliminarPlan' idPlan='".$value["id"]."' imgPlan='".$value["img"]."'><i class='fas fa-trash-alt'></i></button></div>";	


			$datosJson.= '[
							
						"'.($key+1).'",
						"'.$imagen.'",
						"'.$value["tipo"].'",
						"'.$estado.'",
						"$ '.number_format($value["precio_alta"]).'",
						"$ '.number_format($value["precio_baja"]).'",
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
Tabla Planes
=============================================*/ 

$tabla = new TablaPlanes();
$tabla -> mostrarTabla();

