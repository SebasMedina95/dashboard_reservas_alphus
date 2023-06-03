<?php

require_once "../../controllers/atracciones.controller.php";
require_once "../../models/atracciones.model.php";

class TablaAtracciones{

 /*=============================================
	Tabla Usuarios
	=============================================*/ 

	public function mostrarTabla(){

		$recorrido = ControladorRecorrido::ctrMostrarRecorrido(null, null);

		if(count($recorrido)== 0){

 			$datosJson = '{"data": []}';

			echo $datosJson;

			return;

 		}

 		$datosJson = '{

	 	"data": [ ';

	 	foreach ($recorrido as $key => $value) {

	 		/*=============================================
			FOTO GRANDE
			=============================================*/

            if($value["foto_grande"] != ""){
                
                $foto_grande = "<img src='".$value["foto_grande"]."' class='img-fluid'>";

            }else{

                $foto_grande = "<img src='views/img/recorrido/default/default.png' class='img-fluid'>";

            }


	 		/*=============================================
			FOTO PEQUEÑA
			=============================================*/	

            if($value["foto_peq"] != ""){

                $foto_peq = "<img src='".$value["foto_peq"]."' class='img-fluid'>";

            }else{

                $foto_peq = "<img src='views/img/recorrido/default/default.png' class='img-fluid'>";

            }

			/*=============================================
			ESTADO
			=============================================*/	
			$estado1 = '1';
			$estado0 = '0';

			if($value["estado"] == "0"){

				$estado = "<button onclick='cambiarEstado(".$value["id"].",".$estado1.")' id='botonCamEstRecorridos".$value["id"]."' estadoRecorrido='0' class='btn btn-dark btn-sm btnAprobar' estadoRecorrido='1' idRecorrido='".$value["id"]."'>No Visible</button>";

			}else{

				$estado = "<button onclick='cambiarEstado(".$value["id"].",".$estado0.")' id='botonCamEstRecorridos".$value["id"]."' estadoRecorrido='1' class='btn btn-info btn-sm btnAprobar' estadoRecorrido='0' idRecorrido='".$value["id"]."'>Visible</button>";
			}

			
			/*=============================================
			ACCIONES
			=============================================*/

			$acciones = "<div class='btn-group'><button class='btn btn-warning btn-sm editarRecorrido' onclick='editarRecorrido(".$value["id"].")' id='botonEditRecorrido".$value["id"]."' idRecorrido='".$value["id"]."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm eliminarRecorrido' id='botonElimRecorrido".$value["id"]."'onclick='eliminarRecorrido(".$value["id"].")' idRecorrido='".$value["id"]."' imgGrandeRecorrido='".$value["foto_grande"]."' imgPeqRecorrido='".$value["foto_peq"]."'><i class='fas fa-trash-alt'></i></button></div>";	


			$datosJson.= '[
							
						"'.($key+1).'",
						"'.$value["titulo"].'",
						"'.$value["descripcion"].'",
						"'.$estado.'",
						"'.$foto_grande.'",
						"'.$foto_peq.'",
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
Tabla Usuarios
=============================================*/ 

$tabla = new TablaAtracciones();
$tabla -> mostrarTabla();