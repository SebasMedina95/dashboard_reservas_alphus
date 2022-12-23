/*********************************************
************ DATA TABLE DE ADMINS ************
**********************************************/
$.ajax({

	"url":"jobs/json/tablaPlanes.ajax.php",
	success: function(respuesta){
		
		//console.log("respuesta", respuesta);

	}

})

/*****************************************************************************
********** CONFIGURACIONES PARA EL DATA TABLE DE PLANES PARA HOTEL ***********
******************************************************************************/
document.addEventListener('DOMContentLoaded' , (e) => {
    let tabla = new DataTable('#tablaPlanes' , {
        "ajax":"jobs/json/tablaPlanes.ajax.php",
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
            {"className": "dt-center", "targets": [2]}, 
            {"className": "dt-center", "targets": [3]}, 
            {"className": "dt-center", "targets": [4]},
            {"className": "dt-left", "targets": [5]},
            {"className": "dt-right", "targets": [6]},
            {"className": "dt-right", "targets": [7]}

        ], 
        "aLengthMenu": [[6, 10, 20, 40, 60, 100 , -1], [6, 10, 20, 40, 60, 100, "Todos"]], 
        "iDisplayLength" : 6,
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

/**Validaciones ... */
document.querySelector("#tipoPlan").addEventListener('keypress' , (e) => { validador1_Planes(e); });
document.querySelector("#min_descripcion").addEventListener('keypress' , (e) => { validador3_Planes(e); })
document.querySelector("#precio_alta").addEventListener('keypress' , (e) => { validador2_Planes(e); });
document.querySelector("#precio_baja").addEventListener('keypress' , (e) => { validador2_Planes(e); });

/*****************************************************
************** APLICANDO MILES DE SALDO **************
******** MIENTRAS SE TECLEA EN PARALELO EL VALOR *****
/*****************************************************/
function formatSueldoBase(input){
    let num = input.value.replace(/\./g,'');
    if(!isNaN(num)){
        num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
        num = num.split('').reverse().join('').replace(/^[\.]/,'');
        input.value = num;
    }
    
    else{ alert('Solo se permiten numeros');
        input.value = input.value.replace(/[^\d\.]*/g,'');
    }
}


/**********************************************************************
************* PREVISUALIZACIÓN DE IMÁGEN SUBIDA DE PLANES *************
***********************************************************************/
document.querySelector("#fotoPlan").addEventListener('change' , (e) => {
    console.log("Cargamos una imágen ...");
    let imagen = document.querySelector("#fotoPlan").files[0];
    let tamaImg = imagen["size"];
    let tipoImg = imagen["type"];
    let nameImg = imagen["name"];
    let rutaImgDefault = "../../views/img/planes/default/default.png";

    console.log("imagen" , imagen);
    console.log("tamaImg" , tamaImg);
    console.log("tipoImg" , tipoImg);
    console.log("nameImg" , nameImg);
    console.log("rutaImgDefault" , rutaImgDefault);

    /**Solo admitiremos imágenes JPG y PNG */
    if(tipoImg != "image/jpeg" && tipoImg != "image/png"){

        document.querySelector("input[name='fotoPlan']").value = "";
        document.querySelector(".nombreImagenCargadaAddPlan").innerHTML = "Sin subir una imágen válida ...";
        document.querySelector("#nombreImagenPlanes").innerHTML = "Sin determinar";
        document.querySelector("#tamanoImagenPlanes").innerHTML = "Sin determinar";
        document.querySelector("#extensImagenPlanes").innerHTML = "Sin determinar";
        document.querySelector("#img-foto-planes").setAttribute('src' , rutaImgDefault);
  
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡ Solo imágenes JPG y PNG son permitidas !'
        })
            
    }else if(tamaImg > 2000000){ /**Equivalente a 2 Megas */

        document.querySelector("input[name='fotoPlan']").value = "";
        document.querySelector(".nombreImagenCargadaAddPlan").innerHTML = "Sin subir una imágen válida ...";
        document.querySelector("#nombreImagenPlanes").innerHTML = "Sin determinar";
        document.querySelector("#tamanoImagenPlanes").innerHTML = "Sin determinar";
        document.querySelector("#extensImagenPlanes").innerHTML = "Sin determinar";
        document.querySelector("#img-foto-planes").setAttribute('src' , rutaImgDefault);
  
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡ La imágen no puede pesar mas de 2MB !'
        })
  
    }else{
        console.log("----- PODEMOS CARGAR IMÁGEN -----");
        let datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        datosImagen.addEventListener('load' , (event) => {
            let rutaImagen = event.target.result;
            document.querySelector("#img-foto-planes").setAttribute('src' , rutaImagen);
            document.querySelector(".nombreImagenCargadaAddPlan").innerHTML = nameImg+tipoImg+"(Peso: "+tamaImg+")";
            document.querySelector("#nombreImagenPlanes").innerHTML = nameImg;
            document.querySelector("#tamanoImagenPlanes").innerHTML = tamaImg;
            document.querySelector("#extensImagenPlanes").innerHTML = tipoImg;
        })

    }

})

