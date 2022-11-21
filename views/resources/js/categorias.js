/********************************************************
*************** DATA TABLE DE CATEGORÍAS ****************
****** Requerimos JQuery para cargar funcionalidad ******
*********************************************************/
$.ajax({

	"url":"jobs/json/tablaCategorias.ajax.php",
	success: function(respuesta){
		
		//console.log("respuesta", respuesta);

	}

})

/*********************************************************************
************ CONFIGURACIONES PARA EL DATA TABLE DE ADMINS ************
**********************************************************************/
document.addEventListener('DOMContentLoaded' , (e) => {
    let tabla = new DataTable('#tablaCategorias' , {
        "ajax":"jobs/json/tablaCategorias.ajax.php",
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
            {"className": "dt-center", "targets": [0]},  /**La columna de despliegue de mas columnas */
            {"className": "dt-center", "targets": [1]},  /**La columna de las opciones de eliminación/edición ... */
            {"className": "dt-center", "targets": [2]},  /**La columna de la imagen */
            {"className": "dt-center", "targets": [3]},    /**La columna de la ruta */
            {"className": "dt-center", "targets": [4]},  /**La columna del color */
            {"className": "dt-left", "targets": [5]},  /**La columna del tipo */
            {"className": "dt-center", "targets": [6]},  /**La columna del estado */
            {"className": "dt-left", "targets": [7]},  /**La columna de la descripción */
            {"className": "dt-right", "targets": [8]},  /**La columna de la caracteristicas */
            {"className": "dt-right", "targets": [9]},  /**La columna de continental alta */
            {"className": "dt-right", "targets": [10]},  /**La columna de continental baja */
            {"className": "dt-right", "targets": [11]}, /**La columna de americano alta */
            {"className": "dt-right", "targets": [12]}  /**La columna de americano baja */
        ], 
        "aLengthMenu": [[10, 10, 20, 40, 60, 100 , -1], [10, 10, 20, 40, 60, 100, "Todos"]], 
        "iDisplayLength" : 10,
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

/**************************************************************************************************
/******************** ACTIVAR/DESACTIVAR UNA CATEGORÍA DE HABITACIÓN ******************************
 ***************** Versión mixta, JS Puro y JQuery puntual para Ajax y Plugins ********************
/**************************************************************************************************/
async function gestionarEstCategoria(id){

    try {
        
        /**Capturamos los parámetros que vienen del botón de archivo tablaCargos.ajax.php */
        let idCategoria = id;
        let btnComplet = document.querySelector('#botonCamEsCategoria'+id); /**Lo tengo personalizado para que cada Row sea dinámico */
        let estadoCategoria = btnComplet.getAttribute('estadoCategoria');

        console.log("idCategoria" , idCategoria);
        console.log('btnComplet' , btnComplet);
        console.log("estadoCategoria" , estadoCategoria);

        $('#spinnerCargaEditarCategoria').modal('show'); // Abrir Modal por que todo está cargado - Para esta operación usamos JQuery ...
        document.querySelector("#spinnerCargaEditarCategoria").classList.add("show");

        let respuesta = await fetch("jobs/categorias.ajax.php?"+"idCategoria="+idCategoria);
        json1 = await respuesta.json();
        await waitforme(500);

        $('#spinnerCargaEditarCategoria').removeClass('fade'); /**Remuevo class fade para que no cause corto con el modal editar */
        $('#spinnerCargaEditarCategoria').modal('hide'); // Cerrar Modal por que todo está cargado - Para esta operación usamos JQuery ...

        if(estadoCategoria == "1"){
            mensaje = "¿Estás seguro de activar la cateogoría de habitación: " + json1["tipo"] + " - " + json1["descripcion"] + " ?"
        }else{
            mensaje = "¿Estás seguro de desactivar la cateogoría de habitación: " + json1["tipo"] + " - " + json1["descripcion"] + " ?"
        }

        Swal.fire({
            title: 'Gestión de Categorías de Habitación',
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
                habilitar_inhabilitar(idCategoria , estadoCategoria).then();

            } /**La persona selecciona que si desea eliminar */

        }) /**Estructura then del Sweet Alert */

    } catch (error) {
        console.log(error);
    }

}

async function habilitar_inhabilitar(idCategoria , estadoCategoria){

    let respuesta = await fetch("jobs/categorias.ajax.php?"+"idCategoriaGest="+idCategoria+"&"+"estadoCategoria="+estadoCategoria);
    json = await respuesta.json();
    console.log("json " , json);

    if(json == "ok"){

        if(estadoCategoria == 0){

            const boton = document.querySelector('#botonCamEsCategoria'+idCategoria);
            boton.classList.remove('btn-info');
            boton.classList.add('btn-dark');
            boton.innerHTML = "Oculto para Cliente";
            boton.setAttribute('estadoCategoria' , 1);

            Swal.fire({
                icon: 'info',
                title: 'Gestión de Categoría de Habitación',
                text: 'La Categoría de Habitación fue Desactivada ...'
            });

        }else{

            const boton = document.querySelector('#botonCamEsCategoria'+idCategoria);
            boton.classList.remove('btn-dark');
            boton.classList.add('btn-info');
            boton.innerHTML = "Visible para Cliente";
            boton.setAttribute('estadoCategoria' , 0);

            Swal.fire({
                icon: 'info',
                title: 'Gestión de Categoría de Habitación',
                text: 'La Categoría de Habitación fue Activada ...'
            });

        } /**Estado */

    } /**Si la respuesta que retornamos es Ok */

}



function waitforme(milisec) {
    return new Promise(resolve => {
        setTimeout(() => { resolve('') }, milisec);
    })
}