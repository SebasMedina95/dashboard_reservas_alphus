<?php

require_once "../../controllers/categorias.controller.php";
require_once "../../models/categorias.model.php";

class TablaCategorias{

    /**************************************
	***** TABLA CATEGORÍAS HABITACIÓN *****
	***************************************/ 

	public function mostrarTabla(){

		$categorias = ControladorCategorias::ctrMostrarCategorias(null, null);

		if(count($categorias)== 0){

 			$datosJson = '{"data": []}';

			echo $datosJson;

			return;

 		}

 		$datosJson = '{

	 	"data": [ ';

	 	foreach ($categorias as $key => $value) {

	 		/**************************************
            ***** COLOR CATEGORÍAS HABITACIÓN *****
            ***************************************/

	 		$color = "<i style='color:".$value["color"]."' class='fas fa-square'></i>";

	 		/**************************************
            ***** IMAGEN DESCRIPTIVA DE CATEGORÍAS HABITACIÓN *****
            ***************************************/

			$imagen = "<img src='".$value["img"]."' class='img-fluid'>";

			/******************************************************
            ***** CARACTERISTICAS DE LA CATEGORÍAS HABITACIÓN *****
            *******************************************************/

			$caracteristicas = "";
            /**Decodificamos para convertir la estructura JSON en un String manipulable. */
			// $jsonIncluye = json_decode($value["incluye"], true);

			// foreach ($jsonIncluye as $indice => $valor) {

			// 	$caracteristicas .= "<ul><div class='badge badge-secondary mx-1'><i class='".$valor["icono"]."'></i> ".$valor["item"]."</ul></div>";
			// }

            /******************************************************
            ***** ESTADO GENERAL DE LA CATEGORÍAS HABITACIÓN *****
            *******************************************************/
            if($value["estado"] == 0){

				$estado = "<button id='botonCamEsCategoria".$value["id"]."' class='btn btn-dark btn-sm btnActivarCategoria' onclick='gestionarEstCategoria(".$value["id"].")' estadoCategoria='1' idCategoria='".$value["id"]."'>Oculto para Cliente</button>";

			}else{

				$estado = "<button id='botonCamEsCategoria".$value["id"]."' class='btn btn-info btn-sm btnActivarCategoria' onclick='gestionarEstCategoria(".$value["id"].")' estadoCategoria='0' idCategoria='".$value["id"]."'>Visible para Cliente</button>";
			}
	
			/*******************************
            ***** ACCIONES DISPONIBLES *****
            ********************************/

			$acciones = "<div class='btn-group'><button title='Actualizar Categoría de Habitación' class='btn btn-warning btn-sm editarCategoria' id='botonEditCategorias".$value["id"]."' onclick='editarCategoria(".$value["id"].")' idCategoria='".$value["id"]."'><i class='fas fa-pencil-alt text-white'></i></button><button title='Gestionar Comodidades de Categoría de Habitación' class='btn btn-primary text-white btn-sm comodidadesCategoria' id='botonComodidadesCategorias".$value["id"]."' onclick='comodidadesCategoria(".$value["id"].")' idCategoria='".$value["id"]."'><i class='fa-solid fa-star'></i></button><button title='Eliminar Categoría de Habitación' class='btn btn-danger btn-sm eliminarCategoria' idCategoria='".$value["id"]."' imgCategoria='".$value["img"]."' tipoCategoria='".$value["tipo"]."'><i class='fas fa-trash-alt'></i></button></div>";
            
            $continentalBaja = number_format($value["continental_alta"], 0, ",",".");
            $continentalAlta = number_format($value["continental_baja"], 0, ",",".");
            $americanoBaja = number_format($value["americano_alta"], 0, ",",".");
            $americanoAlta = number_format($value["americano_baja"], 0, ",",".");


			$datosJson.= '[
							
						"'.($key+1).'",
						"'.$acciones.'",
						"'.$imagen.'",
						"'.$value["ruta"].'",
						"'.$color.'",
						"'.$value["tipo"].'",
						"'.$estado.'",
						"'.$value["descripcion"].'",
						"$ '.$continentalBaja.'",
						"$ '.$continentalAlta.'",
						"$ '.$americanoBaja.'",
						"$ '.$americanoAlta.'"
						
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

$tabla = new TablaCategorias();
$tabla -> mostrarTabla();

?>