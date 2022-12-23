<?php

require_once "../../controllers/categorias.controller.php";
require_once "../../models/categorias.model.php";

class TablaComodidades{

    /**************************************
	***** TABLA CATEGORÍAS HABITACIÓN *****
	***************************************/ 

	public function mostrarTabla(){

		$comodidades = ControladorCategorias::ctrMostrarComodidadesCategorias(null, null);

		if(count($comodidades)== 0){

 			$datosJson = '{"data": []}';

			echo $datosJson;

			return;

 		}

 		$datosJson = '{

	 	"data": [ ';

	 	foreach ($comodidades as $key => $value) {

	 		/**************************************
            ***** ÍCONO *****
            ***************************************/

	 		$icono = "<i class='".$value["icono"]."'></i>" . " : " . $value["icono"];

	 		/*******************************************************************
            ***** IMAGEN DESCRIPTIVA DE COMODIDAD DE CATEGORÍAS HABITACIÓN *****
            ********************************************************************/

			//$imagen = "<img src='".$value["img"]."' class='img-fluid'>";

            /******************************************************
            ***** ESTADO GENERAL DE LA CATEGORÍAS HABITACIÓN *****
            *******************************************************/
            if($value["estado"] == 0){

				$estado = "<button id='botonCamEsComodidadCategoria".$value["id"]."' class='btn btn-dark btn-sm btnActivarComodidadCategoria' onclick='gestionarEstComodidadCategoria(".$value["id"].")' estadoComodidadCategoria='1' idComodidadCategoria='".$value["id"]."'>Oculto para Cliente</button>";

			}else{

				$estado = "<button id='botonCamEsComodidadCategoria".$value["id"]."' class='btn btn-info btn-sm btnActivarComodidadCategoria' onclick='gestionarEstComodidadCategoria(".$value["id"].")' estadoComodidadCategoria='0' idComodidadCategoria='".$value["id"]."'>Visible para Cliente</button>";
			}
	
			/**********************************************
            ************ ACCIONES DISPONIBLES *************
			*** Validaremos el tema de las habitaciones ***
            ***********************************************/

            $acciones = "<div class='btn-group'><button title='Actualizar Comodidad de Habitación' class='btn btn-warning btn-sm editarComodidad' id='botonEditComodidades".$value["id"]."' onclick='editarComodidad(".$value["id"].")' idComodidad='".$value["id"]."'><i class='fas fa-pencil-alt text-white'></i></button><button title='Eliminar Comodidad de Categoría de Habitación' class='btn btn-danger btn-sm eliminarComodidad' id='botonElimComodidad".$value["id"]."' onclick='eliminarComodidad(".$value["id"].")' idComodidad='".$value["id"]."'><i class='fas fa-trash-alt'></i></button></div>";


			$datosJson.= '[
							
						"'.($key+1).'",
						"'.$acciones.'",
						"'.$value["comodidad"].'",
						"'.$icono.'",
						"'.$estado.'",
						"'.$value["fecha"].'"
						
				],';

		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']

		}';

		echo $datosJson;

	}

}

/*=============================================
Tabla Categorias
=============================================*/ 

$tabla = new TablaComodidades();
$tabla -> mostrarTabla();

?>