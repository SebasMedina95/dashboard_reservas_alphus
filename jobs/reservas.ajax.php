<?php

require_once "../controllers/reservas.controller.php";
require_once "../models/reservas.model.php";

class AjaxReservas{

    /*************************************************
	***** EDICIÓN DE LA RESERVA - TRAER DATA *****
	**************************************************/	

	public $idReserva;

	public function ajaxMostrarReservas(){

		$item = "id_reserva";
		$valor = $this->idReserva;

		$respuesta = ControladorReservas::ctrMostrarReservas($item, $valor);

		echo json_encode($respuesta); /**Como estamos usando AsyncAwait, todo debe devolver como JSON para las Promises */

	}

    /***************************************************
	***** EDICIÓN DE LA RESERVA - TRAER HABITACIÓN *****
	****************************************************/	

	public $idHabitacion;

	public function ajaxMostrarReservasHabitacion(){

		$respuesta = ControladorReservas::ctrMostrarReservas("id_habitacion", $this->idHabitacion);

		echo json_encode($respuesta);

	}

    /*************************************************************
	***** EDICIÓN DE LA RESERVA - CAMBIAR - ACTUALIZAR FECHAS *****
	**************************************************************/	

	public $idRes;
	public $fechaIngreso;
	public $fechaSalida;

	public function ajaxCambiarReserva(){

		$datos = array("id_reserva" => $this->idRes,
					   "fecha_ingreso" => $this->fechaIngreso,
					   "fecha_salida" => $this->fechaSalida);

		$respuesta = ControladorReservas::ctrCambiarReserva($datos);

		echo json_encode($respuesta);

	}

}

/****************************************************
***** EDICIÓN DE LA RESERVA - EJECUCIÓN DE AJAX *****
*****************************************************/
if(isset($_GET["idReserva"])){

	$editarReserva = new AjaxReservas();
	$editarReserva -> idReserva = $_GET["idReserva"];
	$editarReserva -> ajaxMostrarReservas();

}

/***********************************************************************
***** EDICIÓN DE LA RESERVA - TRAER HABITACIÓN - EJECUCIÓN DE AJAX *****
************************************************************************/
if(isset($_GET["idHabitacion"])){

	$editarTraerHabitacionReserva = new AjaxReservas();
	$editarTraerHabitacionReserva -> idHabitacion = $_GET["idHabitacion"];
	$editarTraerHabitacionReserva -> ajaxMostrarReservasHabitacion();

}

/*************************************************************
***** EDICIÓN DE LA RESERVA - CAMBIAR - ACTUALIZAR FECHAS *****
**************************************************************/	

if(isset($_GET["idRes"])){

	$guardarActualizacion = new AjaxReservas();
	$guardarActualizacion -> idRes = $_GET["idRes"];
	$guardarActualizacion -> fechaIngreso = $_GET["fechaIngreso"];
	$guardarActualizacion -> fechaSalida = $_GET["fechaSalida"];
	$guardarActualizacion -> ajaxCambiarReserva();

}