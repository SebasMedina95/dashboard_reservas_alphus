/****************************************************
*************** DATA TABLE DE CARGOS ****************
**** Requerimos JQuery para cargar funcionalidad ****
*****************************************************/
$.ajax({

	"url":"jobs/json/tablaCargos.ajax.php",
	success: function(respuesta){
		
		// console.log("respuesta", respuesta);

	}

})

/*********************************************************************
************ CONFIGURACIONES PARA EL DATA TABLE DE ADMINS ************
**********************************************************************/
document.addEventListener('DOMContentLoaded' , (e) => {
    let tabla = new DataTable('#tablaCargos' , {
        "ajax":"jobs/json/tablaCargos.ajax.php",
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
            "sLengthMenu":     "<i class='fa-solid fa-eye'></i> Visualizar _MENU_ registros.",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando del _START_ al _END_",
            "sInfoEmpty":      "Mostrando del 0 al 0",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "<div class='btn btn-primary input-group-sm'><i class='fas fa-search'></i> Buscar:</div>",
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
            {"className": "dt-center", "targets": [0]}, /**La columna de despliegue de mas columnas */
            {"className": "dt-center", "targets": [1]}, /**La columna de las opciones de eliminación/edición ... */
            {"className": "dt-left", "targets": [2]}, /**La columna del cargo */
            {"className": "dt-center", "targets": [3]}, /**La columna del alias */
            {"className": "dt-center", "targets": [4]}, /**La columna del estado */
            {"className": "dt-center", "targets": [5]}  /**La columna de la fecha */
        ], 
        "aLengthMenu": [[5, 10, 20, 40, 60, 100 , -1], [5, 10, 20, 40, 60, 100, "Todos"]], 
        "iDisplayLength" : 5,
        "responsive": true, "lengthChange": true, "autoWidth": true,
        "dom": 'tftrtlBpr',   /**lftirtBpr */
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
    });
})

/*************************************************************
************* VALIDAR FORMULARIO REGISTRO VÍA JS *************
*********** TODO ESTO SERÁ USANDO JAVASCRIPT PURO ************
******** Validaremos tanto el agregar como el editar *********
**************************************************************/
document.querySelector("#cargo").addEventListener('keypress' , (e) => { validador1_Cargos(e); });
document.querySelector("#alias").addEventListener('keypress' , (e) => { validador1_Cargos(e); });
document.querySelector("#editarCargo").addEventListener('keypress' , (e) => { validador1_Cargos(e); });
document.querySelector("#editarAlias").addEventListener('keypress' , (e) => { validador1_Cargos(e); });

/*************************************************************
************** VALIDAR OBLIGATORIEDAD DE CAMPOS **************
******** TODO ESTO SERÁ USANDO JQUERY, SIMILAR EN JS *********
******** Lo usaremos tanto para agregar como editar  *********
**************************************************************/
function validarFormularioCargos(form) {

    /**Capturamos si vamos a agregar, editar, eliminar, habilitar/inhabilitar */
    let formulario = form;
    /**Agregar */
    let cargo = $("#cargo").val();
    let alias = $("#alias").val();

    /**Editar */
    let editarCargo = $("#editarCargoEmp").val();
    let editarAlias = $("#editarAlias").val();

    // console.log("editarCargo" , editarCargo);
    // console.log("editarAlias" , editarAlias);

    if(formulario == "adicionar"){
        console.log('Vamos a adicionar un cargo empleado ...');
        /**Validamos cada uno - Tanto para agregar como actualizar ... */
        if (cargo != "") {
            if (alias != "" && alias.length >= 2){

                return true; /**Todos los campos están consistentes, no hay necesidad de validar vía PHP */
                
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'El alias no puede ir vacío ...'
                });
                return false; /**Errores, no podemos enviar el formulario */
            }
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El cargo no puede ir vacío ...'
            });
            return false; /**Errores, no podemos enviar el formulario */
        }

    }else if(formulario == "editar"){
        console.log('Vamos a editar un cargo empleado ...');
        /**Validamos cada uno - Tanto para agregar como actualizar ... */
        if (editarCargo != "") {
            if (editarAlias != "" && editarAlias.length >= 2){
                
                return true; /**Todos los campos están consistentes, no hay necesidad de validar vía PHP */
                
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'El alias no puede ir vacío y tener al menos 2 caracteres ...'
                });
                return false; /**Errores, no podemos enviar el formulario */
            }
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El cargo no puede ir vacío ...'
            });
            return false; /**Errores, no podemos enviar el formulario */
        }

    }else if(formulario == "eliminar"){
        console.log('Vamos a eliminar ...');
    }else{
        console.log('Vamos a habilitar/inhabilitar ...');
    }
     
}

