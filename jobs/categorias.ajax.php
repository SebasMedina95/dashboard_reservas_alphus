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

    /******************************************
	****** ACTIVAR - DESACTIVAR - CATEGORÍAS DE HABITACIÓN ******
	*******************************************/

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