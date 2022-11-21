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

			$imagen = "<img style='width: 150px;' src='".$value["img"]."' class='img-fluid'>";

            if($value["estado"] == 0){

				$estado = "<button id='botonCamEsPlanes".$value["id"]."' class='btn btn-dark btn-sm btnActivarPlanes' onclick='gestionarEstPlanes(".$value["id"].")' estadoPlanes='1' idPlanes='".$value["id"]."'>Oculto para Cliente</button>";

			}else{

				$estado = "<button id='botonCamEsPlanes".$value["id"]."' class='btn btn-info btn-sm btnActivarPlanes' onclick='gestionarEstPlanes(".$value["id"].")' estadoPlanes='0' idPlanes='".$value["id"]."'>Visible para Cliente</button>";
			}
			
			/***********************************
			************* ACCIONES *************
			************************************/

			$acciones = "<div class='btn-group'><button class='btn btn-warning btn-sm editarPlan' id='botonEditPlanes".$value["id"]."' onclick='editarPlan(".$value["id"].")' idPlan='".$value["id"]."'><i class='fas fa-pencil-alt text-white'></i></button><button id='botonElimPlan".$value["id"]."' class='btn btn-danger btn-sm eliminarPlan' onclick='eliminarPlan(".$value["id"].")' rutaPlan='".$value["img"]."' idPlan='".$value["id"]."' imgPlan='".$value["img"]."'><i class='fas fa-trash-alt'></i></button></div>";
			
			$minDescripcion = "<div class='form-group'><textarea disabled class='form-control' cols='30' rows='4'>".$value["min_descripcion"]."</textarea></div>";

			$tempBajaFormat = number_format($value["precio_baja"], 0, ",",".");
			$tempAltaFormat = number_format($value["precio_alta"], 0, ",",".");


			$datosJson.= '[
							
						"'.($key+1).'",
						"'.$acciones.'",
						"'.$imagen.'",
						"'.$value["tipo"].'",
						"'.$estado.'",
						"'.$minDescripcion.'",
						"$ '.$tempBajaFormat.'",
						"$ '.$tempAltaFormat.'"
						
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