async function botonActualizarCarg(id){

    let idCargo = id;
    console.log("idCargo" , idCargo);

    let inputId = document.querySelector("#editarIdCargos");
    let inputCargo = document.querySelector("#editarCargoEmp");
    let inputAlias = document.querySelector("#editarAlias");

    $('#spinnerCargaEditarCargo').modal('show'); // Abrir Modal por que todo está cargado - Para esta operación usamos JQuery ...
    document.querySelector("#spinnerCargaEditarCargo").classList.add("show");

    let respuesta = await fetch("jobs/cargos.ajax.php?"+"idCargo="+idCargo);
    json = await respuesta.json();
    await waitforme(500);

    console.log(json);

    $('#spinnerCargaEditarCargo').removeClass('fade'); /**Remuevo class fade para que no cause corto con el modal editar */
    $('#spinnerCargaEditarCargo').modal('hide'); // Cerrar Modal por que todo está cargado - Para esta operación usamos JQuery ...
        
    inputId.value = json["id"];
    inputCargo.value = json["cargo"];
    inputAlias.value = json["alias"];

    /**Así no lo recomienda Bootstrap, pequeña excepción cono JQuery para abrir Modal Programáticamente. */
    $('#editarCargo').modal('show'); // Abrir Modal por que todo está cargado ...

}

/***************************************************************************************
/******************** ACTIVAR/DESACTIVAR UN ADMINISTRADOR ******************************
 ********** Versión mixta, JS Puro y JQuery puntual para Ajax y Plugins ****************
/***************************************************************************************/
async function gestionarEstCargoEmp(id) {

    try {
        /**Capturamos los parámetros que vienen del botón de archivo tablaCargos.ajax.php */
        let idCargoEmp = id;
        let btnComplet = document.querySelector('#botonCamEstCarg'+id); /**Lo tengo personalizado para que cada Row sea dinámico */
        let estadoCargo = btnComplet.getAttribute('estadoCargo');

        console.log("idCargoEmp" , idCargoEmp);
        console.log('btnComplet' , btnComplet);
        console.log("estadoCargo" , estadoCargo);

        $('#spinnerCargaEditarCargo').modal('show'); // Abrir Modal por que todo está cargado - Para esta operación usamos JQuery ...
        document.querySelector("#spinnerCargaEditarCargo").classList.add("show");

        let respuesta = await fetch("jobs/cargos.ajax.php?"+"idCargo="+idCargoEmp);
        json1 = await respuesta.json();
        await waitforme(500);

        $('#spinnerCargaEditarCargo').removeClass('fade'); /**Remuevo class fade para que no cause corto con el modal editar */
        $('#spinnerCargaEditarCargo').modal('hide'); // Cerrar Modal por que todo está cargado - Para esta operación usamos JQuery ...

        if(estadoCargo == "1"){
            mensaje = "¿Estás seguro de activar al cargo: " + json1["cargo"] + " ?"
        }else{
            mensaje = "¿Estás seguro de desactivar al cargo: " + json1["cargo"] + " ?"
        }

        Swal.fire({
            title: 'Gestión de Cargos para Empleado',
            text: mensaje,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, cambiar de estado!',
            cancelButtonText: 'Cancelar'
        }).then(function(result){

            /**Si es verdadero, presionó la tecla aceptar */
            if(result.value){

                /**Habilitamos/Inhabilitamos:
                 * Debemos independizar la operación para manejar mejor la promesa que será resuelta.*/
                habilitar_inhabilitar(idCargoEmp , estadoCargo).then();

            } /**La persona selecciona que si desea eliminar */

        }) /**Estructura then del Sweet Alert */  

    } catch (error) {
        console.log(error);
    }

}

