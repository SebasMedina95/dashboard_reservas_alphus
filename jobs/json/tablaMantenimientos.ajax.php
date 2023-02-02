<?php

require_once "../../controllers/habitaciones.controller.php";
require_once "../../models/habitaciones.model.php";

class TablaMantenimientos{

    /**********************************************************
	****** TABLA DE MANTENIMIENTOS/ASEOS PARA HABITACIÓN ******
	***********************************************************/ 

	public function mostrarTabla(){

		$mantenimientosHab = ControladorHabitaciones::ctrMostrarMantenimientos(null); /**Necesitamos que nos traiga todas las habitaciones */

		if(count($mantenimientosHab)== 0){

 			$datosJson = '{"data": []}';

			echo $datosJson;

			return;

 		}

 		$datosJson = '{

	 	"data": [ ';

	 	foreach ($mantenimientosHab as $key => $value) {

			/*****************************************************************************
            ***** FOTOGRAFÍA PARA PERSONALIZACIÓN DEL ENCARGADO Y ENCARGADO COMO TAL *****
            ******************************************************************************/

			$encargado = $value["documento"] . ' - ' . $value["primer_nombre"] . ' ' . $value["segundo_nombre"] . ' ' . $value["primer_apellido"] . ' ' . $value["segundo_apellido"];

            if(!$value["foto"] == ""){
                $fotoEncargado = "<img src='".$value["foto"]."' class='img-fluid' style='border-radius: 10px; width: 80px;'>";
            }else{
                $fotoEncargado = "<img src='views/img/admins/default/default.png' class='img-fluid' style='border-radius: 10px;'>";
            }

			/*********************************************************************************
            ***** FOTOGRAFÍA PARA PERSONALIZACIÓN DE LA HABITACIÓN Y HABITACIÓN COMO TAL *****
            **********************************************************************************/
			$galeria = json_decode($value["galeria"] , true);
			$habitacion = $value["tipo"] . ' - ' . $value["estilo"];

			$fotoHabitacion = "<img src='".$galeria[0]."' class='img-fluid' style='border-radius: 10px;'>";

            /******************************************************
            ***** ESTADO GENERAL DEL LA CATEGORÍAS HABITACIÓN *****
            *******************************************************/
            if($value["estado"] == "0"){

				$estado = "<button class='btn btn-secondary'>En Proceso</button>";

			}else if($value["estado"] == "1"){

				$estado = "<button class='btn btn-primary'>Finalizado</button>";

			}else if($value["estado"] == "2"){

				$estado = "<button class='btn btn-warning'>Pendiente</button>";

			}

			/**********************************
            ********* TIPO DE GESTIÓN *********
            ***********************************/
			if($value["tipo_gestion"] == "1"){
				$tipoGestion = "Mantenimientos e Instalaciones";
			}else if($value["tipo_gestion"] == "2"){
				$tipoGestion = "Aseo General";
			}else if($value["tipo_gestion"] == "3"){
				$tipoGestion = "Mantenimiento, Instalaciones y Aseo";
			}else if($value["tipo_gestion"] == "4"){
				$tipoGestion = "Preparaciones Especiales";
			}else{
				$tipoGestion = "Pendiente";
			}

			/*******************************************************
            ********* JORNADA DE REALIZACIÓN DE LA GESTIÓN *********
            ********************************************************/
			if($value["jornada"] == "1"){
				$jornada = "Mañana/Parcial";
			}else if($value["jornada"] == "2"){
				$jornada = "Mañana/Completa";
			}else if($value["jornada"] == "3"){
				$jornada = "Tarde/Parcial";
			}else if($value["jornada"] == "4"){
				$jornada = "Tarde/Completa";
			}else if($value["jornada"] == "5"){
				$jornada = "Noche/Parcial";
			}else if($value["jornada"] == "6"){
				$jornada = "Noche/Completa";
			}else if($value["jornada"] == "7"){
				$jornada = "Dia General";
			}else if($value["jornada"] == "8"){
				$jornada = "Con Continuidad";
			}else{
				$jornada = "Pendiente";
			}

			/*******************************
            ***** ACCIONES DISPONIBLES *****
            ********************************/

			$acciones = "<div class='btn-group'><button class='btn btn-danger btn-sm eliminarGestionAseoMant' title='Borrar Gestión de Habitación' id='".$value["id_mant"]."'><i class='fa-solid fa-trash text-white'></i></button>".$estado."</div>";	


			$datosJson.= '[
							
						"'.($key+1).'",
						"'.$acciones.'",
						"'.$encargado.'",
						"'.$fotoEncargado.'",
						"'.$habitacion.'",
						"'.$fotoHabitacion.'",
						"'.$tipoGestion.'",
						"'.$jornada.'",
						"'.$value["hora_inicio"].'",
						"'.$value["hora_fin"].'",
						"'.$value["fecha_gestion"].'",
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
Tabla Mantenimientos
=============================================*/ 

$tabla = new TablaMantenimientos();
$tabla -> mostrarTabla();