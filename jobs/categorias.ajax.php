<?php

require_once "../controllers/categorias.controller.php";
require_once "../models/categorias.model.php";

class AjaxCategorias{

    /***************************************************************
	****** EDICIÓN DE LA CATEGORÍA DE HABITACIÓN - TRAER DATA ******
	****************************************************************/	

	public $idCategoria;

	public function ajaxMostrarCategorias(){

		$item = "id";
		$valor = $this->idCategoria;

		$respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);

		echo json_encode($respuesta); /**Como estamos usando AsyncAwait, todo debe devolver como JSON para las Promises */

	}

    /************************************************************
	****** ACTIVAR - DESACTIVAR - CATEGORÍAS DE HABITACIÓN ******
	*************************************************************/

	public $idCategoriaGest;
	public $estadoCategoria;

	public function ajaxActivarCategorias(){

		$tabla = "categorias";

		$item1 = "id";
		$valor1 = $this->idCategoriaGest;

		$item2 = "estado";
		$valor2 = $this->estadoCategoria;

		$respuesta = ModeloCategorias::mdlHabilitarCategorias($tabla, $item1, $valor1, $item2, $valor2);

		echo json_encode($respuesta); /**Como estamos usando AsyncAwait, todo debe devolver como JSON para las Promises */

	}

	/************************************************************
	****** TRAER LAS COMODIDADES - EN GENERAL - CATEGORÍAS ******
	*************************************************************/
	public $banderaComodidades;

	public function ajaxMostrarComodidades(){

		$item = null;
		$valor = null;

		$respuesta = ControladorCategorias::ctrMostrarComodidadesCategorias($item, $valor);

		echo json_encode($respuesta); /**Como estamos usando AsyncAwait, todo debe devolver como JSON para las Promises */

	}

	/******************************************************************
	****** INSERCIÓN DE COMODIDADES A LA CATEGORÍA DE HABITACIÓN ******
	*******************************************************************/
	public $idCategoriaInsert;
	public $idComodidadInsert;

	public function ajaxInsertarComodidades(){

		$tabla = "detalle_comodidades";
		$categoria = $this->idCategoriaInsert;
		$comodidad = $this->idComodidadInsert;

		$datos = array("id_categoria" => $categoria,
					   "id_comodidad" => $comodidad,
					   "estado" => "1");

		$respuesta = ModeloCategorias::mdlInsertarComodidadesCategorias($tabla, $datos);

		echo json_encode($respuesta); /**Como estamos usando AsyncAwait, todo debe devolver como JSON para las Promises */

	}

	/**************************************************************
	****** MOSTRAR LOS DETALLES DE LA CATEGORÍA - TRAER DATA ******
	***************************************************************/	

	public $idCategoriaDetalles;

	public function ajaxMostrarDetallesCategorias(){

		$item = "id_categoria";
		$valor = $this->idCategoriaDetalles;

		$respuesta = ControladorCategorias::ctrMostrarDetallesCategorias($item, $valor);

		echo json_encode($respuesta); /**Como estamos usando AsyncAwait, todo debe devolver como JSON para las Promises */

	}

}

/********************************************************
****** EDICIÓN DE LA CATEGORÍA - EJECUCIÓN DE AJAX ******
*********************************************************/
if(isset($_GET["idCategoria"])){

	$editarCategorias = new AjaxCategorias();
	$editarCategorias -> idCategoria = $_GET["idCategoria"];
	$editarCategorias -> ajaxMostrarCategorias();

}

/***************************************************
***** ACTIVAR O DESACTIVAR - EJECUCIÓN DE AJAX *****
****************************************************/	

if(isset($_GET["estadoCategoria"])){

	$activarCategorias = new AjaxCategorias();
	$activarCategorias -> idCategoriaGest = $_GET["idCategoriaGest"];
	$activarCategorias -> estadoCategoria = $_GET["estadoCategoria"];
	$activarCategorias -> ajaxActivarCategorias();

}

/***************************************************
***** ACTIVAR O DESACTIVAR - EJECUCIÓN DE AJAX *****
****************************************************/	

if(isset($_GET["banderaComodidades"])){

	$mostrarComodidades = new AjaxCategorias();
	$mostrarComodidades -> ajaxMostrarComodidades();

}

/************************************************************************
***** INSERTAR COMODIDAD A CATEGORÍA HABITACIÓN - EJECUCIÓN DE AJAX *****
*************************************************************************/	

if(isset($_GET["idCategoriaInsert"])){

	$insertComodidadCategoria = new AjaxCategorias();
	$insertComodidadCategoria -> idCategoriaInsert = $_GET["idCategoriaInsert"];
	$insertComodidadCategoria -> idComodidadInsert = $_GET["idComodidadInsert"];
	$insertComodidadCategoria -> ajaxInsertarComodidades();

}

/******************************************************************
****** TRAYENDO DETALLES DE LA CATEGORÍA - EJECUCIÓN DE AJAX ******
*******************************************************************/
if(isset($_GET["idCategoriaDetalles"])){

	$traerDetallesCategorias = new AjaxCategorias();
	$traerDetallesCategorias -> idCategoriaDetalles = $_GET["idCategoriaDetalles"];
	$traerDetallesCategorias -> ajaxMostrarDetallesCategorias();

}