/************************************************************** */
/**LO MISMO ANTERIOR DE IMÁGEN PERO PARA EL TEMA DEL ACTUALIZAR */
/************************************************************** */
document.querySelector("#editarFotoPlan").addEventListener('change' , (e) =>{
    let imagen = document.querySelector("#editarFotoPlan").files[0];
    let tamaImg = imagen["size"];
    let tipoImg = imagen["type"];
    let nameImg = imagen["name"];
    let rutaImgDefault = "../../views/img/planes/default/default.png";

    console.log("imagen: " , imagen);
    console.log("tamaImg: " , tamaImg);
    console.log("tipoImg: " , tipoImg);
    console.log("nameImg: " , nameImg);

    /**Solo admitiremos imágenes JPG y PNG */
    if(tipoImg != "image/jpeg" && tipoImg != "image/png"){

        document.querySelector("input[name='editarFotoPlan']").value = "";
        document.querySelector(".nombreImagenCargadaEdiPlan").innerHTML = "Sin subir una imágen válida ...";
        document.querySelector("#editarnNombreImagenPlan").innerHTML = "Sin determinar";
        document.querySelector("#editarTamanoImagenPlan").innerHTML = "Sin determinar";
        document.querySelector("#editarExtensImagenPlan").innerHTML = "Sin determinar";
        document.querySelector("#img-foto-edit-plan").setAttribute('src' , rutaImgDefault);
  
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡ Solo imágenes JPG y PNG son permitidas !'
        })

    }else if(tamaImg > 2000000){

        document.querySelector("input[name='editarFotoPlan']").value = "";
        document.querySelector(".nombreImagenCargadaEdiPlan").innerHTML = "Sin subir una imágen válida ...";
        document.querySelector("#editarnNombreImagenPlan").innerHTML = "Sin determinar";
        document.querySelector("#editarTamanoImagenPlan").innerHTML = "Sin determinar";
        document.querySelector("#editarExtensImagenPlan").innerHTML = "Sin determinar";
        document.querySelector("#img-foto-edit-plan").setAttribute('src' , rutaImgDefault);

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡ La imágen no puede pesar mas de 2MB !'
        })

    }else{
        
        console.log("----- PODEMOS CARGAR IMÁGEN PARA EDICIÓN -----");
        let datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        datosImagen.addEventListener('load' , (event) => {
            let rutaImagen = event.target.result;
            document.querySelector("#img-foto-edit-plan").setAttribute('src' , rutaImagen);
            document.querySelector(".nombreImagenCargadaEdiPlan").innerHTML = nameImg+tipoImg+"(Peso: "+tamaImg+")";
            document.querySelector("#editarNombreImagenPlan").innerHTML = nameImg;
            document.querySelector("#editarTamanoImagenPlan").innerHTML = tamaImg;
            document.querySelector("#editarExtensImagenPlan").innerHTML = tipoImg;
        })
         

    }

})

/******************************************************************************
/******************** ACTIVAR/DESACTIVAR UN PLAN ******************************
 ****** Versión mixta, JS Puro y JQuery puntual para Ajax y Plugins ***********
/******************************************************************************/
async function gestionarEstPlanes(id) {

    try {
        /**Capturamos los parámetros que vienen del botón de archivo tablaCargos.ajax.php */
        let idPlanes = id;
        let btnComplet = document.querySelector('#botonCamEsPlanes'+id); /**Lo tengo personalizado para que cada Row sea dinámico */
        let estadoPlanes = btnComplet.getAttribute('estadoPlanes');

        console.log("idPlanes" , idPlanes);
        console.log('btnComplet' , btnComplet);
        console.log("estadoPlanes" , estadoPlanes);

        $('#spinnerCargaEditarPlanes').modal('show'); // Abrir Modal por que todo está cargado - Para esta operación usamos JQuery ...
        document.querySelector("#spinnerCargaEditarPlanes").classList.add("show");

        let respuesta = await fetch("jobs/planes.ajax.php?"+"idPlan="+idPlanes);
        json1 = await respuesta.json();
        await waitforme(500);

        $('#spinnerCargaEditarPlanes').removeClass('fade'); /**Remuevo class fade para que no cause corto con el modal editar */
        $('#spinnerCargaEditarPlanes').modal('hide'); // Cerrar Modal por que todo está cargado - Para esta operación usamos JQuery ...

        if(estadoPlanes == "1"){
            mensaje = "¿Estás seguro de activar al plan: " + json1["tipo"] + " ?"
        }else{
            mensaje = "¿Estás seguro de desactivar al plan: " + json1["tipo"] + " ?"
        }

        Swal.fire({
            title: 'Gestión de Planes para Clientes',
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
                habilitar_inhabilitar(idPlanes , estadoPlanes).then();

            } /**La persona selecciona que si desea eliminar */

        }) /**Estructura then del Sweet Alert */  

    } catch (error) {
        console.log(error);
    }

}

