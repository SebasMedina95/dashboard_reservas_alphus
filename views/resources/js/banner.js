/*********************************************
************ DATA TABLE DE ADMINS ************
**********************************************/
$.ajax({

	"url":"jobs/json/tablaBanner.ajax.php",
	success: function(respuesta){
		
		//console.log("respuesta", respuesta);

	}

})

/*********************************************************************
********** CONFIGURACIONES PARA EL DATA TABLE DE EMPLEADOS ***********
**********************************************************************/
document.addEventListener('DOMContentLoaded' , (e) => {
    let tabla = new DataTable('#tablaBanner' , {
        "ajax":"jobs/json/tablaBanner.ajax.php",
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
            {"className": "dt-center", "targets": [0]}, /**La columna de indicador de tabla */
            {"className": "dt-center", "targets": [1]}, /**La columna de las imágenes ... */
            {"className": "dt-center", "targets": [2]}, /**La columna del estado del banner  */
            {"className": "dt-center", "targets": [3]}
        ], 
        "aLengthMenu": [[3, 10, 20, 40, 60, 100 , -1], [3, 10, 20, 40, 60, 100, "Todos"]], 
        "iDisplayLength" : 3,
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

/**********************************************************************
************* PREVISUALIZACIÓN DE IMÁGEN SUBIDA DE BANNER *************
***********************************************************************/
document.querySelector("#subirBanner").addEventListener('change' , (e) => {
    console.log("Cargamos una imágen ...");
    let imagen = document.querySelector("#subirBanner").files[0];
    let tamaImg = imagen["size"];
    let tipoImg = imagen["type"];
    let nameImg = imagen["name"];
    let rutaImgDefault = "../../views/img/banner/default/default.png";

    console.log("imagen" , imagen);
    console.log("tamaImg" , tamaImg);
    console.log("tipoImg" , tipoImg);
    console.log("nameImg" , nameImg);
    console.log("rutaImgDefault" , rutaImgDefault);

    /**Solo admitiremos imágenes JPG y PNG */
    if(tipoImg != "image/jpeg" && tipoImg != "image/png"){

        document.querySelector("input[name='subirBanner']").value = "";
        document.querySelector(".nombreImagenCargadaBannerAdd").innerHTML = "Sin subir una imágen válida ...";
        document.querySelector("#nombreImagenBanner").innerHTML = "Sin determinar";
        document.querySelector("#tamanoImagenBanner").innerHTML = "Sin determinar";
        document.querySelector("#extensImagenBanner").innerHTML = "Sin determinar";
        document.querySelector("#img-foto-banner").setAttribute('src' , rutaImgDefault);
  
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡ Solo imágenes JPG y PNG son permitidas !'
        })
            
    }else if(tamaImg > 2000000){ /**Equivalente a 2 Megas */

        document.querySelector("input[name='subirBanner']").value = "";
        document.querySelector(".nombreImagenCargadaBannerAdd").innerHTML = "Sin subir una imágen válida ...";
        document.querySelector("#nombreImagenBanner").innerHTML = "Sin determinar";
        document.querySelector("#tamanoImagenBanner").innerHTML = "Sin determinar";
        document.querySelector("#extensImagenBanner").innerHTML = "Sin determinar";
        document.querySelector("#img-foto-banner").setAttribute('src' , rutaImgDefault);
  
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
            document.querySelector("#img-foto-banner").setAttribute('src' , rutaImagen);
            document.querySelector(".nombreImagenCargadaBannerAdd").innerHTML = nameImg+tipoImg+"(Peso: "+tamaImg+")";
            document.querySelector("#nombreImagenBanner").innerHTML = nameImg;
            document.querySelector("#tamanoImagenBanner").innerHTML = tamaImg;
            document.querySelector("#extensImagenBanner").innerHTML = tipoImg;
        })

    }

})

