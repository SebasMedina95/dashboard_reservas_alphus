/*******************************************************
************ DATA TABLE DE CONTRATOS ADMINS ************
********************************************************/
$.ajax({

    "url":"jobs/json/tablaConceptos.ajax.php",
	success: function(respuesta){
		
		//console.log("respuesta", respuesta);

	}

})

/*****************************************************************************************
************ CONFIGURACIONES PARA EL DATA TABLE DE CONTRATOS EMPLEADOS/ADMINS ************
******************************************************************************************/
document.addEventListener('DOMContentLoaded' , (e) => {
    let tabla = new DataTable('#tablaConceptos' , {
        "ajax":"jobs/json/tablaConceptos.ajax.php",
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
            {"className": "dt-center", "targets": [0]}, /**La columna de despliegue de mas columnas */
            {"className": "dt-center", "targets": [1]}, /**La columna de las opciones de eliminación/edición ... */
            {"className": "dt-left", "targets": [2]}, /**La columna del capitulo de nómina */
            {"className": "dt-left", "targets": [3]}, /**La columna del nombre del concepto */
            {"className": "dt-right", "targets": [4]}, /**La columna del porcentaje */
            {"className": "dt-left", "targets": [5]},  /**La columna de la descripción */
            {"className": "dt-center", "targets": [6]},  /**La columna del estado */
            {"className": "dt-center", "targets": [7]}  /**La columna de la fecha */
        ], 
        "aLengthMenu": [[7, 10, 20, 40, 60, 100 , -1], [7, 10, 20, 40, 60, 100, "Todos"]], 
        "iDisplayLength" : 7,
        "responsive": true, "lengthChange": true,
        "dom": '<"top"fp<"clear">>rt<"clear"><"bottom"ilrBfpr<"clear">>',   /**lftirtBpr */
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





/*************************************************************
************* VALIDAR FORMULARIO REGISTRO VÍA JS *************
******** Validaremos tanto el agregar como el editar *********
**************************************************************/
/**https://elcodigoascii.com.ar/ */
document.querySelector("#concepto").addEventListener('keypress' , (e) => { validador1_conceptos(e); });
document.querySelector("#descripcion_concepto").addEventListener('keypress' , (e) => { validador1_conceptos(e); });
document.querySelector("#porcentaje_concepto").addEventListener('keypress' , (e) => { validador2_conceptos(e); });

document.querySelector("#editarConcepto").addEventListener('keypress' , (e) => { validador1_conceptos(e); });
document.querySelector("#editarDescripcion_concepto").addEventListener('keypress' , (e) => { validador1_conceptos(e); });
document.querySelector("#editarPorcentaje_concepto").addEventListener('keypress' , (e) => { validador2_conceptos(e); });

/**********************************************************************
/************** ACTUALIZACIÓN CONCEPTO CONTABLE DE NÓMINA *************
/**********************************************************************/
async function botonActualizarConcepto(id){

    try {
        
        let idConceptoContable = id;
        let btnComplet = document.querySelector('#botonActualizarConcepto'+id); /**Lo tengo personalizado para que cada Row sea dinámico */

        // console.log("idConceptoContable" , idConceptoContable);
        // console.log("btnComplet" , btnComplet);

        let json1;

        $('#spinnerCargaEditarConcepto').modal('show'); // Abrir Modal por que todo está cargado - Para esta operación usamos JQuery ...
        document.querySelector("#spinnerCargaEditarConcepto").classList.add("show");

        let resContratos = await fetch("jobs/conceptos.ajax.php?"+"idConceptoContable="+idConceptoContable);
        json1 = await resContratos.json();
        await waitforme(500);

        // console.log("Respuesta de JSON1 = " , json1);

        $('#spinnerCargaEditarConcepto').removeClass('fade'); /**Remuevo class fade para que no cause corto con el modal editar */
        $('#spinnerCargaEditarConcepto').modal('hide'); // Cerrar Modal por que todo está cargado - Para esta operación usamos JQuery ...

        let capituloNomi;
        if(json1["capitulo"] == "1"){
            capituloNomi = "Salario";
        }else if(json1["capitulo"] == "2"){
            capituloNomi = "Deducciones"; 
        }else if(json1["capitulo"] == "3"){
            capituloNomi = "Prestaciones"; 
        }else if(json1["capitulo"] == "4"){
            capituloNomi = "Otros";
        }else if(json1["capitulo"] == "5"){
            capituloNomi = "Compensación Flexibles";
        }else if(json1["capitulo"] == "6"){
            capituloNomi = "Apoyo Económico";
        }else if(json1["capitulo"] == "7"){
            capituloNomi = "Provisiones";
        }

        document.querySelector('.editarCapituloOption').value = json1["capitulo"];
        document.querySelector('.editarCapituloOption').innerHTML = capituloNomi;

        document.querySelector('input[name="editarConcepto"]').value = json1["concepto"];
        document.querySelector('input[name="editarDescripcion_concepto"]').value = json1["descripcion"];
        document.querySelector('input[name="editarPorcentaje_concepto"]').value = json1["porcentaje"];

        document.querySelector('input[name="editarConceptoId"]').value = json1["id"];

        /**Así no lo recomienda Bootstrap, pequeña excepción cono JQuery para abrir Modal Programáticamente. */
        $('#editarConceptoNomina').modal('show'); // Abrir Modal por que todo está cargado ...

    } catch (error) {
        console.log(error);
    }

}

/******************************************************************************
/************** ACTIVAR/DESACTIVAR UN CONCEPTO CONTABLE DE NÓMINA *************
/******************************************************************************/
async function gestionarEstConceptosNomi(id){

    try {
        
        /**Capturamos los parámetros que vienen del botón de archivo tablaCargos.ajax.php */
        let idConceptoContableGest = id;
        let btnComplet = document.querySelector('#botonCamEstConcepto'+id); /**Lo tengo personalizado para que cada Row sea dinámico */
        let estadoConcepto = btnComplet.getAttribute('estadoConceptoNomina');

        console.log("idConceptoContableGest" , idConceptoContableGest);
        console.log('btnComplet' , btnComplet);
        console.log("estadoConcepto" , estadoConcepto);

        let json1;

        $('#spinnerCargaEditarConcepto').modal('show'); // Abrir Modal por que todo está cargado - Para esta operación usamos JQuery ...
        document.querySelector("#spinnerCargaEditarConcepto").classList.add("show");

        let respuesta1 = await fetch("jobs/conceptos.ajax.php?"+"idConceptoContable="+idConceptoContableGest);
        json1 = await respuesta1.json();
        await waitforme(600);

        console.log("Respuesta de JSON1 = " , json1);

        $('#spinnerCargaEditarConcepto').removeClass('fade'); /**Remuevo class fade para que no cause corto con el modal editar */
        $('#spinnerCargaEditarConcepto').modal('hide'); // Cerrar Modal por que todo está cargado - Para esta operación usamos JQuery ...

        if(estadoConcepto == "1"){
            mensaje = "¿Estás seguro de activar el Concepto Contable de Nómina: " + json1["concepto"] + " ?";
        }else{
            mensaje = "¿Estás seguro de desactivar el Concepto Contable de Nómina: " + json1["concepto"] + " ?";
        }

        /**Preguntamos primero */
        Swal.fire({
            title: 'Gestión de Conceptos Contables de Nómina',
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
                habilitar_inhabilitar(idConceptoContableGest , estadoConcepto).then();

            } /**La persona selecciona que si desea eliminar */

        }) /**Estructura then del Sweet Alert */  

    } catch (error) {
        console.log(error);
    }

}

/**Para habilitar/Inhabilitar -> La acción como tal: */
async function habilitar_inhabilitar(idConceptoContableGest , estadoConcepto){

    try {
        
        let respuesta = await fetch("jobs/conceptos.ajax.php?"+"idConceptoContableGest="+idConceptoContableGest+"&"+"estadoConcepto="+estadoConcepto);
        json = await respuesta.json();
        console.log("json " , json);

        if(json == "ok"){

            if(estadoConcepto == 0){

                const boton = document.querySelector('#botonCamEstConcepto'+idConceptoContableGest);
                boton.classList.remove('btn-info');
                boton.classList.add('btn-dark');
                boton.innerHTML = "Desactivado";
                boton.setAttribute('estadoConceptoNomina' , 1);

                Swal.fire({
                    icon: 'info',
                    title: 'Gestión de Concepto Contable de Nómina',
                    text: 'El Concepto Contable fue Desactivado ...'
                });

            }else{

                const boton = document.querySelector('#botonCamEstConcepto'+idConceptoContableGest);
                boton.classList.remove('btn-dark');
                boton.classList.add('btn-info');
                boton.innerHTML = "Activado";
                boton.setAttribute('estadoConceptoNomina' , 0);

                Swal.fire({
                    icon: 'info',
                    title: 'Gestión de Concepto Contable de Nómina',
                    text: 'El Concepto Contable fue Activado ...'
                });

            } /**Estado */

        } /**Si la respuesta que retornamos es Ok */

    } catch (error) {
        console.log(error);
    }

}

/********************************************************************************
/************** ELIMINAR UN CONCEPTO CONTABLE QUE PUEDA SER BORRADO *************
/********************************************************************************/
async function botonEliminarConceptoNomina(id){

    try {
         
        let idConceptoContableElim = id;
        let btnComplet = document.querySelector('#botonEliminarConceptoNomina'+id); /**Lo tengo personalizado para que cada Row sea dinámico */

        // console.log("idConceptoContableElim" , idConceptoContableElim);
        // console.log("btnComplet" , btnComplet);

        $('#spinnerCargaEditarConcepto').modal('show'); // Abrir Modal por que todo está cargado - Para esta operación usamos JQuery ...
        document.querySelector("#spinnerCargaEditarConcepto").classList.add("show");

        let respuesta = await fetch("jobs/conceptos.ajax.php?"+"idConceptoContable="+idConceptoContableElim);
        json1 = await respuesta.json();
        await waitforme(500);

        $('#spinnerCargaEditarConcepto').removeClass('fade'); /**Remuevo class fade para que no cause corto con el modal editar */
        $('#spinnerCargaEditarConcepto').modal('hide'); // Cerrar Modal por que todo está cargado - Para esta operación usamos JQuery ...

        let concepto = json1["concepto"];

        /**Preguntamos primero */
        Swal.fire({
            title: 'Eliminación de Concepto Contable',
            text: "¿Estás seguro de eliminar el concepto contable: " + concepto + " ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar concepto!',
            cancelButtonText: 'Cancelar'
        }).then(function(result){

            /**Si es verdadero, presionó la tecla aceptar */
            if(result.value){

                /**Habilitamos/Inhabilitamos:
                 * Debemos independizar la operación para manejar mejor la promesa que será resuelta.*/
                realizarEliminacion(idConceptoContableElim).then();

            } /**La persona selecciona que si desea eliminar */

        }) /**Estructura then del Sweet Alert */  

    } catch (error) {
        console.log(error);
    }

}

/**Realizar la eliminación como tal ... */
async function realizarEliminacion(idConceptoContableElim){

    let respuesta = await fetch("jobs/conceptos.ajax.php?"+"idConceptoContableElim="+idConceptoContableElim);
    json = await respuesta.json();
    console.log("json " , json);

    if(json == "ok"){

        Swal.fire({
            icon: 'success',
            title: 'Eliminación de Concepto Contable',
            text: 'El Concepto Contable fue eliminado correctamente! ...'
        }).then(function(result){

            if(result.value || !result.value){

                window.location = "conceptos";

            } /**Si el resultado valida ok, logramos eliminar y redirecciono */

        }) /**Swal de que se elimino correctamente */

    } /**Si la respuesta que retornamos es Ok */

}


/*************** VALIDACIONES POR EL EVENTO KEYPRESS ****************/

/**Validador1 = Validamos permitir caracteres de la a - z - áéíóú
 *              Validamos permitir caracteres de la A - Z - ÁÉÍÓÚ
 *              Validamos permitir caracteres de ñ - Ñ
 *              Validamos los espacios en blanco */
/*************** *********************************** ****************/
let validador1_conceptos = (e) => {
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
       (keynum == 32)){                                                             /**Espacio */

        return true;

    }else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Este campo solo permite el ingreso de letras (Se permiten vocales tildadas) ...'
        });
        return false;

    }
}

/**Validador1 = Validamos permitir números del 0 al 9
 *              Validamos permitir caracteres de . para separar decimales */
/*************** *********************************** ****************/
let validador2_conceptos = (e) => {
    let keynum = window.event ? window.event.keyCode : e.which; /**Obtenemos el código ASCII */
    console.log(e.which || e.keyCode);
    /**Realizamos la validación en estilo ASCII*/
    if((keynum >= 48 && keynum <= 57) || 
    (keynum == 46)){   /** 0-9 y . */                                                          

        return true;

    }else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No se permiten caracteres especiales en este campo, solo permite números y para decimales separar con punto ...'
        });
        return false;

    } 
}