async function habilitar_inhabilitar(idPlanes , estadoPlanes){

    let respuesta = await fetch("jobs/planes.ajax.php?"+"idPlanGest="+idPlanes+"&"+"estadoPlan="+estadoPlanes);
    json = await respuesta.json();
    console.log("json " , json);

    if(json == "ok"){

        if(estadoPlanes == 0){

            const boton = document.querySelector('#botonCamEsPlanes'+idPlanes);
            boton.classList.remove('btn-info');
            boton.classList.add('btn-dark');
            boton.innerHTML = "Oculto para Cliente";
            boton.setAttribute('estadoPlanes' , 1);

            Swal.fire({
                icon: 'info',
                title: 'Gestión de Estado',
                text: 'El Plan fue Desactivado ...'
            });

        }else{

            const boton = document.querySelector('#botonCamEsPlanes'+idPlanes);
            boton.classList.remove('btn-dark');
            boton.classList.add('btn-info');
            boton.innerHTML = "Visible para Cliente";
            boton.setAttribute('estadoPlanes' , 0);

            Swal.fire({
                icon: 'info',
                title: 'Gestión de Estado',
                text: 'El Plan fue Activado ...'
            });

        } /**Estado */

    } /**Si la respuesta que retornamos es Ok */

}

/*************************************************************
************** VALIDAR OBLIGATORIEDAD DE CAMPOS **************
******** TODO ESTO SERÁ USANDO JQUERY, SIMILAR EN JS *********
******** Lo usaremos tanto para agregar como editar  *********
**************************************************************/
function validarFormularioPlan(form) {

    /**Capturamos si vamos a agregar, editar, eliminar, habilitar/inhabilitar */
    let formulario = form;
    /**Agregar */
    let tipoPlan = document.querySelector("#tipoPlan").value;
    let precio_alta = document.querySelector("#precio_alta").value;
    let precio_baja = document.querySelector("#precio_baja").value;
    let imagen = document.querySelector("#fotoPlan").value;
    let min_descripcion = document.querySelector("#min_descripcion").value;

    /**Editar */
    let editarTipoPlan = document.querySelector("#editarTipoPlan").value;
    let editarPrecio_alta = document.querySelector("#editarPrecio_alta").value;
    let editarPrecio_baja = document.querySelector("#editarPrecio_baja").value;
    let editarImagen = document.querySelector("#editarFotoPlan").value;
    let editarMin_descripcion = document.querySelector("#editarMin_descripcion").value;
    let imagenActualPlan = document.querySelector("input[name='imgFotoPlanActual']").value;

    if(formulario == "adicionar"){
        console.log('Vamos a adicionar ...');
        /**Validamos cada uno - Tanto para agregar como actualizar ... */
        if (tipoPlan != "" && tipoPlan.length >= 6) {
            if (precio_alta != "" && precio_alta.length >= 5){
                if (precio_baja != "" && precio_baja.length >= 5){
                    if (imagen != ""){
                        if (min_descripcion != ""){

                            return true; /**Todos los campos están consistentes, no hay necesidad de validar vía PHP */

                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Debe proporcionar una min descripción para el plan ...'
                            });
                            return false; /**Errores, no podemos enviar el formulario */
                        }
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Se requiere una imagen para el plan ...'
                        });
                        return false; /**Errores, no podemos enviar el formulario */
                    }
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'El precio para la temporada baja es requerida, además debe contener al menos 6 caracteres ...'
                    });
                    return false; /**Errores, no podemos enviar el formulario */
                }
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'El precio para la temporada alta es requerida, además debe contener al menos 6 caracteres ...'
                });
                return false; /**Errores, no podemos enviar el formulario */
            }
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El nombre para el plan es requerido, ademas contener al menos 6 caracteres ...'
            });
            return false; /**Errores, no podemos enviar el formulario */
        }

    }else if(formulario == "editar"){

        console.log('Vamos a editar ...');
        if (editarTipoPlan != "" && editarTipoPlan.length >= 6) {
            if (editarPrecio_alta != "" && editarPrecio_alta.length >= 5){
                if (editarPrecio_baja != "" && editarPrecio_baja.length >= 5){
                    // if ((editarImagen == "" && imagenActualPlan != "") || (editarImagen != "" && imagenActualPlan == "")){
                        if (editarMin_descripcion != ""){

                            return true; /**Todos los campos están consistentes, no hay necesidad de validar vía PHP */

                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Debe proporcionar una min descripción para el plan ...'
                            });
                            return false; /**Errores, no podemos enviar el formulario */
                        }
                    // }else{
                    //     Swal.fire({
                    //         icon: 'error',
                    //         title: 'Oops...',
                    //         text: 'Se requiere una imagen para el plan ...'
                    //     });
                    //     return false; /**Errores, no podemos enviar el formulario */
                    // }
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'El precio para la temporada baja es requerida, además debe contener al menos 6 caracteres ...'
                    });
                    return false; /**Errores, no podemos enviar el formulario */
                }
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'El precio para la temporada alta es requerida, además debe contener al menos 6 caracteres ...'
                });
                return false; /**Errores, no podemos enviar el formulario */
            }
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El nombre para el plan es requerido ...'
            });
            return false; /**Errores, no podemos enviar el formulario */
        }

    }else if(formulario == "eliminar"){

        console.log('Vamos a eliminar ...');

    }else{

        console.log('Vamos a habilitar/inhabilitar ...');

    }

}