/************************************************************** */
/**LO MISMO ANTERIOR DE IMÁGEN PERO PARA EL TEMA DEL ACTUALIZAR */
/************************************************************** */
document.querySelector("#editarFotoBanner").addEventListener('change' , (e) =>{
    let imagen = document.querySelector("#editarFotoBanner").files[0];
    let tamaImg = imagen["size"];
    let tipoImg = imagen["type"];
    let nameImg = imagen["name"];
    let rutaImgDefault = "../../views/img/banner/default/default.png";

    console.log("imagen: " , imagen);
    console.log("tamaImg: " , tamaImg);
    console.log("tipoImg: " , tipoImg);
    console.log("nameImg: " , nameImg);

    /**Solo admitiremos imágenes JPG y PNG */
    if(tipoImg != "image/jpeg" && tipoImg != "image/png"){

        document.querySelector("input[name='editarFotoBanner']").value = "";
        document.querySelector(".nombreImagenCargadaEdiBanner").innerHTML = "Sin subir una imágen válida ...";
        document.querySelector("#editarnNombreImagenBanner").innerHTML = "Sin determinar";
        document.querySelector("#editarTamanoImagenBanner").innerHTML = "Sin determinar";
        document.querySelector("#editarExtensImagenBanner").innerHTML = "Sin determinar";
        document.querySelector("#img-foto-edit-banner").setAttribute('src' , rutaImgDefault);
  
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡ Solo imágenes JPG y PNG son permitidas !'
        })

    }else if(tamaImg > 2000000){

        document.querySelector("input[name='editarFotoBanner']").value = "";
        document.querySelector(".nombreImagenCargadaEdiBanner").innerHTML = "Sin subir una imágen válida ...";
        document.querySelector("#editarnNombreImagenBanner").innerHTML = "Sin determinar";
        document.querySelector("#editarTamanoImagenBanner").innerHTML = "Sin determinar";
        document.querySelector("#editarExtensImagenBanner").innerHTML = "Sin determinar";
        document.querySelector("#img-foto-edit-banner").setAttribute('src' , rutaImgDefault);

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
            document.querySelector("#img-foto-edit-banner").setAttribute('src' , rutaImagen);
            document.querySelector(".nombreImagenCargadaEdiBanner").innerHTML = nameImg+tipoImg+"(Peso: "+tamaImg+")";
            document.querySelector("#editarnNombreImagenBanner").innerHTML = nameImg;
            document.querySelector("#editarTamanoImagenBanner").innerHTML = tamaImg;
            document.querySelector("#editarExtensImagenBanner").innerHTML = tipoImg;
        })
         

    }

})



