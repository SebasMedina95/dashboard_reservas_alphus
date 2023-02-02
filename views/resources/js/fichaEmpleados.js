/****************************************************
************ DATA TABLE DE FICHAS ADMINS ************
*****************************************************/
$.ajax({

	"url":"jobs/json/tablaFichasAdmins.ajax.php",
	success: function(respuesta){
		
		//console.log("/// respuesta ficha: ", respuesta);

	}

})

/*******************************************************************************
************ CONFIGURACIONES PARA EL DATA TABLE DE CONTRATOS ADMINS ************
********************************************************************************/
document.addEventListener('DOMContentLoaded' , (e) => {
    let tabla = new DataTable('#tablaDetallesConcepto' , {
        "ajax":"jobs/json/tablaFichasAdmins.ajax.php",
        "scrollX": true,
        "deferRender": true,
        "retrieve": true,
        "processing": true,
        "paging": true,
        "pagingType": "full_numbers",
        "searching": true,
        "ordering": true,
        "info": true,
        "language": {

            "sProcessing":     "Procesando...",
            "sLengthMenu":     "<i class='fa-solid fa-eye'></i> Visualizar _MENU_ Registros al Tiempo.",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando del _START_ al _END_ Registro",
            "sInfoEmpty":      "Mostrando del 0 al 0",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "<div class='btn btn-primary ml-6'><i class='fas fa-search'></i> Buscar:</div>",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "<i title='Avanzar al Primero' class='fa-solid fa-angles-left'></i>",
                "sLast":     "<i title='Avanzar al Último' class='fa-solid fa-angles-right'></i>",
                "sNext":     "<i title='Avanzar al Siguiente' class='fa-solid fa-angle-right'></i>",
                "sPrevious": "<i title='Avanzar al Anterior' class='fa-solid fa-angle-left'></i>"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        "columnDefs": [
            {"className": "dt-center", "targets": [0]}, 
            {"className": "dt-center", "targets": [1]}, 
            {"className": "dt-left", "targets": [2]}, 
            {"className": "dt-left", "targets": [3]}, 
            {"className": "dt-left", "targets": [4]}, 
            {"className": "dt-center", "targets": [5]}, 
            {"className": "dt-center", "targets": [6]},
            {"className": "dt-left", "targets": [7]}, 
            {"className": "dt-center", "targets": [8]} 

        ], 
        "aLengthMenu": [[10, 20, 40, 60, 100 , -1], [10, 20, 40, 60, 100, "Todos"]], 
        "iDisplayLength" : 10,
        "responsive": true, "lengthChange": true,
        "dom": '<"top"f<"clear">>rt<"clear"><"bottom"lr<"clear">>',   /**lftirtBpr */
        "buttons": [  
            {  
                extend: 'copy',  
                className: 'btn btn-secondary rounded-0',  
                text: '<i class="far fa-copy"></i> Copiar'  
            },  
            {  
                extend: 'excel',  
                className: 'btn btn-secondary rounded-0',  
                text: '<i class="far fa-file-excel"></i> Excel'  
            },  
            {  
                extend: 'pdf',  
                className: 'btn btn-secondary rounded-0',  
                text: '<i class="far fa-file-pdf"></i> Pdf'  
            },  
            {  
                extend: 'csv',  
                className: 'btn btn-secondary rounded-0',  
                text: '<i class="fas fa-file-csv"></i> CSV'  
            },  
            {  
                extend: 'print',  
                className: 'btn btn-secondary rounded-0',  
                text: '<i class="fas fa-print"></i> Imprimir'  
            },  
            {  
                extend: 'colvis',  
                className: 'btn btn-secondary rounded-0',  
                text: '<i class="fas fa-eye"></i> Columnas'  
            }   
        ]  
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
})

/*******************************************************************
/******* ACTIVO EL SELECT2 Y DE PASO ASIGNO LA EXTENSIÓN      ******
 * ***** ESPECIALIZADA PARA BOOTSTRAP 4 -> Select Conceptos   ******
 * ***** Nota: Es necesario hacerlo con JQuery completamente. ******
/*******************************************************************/
$(document).ready(function(){

    $('#selectAddConceptoFicha').select2({
        dropdownParent: $('#agregarDetalleConceptoFicha'),
        placeholder: "Buscar concepto ...",
        theme: 'bootstrap4'
    });
    
})


/****************************************************************
/************* CAPTURO LOS VALUES DEL CONCEPTO ******************
***** Por ser select2, librería, tendrá que ser con JQuery ******
/****************************************************************/
$(document).on('change', '#selectAddConceptoFicha', function(event) {
    let text = $("#selectAddConceptoFicha option:selected").text();
    let val = $("#selectAddConceptoFicha option:selected").val();
    console.log(text);
    console.log(val);
});
    
/*************************************************************
************* VALIDAR FORMULARIO REGISTRO VÍA JS *************
******** Validaremos tanto el agregar como el editar *********
**************************************************************/
document.querySelector("#notas_concepto_ficha").addEventListener('keypress' , (e) => { validador1_FichaDetaConcepto(e); });

/*************************************************************
************** VALIDAR OBLIGATORIEDAD DE CAMPOS **************
******** TODO ESTO SERÁ USANDO JQUERY, SIMILAR EN JS *********
**************************************************************/
function validarFormularioAddConceptoFichasAdmins(form){

    /**Capturamos si vamos a agregar, editar, eliminar, habilitar/inhabilitar */
    let formulario = form;

    /**Agregar */
    let empleado = document.querySelector("#selectAddConceptoFicha").value;

    if(formulario == "adicionar"){
        console.log('Vamos a adicionar ...');
        /**Validamos cada uno - Tanto para agregar como actualizar ... */
        if (empleado != "" && empleado != "0"){

            return true; /**Todos los campos están consistentes, no hay necesidad de validar vía PHP */

        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debe seleccionar adecuadamente un concepto contable ...'
            });
            return false; /**Errores, no podemos enviar el formulario */
        }

    }
    
}

/**************************************************************
**************** ACTIVAR / DESACTIVAR LA FICHA ****************
**************************************************************/
const actualizarEstadoFicha = (Fic , Adm , Est) => {
    /**Capturamos los parámetros que vienen del botón de estado de ficha en ficha-empleado.php */
    let idEmpleadoFicha = Adm;
    let idFichaCapBoton = Fic;
    let btnComplet = document.querySelector('#btnEstadoFicha'); 
    let estadoFicha = Est;

    console.log("idEmpleadoFicha" , idEmpleadoFicha);
    console.log("idFichaCapBoton" , idFichaCapBoton);
    console.log('btnComplet' , btnComplet);
    console.log("estadoFicha" , estadoFicha);

    var datos1 = new FormData();
  	datos1.append("idEmpleadoFicha", idEmpleadoFicha);

    $.ajax({
        url:"jobs/fichas.ajax.php",
        method: "POST",
        data: datos1,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){        

            // console.log("Empleado => " , respuesta);

            let mensajeText1;
            let mensajeConfirm;
            let mensajeText2;

            if(estadoFicha == "1"){
                mensajeText1 = "¿Estas seguro de Cerrar esta Ficha del empleado ";
                mensajeConfirm = "Si, Cerrar Ficha";
                mensajeText2 = "Recuerde que si lo hace, no podrá gestionar la planilla hasta volver a abrirla.";
            }else{
                mensajeText1 = "¿Estas seguro de Abrir esta Ficha del empleado ";
                mensajeConfirm = "Si, Abrir Ficha";
                mensajeText2 = "Podrá gestionar la ficha del empleado.";
            }

            let documentoCap = respuesta["documento"];
            let nombreCap = respuesta["primer_nombre"] + " " + respuesta["segundo_nombre"] + " " + respuesta["primer_apellido"] + " " + respuesta["segundo_apellido"];

            Swal.fire({
                title: 'Gestión de Estado para Ficha de Empleado',
                text: mensajeText1 + ": [ "+ documentoCap + " - " + nombreCap +" ]. " + mensajeText2,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: mensajeConfirm,
                cancelButtonText: 'Cancelar'
            }).then(function(result){

                /**Si es verdadero, presionó la tecla aceptar */
                if(result.value){

                    /**Ajusto el estado de ficha para cambiar: */
                    let estadoFichaDef;

                    if(estadoFicha == "1"){
                        estadoFichaDef = "0";
                    }else{
                        estadoFichaDef = "1";
                    }

                    /**Vamos a hacer el cambio de estado ... */
                    var datos2 = new FormData();
                    datos2.append("idFichaCapBoton", idFichaCapBoton);
                    datos2.append("estadoFicha", estadoFichaDef);

                    $.ajax({
                        url:"jobs/fichas.ajax.php",
                        method: "POST",
                        data: datos2,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success:function(respuesta2){

                            console.log("respuesta2respuesta2respuesta2 " , respuesta2);
                            
                            if(respuesta2 == "ok"){

                                Swal.fire({
                                    icon: "success",
                                    title: "¡ Correcto !",
                                    text: "Actualización de estado de ficha realizada con éxito!"
                                }).then(function(result2){

                                    if(result2.value || !result2.value){

                                        window.location = "ficha-empleado";

                                    } /**Si el resultado valida ok, logramos eliminar y redirecciono */

                                }) /**Swal de que se elimino correctamente */
                                
                            } /**Condicional OK de respuesta2 */

                        }/**Respuesta success de success:function de respuesta2 AJAX */

                    }) /**Ajax 2 */

                } /**Si el SweetAlert la persona selecciona OK */

            }) /**Then de la selección de SweetAlert */

        } /**Respuesta success de success: function de respuesta AJAX */

    })/**Primer Ajax */

} /**actualizarEstadoFicha */


