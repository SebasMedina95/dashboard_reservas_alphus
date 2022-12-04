<?php

class ControladorCategorias{

    /***************************************************
	***** MOSTRAR LISTADO CATEGORÍAS DE HABITACIÓN *****
	****************************************************/

	static public function ctrMostrarCategorias($item, $valor){

		$tabla = "categorias";

		$respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);

		return $respuesta;

	}

	/*************************************************************************
	***** MOSTRAR LISTADO DE COMODIDADES DE LAS CATEGORÍAS DE HABITACIÓN *****
	**************************************************************************/

	static public function ctrMostrarComodidadesCategorias($item, $valor){

		$tabla = "comodidades";

		$respuesta = ModeloCategorias::mdlMostrarComodidadesCategorias($tabla, $item, $valor);

		return $respuesta;

	}

	/************************************************************
	***** MOSTRAR LISTADO DETALLES CATEGORÍAS DE HABITACIÓN *****
	*************************************************************/

	static public function ctrMostrarDetallesCategorias($item, $valor){

		$tabla = "detalle_comodidades";

		$respuesta = ModeloCategorias::mdlMostrarDetallesCategorias($tabla, $item, $valor);

		return $respuesta;

	}

	/**************************************************************************
	********** ELIMINACIÓN DE DETALLES DE COMODIDAD PARA RE ISERCIÓN **********
	***************************************************************************/

	static public function ctrEliminarDetalleCatergoriaReInsert($id){

		$tabla = "detalle_comodidades";

		$respuesta = ModeloCategorias::mdlEliminarDetalleCatergoriaReInsert($tabla, $id);

		return $respuesta;

	}
	

}

?>