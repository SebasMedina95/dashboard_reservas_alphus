<?php

class ControladorContratoEmpleados{

    /*****************************************************
	************* MOSTRAR CONTRATOS EMPLEADO *************
	******************************************************/

	static public function ctrMostrarContratoEmpleados($item, $valor){

		$tabla = "contratos";

		$respuesta = ModeloContratoEmpleados::mdlMostrarContratoEmpleados($tabla, $item, $valor);

		return $respuesta;

	}

	/******************************************************
	********** REGISTRO DE CONTRATOS DE EMPLEADOS *********
	*******************************************************/
    public function ctrRegistroContrato(){
        /**Que nos venga alguna de las variables POST */
        
        if(isset($_POST["codigoContrato"])){

            /**Vamos a ajustar a $_POST["salarioBasico"], en vista de que, con la mascara de JS que colocamos al copiar
             * para ayudar al usuario con los miles, se nos va a la base de datos con los ., entonces, debemos mandar
             * el valor pulpo para mas adelante hacer operaciones.*/
            $salarioBase = str_replace(array("#", "'", ";" , "." , "," , " ", ""), '', $_POST["salarioBasico"]);

            $tabla = "contratos";

            $datos = array("id_admin" => $_POST["selectAdminEmp"],
                           "codigo_contrato" => $_POST["codigoContrato"],
                           "salario_basico" => $salarioBase,
                           "cuenta_ahorros" => $_POST["cuentaAhorros"],
                           "porcentaje_riesgo" => $_POST["porcentajeRiesgo"],
                           "periodo_pago" => $_POST["periodoPago"],
                           "tipo_contrato" => $_POST["tipoContrato"],
                           "fecha_inicio" => $_POST["inicioContrato"],
                           "fecha_fin" => $_POST["finContrato"],
                           "id_cargo" => $_POST["selectCargos"],
                           "anotaciones_contrato" => $_POST["anotaciones_contrato"],
                           "estado" => "1");

            $respuesta = ModeloContratoEmpleados::mdlRegistroContrato($tabla, $datos);

			/**Ahora vamos a crear el tema de la ficha de una vez: */
			$quienEsEmpleado = ModeloEmpleados::mdlMostrarEmpleados("administradores", "id" , $_POST["selectAdminEmp"]);
			$empleado = $quienEsEmpleado["primer_nombre"] . " " . $quienEsEmpleado["segundo_nombre"] . " " . $quienEsEmpleado["primer_apellido"] . " " . $quienEsEmpleado["segundo_apellido"];

            if($respuesta == "ok"){

                /**Autogeneramos el código de ficha:  */
                $aleatorio = mt_rand(100,999);
                $newCodigoFicha = "FIC_".$aleatorio."-".$quienEsEmpleado["documento"];
                /**De entrada abierta */
                $newEstadoFicha = "1"; 
                /**Id del contrato 
                 * Lo recalculamos, como el código_contrato es único, con este nos apoyamos para obtener el ID: */
                $tablaContrato = "contratos";
                $itemContrato = "codigo_contrato";
                $valorContrato = $_POST["codigoContrato"];
                $buscarContrato = ModeloContratoEmpleados::mdlMostrarContratoEmpleados($tablaContrato, $itemContrato, $valorContrato);
                $newContratoFicha = $buscarContrato["id"];

                /**Preparo la Información para agregar la ficha */
                $tablaFicha = "ficha";
                $datosFicha = array("id_contrato" => $newContratoFicha,
                                    "codigo_ficha" => $newCodigoFicha,
                                    "estado" => $newEstadoFicha);

                $respuestaFicha = ModeloContratoEmpleados::mdlRegistroFicha($tablaFicha, $datosFicha);
                
                if($respuestaFicha == "ok"){

                    echo '<script> 
                    
                        Swal.fire({
                            icon: "success",
                            title: "¡ Correcto !",
                            text: "El contrato para el empleado '.$empleado.' ha sido creado correctamente. También se ha creado la respectiva ficha para el empleado."
                        }).then(function(result){
        
                            if(result.value || !result.value){   
                                window.location = "'.$_SERVER["REQUEST_URI"].'";
                            } 
        
                        });
                    
                    </script>';

                }

            }else{

                echo '<script> 
                
                    Swal.fire({
                        icon: "error",
                        title: "¡ Opss ... Error !",
                        text: "No pudimos registrar el contrato!"
                    }).then(function(result){
    
                        if(result.value){   
                            window.location = "'.$_SERVER["REQUEST_URI"].'";
                        } 
    
                    });
                
                </script>';

            } /**Condicional ¿Ok? de Contrato */	

        } /**Condicional vienen variables POST */

    } /**Método de ctrRegistroContrato */

