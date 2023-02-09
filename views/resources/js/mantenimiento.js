/*****************************************************
************** DATA TABLE DE LIMPIEZAS ***************
***** Requerimos JQuery para cargar funcionalidad ****
*****************************************************/
$.ajax({

	"url":"jobs/json/tablaMantenimientos.ajax.php",
	success: function(respuesta){
		
	    //console.log("respuesta", respuesta);

	}

})

/*********************************************************************************************************
************ CONFIGURACIONES PARA EL DATA TABLE DE MANTENIMIENTOS/ASEO HABITACIONES DEL HOTEL ************
**********************************************************************************************************/
document.addEventListener('DOMContentLoaded' , (e) => {
    let tabla = new DataTable('#tablaMantsAseoHab' , {
        "ajax":"jobs/json/tablaMantenimientos.ajax.php",
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
            {"className": "dt-center", "targets": [0]}, 
            {"className": "dt-center", "targets": [1]},  
            {"className": "dt-center", "targets": [2]},
            {"className": "dt-center", "targets": [3]},
            {"className": "dt-center", "targets": [4]},
            {"className": "dt-center", "targets": [5]},
            {"className": "dt-center", "targets": [6]},
            {"className": "dt-center", "targets": [7]},
            {"className": "dt-center", "targets": [8]},
            {"className": "dt-center", "targets": [9]},
            {"className": "dt-center", "targets": [10]},
            {"className": "dt-center", "targets": [11]}
        ], 
        "aLengthMenu": [[20, 30, 40, 60, 100 , -1], [20, 30, 40, 60, 100, "Todos"]], 
        "iDisplayLength" : 20,
        "responsive": true, "lengthChange": true, "autoWidth": true,
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

/***********************************************************************/
/******************** CKEDITOR - TEXTO ENRIQUECIDO *********************/
/******** Requerimos JQuery para activarlo por plugin CKEDITOR* ********/
/***********************************************************************/

ClassicEditor.create(document.querySelector('#descripcionMantAseo'), {

    // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
    heading: {
        options: [
            { model: 'paragraph', title: 'Tamaño Texto', class: 'ck-heading_paragraph' },
            { model: 'heading1', view: 'h1', title: 'Tamaño de Texto 1', class: 'ck-heading_heading1' },
            { model: 'heading2', view: 'h2', title: 'Tamaño de Texto 2', class: 'ck-heading_heading2' },
            { model: 'heading3', view: 'h3', title: 'Tamaño de Texto 3', class: 'ck-heading_heading3' },
            { model: 'heading4', view: 'h4', title: 'Tamaño de Texto 4', class: 'ck-heading_heading4' },
            { model: 'heading5', view: 'h5', title: 'Tamaño de Texto 5', class: 'ck-heading_heading5' },
            { model: 'heading6', view: 'h6', title: 'Tamaño de Texto 6', class: 'ck-heading_heading6' }
        ]
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
    placeholder: 'Descripción Enriquecida del mantenimiento y/o aseo ...',
    toolbar: [ 'heading', '|', 'Bold', 'Italic', '|', 'BulletedList', 'NumberedList', 'alignment' ,'|', 'Undo', 'Redo', '|'  , 'insertTable']

 }).then(function (editor) {
   
     $(".ck-content").css({"height":"400px"})
 
 }).catch(function (error) {
 
     // console.log("error", error);
 
 })

/***********************************************************************************************
************ CONFIGURACIONES PARA EL DATA TABLE DE LIMPIEZA DE HABITACIÓN DEL HOTEL ************
************************************************************************************************/
document.addEventListener('DOMContentLoaded' , (e) => {
    let tabla = new DataTable('#tablaAseos' , {
        "ajax":"jobs/json/tablaAseos.ajax.php",
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
            {"className": "dt-center", "targets": [0]}, 
            {"className": "dt-center", "targets": [1]},  
            {"className": "dt-left", "targets": [2]},
            {"className": "dt-center", "targets": [3]},
            {"className": "dt-left", "targets": [4]},
            {"className": "dt-center", "targets": [5]}
        ], 
        "aLengthMenu": [[20, 30, 40, 60, 100 , -1], [20, 30, 40, 60, 100, "Todos"]], 
        "iDisplayLength" : 20,
        "responsive": true, "lengthChange": true, "autoWidth": true,
        "dom": 'ftrtlpr'   /**lftirtBpr */
    });
})

/**********************************************************************
/************** CAPTURO LOS VALUES DE HABITACIONES ********************
 ******** Por ser select2, librería, tendrá que ser con JQuery ********
/**********************************************************************/
$(document).ready(function(){

    $('#selectHabitacAseo').select2({
        dropdownParent: $('#crearTurnoLimpieza'),
        placeholder: "Buscar habitación ...",
        theme: 'bootstrap4',
    })

    $('#selectEncargadoAseo').select2({
        dropdownParent: $('#crearTurnoLimpieza'),
        placeholder: "Buscar empleado ...",
        theme: 'bootstrap4',
    });
    
})

$(document).on('change', '#selectHabitacAseo', function(event) {
    let text = $("#selectHabitacAseo option:selected").text();
    let val = $("#selectHabitacAseo option:selected").val();
    console.log(text);
    console.log(val);
});

$(document).on('change', '#selectEncargadoAseo', function(event) {
    let text = $("#selectEncargadoAseo option:selected").text();
    let val = $("#selectEncargadoAseo option:selected").val();
    console.log(text);
    console.log(val);
});

/*********************************************************************
/************** VALIDAR EL FORMULARIO DE REGISTRO ********************
 *********************************************************************/
function validarFormularioTurnosLimpiezaMant(form){

    console.log("Entramos al validarFormularioTurnosLimpiezaMant() con el form: " , form);
    /**Capturamos si vamos a agregar, editar, eliminar, habilitar/inhabilitar */
    let formulario = form;

    /**Agregar */
    let fecha = document.querySelector("#fecha_limpieza").value;
    let habitacion = document.querySelector("#selectHabitacAseo").value;
    let encargado = document.querySelector("#selectEncargadoAseo").value;

    console.log("fecha" , fecha);
    console.log("habitacion" , habitacion);
    console.log("encargado" , encargado);

    if(formulario == "adicionar"){

        console.log('Vamos a adicionar ...');



    }

}

function guardarMantenimientoAseo(){

    validarFormularioTurnosLimpiezaMant("adicionar");

    let fecha = document.querySelector("#fecha_limpieza").value;
    let habitacion = document.querySelector("#selectHabitacAseo").value;
    let encargado = document.querySelector("#selectEncargadoAseo").value;
    let radios = document.querySelector("input[name=flexRadioDefault]:checked").value; /**Leemos el grupo de checks y accedemos al value que esté marcado */
    let jornada = document.querySelector("#jornadaAseo").value;
    let horaIni = document.querySelector("#horaIniAseo").value;
    let horaFin = document.querySelector("#horaFinAseo").value;
    let descripcion = document.querySelector(".ck-content").innerHTML;

    console.warn("fecha" , fecha);
    console.warn("habitacion" , habitacion);
    console.warn("encargado" , encargado);
    console.warn("radios" , radios);
    console.warn("jornada" , jornada);
    console.warn("horaIni" , horaIni);
    console.warn("horaFin" , horaFin);
    console.warn("descripcion" , descripcion);

    /**Guardo en un formulario de datos la información que voy a enviar: */
    var datosManteniAseoAdd = new FormData();
    datosManteniAseoAdd.append("mantAseoFecha", fecha);
    datosManteniAseoAdd.append("mantAseoHabitacion", habitacion);
    datosManteniAseoAdd.append("mantAseoEncargado", encargado);
    datosManteniAseoAdd.append("mantAseoRadios", radios);
    datosManteniAseoAdd.append("mantAseoJornada", jornada);
    datosManteniAseoAdd.append("mantAseoHoraIni", horaIni);
    datosManteniAseoAdd.append("mantAseoHoraFin", horaFin);
    datosManteniAseoAdd.append("mantAseoDescripcion", descripcion);

    fetch("jobs/habitaciones.ajax.php", {

        method: "post",
        body: datosManteniAseoAdd

    }).then(function(data){

        return data.json();

    }).then(myJson => {

        console.log(myJson);

        if(myJson == "ok"){

            Swal.fire({
                icon: 'success',
                title: 'Gestión de Mantenimientos y Aseos',
                text: '¡Se ha registrado y/o actualizado un mantenimiento y/o aseo correctamente! ...'
            }).then(function(result){

                if(result.value || !result.value){

                    window.location = "mantenimiento";

                }

            });

        }else{

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '¡Ocurrió algún error al gestionar el mantenimiento/aseo! ...'
            });

        }

    });

}