/******************************************************************** */
/******************** VALIDACIONES GENERALES ************************ */
/******************************************************************** */

/**Validador1 = Validamos permitir caracteres de la a - z - áéíóú
 *              Validamos permitir caracteres de la A - Z - ÁÉÍÓÚ
 *              Validamos permitir caracteres de ñ - Ñ
 *              Validamos los espacios en blanco
 *              Validamos los números del 0 al 9
 *              Validamos caracteres tales como - . , _ */
/*************** *********************************** ****************/
let validador1_FichaDetaConcepto = (e) => {
    let keynum = window.event ? window.event.keyCode : e.which; /**Obtenemos el código ASCII */
    console.log(e.which || e.keyCode);
    /**Realizamos la validación en estilo ASCII*/
    if((keynum >= 65 && keynum <= 90) ||                                            /**Letras de a-z */
       (keynum >= 97 && keynum <= 122) ||                                           /**Letras de A-Z */
       (keynum == 130) || (keynum == 144) || (keynum == 201) ||                     /**Letra é ,É*/
       (keynum == 181) || (keynum == 160) || (keynum == 225) || (keynum == 193) ||  /** Á, á*/
       (keynum == 161) || (keynum == 214) || (keynum == 237) || (keynum == 205) ||  /** í, Í*/
       (keynum == 162) || (keynum == 224) || (keynum == 243) || (keynum == 211) ||  /** ó, Ó */
       (keynum == 163) || (keynum == 233) ||                                        /** ú, Ó */
       (keynum == 218) || (keynum == 250) ||                                        /** ú, Ú */
       (keynum == 164) || (keynum == 165) ||                                        /** ñ, Ñ */
       (keynum == 209) || (keynum == 241) ||                                        /** ñ, Ñ */
       (keynum == 32)  || (keynum == 45)  || (keynum == 44) || (keynum == 95) || (keynum == 46) || /**Espacio, -, , _ , .*/
       (keynum >= 48 && keynum <= 57)){                                     /**Números 0-9*/                                                   

        return true;

    }else{
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Este campo no permite el ingreso de caracteres especiales, solo ,_-. ... (Se permiten vocales tildadas) ...'
    });
    return false;

    }
}