	public function ctrActualizarContrato(){

        /**Que nos venga alguna de las variables POST */
        if(isset($_POST["editarCuentaAhorros"])){

            /**Validamos primero si vamos a actualizar el cargo */
            $checkActualizacion = $_POST["valDeseaActualizarCargo"]; /**Llegará S o N */
            $cargoActualizacion = "";

            if($checkActualizacion == "N"){ /**Entonces queda el original */
                $cargoActualizacion = $_POST["actualEditarSelectCargosId"];
            }else{ /**Entonces será un nuevo valor */
                $cargoActualizacion = $_POST["editarSelectCargos"];
            }

            $tabla = "contratos";

            $datos = array("id" => $_POST["editarIdContratosAdmin"],
                           "cuenta_ahorros" => $_POST["editarCuentaAhorros"],
                           "porcentaje_riesgo" => $_POST["editarPorcentajeRiesgo"],
                           "periodo_pago" => $_POST["editarPeriodoPago"],
                           "tipo_contrato" => $_POST["editarTipoContrato"],
                           "fecha_fin" => $_POST["editarFinContrato"],
                           "id_cargo" => $cargoActualizacion,
                           "anotaciones_contrato" => $_POST["editarAnotaciones_contrato"]);

            $respuesta = ModeloContratoEmpleados::mdlActualizarContrato($tabla, $datos);

            if($respuesta == "ok"){

                echo '<script> 
                
                    Swal.fire({
                        icon: "success",
                        title: "¡ Correcto !",
                        text: "El contrato del empleado ha sido actualizado correctamente!"
                    }).then(function(result){
    
                        if(result.value || !result.value){   
                            window.location = "'.$_SERVER["REQUEST_URI"].'";
                        } 
    
                    });
                
                </script>';

            }else{

                echo '<script> 
                
                    Swal.fire({
                        icon: "error",
                        title: "¡ Opss ... Error !",
                        text: "No pudimos actualizar el contrato!"
                    }).then(function(result){
    
                        if(result.value || !result.value){   
                            window.location = "'.$_SERVER["REQUEST_URI"].'";
                        } 
    
                    });
                
                </script>';

            } /**Condicional ¿Ok? de CONTRATOS */

        }

    }

    /**************************************************
	************* MOSTRAR FICHAS EMPLEADO *************
	***************************************************/

	static public function ctrMostrarFichas($item, $valor){

		$tabla = "ficha";

		$respuesta = ModeloContratoEmpleados::mdlMostrarFichas($tabla, $item, $valor);

		return $respuesta;

	}

    /***************************************************************
	************* MOSTRAR DETALLES CONCEPTOS APLICADOS *************
	****************************************************************/

	static public function ctrMostrarDetallesConcepto($item, $valor){

		$tabla1 = "ficha";
		$tabla2 = "conceptos";
        $tabla3 = "detalle_conceptos";       

		$respuesta = ModeloContratoEmpleados::mdlMostrarDetallesConcepto($tabla1, $tabla2, $tabla3, $item, $valor);    

		return $respuesta;

	}

    /**********************************************************
	************* DETALLES DE CONCEPTO EN GENERAL *************
	***********************************************************/

	static public function ctrMostrarDetallesConceptoGeneral($item, $valor){

        $tabla1 = "detalle_conceptos";       

		$respuesta = ModeloContratoEmpleados::mdlMostrarDetallesConceptoGeneral($tabla1, $item, $valor);    

		return $respuesta;

	}

    /******************************************************
	************* MOSTRAR CONCEPTOS CONTABLES *************
	*******************************************************/

	static public function ctrMostrarConceptosLimit($valor){

		$tabla1 = "conceptos";
		$tabla2 = "detalle_conceptos";
		$valor = $valor;

		$respuesta = ModeloContratoEmpleados::mdlMostrarConceptosLimit($tabla1, $tabla2, $valor);

		return $respuesta;

	}

}

?>