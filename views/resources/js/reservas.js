/*********************************************
************ DATA TABLE DE ADMINS ************
**********************************************/
$.ajax({

	"url":"jobs/json/tablaReservas.ajax.php",
	success: function(respuesta){
		
		//console.log("respuesta", respuesta);

	}

})

/*********************************************************************
********** CONFIGURACIONES PARA EL DATA TABLE DE EMPLEADOS ***********
**********************************************************************/
document.addEventListener('DOMContentLoaded' , (e) => {
    let tabla = new DataTable('#tablaReservas' , {
        "ajax":"jobs/json/tablaReservas.ajax.php",
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
            {"className": "dt-right", "targets": [4]},
            {"className": "dt-left", "targets": [5]},
            {"className": "dt-center", "targets": [6]},
            {"className": "dt-center", "targets": [7]},
            {"className": "dt-center", "targets": [8]}, 
            {"className": "dt-left", "targets": [9]},  
            {"className": "dt-center", "targets": [10]}  
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

/*=============================================================
***** FECHAS RESERVA - Reseteo usando JQuery por librería *****
===============================================================*/

$('.datepicker.entrada').datepicker({
    startDate: '0d',
    datesDisabled: '0d',
    format: 'yyyy-mm-dd',
    todayHighlight:true
});

/*======================================
************ EDITAR RESERVA ************
=======================================*/
async function editarReserva(id){

    try {
        
        // console.log("Entrando a función editarAdministrador asíncrona ... Cargando Empleado: ");
        /**Capturamos los parámetros que vienen del botón de archivo tablaCargos.ajax.php */
        let idReserva = id;
        let btnComplet = document.querySelector('#botonEditReservas'+id); /**Lo tengo personalizado para que cada Row sea dinámico */
        let imgDefault = "views/img/defaultCategorias/default.png";

        // console.log('btnComplet ==> ' , btnComplet);
        // console.log('imgDefault ==> ' , imgDefault);

        $('#spinnerCargaEditarReserva').modal('show'); // Abrir Modal por que todo está cargado - Para esta operación usamos JQuery ...
        document.querySelector("#spinnerCargaEditarReserva").classList.add("show");

        //Me traere la información detallada de la reserva, con usuario, habitación y categoría
        let respuesta = await fetch("jobs/reservas.ajax.php?"+"idReserva="+idReserva);
        json = await respuesta.json();
        await waitforme(1200);

        let descripcion = btnComplet.getAttribute('descripcion');
        let nombreUsuario = btnComplet.getAttribute('nombreUsuario');
        let idHabitacion = btnComplet.getAttribute('idhabitacion');
        let fechaIngreso = btnComplet.getAttribute('fechaingreso');
        let fechaSalida = btnComplet.getAttribute('fechasalida');
        let diasReserva = btnComplet.getAttribute('diasReserva');

        //Lo haremos desde acá ya que, cada vez que se abra el HTML requerimos que se cargue las fechas que son.
        document.querySelector('.agregarCalendario').innerHTML =  '<div id="calendar"></div>';
        //Para activar el fullCalendar, lo haremos mejor por JQuery.
        //$('#calendar').fullCalendar();

        // console.log('idReserva ==> ' , idReserva);
        // console.log('descripcion ==>' , descripcion);
        // console.log('nombreUsuario ==>' , nombreUsuario);
        // console.log('idHabitacion ==>' , idHabitacion);
        // console.log('fechaIngreso ==>' , fechaIngreso);
        // console.log('fechaSalida ==>' , fechaSalida);
        // console.log('diasReserva ==>' , diasReserva);

        // console.warn(json);

        //Para el formato de moneda
        const formatter = new Intl.NumberFormat('es-CO', {
            style: 'currency',
            currency: 'COP',
            minimumFractionDigits: 0
        })

        document.querySelector('input[name="codigoReserva"]').value = json["codigo_reserva"];
        document.querySelector('input[name="nombreReservador"]').value = json["nombre"];
        document.querySelector('input[name="valorReserva"]').value = formatter.format(json["pago_reserva"]);
        document.querySelector('input[name="medioPagoReserva"]').value = json["pasarela_pago"];
        document.querySelector('input[name="diasPagosReserva"]').value = json["dias"] + ' ' + 'días';
        document.querySelector('textarea[name="descripcionReserva"]').innerHTML = json["descripcion_reserva"];

        // Agregar las fechas de reserva al formulario, por ser librería mejor trabajemos con JQuery
        $(".datepicker.entrada").val(fechaIngreso);
        $(".datepicker.salida").val(fechaSalida);

        //Agregamos a la clase verDisponibilidad a su atributo idHabitacion el valor del id la habitación
        document.querySelector('.verDisponibilidad').setAttribute('idHabitacion' , idHabitacion);

        //Agregamos ahora al botón con la clase guardarNuevaReserva a su atributo la información requerida
        document.querySelector('.guardarNuevaReserva').setAttribute('fechaIngreso' , fechaIngreso);
        document.querySelector('.guardarNuevaReserva').setAttribute('fechaSalida' , fechaSalida);
        document.querySelector('.guardarNuevaReserva').setAttribute('idReserva' , idReserva);

        /***************************************************************** */
        /***************************************************************** */
        //Vamos a pintar la reserva, así como lo hicimos en el Cliente, aplicamos JQuery para la librería
        let json2;
        let totalEventos = [];
        let respuesta2 = await fetch("jobs/reservas.ajax.php?"+"idHabitacion="+idHabitacion);
        json2 = await respuesta2.json();
        await waitforme(1200);

        // console.log('json2: ' , json2);

        /***************************************************************** */
        //Realizamos el pintado en el calendario
        /***************************************************************** */
        for(var i = 0; i < json2.length; i++){

            if(fechaIngreso != json2[i]["fecha_ingreso"]){

                // Agregamos las fechas que ya están reservadas de esa habitación
                totalEventos.push(

                    {
                      "start": json2[i]["fecha_ingreso"],
                      "end": json2[i]["fecha_salida"],
                      "rendering": 'background',
                      "color": '#847059'
                    }

                )

            }

        }

        // Agregamos las fechas de la reserva
        totalEventos.push(
           {
               "start": fechaIngreso,
               "end": fechaSalida,
               "rendering": 'background',
               "color": '#FFCC29'
           }
        )
    
        /*=============================================
          CALENDARIO
          =============================================*/

        $('#calendar').fullCalendar({

            defaultDate:fechaIngreso,
            header: {
                left: 'prev',
                center: 'title',
                right: 'next'
            },
            events:totalEventos

        });
        /***************************************************************** */
        /***************************************************************** */
        /***************************************************************** */

        /*========================================================
        Agregar la misma cantidad de días para la fecha de salida
        ========================================================*/
        //Aplicamos este fragmento parcialmente con JQuery por el tema de la librería
        $('.datepicker.entrada').change(function(){

            let fechaEntrada = new Date($(this).val()); //Recordemos que this nos toma el elemento JQuery asociado
            fechaEntrada.setDate(fechaEntrada.getDate() + Number(diasReserva)+1);
            // fechaEntrada.setDate(fechaEntrada.getDate() + Number(diasReserva));

            mes = ("0"+Number(fechaEntrada.getMonth()+1)).slice(-2); //En caso de que nos sobre según el día seleccionado y el 0 para los días del 1 al 9
	 	    dia = ("0"+fechaEntrada.getDate()).slice(-2); //En caso de que nos sobre según el día seleccionado y el 0 para los días del 1 al 9

             $('.datepicker.salida').val(fechaEntrada.getFullYear()+"-"+mes+"-"+dia);

        })

        $('#spinnerCargaEditarReserva').removeClass('fade'); /**Remuevo class fade para que no cause corto con el modal editar */
        $('#spinnerCargaEditarReserva').modal('hide'); // Cerrar Modal por que todo está cargado - Para esta operación usamos JQuery ...

        /**Así no lo recomienda Bootstrap, pequeña excepción cono JQuery para abrir Modal Programáticamente. */
        $('#editarReserva').modal('show'); // Abrir Modal por que todo está cargado ...

    } catch (error) {
        console.log(error);
    }

}

/***********************************************
******* VER DISPONIBILIDAD NUEVA RESERVA *******
************************************************/
async function verDisponibilidad(){

    let fechaIngreso = $(".datepicker.entrada").val(); //Por tema de la librería
  	let fechaSalida = $(".datepicker.salida").val(); //Por tema de la librería
  	let idHabitacion = document.querySelector('.verDisponibilidad').getAttribute('idHabitacion');

    console.log('fechaIngreso' , fechaIngreso);
    console.log('fechaSalida' , fechaSalida);
    console.log('idHabitacion' , idHabitacion);

    //Reinicio el calendario para pintar las nuevas fechas
    document.querySelector('.agregarCalendario').innerHTML =  '<div id="calendar"></div>';

    //Variables que usaremos para validar la trazabilidad de las fechas ...
    let totalEventos = [];
  	let opcion1 = [];
  	let opcion2 = [];
  	let opcion3 = [];
  	let validarDisponibilidad = false;

    let jsonX;
    let respuestaX = await fetch("jobs/reservas.ajax.php?"+"idHabitacion="+idHabitacion);
    jsonX = await respuestaX.json();
    await waitforme(1200);

    for(var i = 0; i < jsonX.length; i++){

        /* VALIDAR CRUCE DE FECHAS OPCIÓN 1 */         
        if(fechaIngreso == jsonX[i]["fecha_ingreso"]){
            opcion1[i] = false;            
        }else{
            opcion1[i] = true;
        }

        /* VALIDAR CRUCE DE FECHAS OPCIÓN 2 */         
        if(fechaIngreso > jsonX[i]["fecha_ingreso"] && fechaIngreso < jsonX[i]["fecha_salida"]){
            opcion2[i] = false;            
        }else{
            opcion2[i] = true;
        }

        /* VALIDAR CRUCE DE FECHAS OPCIÓN 3 */         
        if(fechaIngreso < jsonX[i]["fecha_ingreso"] && fechaSalida > jsonX[i]["fecha_ingreso"]){
            opcion3[i] = false;            
        }else{
            opcion3[i] = true;
        }

        /* VALIDAR DISPONIBILIDAD */    
        if(opcion1[i] == false || opcion2[i] == false || opcion3[i] == false){
            validarDisponibilidad = false; 
        }else{
            validarDisponibilidad = true;     
        }

        /* REALIZAMOS EL PINTADO EN EL CALENDARIO DE LAS NUEVAS FECHAS! */
        if(!validarDisponibilidad){

            totalEventos.push(
                {
                    "start": jsonX[i]["fecha_ingreso"],
                    "end": jsonX[i]["fecha_salida"],
                    "rendering": 'background',
                    "color": '#847059'
                }
            )

            document.querySelector('.infoDisponibilidad').innerHTML = '<h5 class="pb-5 float-left alert alert-danger">¡Lo sentimos, no hay disponibilidad para esa fecha!<br><br><strong>¡Vuelve a intentarlo!</strong></h5>'
            document.querySelector('.guardarNuevaReserva').setAttribute('fechaIngreso' , ''); //Si no hay disponibilidad
            document.querySelector('.guardarNuevaReserva').setAttribute('fechaSalida' , ''); //Si no hay disponibilidad

            break;

        }else{

            totalEventos.push(
                {
                    "start": jsonX[i]["fecha_ingreso"],
                    "end": jsonX[i]["fecha_salida"],
                    "rendering": 'background',
                    "color": '#847059'
                }

            )

            document.querySelector('.infoDisponibilidad').innerHTML = '<h5 class="pb-5 float-left alert alert-success">¡El nuevo rango de fechas se encuentra disponible para realizar la actualización!<br><br><strong>¡Puede proceder a guardar las fechas!</strong></h5>'
            document.querySelector('.guardarNuevaReserva').setAttribute('fechaIngreso' , fechaIngreso);
            document.querySelector('.guardarNuevaReserva').setAttribute('fechaSalida' , fechaSalida); 

        }

    } /* Cerramos el ciclo FOR */

    if(validarDisponibilidad){

        totalEventos.push(
           {
              "start": fechaIngreso,
              "end": fechaSalida,
              "rendering": 'background',
              "color": '#9AFF29'
            }
        )

    }

    $('#calendar').fullCalendar({
        defaultDate:fechaIngreso,
        header: {
            left: 'prev',
            center: 'title',
            right: 'next'
        },
        events:totalEventos

    });

}

/****************************************************************
********** GUARDAR LA RESERVA EN MODALIDAD ACTUALIZADA **********
*****************************************************************/
async function guardarNuevaReserva(){
 
    let fechaIngreso = document.querySelector('.guardarNuevaReserva').getAttribute('fechaIngreso');
  	let fechaSalida = document.querySelector('.guardarNuevaReserva').getAttribute('fechaSalida');
  	let idReserva = document.querySelector('.guardarNuevaReserva').getAttribute('idReserva');

    // console.log(fechaIngreso);
    // console.log(fechaSalida);
    // console.log(idReserva);

    if(fechaIngreso == "" || fechaSalida == ""){

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Debe seleccionar fechas de ingreso y salida válidas!'
        })

        return;

    }

    let jsonY;
    let respuestaY = await fetch("jobs/reservas.ajax.php?"+"idRes="+idReserva+"&fechaIngreso="+fechaIngreso+"&fechaSalida="+fechaSalida);
    jsonY = await respuestaY.json();
    await waitforme(1200);

    if(jsonY == "ok"){

        Swal.fire({
            icon: 'success',
            title: 'Fechas de Reserva',
            text: 'Se Actualizaron las fechas de Reserva Correctamente! ...'
        }).then(function(result){

            if(result.value || !result.value){

                window.location = "reservas";

            } /**Si el resultado valida ok, logramos eliminar y redirecciono */

        }) /**Swal de que se elimino correctamente */

    } /**Si la respuesta que retornamos es Ok */

}

/**********************************************
************* CANCELAR LA RESERVA *************
***********************************************/
async function eliminarReserva(id){

    let idReserva = id;

    console.log(idReserva);

    /**Preguntamos primero */
    Swal.fire({
        title: 'Cancelación de la Reserva',
        text: '¿Realmente está seguro de cancelar la reserva?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, cancelar la reserva!',
        cancelButtonText: 'Cancelar'
    }).then(function(result){

        /**Si es verdadero, presionó la tecla aceptar */
        if(result.value){

            /**Habilitamos/Inhabilitamos:
             * Debemos independizar la operación para manejar mejor la promesa que será resuelta.*/
            realizarCancelacion(idReserva).then();     

        } /**La persona selecciona que si desea cancelar */

    }) /**Estructura then del Sweet Alert */  

}

/**Realizar la eliminación como tal ... */
async function realizarCancelacion(id){

    let idReserva = id;
    let fechaIngreso = null;
    let fechaSalida = null;

    let respuesta = await fetch("jobs/reservas.ajax.php?"+"idRes="+idReserva+"&fechaIngreso="+fechaIngreso+"&fechaSalida="+fechaSalida);
    json = await respuesta.json();
    console.log("json " , json);

    if(json == "ok"){

        Swal.fire({
            icon: 'success',
            title: 'Cancelación de Reserva',
            text: 'La Reserva fue cancelada correctamente! ...'
        }).then(function(result){

            if(result.value || !result.value){

                window.location = "reservas";

            } /**Si el resultado valida ok, logramos cancelar y redirecciono */

        }) /**Swal de que se elimino correctamente */

    } /**Si la respuesta que retornamos es Ok */

}
