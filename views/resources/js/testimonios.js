/*********************************************
************ DATA TABLE DE ADMINS ************
**********************************************/
$.ajax({

	"url":"jobs/json/tablaTestimonios.ajax.php",
	success: function(respuesta){
		
		// console.log("respuesta", respuesta);

	}

})

/*********************************************************************
********** CONFIGURACIONES PARA EL DATA TABLE DE EMPLEADOS ***********
**********************************************************************/
document.addEventListener('DOMContentLoaded' , (e) => {
    let tabla = new DataTable('#tablaTestimonios' , {
        "ajax":"jobs/json/tablaTestimonios.ajax.php",
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

            "sProcessing":     "Procesando para Mostrar Información ...",
            "sLengthMenu":     "<i class='fa-solid fa-eye'></i> Visualizar _MENU_ Registros al Tiempo.",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando Información del _START_ al _END_ Registro.",
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
            {"className": "dt-left", "targets": [2]},
            {"className": "dt-left", "targets": [3]}, 
            {"className": "dt-left", "targets": [4]},
            {"className": "dt-left", "targets": [5]},
            {"className": "dt-center", "targets": [6]}  
        ], 
        "aLengthMenu": [[10, 20, 40, 60, 100 , -1], [10, 20, 40, 60, 100, "Todos"]], 
        "iDisplayLength" : 10,
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

// document.addEventListener('DOMContentLoaded', () => {
//     let boton = document.querySelector('.btnAprobar');
//     console.log(boton);

//     boton?.addEventListener('click', () => {

//         let idTestimonio = document.querySelector('.btnAprobar').getAttribute('idTestimonio');
//         let estado = document.querySelector('.btnAprobar').getAttribute('estadoTestimonio');

//         console.log('idTestimonio' , idTestimonio);
//         console.log('estado' , estado);

//     });
// });

async function cambiarEstado(id , estado){

    console.log('idTestimonio' , id);
    console.log('estado' , estado);

    let respuesta = await fetch("jobs/testimonios.ajax.php?"+"idTestimonio="+id+"&estadoTestimonio="+estado);
    json = await respuesta.json();
    //await waitforme(500);

    console.log(json);

    if(json == "ok"){
        
        if(estado == 0){

            const boton = document.querySelector('#botonCamEstTestimonios'+id);
            boton.classList.remove('btn-info');
            boton.classList.add('btn-dark');
            boton.innerHTML = "Aprobar";
            boton.setAttribute('estadoTestimonio' , 1);

            Swal.fire({
                icon: 'info',
                title: 'Gestión de Estado',
                text: 'El Testimonio fue Desaprobado ...'
            }).then(function(result){

            if(result.value || !result.value){

                window.location = "testimonios";

            } /**Si el resultado valida ok, logramos cambiar estado y redirecciono */

        }) /**Swal de que se elimino correctamente */;

        }else{

            const boton = document.querySelector('#botonCamEstTestimonios'+id);
            boton.classList.remove('btn-dark');
            boton.classList.add('btn-info');
            boton.innerHTML = "Aprobado";
            boton.setAttribute('estadoTestimonio' , 0);

            Swal.fire({
                icon: 'info',
                title: 'Gestión de Estado',
                text: 'El Testimonio fue Aprobado ...'
            }).then(function(result){

            if(result.value || !result.value){

                window.location = "testimonios";

            } /**Si el resultado valida ok, logramos cambiar estado y redirecciono */

        }) /**Swal de que se elimino correctamente */;

        } /**Estado */

    } /**Si la respuesta que retornamos es Ok */

}