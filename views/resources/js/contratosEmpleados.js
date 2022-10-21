/*******************************************************
************ DATA TABLE DE CONTRATOS ADMINS ************
********************************************************/
$.ajax({

    "url":"jobs/json/tablaContratosEmpleados.ajax.php",
	success: function(respuesta){
		
		//console.log("respuesta", respuesta);

	}

})

/*****************************************************************************************
************ CONFIGURACIONES PARA EL DATA TABLE DE CONTRATOS EMPLEADOS/ADMINS ************
******************************************************************************************/
document.addEventListener('DOMContentLoaded' , (e) => {
    let tabla = new DataTable('#tablaContratosEmpleados' , {
        "ajax":"jobs/json/tablaContratosEmpleados.ajax.php",
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
            {"className": "dt-center", "targets": [2]}, /**La columna de la fotografía */
            {"className": "dt-right", "targets": [3]}, /**La columna del documento del empleado */
            {"className": "dt-left", "targets": [4]}, /**La columna del Nombre del empleado */
            {"className": "dt-left", "targets": [5]}, /**La columna del código generado de contrato */
            {"className": "dt-right", "targets": [6]}, /**La columna del salario básico */
            {"className": "dt-right", "targets": [7]}, /**La columna de la cuenta de ahorros */
            {"className": "dt-right", "targets": [8]}, /**La columna del porcentaje de riesgo */
            {"className": "dt-left", "targets": [9]}, /**La columna del periodo de pago */
            {"className": "dt-left", "targets": [10]}, /**La columna del tipo de contratación */
            {"className": "dt-center", "targets": [11]}, /**La columna de la fecha de inicio de contratación */
            {"className": "dt-center", "targets": [12]}, /**La columna del cargo del empleado */
            {"className": "dt-center", "targets": [13]}, /**La columna del estado de contratación */
            {"className": "dt-left", "targets": [14]}, /**La columna de las anotaciones adicionales */
            {"className": "dt-left", "targets": [15]} /**La columna del registro y/o último movimiento de la tupla */
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