/*************************************************************
************** VALIDAR OBLIGATORIEDAD DE CAMPOS **************
******** TODO ESTO SERÁ USANDO JQUERY, SIMILAR EN JS *********
******** Lo usaremos tanto para agregar como editar  *********
**************************************************************/
function validarFormularioBanner(form) {

    /**Capturamos si vamos a agregar, editar, eliminar, habilitar/inhabilitar */
    let formulario = form;
    /**Agregar */
    let banner = document.querySelector("#subirBanner").value;

    /**Editar */
    let editarBanner = document.querySelector("#editarFotoBanner").value;

    if(formulario == "adicionar"){
        console.log('Vamos a adicionar ...');
        /**Validamos cada uno - Tanto para agregar como actualizar ... */
        if (banner != "" && documento.length != null) {
            
            return true; /**Todos los campos están consistentes, no hay necesidad de validar vía PHP */

        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debe cargar una imagen en el selector correspondiente ...'
            });
            return false; /**Errores, no podemos enviar el formulario */
        }

    }else if(formulario == "editar"){
        console.log('Vamos a editar ...');

        if (editarBanner != "" && documento.length != null) {
            
            return true; /**Todos los campos están consistentes, no hay necesidad de validar vía PHP */

        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Si vas a actualizar el banner, debes seleccionar una nueva imagen ...'
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
async function editarBanner(id){

    try {
        
        console.log("Entrando a función editarBanner asíncrona ... Cargando Banner: ");
        /**Capturamos los parámetros que vienen del botón de archivo tablaCargos.ajax.php */
        let idBanner = id;
        let btnComplet = document.querySelector('#botonEditBanner'+id); /**Lo tengo personalizado para que cada Row sea dinámico */
        let imgDefault = "views/img/banner/default/default.png";

        console.log('idBanner ==> ' , idBanner);
        console.log('btnComplet ==> ' , btnComplet);
        console.log('imgDefault ==> ' , imgDefault);

        $('#spinnerCargaEditarBanner').modal('show'); // Abrir Modal por que todo está cargado - Para esta operación usamos JQuery ...
        document.querySelector("#spinnerCargaEditarBanner").classList.add("show");

        let respuesta = await fetch("jobs/banner.ajax.php?"+"idBanner="+idBanner);
        json1 = await respuesta.json();
        await waitforme(500);

        $('#spinnerCargaEditarBanner').removeClass('fade'); /**Remuevo class fade para que no cause corto con el modal editar */
        $('#spinnerCargaEditarBanner').modal('hide'); // Cerrar Modal por que todo está cargado - Para esta operación usamos JQuery ...

        document.querySelector('input[name="editarIdBanner"]').value = json1["id"];

        if(json1["img"] == ""){
            document.querySelector('input[name="imgFotoBannerActual"]').value = imgDefault; /**Input oculto con img temporal */
            document.querySelector('img[id="img-foto-edit-banner"]').setAttribute("src" , imgDefault); /**Input donde se carga previsualización */
            document.querySelector('input[name="editarFotoBanner"]').setAttribute("value" , imgDefault); /**Input en que se carga img */
        }else{
            console.log("Tenemos IMG en la BD ...");
            document.querySelector('input[name="imgFotoBannerActual"]').value = json1["img"]; /**Input oculto con img temporal */
            document.querySelector('img[id="img-foto-edit-banner"]').setAttribute("src" , json1["img"]); /**Input donde se carga previsualización */
            document.querySelector('input[name="editarFotoBanner"]').setAttribute("value" , json1["img"]); /**Input en que se carga img */
        }

        document.querySelector('span[id="editarnNombreImagenBanner"]').innerHTML = "Desde BD/Default";
        document.querySelector('span[id="editarTamanoImagenBanner"]').innerHTML = "Desde BD/Default";
        document.querySelector('span[id="editarExtensImagenBanner"]').innerHTML = "Desde BD/Default";
        document.querySelector(".nombreImagenCargadaEdiBanner").innerHTML = "Imágen viene desde la Base de Datos";

        console.log('json ==> ' , json1);

        /**Así no lo recomienda Bootstrap, pequeña excepción cono JQuery para abrir Modal Programáticamente. */
        $('#editarBanner').modal('show'); // Abrir Modal por que todo está cargado ...

    } catch (error) {
        console.log(error);
    }

}

/***********************************************
/************** ELIMINAR UN BANNER *************
/***********************************************/
async function eliminarBanner(id){

    try {
        
        let idBannerElim = id;
        let btnComplet = document.querySelector('#botonElimBanner'+id); /**Lo tengo personalizado para que cada Row sea dinámico */
        let rutaImg = btnComplet.getAttribute('rutaBanner');

        console.log("idBannerElim" , idBannerElim);
        console.log('btnComplet' , btnComplet);
        console.log('rutaImg' , rutaImg);

        $('#spinnerCargaEditarBanner').modal('show'); // Abrir Modal por que todo está cargado - Para esta operación usamos JQuery ...
        document.querySelector("#spinnerCargaEditarBanner").classList.add("show");

        let respuesta = await fetch("jobs/banner.ajax.php?"+"idBanner="+idBannerElim);
        json1 = await respuesta.json();
        await waitforme(500);

        $('#spinnerCargaEditarBanner').removeClass('fade'); /**Remuevo class fade para que no cause corto con el modal editar */
        $('#spinnerCargaEditarBanner').modal('hide'); // Cerrar Modal por que todo está cargado - Para esta operación usamos JQuery ...

        /**Preguntamos primero */
        Swal.fire({
            title: 'Eliminación de Banner',
            text: "¿Estás seguro de eliminar este Banner?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar banner!',
            cancelButtonText: 'Cancelar'
        }).then(function(result){

            /**Si es verdadero, presionó la tecla aceptar */
            if(result.value){

                /**Habilitamos/Inhabilitamos:
                 * Debemos independizar la operación para manejar mejor la promesa que será resuelta.*/
                realizarEliminacion(idBannerElim, rutaImg).then();

            } /**La persona selecciona que si desea eliminar */

        }) /**Estructura then del Sweet Alert */  

    } catch (error) {
        console.log(error);
    }

}

/**Realizar la eliminación como tal ... */
async function realizarEliminacion(idBannerElim, rutaImg){

    let respuesta = await fetch("jobs/banner.ajax.php?"+"idBannerElim="+idBannerElim+"&"+"rutaImg="+rutaImg);
    json = await respuesta.json();
    console.log("json " , json);

    if(json == "ok"){

        Swal.fire({
            icon: 'success',
            title: 'Eliminación de Empleado',
            text: 'El Empleado fue eliminado correctamente! ...'
        }).then(function(result){

            if(result.value || !result.value){

                window.location = "banner";

            } /**Si el resultado valida ok, logramos eliminar y redirecciono */

        }) /**Swal de que se elimino correctamente */

    } /**Si la respuesta que retornamos es Ok */

}

/*********************************************************
/************** ACTIVAR/DESACTIVAR UN BANNER *************
/*********************************************************/
async function gestionarEstBanner(id){

    try {
        
        /**Capturamos los parámetros que vienen del botón de archivo tablaEmpleados.ajax.php */
        let idBanner = id;
        let btnComplet = document.querySelector('#botonCamEsBanner'+id); /**Lo tengo personalizado para que cada Row sea dinámico */
        let estadoBanner = btnComplet.getAttribute('estadoBanner');

        console.log("idBanner" , idBanner);
        console.log('btnComplet' , btnComplet);
        console.log("estadoBanner" , estadoBanner);

        $('#spinnerCargaEditarBanner').modal('show'); // Abrir Modal por que todo está cargado - Para esta operación usamos JQuery ...
        document.querySelector("#spinnerCargaEditarBanner").classList.add("show");

        let respuesta = await fetch("jobs/banner.ajax.php?"+"idBanner="+idBanner);
        json1 = await respuesta.json();
        await waitforme(500);

        $('#spinnerCargaEditarBanner').removeClass('fade'); /**Remuevo class fade para que no cause corto con el modal editar */
        $('#spinnerCargaEditarBanner').modal('hide'); // Cerrar Modal por que todo está cargado - Para esta operación usamos JQuery ...

        let mensaje;

        if(estadoBanner == "1"){
            mensaje = "¿ Estás seguro de Activar el Banner ?"
        }else{
            mensaje = "¿ Estás seguro de Desactivar el Banner ?"
        }

        /**Preguntamos primero */
        Swal.fire({
            title: 'Gestión de Banner',
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
                habilitar_inhabilitar(idBanner , estadoBanner).then();

            } /**La persona selecciona que si desea eliminar */

        }) /**Estructura then del Sweet Alert */ 

    } catch (error) {
        console.log(error);
    }

}

async function habilitar_inhabilitar(idBanner , estadoBanner){

    let respuesta = await fetch("jobs/banner.ajax.php?"+"idBannerGest="+idBanner+"&"+"estadoBanner="+estadoBanner);
    json = await respuesta.json();
    console.log("json " , json);

    if(json == "ok"){

        if(estadoBanner == 0){

            const boton = document.querySelector('#botonCamEsBanner'+idBanner);
            boton.classList.remove('btn-info');
            boton.classList.add('btn-dark');
            boton.innerHTML = "Desactivado";
            boton.setAttribute('estadoBanner' , 1);

            Swal.fire({
                icon: 'info',
                title: 'Gestión de Estado',
                text: 'El Banner fue Desactivado ...'
            });

        }else{

            const boton = document.querySelector('#botonCamEsBanner'+idBanner);
            boton.classList.remove('btn-dark');
            boton.classList.add('btn-info');
            boton.innerHTML = "Activado";
            boton.setAttribute('estadoBanner' , 0);

            Swal.fire({
                icon: 'info',
                title: 'Gestión de Estado',
                text: 'El Banner fue Activado ...'
            });

        } /**Estado */

    } /**Si la respuesta que retornamos es Ok */

}