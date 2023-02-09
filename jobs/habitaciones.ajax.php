<?php

require_once "../controllers/habitaciones.controller.php";
require_once "../models/habitaciones.model.php";

class AjaxHabitaciones{
    
    public $tipo_h;
	public $tipo;
    public $estilo;
    public $galeria;
    public $video;
    public $recorrido_virtual;
    public $descripcion;
    public $idHabitacion;
    public $galeriaAntigua;
    public $antiguoRecorrido;

    public $idHabitacionElim;

	public $mantAseoFecha;
    public $mantAseoHabitacion;
    public $mantAseoEncargado;
    public $mantAseoRadios;
    public $mantAseoJornada;
    public $mantAseoHoraIni;
    public $mantAseoHoraFin;
    public $mantAseoDescripcion;

	/**************************************************
	********* NUEVA HABITACIÓN PARA CATEGORÍA *********
	***************************************************/	
	public function ajaxNuevaHabitacion(){

		$datos = array( "tipo_h" => $this->tipo_h,
						"tipo" => $this->tipo,
						"estilo" => $this->estilo,
						"galeria" => $this->galeria,
						"video" => $this->video,
						"recorrido_virtual" => $this->recorrido_virtual,
						"descripcion" => $this->descripcion);

		$respuesta = ControladorHabitaciones::ctrNuevaHabitacion($datos);

		echo json_encode($respuesta);

	}

	/******************************************************
	********* NUEVO MANTENIMIENTO PARA HABITACIÓN *********
	*******************************************************/
	public function ajaxNuevoMantenimientoAseoHabitacion(){

		$datos = array( "mantAseoFecha" => $this->mantAseoFecha,
						"mantAseoHabitacion" => $this->mantAseoHabitacion,
						"mantAseoEncargado" => $this->mantAseoEncargado,
						"mantAseoRadios" => $this->mantAseoRadios,
						"mantAseoJornada" => $this->mantAseoJornada,
						"mantAseoHoraIni" => $this->mantAseoHoraIni,
						"mantAseoHoraFin" => $this->mantAseoHoraFin,
						"mantAseoDescripcion" => $this->mantAseoDescripcion);

		$respuesta = ControladorHabitaciones::ctrNuevoMantenimientoAseo($datos);

		echo json_encode($respuesta);

	}

	/*******************************************************
	********* EDICIÓN DE HABITACIÓN PARA CATEGORÍA *********
	********************************************************/
	public function ajaxEditarHabitacion(){
	
		$datos = array( "idHabitacion" => $this->idHabitacion,
						"tipo_h" => $this->tipo_h,
						"tipo" => $this->tipo,
						"estilo" => $this->estilo,
						"galeria" => $this->galeria,
						"galeriaAntigua" => $this->galeriaAntigua,
						"video" => $this->video,
						"recorrido_virtual" => $this->recorrido_virtual,
						"antiguoRecorrido" => $this->antiguoRecorrido,
						"descripcion" => $this->descripcion);

		$respuesta = ControladorHabitaciones::ctrEditarHabitacion($datos);

		echo json_encode($respuesta);

	}

	/**********************************************
	********* MOSTRAR TODA LA HABITACIÓN *********
	**********************************************/
	public function ajaxMostrarHabitacionElim(){

		$valor = $this->idHabitacionElim;

		$respuesta = ControladorHabitaciones::ctrMostrarHabitaciones($valor);

		echo json_encode($respuesta);

	}

	/***********************************************
	********* ELIMINACIÓN DE LA HABITACIÓN *********
	***********************************************/	

	public $idHabitacionElimAction;
	public $galeriaHabitacionElimAction;
	public $recorritoVirHabitacionElimAction;