async function habilitar_inhabilitar(idCargoEmp , estadoCargo){

    let respuesta = await fetch("jobs/cargos.ajax.php?"+"idCargoEmp="+idCargoEmp+"&"+"estadoCargo="+estadoCargo);
    json = await respuesta.json();
    console.log("json " , json);

    if(json == "ok"){

        if(estadoCargo == 0){

            const boton = document.querySelector('#botonCamEstCarg'+idCargoEmp);
            boton.classList.remove('btn-info');
            boton.classList.add('btn-dark');
            boton.innerHTML = "Desactivado";
            boton.setAttribute('estadoCargo' , 1);

            Swal.fire({
                icon: 'info',
                title: 'Gestión de Estado',
                text: 'El Cargo de Empleado fue Desactivado ...'
            });

        }else{

            const boton = document.querySelector('#botonCamEstCarg'+idCargoEmp);
            boton.classList.remove('btn-dark');
            boton.classList.add('btn-info');
            boton.innerHTML = "Activado";
            boton.setAttribute('estadoCargo' , 0);

            Swal.fire({
                icon: 'info',
                title: 'Gestión de Estado',
                text: 'El Cargo de Empleado fue Activado ...'
            });

        } /**Estado */

    } /**Si la respuesta que retornamos es Ok */

}

/********************************************************************
/************** ELIMINAR UN CARGO QUE PUEDA SER BORRADO *************
/********************************************************************/
async function botonEliminarCarg(id){

    let idCargoElim = id;
    let btnComplet = document.querySelector('#botonEliminarCarg'+id); /**Lo tengo personalizado para que cada Row sea dinámico */

    console.log("idCargoElim" , idCargoElim);
    console.log('btnComplet' , btnComplet);

    $('#spinnerCargaEditarCargo').modal('show'); // Abrir Modal por que todo está cargado - Para esta operación usamos JQuery ...
    document.querySelector("#spinnerCargaEditarCargo").classList.add("show");

    let respuesta = await fetch("jobs/cargos.ajax.php?"+"idCargo="+idCargoElim);
    json1 = await respuesta.json();
    await waitforme(500);

    $('#spinnerCargaEditarCargo').removeClass('fade'); /**Remuevo class fade para que no cause corto con el modal editar */
    $('#spinnerCargaEditarCargo').modal('hide'); // Cerrar Modal por que todo está cargado - Para esta operación usamos JQuery ...

    let mensaje = "¿Estás seguro de eliminar el cargo de empleado: " + json1["cargo"] + " ?";

    /**Preguntamos primero */
    Swal.fire({
        title: 'Eliminación de Cargos de Empleado',
        text: mensaje,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar cargo!',
        cancelButtonText: 'Cancelar'
    }).then(function(result){

        /**Si es verdadero, presionó la tecla aceptar */
        if(result.value){

            /**Habilitamos/Inhabilitamos:
             * Debemos independizar la operación para manejar mejor la promesa que será resuelta.*/
            realizarEliminacion(idCargoElim).then();

        } /**La persona selecciona que si desea eliminar */

    }) /**Estructura then del Sweet Alert */  

}

