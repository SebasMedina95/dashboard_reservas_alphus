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