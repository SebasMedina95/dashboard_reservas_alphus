/*****************************************************
************** DATA TABLE DE LIMPIEZAS ***************
***** Requerimos JQuery para cargar funcionalidad ****
*****************************************************/
$.ajax({

	"url":"jobs/json/tablaAseos.ajax.php",
	success: function(respuesta){
		
		//console.log("respuesta", respuesta);

	}

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

    // $('#selectAdminEmp').select2({
    //     dropdownParent: $('#crearContratoEmpleado'),
    //     placeholder: "Buscar empleado ...",
    //     theme: 'bootstrap4',
    // });
    
})
$(document).on('change', '#selectHabitacAseo', function(event) {
    let text = $("#selectHabitacAseo option:selected").text();
    let val = $("#selectHabitacAseo option:selected").val();
    console.log(text);
    console.log(val);
});