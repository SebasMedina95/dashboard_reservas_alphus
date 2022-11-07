<?php

require_once "../../controllers/banner.controller.php";
require_once "../../models/banner.model.php";

class TablaBanner{

	/*************************************
	************ TABLA BANNER ************
	**************************************/ 

	public function mostrarTabla(){

		$banner = ControladorBanner::ctrMostrarBanner(null, null);

		if(count($banner)== 0){

 			$datosJson = '{"data": []}';

			echo $datosJson;

			return;

 		}

 		$datosJson = '{

	 	"data": [ ';

	 	foreach ($banner as $key => $value) {

	 		/*************************
			********* IMAGEN *********
			**************************/	

			$imagen = "<img src='".$value["img"]."' class='img-fluid'>";

            if($value["estado"] == 0){

				$estado = "<button id='botonCamEsBanner".$value["id"]."' class='btn btn-dark btn-sm btnActivarBanner' onclick='gestionarEstBanner(".$value["id"].")' estadoBanner='1' idBanner='".$value["id"]."'>Oculto para Cliente</button>";

			}else{

				$estado = "<button id='botonCamEsBanner".$value["id"]."' class='btn btn-info btn-sm btnActivarBanner' onclick='gestionarEstBanner(".$value["id"].")' estadoBanner='0' idBanner='".$value["id"]."'>Visible para Cliente</button>";
			}
			
			/***************************************
			********* ACCIONES DISPONIBLES *********
			****************************************/

			$acciones = "<div class='btn-group'><button id='botonEditBanner".$value["id"]."' class='btn btn-warning btn-sm editarBanner' onclick='editarBanner(".$value["id"].")' idBanner='".$value["id"]."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm eliminarBanner' onclick='eliminarBanner(".$value["id"].")' id='botonElimBanner".$value["id"]."' rutaBanner='".$value["img"]."' idBanner='".$value["id"]."' rutaBanner='".$value["img"]."'><i class='fas fa-trash-alt'></i></button></div>";	


			$datosJson.= '[
							
						"'.($key+1).'",
						"'.$imagen.'",
						"'.$estado.'",
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
Tabla Banner
=============================================*/ 

$tabla = new TablaBanner();
$tabla -> mostrarTabla();