async function realizarEliminacion(idCargoElim){

    let respuesta = await fetch("jobs/cargos.ajax.php?"+"idEliminarCargo="+idCargoElim);
    json = await respuesta.json();
    console.log("json " , json);

    if(json == "ok"){

        Swal.fire({
            icon: 'success',
            title: 'Eliminación de Cargo de Empleado',
            text: 'El Cargo fue eliminado correctamente! ...'
        }).then(function(result){

            if(result.value || !result.value){

                window.location = "configuracion-cargos";

            } /**Si el resultado valida ok, logramos eliminar y redirecciono */

        }) /**Swal de que se elimino correctamente */

    }else{

        Swal.fire({
            icon: 'error',
            title: 'Eliminación de Cargo de Empleado',
            text: 'El cargo no pudo ser eliminado! ... Esto puede deberse a que el cargo ya está siendo usado en algún contrato.'
        }).then(function(result){

            if(result.value || !result.value){

                window.location = "configuracion-cargos";

            } /**Si el resultado valida ok, logramos eliminar y redirecciono */

        }) /**Swal de que se elimino correctamente */

    }

}

// const botonEliminarCarg = (id) => {
    
//     let idCargoElim = id;
//     console.log("idCargoElim" , idCargoElim);

//     /**Defino los datos que enviaré a Ajax */
//     let datos = new FormData();
//   	datos.append("idCargoElim", idCargoElim);

//     /**Harémos la interacción vía JS */
//     $.ajax({
//         url:"ajax/cargos.ajax.php",
//         method: "POST",
//         data: datos,
//         cache: false,
//         contentType: false,
//         processData: false,
//         dataType: "json",
//         success: function(respuesta){
            
//             //console.log(respuesta);
//             /**Capturo en variables para mejor control en los mensajes ... */
//             let idCapCar = respuesta["id"];
//             let cargoCap = respuesta["cargo"];

//             /**Pregunto si realmente deseo eliminar, concateno variables para personalización */
//             Swal.fire({
//                 title: 'Eliminación de Cargo',
//                 text: "¿Estás seguro de eliminar el cargo de empleado " + cargoCap + " ?",
//                 icon: 'warning',
//                 showCancelButton: true,
//                 confirmButtonColor: '#3085d6',
//                 cancelButtonColor: '#d33',
//                 confirmButtonText: 'Si, eliminar el cargo!',
//                 cancelButtonText: 'Cancelar'
//             }).then(function(result){

//                 /**Si es verdadero, presionó la tecla aceptar */
//                 if(result.value){

//                     /**Eliminación, capturamos nuevamente el ID */
//                     var datos = new FormData();
//        		        datos.append("idEliminarCargo", idCapCar);

//                     $.ajax({

//                         url:"ajax/cargos.ajax.php",
//                         method: "POST",
//                         data: datos,
//                         cache: false,
//                         contentType: false,
//                         processData: false,
//                         success:function(respuesta){
//                             /**Si la acción retorna Ok, la eliminación se realizó */
//                             if(respuesta == "ok"){

//                                 Swal.fire({
//                                     icon: "success",
//                                     title: "¡ Correcto !",
//                                     text: "El cargo ha sido eliminado correctamente!"
//                                 }).then(function(result){

//                                     if(result.value || !result.value){

//                                         window.location = "configuracion-cargos";

//                                     } /**Si el resultado valida ok, logramos eliminar y redirecciono */

//                                 }) /**Swal de que se elimino correctamente */

//                             } /**Devolvemos ok, o sea que la trasacción se realizo */

//                         } /**Respuesta del siguiente ajax */

//                     })/**Ajax de eliminación */
                    
//                     /***************************************************************************** */

//                 } /**Condicional si elimino realmente */

//             }) /**Swal de pregunta de eliminación */
  
//         } /**Success del Ajax */
  
//     }) /**Ajax busqueda admin */

// }

let validador1_Cargos = (e) => {
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
       (keynum >= 48 && keynum <= 57) ||                                            /**Números 0-9*/
       (keynum == 32)  || (keynum == 47)  || (keynum == 45)){                       /**Espacio, / o - */

        return true;

    }else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Este campo solo permite el ingreso de letras y números ... (Se permiten vocales tildadas) ...'
        });
        return false;

    } 
}

/**Función de espera para Async Await - Para ayudar los Time */
function waitforme(milisec) {
    return new Promise(resolve => {
        setTimeout(() => { resolve('') }, milisec);
    })
}