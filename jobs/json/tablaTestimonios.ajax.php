<?php

require_once "../../controllers/testimonios.controller.php";
require_once "../../models/testimonios.model.php";

class TablaTestimonios{

    /*=============================================
	Tabla Testimonios
	=============================================*/ 

	public function mostrarTabla(){

		$testimonios = ControladorTestimonios::ctrMostrarTestimonios(null, null);

		if(count($testimonios)== 0){

 			$datosJson = '{"data": []}';

			echo $datosJson;

			return;

 		}

 		$datosJson = '{

	 	"data": [ ';

	 	foreach ($testimonios as $key => $value) {

	 		$reservaUsuario = ControladorTestimonios::ctrMostrarTestimoniosInnerJoin("id_testimonio", $value["id_testimonio"]);

            $codigoReserva = $reservaUsuario["codigo_reserva"] ?? '';
            $nombre = $reservaUsuario["nombre"] ?? '';
            $descripcion = $reservaUsuario["descripcion_reserva"] ?? '';
			$estado1 = '1';
			$estado0 = '0';

			/*=============================================
			ESTADO
			=============================================*/	

			if($value["aprobado"] == 0){

				$estado = "<button onclick='cambiarEstado(".$value["id_testimonio"].",".$estado1.")' id='botonCamEstTestimonios".$value["id_testimonio"]."' class='btn btn-dark btn-sm btnAprobar' estadoTestimonio='1' idTestimonio='".$value["id_testimonio"]."'>Aprobar</button>";

			}else{

				$estado = "<button onclick='cambiarEstado(".$value["id_testimonio"].",".$estado0.")' id='botonCamEstTestimonios".$value["id_testimonio"]."' class='btn btn-info btn-sm btnAprobar' estadoTestimonio='0' idTestimonio='".$value["id_testimonio"]."'>Aprobado</button>";
			}
			
			$datosJson.= '[
							
						"'.($key+1).'",
						"'.$codigoReserva.'",
						"'.$nombre.'",
						"'.$descripcion.'",
						"'.$value["testimonio"].'",
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
Tabla Testimonios
=============================================*/ 

$tabla = new TablaTestimonios();
$tabla -> mostrarTabla();