/*************************************************************
/************** ACTUALIZACIÓN DE ADMINISTRADORES *************
/*************************************************************/
async function editarPlan(id){

    try {
        
        let idPlan = id;
        let btnComplet = document.querySelector('#botonEditPlanes'+id); /**Lo tengo personalizado para que cada Row sea dinámico */
        let imgDefault = "views/img/planes/default/default.png";

        console.log('idPlan ==> ' , idPlan);
        console.log('btnComplet ==> ' , btnComplet);
        console.log('imgDefault ==> ' , imgDefault);

        $('#spinnerCargaEditarPlanes').modal('show'); // Abrir Modal por que todo está cargado - Para esta operación usamos JQuery ...
        document.querySelector("#spinnerCargaEditarPlanes").classList.add("show");

        let respuesta = await fetch("jobs/planes.ajax.php?"+"idPlan="+idPlan);
        json1 = await respuesta.json();
        await waitforme(700);

        $('#spinnerCargaEditarPlanes').removeClass('fade'); /**Remuevo class fade para que no cause corto con el modal editar */
        $('#spinnerCargaEditarPlanes').modal('hide'); // Cerrar Modal por que todo está cargado - Para esta operación usamos JQuery ...

        const formatter = new Intl.NumberFormat('es-CO', {
            style: 'currency',
            currency: 'COP',
            minimumFractionDigits: 0
        })

        document.querySelector('input[name="editarIdPlan"]').value = json1["id"];

        document.querySelector('input[name="editarTipoPlan"]').value = json1["tipo"];
        // document.querySelector('input[name="editarPrecio_alta"]').value = formatter.format(json1["precio_alta"]);
        // document.querySelector('input[name="editarPrecio_baja"]').value = formatter.format(json1["precio_baja"]);
        document.querySelector('input[name="editarPrecio_alta"]').value = json1["precio_alta"];
        document.querySelector('input[name="editarPrecio_baja"]').value = json1["precio_baja"];
        document.querySelector('textarea[name="editarMin_descripcion"]').innerHTML = json1["min_descripcion"];

        document.querySelector('span[id="editarNombreImagenPlan"]').innerHTML = "Desde BD/Default";
        document.querySelector('span[id="editarTamanoImagenPlan"]').innerHTML = "Desde BD/Default";
        document.querySelector('span[id="editarExtensImagenPlan"]').innerHTML = "Desde BD/Default";
        document.querySelector(".nombreImagenCargadaEdiPlan").innerHTML = "Imágen viene desde la Base de Datos";

        if(json1["img"] == ""){
            document.querySelector('input[name="imgFotoPlanActual"]').value = imgDefault; /**Input oculto con img temporal */
            document.querySelector('img[id="img-foto-edit-plan"]').setAttribute("src" , imgDefault); /**Input donde se carga previsualización */
            document.querySelector('input[name="editarFotoPlan"]').setAttribute("value" , imgDefault); /**Input en que se carga img */
        }else{
            console.log("Tenemos IMG en la BD ...");
            document.querySelector('input[name="imgFotoPlanActual"]').value = json1["img"]; /**Input oculto con img temporal */
            document.querySelector('img[id="img-foto-edit-plan"]').setAttribute("src" , json1["img"]); /**Input donde se carga previsualización */
            document.querySelector('input[name="editarFotoPlan"]').setAttribute("value" , json1["img"]); /**Input en que se carga img */
        }

        console.log('json ==> ' , json1);

        /**Así no lo recomienda Bootstrap, pequeña excepción cono JQuery para abrir Modal Programáticamente. */
        $('#editarPlan').modal('show'); // Abrir Modal por que todo está cargado ...

    } catch (error) {
        console.log(error);
    }

}