	public function ajaxEliminarHabitacion(){
	
		$datos = array( "idHabitacionElimAction" => $this->idHabitacionElimAction,
						"galeriaHabitacionElimAction" => $this->galeriaHabitacionElimAction,
						"recorritoVirHabitacionElimAction" => $this->recorritoVirHabitacionElimAction);

		$respuesta = ControladorHabitaciones::ctrEliminarHabitacion($datos);

		echo json_encode($respuesta);

	}

}

/*****************************************************************
********** GUARDAR NUEVA HABITACIÓN O EDITAR - EJECUTAR **********
******************************************************************/	
if(isset($_POST["tipo"])){

	$habitacion = new AjaxHabitaciones();
	$habitacion -> tipo_h = $_POST["tipo_h"];
	$habitacion -> tipo = $_POST["tipo"];
    $habitacion -> estilo = $_POST["estilo"];
    $habitacion -> galeria = $_POST["galeria"];
    $habitacion -> galeriaAntigua = $_POST["galeriaAntigua"];
    $habitacion -> video = $_POST["video"];
    $habitacion -> recorrido_virtual = $_POST["recorrido_virtual"];
    $habitacion -> antiguoRecorrido = $_POST["antiguoRecorrido"];
    $habitacion -> descripcion = $_POST["descripcion"];

	/**Si viene algo en idHabitacion quiere decir que vamos a editar! */
    if($_POST["idHabitacion"] != ""){

    	$habitacion -> idHabitacion = $_POST["idHabitacion"];
    	$habitacion -> ajaxEditarHabitacion();

    }else{

    	$habitacion -> ajaxNuevaHabitacion();

    }
  
}

/***********************************************
********* VISUALIZAR ELIMINIACIÓN DATA *********
************************************************/
if(isset($_GET["idHabitacionElim"])){

	$elimPrev = new AjaxHabitaciones();
	$elimPrev -> idHabitacionElim = $_GET["idHabitacionElim"];
	$elimPrev -> ajaxMostrarHabitacionElim();

}

/***********************************************
********* ELIMINACIÓN DE LA HABITACIÓN *********
************************************************/
if(isset($_POST["idHabitacionElimAction"])){

	$eliminar = new AjaxHabitaciones();
    $eliminar -> idHabitacionElimAction = $_POST["idHabitacionElimAction"];
    $eliminar -> galeriaHabitacionElimAction = $_POST["galeriaHabitacionElimAction"];
    $eliminar -> recorritoVirHabitacionElimAction = $_POST["recorritoVirHabitacionElimAction"];
    $eliminar -> ajaxEliminarHabitacion();
	
}

/********************************************************************
********** GUARDAR NUEVO MANTENIMIENTO O EDITAR - EJECUTAR **********
*********************************************************************/	
if(isset($_POST["mantAseoFecha"])){

	$habitacionMantAseo = new AjaxHabitaciones();
	$habitacionMantAseo -> mantAseoFecha = $_POST["mantAseoFecha"];
	$habitacionMantAseo -> mantAseoHabitacion = $_POST["mantAseoHabitacion"];
    $habitacionMantAseo -> mantAseoEncargado = $_POST["mantAseoEncargado"];
    $habitacionMantAseo -> mantAseoRadios = $_POST["mantAseoRadios"];
    $habitacionMantAseo -> mantAseoJornada = $_POST["mantAseoJornada"];
    $habitacionMantAseo -> mantAseoHoraIni = $_POST["mantAseoHoraIni"];
    $habitacionMantAseo -> mantAseoHoraFin = $_POST["mantAseoHoraFin"];
    $habitacionMantAseo -> mantAseoDescripcion = $_POST["mantAseoDescripcion"];

	/**Si viene algo en idHabitacion quiere decir que vamos a editar! */
    // if($_POST["id_mant"] != ""){

    	// $habitacion -> id_mant = $_POST["id_mant"];
    	// $habitacion -> ajaxEditarHabitacion();

    // }else{

    	$habitacionMantAseo -> ajaxNuevoMantenimientoAseoHabitacion();

    // }
  
}