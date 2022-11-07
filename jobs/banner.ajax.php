<?php

require_once "../controllers/banner.controller.php";
require_once "../models/banner.model.php";

class AjaxBanner{

    /******************************************
	***** EDICIÓN DEL BANNER - TRAER DATA *****
	*******************************************/	

	public $idBanner;

	public function ajaxMostrarBanner(){

		$item = "id";
		$valor = $this->idBanner;

		$respuesta = ControladorBanner::ctrMostrarBanner($item, $valor);

		echo json_encode($respuesta); /**Como estamos usando AsyncAwait, todo debe devolver como JSON para las Promises */

	}

	/******************************************
	****** ACTIVAR - DESACTIVAR - BANNER ******
	*******************************************/

	public $idBannerGest;
	public $estadoBanner;

	public function ajaxActivarBanner(){

		$tabla = "banner";

		$item1 = "id";
		$valor1 = $this->idBannerGest;

		$item2 = "estado";
		$valor2 = $this->estadoBanner;

		$respuesta = ModeloBanner::mdlHabilitarBanner($tabla, $item1, $valor1, $item2, $valor2);

		echo json_encode($respuesta); /**Como estamos usando AsyncAwait, todo debe devolver como JSON para las Promises */

	}

    /*************************************
	*********** ELIMINAR BANNER **********
	**************************************/

	public $idBannerElim;
    public $rutaImg;

	public function ajaxEliminarEmpleado(){

		$respuesta = ControladorBanner::ctrEliminarBanner($this->idBannerElim , $this->rutaImg);

		echo json_encode($respuesta); /**Como estamos usando AsyncAwait, todo debe devolver como JSON para las Promises */

	}

}

/*************************************************
***** EDICIÓN DEL BANNER - EJECUCIÓN DE AJAX *****
**************************************************/
if(isset($_GET["idBanner"])){

	$editarBanner = new AjaxBanner();
	$editarBanner -> idBanner = $_GET["idBanner"];
	$editarBanner -> ajaxMostrarBanner();

}

/***************************************************
***** ACTIVAR O DESACTIVAR - EJECUCIÓN DE AJAX *****
****************************************************/	

if(isset($_GET["estadoBanner"])){

	$activarBanner = new AjaxBanner();
	$activarBanner -> idBannerGest = $_GET["idBannerGest"];
	$activarBanner -> estadoBanner = $_GET["estadoBanner"];
	$activarBanner -> ajaxActivarBanner();

}

/******************************************
***** ELIMINACIÓN - EJECUCIÓN DE AJAX *****
*******************************************/	

if(isset($_GET["rutaImg"])){

	$activarBanner = new AjaxBanner();
	$activarBanner -> idBannerElim = $_GET["idBannerElim"];
	$activarBanner -> rutaImg = $_GET["rutaImg"];
	$activarBanner -> ajaxEliminarEmpleado();

}

?>