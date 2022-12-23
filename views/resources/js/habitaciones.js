/*****************************************************
************* DATA TABLE DE HABITACIONES *************
***** Requerimos JQuery para cargar funcionalidad ****
*****************************************************/
$.ajax({

	"url":"jobs/json/tablaHabitaciones.ajax.php",
	success: function(respuesta){
		
		//console.log("respuesta", respuesta);

	}

})

/***************************************************************************************
************ CONFIGURACIONES PARA EL DATA TABLE DE CATEGORÍAS DE HABITACIÓN ************
****************************************************************************************/
document.addEventListener('DOMContentLoaded' , (e) => {
    let tabla = new DataTable('#tablaHabitaciones' , {
        "ajax":"jobs/json/tablaHabitaciones.ajax.php",
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
            {"className": "dt-left", "targets": [1]},  
            {"className": "dt-center", "targets": [2]},
            {"className": "dt-left", "targets": [3]},
            {"className": "dt-center", "targets": [4]}
        ], 
        "aLengthMenu": [[12, 20, 30, 40, 60, 100 , -1], [12, 20, 30, 40, 60, 100, "Todos"]], 
        "iDisplayLength" : 12,
        "responsive": true, "lengthChange": true, "autoWidth": true,
        "dom": 'ftrtlpr'   /**lftirtBpr */
    });
})