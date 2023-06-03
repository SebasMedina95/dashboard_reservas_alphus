<?php

require_once "../controllers/atracciones.controller.php";
require_once "../models/atracciones.model.php";

class AjaxRecorrido{

	/*=============================================
	Editar Recorrido
	=============================================*/	

	public $idRecorrido;

	public function ajaxMostrarRecorrido(){

		$respuesta = ControladorRecorrido::ctrMostrarRecorrido("id", $this->idRecorrido);

		echo json_encode($respuesta);

	}

    /*=============================================
	Aprobar o desaprobar recorrido
	=============================================*/	

	public $idRecorridoCam;
	public $estadoRecorrido;

	public function ajaxAprobarRecorrido(){

		$tabla = "recorrido";

		$item1 = "id";
		$valor1 = $this->idRecorridoCam;

		$item2 = "estado";
		$valor2 = $this->estadoRecorrido;

		$respuesta = ModeloRecorrido::mdlAprobarRecorrido($tabla, $item1, $valor1, $item2, $valor2);

		echo json_encode($respuesta);

	}

	/*=============================================
	Eliminar Recorrido
	=============================================*/	

	public $idEliminar;
	public $imgPeqRecorrido;
	public $imgGrandeRecorrido;

	public function ajaxEliminarRecorrido(){

		$respuesta = ControladorRecorrido::ctrEliminarRecorrido($this->idEliminar, $this->imgPeqRecorrido, $this->imgGrandeRecorrido);

		echo json_encode($respuesta);

	}
}

/*=============================================
Editar Recorrido
=============================================*/	

if(isset($_GET["idRecorrido"])){

	$editar = new AjaxRecorrido();
	$editar -> idRecorrido = $_GET["idRecorrido"];
	$editar -> ajaxMostrarRecorrido();

}

/*=============================================
Activar o desactivar Testimonio
=============================================*/	

if(isset($_GET["estadoRecorrido"])){

	$aprobarRecorrido = new AjaxRecorrido();
	$aprobarRecorrido -> idRecorridoCam = $_GET["idRecorridoCam"];
	$aprobarRecorrido -> estadoRecorrido = $_GET["estadoRecorrido"];
	$aprobarRecorrido -> ajaxAprobarRecorrido();

}

/*=============================================
Eliminar Recorrido
=============================================*/	

if(isset($_GET["idEliminar"])){

	$eliminar = new AjaxRecorrido();
	$eliminar -> idEliminar = $_GET["idEliminar"];
	$eliminar -> imgPeqRecorrido = $_GET["imgPeqRecorrido"];
	$eliminar -> imgGrandeRecorrido = $_GET["imgGrandeRecorrido"];
	$eliminar -> ajaxEliminarRecorrido();

}