/***********************************************
/************** ELIMINAR UN BANNER *************
/***********************************************/
async function eliminarPlan(id){

    try {

        let idPlanElim = id;
        let btnComplet = document.querySelector('#botonElimPlan'+id); /**Lo tengo personalizado para que cada Row sea dinámico */
        let rutaImg = btnComplet.getAttribute('rutaPlan');

        console.log("idPlanElim" , idPlanElim);
        console.log('btnComplet' , btnComplet);
        console.log('rutaImg' , rutaImg);

        $('#spinnerCargaEditarPlanes').modal('show'); // Abrir Modal por que todo está cargado - Para esta operación usamos JQuery ...
        document.querySelector("#spinnerCargaEditarPlanes").classList.add("show");

        let respuesta = await fetch("jobs/planes.ajax.php?"+"idPlan="+idPlanElim);
        json1 = await respuesta.json();
        await waitforme(500);

        $('#spinnerCargaEditarPlanes').removeClass('fade'); /**Remuevo class fade para que no cause corto con el modal editar */
        $('#spinnerCargaEditarPlanes').modal('hide'); // Cerrar Modal por que todo está cargado - Para esta operación usamos JQuery ...

        let mensaje = "¿Estás seguro de eliminar el plan " + json1["tipo"] + "?";

        /**Preguntamos primero */
        Swal.fire({
            title: 'Eliminación de Plan',
            text: mensaje,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar el plan!',
            cancelButtonText: 'Cancelar'
        }).then(function(result){

            /**Si es verdadero, presionó la tecla aceptar */
            if(result.value){

                /**Habilitamos/Inhabilitamos:
                 * Debemos independizar la operación para manejar mejor la promesa que será resuelta.*/
                realizarEliminacion(idPlanElim, rutaImg).then();

            } /**La persona selecciona que si desea eliminar */

        }) /**Estructura then del Sweet Alert */  

    } catch (error) {
        console.log(error);
    }

}

/**Realizar la eliminación como tal ... */
async function realizarEliminacion(idPlanElim, rutaImg){

    let respuesta = await fetch("jobs/planes.ajax.php?"+"idPlanElim="+idPlanElim+"&"+"rutaImg="+rutaImg);
    json = await respuesta.json();
    console.log("json " , json);

    if(json == "ok"){

        Swal.fire({
            icon: 'success',
            title: 'Eliminación de Plan',
            text: 'El Plan fue eliminado correctamente! ...'
        }).then(function(result){

            if(result.value || !result.value){

                window.location = "planes";

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
let validador1_Planes = (e) => {
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
       (keynum == 32)  || (keynum == 34)  ||                                        /**Espacio - " */
       (keynum == 40)  || (keynum == 41) ||                                         /** () */
       (keynum == 161)  || (keynum == 33)){                                                             

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
let validador2_Planes = (e) => {
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

/**Validador3 = Validamos permitir caracteres de la a - z - áéíóú
 *              Validamos permitir caracteres de la A - Z - ÁÉÍÓÚ
 *              Validamos permitir caracteres de ñ - Ñ
 *              Validamos los espacios en blanco
 *              Validamos los números del 0 al 9
 *              Validamos caracteres tales como - . , _ */
/*************** *********************************** ****************/
let validador3_Planes = (e) => {
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
       (keynum == 32)  || (keynum == 45)  || (keynum == 44) || (keynum == 95) || (keynum == 46) || /**Espacio, -, , _ , .*/
       (keynum >= 48 && keynum <= 57) || (keynum == 32)  || (keynum == 34)  ||         /**Espacio - " */
       (keynum == 40)  || (keynum == 41) || (keynum == 44)  || (keynum == 46) ||    /** (),. */
       (keynum == 161)  || (keynum == 33) || (keynum == 45)  || (keynum == 95)){    /**Números 0-9, -_*/                                                   

        return true;

    }else{

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Este campo no permite el ingreso de caracteres especiales, solo ,_-. ... (Se permiten vocales tildadas) ...'
        });
        return false;

    }
}
