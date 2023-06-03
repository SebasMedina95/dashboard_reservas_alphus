/*********************************************
************ DATA TABLE DE ADMINS ************
**********************************************/
$.ajax({

	"url":"jobs/json/tablaAtracciones.ajax.php",
	success: function(respuesta){
		
		// console.log("respuesta", respuesta);

	}

})

/*********************************************************************
********** CONFIGURACIONES PARA EL DATA TABLE DE EMPLEADOS ***********
**********************************************************************/
document.addEventListener('DOMContentLoaded' , (e) => {
    let tabla = new DataTable('#tablaAtracciones' , {
        "ajax":"jobs/json/tablaAtracciones.ajax.php",
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
            {"className": "dt-center", "targets": [3]}, 
            {"className": "dt-center", "targets": [4]},
            {"className": "dt-center", "targets": [5]},
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

/***********************************************************************************
************* PREVISUALIZACIÓN DE IMÁGEN SUBIDA DE RECORRIDO - PEQUEÑA *************
************************************************************************************/
document.querySelector("#fotoPeqAtraccion").addEventListener('change' , (e) => {
    console.log("Cargamos una imágen ...");
    let imagen = document.querySelector("#fotoPeqAtraccion").files[0];
    let tamaImg = imagen["size"];
    let tipoImg = imagen["type"];
    let nameImg = imagen["name"];
    let rutaImgDefault = "views/img/recorrido/default/default.png";
    

    console.log("imagen" , imagen);
    console.log("tamaImg" , tamaImg);
    console.log("tipoImg" , tipoImg);
    console.log("nameImg" , nameImg);
    console.log("rutaImgDefault" , rutaImgDefault);

    /**Solo admitiremos imágenes JPG y PNG */
    if(tipoImg != "image/jpeg" && tipoImg != "image/png"){

        document.querySelector("input[name='fotoPeqAtraccion']").value = "";
        document.querySelector(".nombreImagenPeqCargadaAdd").innerHTML = "Sin subir una imágen válida ...";
        document.querySelector("#nombreImagenAtraccionPeq").innerHTML = "Sin determinar";
        document.querySelector("#tamanoImagenAtraccionPeq").innerHTML = "Sin determinar";
        document.querySelector("#extensImagenAtraccionPeq").innerHTML = "Sin determinar";
        document.querySelector("#img-foto-peq").setAttribute('src' , rutaImgDefault);
  
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡ Solo imágenes JPG y PNG son permitidas !'
        })
            
    }else if(tamaImg > 2000000){ /**Equivalente a 2 Megas */

        document.querySelector("input[name='fotoPeqAtraccion']").value = "";
        document.querySelector(".nombreImagenPeqCargadaAdd").innerHTML = "Sin subir una imágen válida ...";
        document.querySelector("#nombreImagenAtraccionPeq").innerHTML = "Sin determinar";
        document.querySelector("#tamanoImagenAtraccionPeq").innerHTML = "Sin determinar";
        document.querySelector("#extensImagenAtraccionPeq").innerHTML = "Sin determinar";
        document.querySelector("#img-foto-peq").setAttribute('src' , rutaImgDefault);
  
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡ La imágen no puede pesar mas de 2MB !'
        })
  
    }else{
        console.log("----- PODEMOS CARGAR IMÁGEN PEQUEÑA -----");
        let datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        datosImagen.addEventListener('load' , (event) => {
            let rutaImagen = event.target.result;
            document.querySelector("#img-foto-peq").setAttribute('src' , rutaImagen);
            document.querySelector(".nombreImagenPeqCargadaAdd").innerHTML = nameImg+tipoImg+"(Peso: "+tamaImg+")";
            document.querySelector("#nombreImagenAtraccionPeq").innerHTML = nameImg;
            document.querySelector("#tamanoImagenAtraccionPeq").innerHTML = tamaImg;
            document.querySelector("#extensImagenAtraccionPeq").innerHTML = tipoImg;
        })

    }

})


/**********************************************************************************
************* PREVISUALIZACIÓN DE IMÁGEN SUBIDA DE RECORRIDO - GRANDE *************
***********************************************************************************/
document.querySelector("#fotoGraAtraccion").addEventListener('change' , (e) => {
    console.log("Cargamos una imágen ...");
    let imagen = document.querySelector("#fotoGraAtraccion").files[0];
    let tamaImg = imagen["size"];
    let tipoImg = imagen["type"];
    let nameImg = imagen["name"];
    let rutaImgDefault = "views/img/recorrido/default/default.png";
    

    console.log("imagen" , imagen);
    console.log("tamaImg" , tamaImg);
    console.log("tipoImg" , tipoImg);
    console.log("nameImg" , nameImg);
    console.log("rutaImgDefault" , rutaImgDefault);

    /**Solo admitiremos imágenes JPG y PNG */
    if(tipoImg != "image/jpeg" && tipoImg != "image/png"){

        document.querySelector("input[name='fotoGraAtraccion']").value = "";
        document.querySelector(".nombreImagenGraCargadaAdd").innerHTML = "Sin subir una imágen válida ...";
        document.querySelector("#nombreImagenAtraccionGra").innerHTML = "Sin determinar";
        document.querySelector("#tamanoImagenAtraccionGra").innerHTML = "Sin determinar";
        document.querySelector("#extensImagenAtraccionGra").innerHTML = "Sin determinar";
        document.querySelector("#img-foto-gra").setAttribute('src' , rutaImgDefault);
  
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡ Solo imágenes JPG y PNG son permitidas !'
        })
            
    }else if(tamaImg > 2000000){ /**Equivalente a 2 Megas */

        document.querySelector("input[name='fotoGraAtraccion']").value = "";
        document.querySelector(".nombreImagenGraCargadaAdd").innerHTML = "Sin subir una imágen válida ...";
        document.querySelector("#nombreImagenAtraccionGra").innerHTML = "Sin determinar";
        document.querySelector("#tamanoImagenAtraccionGra").innerHTML = "Sin determinar";
        document.querySelector("#extensImagenAtraccionGra").innerHTML = "Sin determinar";
        document.querySelector("#img-foto-gra").setAttribute('src' , rutaImgDefault);
  
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡ La imágen no puede pesar mas de 2MB !'
        })
  
    }else{
        console.log("----- PODEMOS CARGAR IMÁGEN GRANDE -----");
        let datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        datosImagen.addEventListener('load' , (event) => {
            let rutaImagen = event.target.result;
            document.querySelector("#img-foto-gra").setAttribute('src' , rutaImagen);
            document.querySelector(".nombreImagenGraCargadaAdd").innerHTML = nameImg+tipoImg+"(Peso: "+tamaImg+")";
            document.querySelector("#nombreImagenAtraccionGra").innerHTML = nameImg;
            document.querySelector("#tamanoImagenAtraccionGra").innerHTML = tamaImg;
            document.querySelector("#extensImagenAtraccionGra").innerHTML = tipoImg;
        })

    }

})

/********************************************************************************************
************* PREVISUALIZACIÓN DE IMÁGEN SUBIDA DE RECORRIDO - PEQUEÑA -EDICIÓN *************
*********************************************************************************************/
document.querySelector("#editarFotoAtraccionPeq").addEventListener('change' , (e) => {
    console.log("Cargamos una imágen ...");
    let imagen = document.querySelector("#editarFotoAtraccionPeq").files[0];
    let tamaImg = imagen["size"];
    let tipoImg = imagen["type"];
    let nameImg = imagen["name"];
    let rutaImgDefault = "views/img/recorrido/default/default.png";
    

    console.log("imagen" , imagen);
    console.log("tamaImg" , tamaImg);
    console.log("tipoImg" , tipoImg);
    console.log("nameImg" , nameImg);
    console.log("rutaImgDefault" , rutaImgDefault);

    /**Solo admitiremos imágenes JPG y PNG */
    if(tipoImg != "image/jpeg" && tipoImg != "image/png"){

        document.querySelector("input[name='editarFotoAtraccionPeq']").value = "";
        document.querySelector(".nombreImagenCargadaPeqEdi").innerHTML = "Sin subir una imágen válida ...";
        document.querySelector("#editarnNombreImagenRecorridoPeq").innerHTML = "Sin determinar";
        document.querySelector("#editarTamanoImagenRecorridoPeq").innerHTML = "Sin determinar";
        document.querySelector("#editarExtensImagenRecorridoPeq").innerHTML = "Sin determinar";
        document.querySelector("#img-foto-peq-edit").setAttribute('src' , rutaImgDefault);
  
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡ Solo imágenes JPG y PNG son permitidas !'
        })
            
    }else if(tamaImg > 2000000){ /**Equivalente a 2 Megas */

        document.querySelector("input[name='editarFotoAtraccionPeq']").value = "";
        document.querySelector(".nombreImagenCargadaPeqEdi").innerHTML = "Sin subir una imágen válida ...";
        document.querySelector("#editarnNombreImagenRecorridoPeq").innerHTML = "Sin determinar";
        document.querySelector("#editarTamanoImagenRecorridoPeq").innerHTML = "Sin determinar";
        document.querySelector("#editarExtensImagenRecorridoPeq").innerHTML = "Sin determinar";
        document.querySelector("#img-foto-peq-edit").setAttribute('src' , rutaImgDefault);
  
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡ La imágen no puede pesar mas de 2MB !'
        })
  
    }else{
        console.log("----- PODEMOS CARGAR IMÁGEN PEQUEÑA -----");
        let datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        datosImagen.addEventListener('load' , (event) => {
            let rutaImagen = event.target.result;
            document.querySelector("#img-foto-peq-edit").setAttribute('src' , rutaImagen);
            document.querySelector(".nombreImagenCargadaPeqEdi").innerHTML = nameImg+tipoImg+"(Peso: "+tamaImg+")";
            document.querySelector("#editarnNombreImagenRecorridoPeq").innerHTML = nameImg;
            document.querySelector("#editarTamanoImagenRecorridoPeq").innerHTML = tamaImg;
            document.querySelector("#editarExtensImagenRecorridoPeq").innerHTML = tipoImg;
        })

    }

})

/********************************************************************************************
************* PREVISUALIZACIÓN DE IMÁGEN SUBIDA DE RECORRIDO - GRANDE -EDICIÓN *************
*********************************************************************************************/
document.querySelector("#editarFotoAtraccionGra").addEventListener('change' , (e) => {
    console.log("Cargamos una imágen ...");
    let imagen = document.querySelector("#editarFotoAtraccionGra").files[0];
    let tamaImg = imagen["size"];
    let tipoImg = imagen["type"];
    let nameImg = imagen["name"];
    let rutaImgDefault = "views/img/recorrido/default/default.png";
    

    console.log("imagen" , imagen);
    console.log("tamaImg" , tamaImg);
    console.log("tipoImg" , tipoImg);
    console.log("nameImg" , nameImg);
    console.log("rutaImgDefault" , rutaImgDefault);

    /**Solo admitiremos imágenes JPG y PNG */
    if(tipoImg != "image/jpeg" && tipoImg != "image/png"){

        document.querySelector("input[name='editarFotoAtraccionGra']").value = "";
        document.querySelector(".nombreImagenCargadaGraEdi").innerHTML = "Sin subir una imágen válida ...";
        document.querySelector("#editarnNombreImagenRecorridoGra").innerHTML = "Sin determinar";
        document.querySelector("#editarTamanoImagenRecorridoGra").innerHTML = "Sin determinar";
        document.querySelector("#editarExtensImagenRecorridoGra").innerHTML = "Sin determinar";
        document.querySelector("#img-foto-gra-edit").setAttribute('src' , rutaImgDefault);
  
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡ Solo imágenes JPG y PNG son permitidas !'
        })
            
    }else if(tamaImg > 2000000){ /**Equivalente a 2 Megas */

        document.querySelector("input[name='editarFotoAtraccionGra']").value = "";
        document.querySelector(".nombreImagenCargadaGraEdi").innerHTML = "Sin subir una imágen válida ...";
        document.querySelector("#editarnNombreImagenRecorridoGra").innerHTML = "Sin determinar";
        document.querySelector("#editarTamanoImagenRecorridoGra").innerHTML = "Sin determinar";
        document.querySelector("#editarExtensImagenRecorridoGra").innerHTML = "Sin determinar";
        document.querySelector("#img-foto-gra-edit").setAttribute('src' , rutaImgDefault);
  
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡ La imágen no puede pesar mas de 2MB !'
        })
  
    }else{
        console.log("----- PODEMOS CARGAR IMÁGEN GRANDE -----");
        let datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        datosImagen.addEventListener('load' , (event) => {
            let rutaImagen = event.target.result;
            document.querySelector("#img-foto-gra-edit").setAttribute('src' , rutaImagen);
            document.querySelector(".nombreImagenCargadaGraEdi").innerHTML = nameImg+tipoImg+"(Peso: "+tamaImg+")";
            document.querySelector("#editarnNombreImagenRecorridoGra").innerHTML = nameImg;
            document.querySelector("#editarTamanoImagenRecorridoGra").innerHTML = tamaImg;
            document.querySelector("#editarExtensImagenRecorridoGra").innerHTML = tipoImg;
        })

    }

})


/*************************************************************
************* VALIDAR FORMULARIO REGISTRO VÍA JS *************
******** Validaremos tanto el agregar como el editar *********
**************************************************************/
document.querySelector("#titulo").addEventListener('keypress' , (e) => { validador1(e); });
document.querySelector("#descripcion").addEventListener('keypress' , (e) => { validador1(e); });

document.querySelector("#editarTitulo").addEventListener('keypress' , (e) => { validador1(e); });
document.querySelector("#editarDescripcion").addEventListener('keypress' , (e) => { validador1(e); });

function validarFormularioAtracciones(form){

    /**Capturamos si vamos a agregar, editar, eliminar, habilitar/inhabilitar */
    let formulario = form;
    /**Agregar */
    let titulo = document.querySelector("#titulo").value;
    let descripcion = document.querySelector("#descripcion").value;

    /**Editar */
    let editarTitulo = document.querySelector("#editarTitulo").value;
    let editarDescripcion = document.querySelector("#editarDescripcion").value;

    if(formulario == "adicionar"){

        console.log('Vamos a adicionar ...');
        /**Validamos cada uno - Tanto para agregar como actualizar ... */
        if (titulo != "" && titulo.length >= 1){
            if (descripcion != "" && descripcion.length >= 1){
                return true; /**Todos los campos están consistentes, no hay necesidad de validar vía PHP */
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'La descripción es un campo obligatorio, por favor diligencielo ...'
                });
                return false; /**Errores, no podemos enviar el formulario */
            }
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'La título es un campo obligatorio, por favor diligencielo ...'
            });
            return false; /**Errores, no podemos enviar el formulario */
        }

    } else if(formulario == "editar"){

        console.log('Vamos a editar ...');
        /**Validamos cada uno - Tanto para agregar como actualizar ... */
        if (editarTitulo != "" && editarTitulo.length >= 1){
            if (editarDescripcion != "" && editarDescripcion.length >= 1){
                return true; /**Todos los campos están consistentes, no hay necesidad de validar vía PHP */
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'La descripción es un campo obligatorio, por favor diligencielo ...'
                });
                return false; /**Errores, no podemos enviar el formulario */
            }
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'La título es un campo obligatorio, por favor diligencielo ...'
            });
            return false; /**Errores, no podemos enviar el formulario */
        }

    }

}


/*******************************************************************
/************** ACTUALIZACIÓN DE RECORRIDO / ATRACCIÓN *************
/*******************************************************************/
async function editarRecorrido(id){

    console.log("id del recorrido: " , id);

    try {
        
        console.log("Entrando a función editarRecorrido asíncrona ... Cargando Recorrido: ");
        /**Capturamos los parámetros que vienen del botón de archivo tablaCargos.ajax.php */
        let idRecorrido = id;
        let btnComplet = document.querySelector('#botonEditRecorrido'+id); /**Lo tengo personalizado para que cada Row sea dinámico */
        let imgDefault = "views/img/recorrido/default/default.png";

        $('#spinnerCargaEditarAtracciones').modal('show'); // Abrir Modal por que todo está cargado - Para esta operación usamos JQuery ...
        document.querySelector("#spinnerCargaEditarAtracciones").classList.add("show");

        let respuesta = await fetch("jobs/recorrido.ajax.php?"+"idRecorrido="+idRecorrido);
        json = await respuesta.json();
        await waitforme(500);

        $('#spinnerCargaEditarAtracciones').removeClass('fade'); /**Remuevo class fade para que no cause corto con el modal editar */
        $('#spinnerCargaEditarAtracciones').modal('hide'); // Cerrar Modal por que todo está cargado - Para esta operación usamos JQuery ...

        document.querySelector('input[name="editarRecorridoId"]').value = json["id"];

        document.querySelector('.editarTitulo').value = json["titulo"];
        document.querySelector('textarea[name="editarDescripcion"]').innerHTML = json["descripcion"];

        if(json["foto_peq"] == ""){
            document.querySelector('input[name="imgFotoAtraccionPeqActual"]').value = imgDefault; /**Input oculto con img temporal */
            document.querySelector('img[id="img-foto-peq-edit"]').setAttribute("src" , imgDefault); /**Input donde se carga previsualización */
            document.querySelector('input[name="editarFotoAtraccionPeq"]').setAttribute("value" , imgDefault); /**Input en que se carga img */
        }else{
            document.querySelector('input[name="imgFotoAtraccionPeqActual"]').value = json["foto_peq"]; /**Input oculto con img temporal */
            document.querySelector('img[id="img-foto-peq-edit"]').setAttribute("src" , json["foto_peq"]); /**Input donde se carga previsualización */
            document.querySelector('input[name="editarFotoAtraccionPeq"]').setAttribute("value" , json["foto_peq"]); /**Input en que se carga img */
        }

        document.querySelector('span[id="editarnNombreImagenRecorridoPeq"]').innerHTML = "Desde BD/Default";
        document.querySelector('span[id="editarTamanoImagenRecorridoPeq"]').innerHTML = "Desde BD/Default";
        document.querySelector('span[id="editarExtensImagenRecorridoPeq"]').innerHTML = "Desde BD/Default";
        document.querySelector(".nombreImagenCargadaPeqEdi").innerHTML = "Imágen viene desde la Base de Datos";

        // *****************************************

        if(json["foto_grande"] == ""){
            document.querySelector('input[name="imgFotoAtraccionGraActual"]').value = imgDefault; /**Input oculto con img temporal */
            document.querySelector('img[id="img-foto-gra-edit"]').setAttribute("src" , imgDefault); /**Input donde se carga previsualización */
            document.querySelector('input[name="editarFotoAtraccionGra"]').setAttribute("value" , imgDefault); /**Input en que se carga img */
        }else{
            document.querySelector('input[name="imgFotoAtraccionGraActual"]').value = json["foto_grande"]; /**Input oculto con img temporal */
            document.querySelector('img[id="img-foto-gra-edit"]').setAttribute("src" , json["foto_grande"]); /**Input donde se carga previsualización */
            document.querySelector('input[name="editarFotoAtraccionGra"]').setAttribute("value" , json["foto_grande"]); /**Input en que se carga img */
        }

        document.querySelector('span[id="editarnNombreImagenRecorridoGra"]').innerHTML = "Desde BD/Default";
        document.querySelector('span[id="editarTamanoImagenRecorridoGra"]').innerHTML = "Desde BD/Default";
        document.querySelector('span[id="editarExtensImagenRecorridoGra"]').innerHTML = "Desde BD/Default";
        document.querySelector(".nombreImagenCargadaGraEdi").innerHTML = "Imágen viene desde la Base de Datos";

        console.log('json ==> ' , json);

        /**Así no lo recomienda Bootstrap, pequeña excepción cono JQuery para abrir Modal Programáticamente. */
        $('#editarAtraccion').modal('show'); // Abrir Modal por que todo está cargado ...

    } catch (error) {
        console.log(error);
    }

}

/**********************************************************************
/************** ACTIVAR/DESACTIVAR UN RECORRIDO/ATRACCIÓN *************
/**********************************************************************/
async function cambiarEstado(id){

    try {
        
        let idRecorridoCam = id;
        let est;
        let btnComplet = document.querySelector('#botonCamEstRecorridos'+id); /**Lo tengo personalizado para que cada Row sea dinámico */
        let estadoRecorrido = btnComplet.getAttribute('estadoRecorrido');

        console.log('idRecorridoCam' , idRecorridoCam);
        console.log('btnComplet' , btnComplet);
        console.log('estadoRecorrido' , estadoRecorrido);

        if(estadoRecorrido == '1') {
            est = '0';
        }else{
            est = '1';
        }

        let respuesta = await fetch("jobs/recorrido.ajax.php?"+"idRecorridoCam="+id+"&estadoRecorrido="+est);
        json = await respuesta.json();
        //await waitforme(500);

        console.log(json);

        if(json == "ok"){
            
            if(estadoRecorrido == '0'){

                const boton = document.querySelector('#botonCamEstRecorridos'+id);
                boton.classList.remove('btn-info');
                boton.classList.add('btn-dark');
                boton.innerHTML = "No Visible";
                boton.setAttribute('estadoRecorrido' , '1');

                Swal.fire({
                    icon: 'info',
                    title: 'Gestión de Estado',
                    text: 'La Atracción fue Aprobada ...'
                }).then(function(result){

                    if(result.value || !result.value){

                        window.location = "atracciones";

                    } /**Si el resultado valida ok, logramos cambiar estado y redirecciono */

                }) /**Swal de que se elimino correctamente */;

            }else{

                const boton = document.querySelector('#botonCamEstRecorridos'+id);
                boton.classList.remove('btn-dark');
                boton.classList.add('btn-info');
                boton.innerHTML = "Visible";
                boton.setAttribute('estadoRecorrido' , '0');

                Swal.fire({
                    icon: 'info',
                    title: 'Gestión de Estado',
                    text: 'La Atracción fue Desaprobada ...'
                }).then(function(result){

                    if(result.value || !result.value){

                        window.location = "atracciones";

                    } /**Si el resultado valida ok, logramos cambiar estado y redirecciono */

                }) /**Swal de que se elimino correctamente */;

            } /**Estado */

        } /**Si la respuesta que retornamos es Ok */

    } catch (error) {
        console.log(error)
    }

}

/*************************************************************************
/************** ELIMINAR UNA ATRACCIÓN QUE PUEDA SER BORRADO *************
/*************************************************************************/
async function eliminarRecorrido(id) {

    try {

        let idRecorridoElim = id;
        let btnComplet = document.querySelector('#botonElimRecorrido'+id); /**Lo tengo personalizado para que cada Row sea dinámico */
        let fotoGrande = btnComplet.getAttribute('imgGrandeRecorrido');
        let fotoPequena = btnComplet.getAttribute('imgPeqRecorrido');

        console.log("idRecorridoElim" , idRecorridoElim);
        console.log("fotoPequena" , fotoPequena);
        console.log("fotoGrande" , fotoGrande);
        console.log('btnComplet' , btnComplet);

        /**Preguntamos primero */
        Swal.fire({
            title: 'Eliminación de Recorrido',
            text: '¿Estás seguro de eliminar este recorrido?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar recorrido!',
            cancelButtonText: 'Cancelar'
        }).then(function(result){

            /**Si es verdadero, presionó la tecla aceptar */
            if(result.value){

                /**Habilitamos/Inhabilitamos:
                 * Debemos independizar la operación para manejar mejor la promesa que será resuelta.*/
                realizarEliminacion(idRecorridoElim, fotoGrande, fotoPequena).then();

            } /**La persona selecciona que si desea eliminar */

        }) /**Estructura then del Sweet Alert */  

    } catch (error) {
        console.log(error);
    }

}

/**Realizar la eliminación como tal ... */
async function realizarEliminacion(idRecorridoElim, fotoGrande, fotoPequena){

    let respuesta = await fetch("jobs/recorrido.ajax.php?"+"idEliminar="+idRecorridoElim+"&imgPeqRecorrido="+fotoGrande+"&imgGrandeRecorrido="+fotoPequena);
    json = await respuesta.json();
    console.log("json " , json);

    if(json == "ok"){

        Swal.fire({
            icon: 'success',
            title: 'Eliminación de Atracción',
            text: 'El Atracción fue eliminado correctamente! ...'
        }).then(function(result){

            if(result.value || !result.value){

                window.location = "atracciones";

            } /**Si el resultado valida ok, logramos eliminar y redirecciono */

        }) /**Swal de que se elimino correctamente */

    } /**Si la respuesta que retornamos es Ok */

}

/******************************************************
************* CANCELAR AGREGADO DE ADMINS *************
*******************************************************/
const cancelarAdmins = (e) =>{
    console.log("----- CANCELAR OPERACIÓN -----");
    let rutaImgDefault = "views/img/recorrido/default/default.png";

    document.querySelector("#img-foto-peq").setAttribute('src' , rutaImgDefault);
    document.querySelector(".nombreImagenPeqCargadaAdd").innerHTML = "Sin subir una imágen válida ...";
    document.querySelector("#nombreImagenAtraccionPeq").innerHTML = "Sin determinar";
    document.querySelector("#tamanoImagenAtraccionPeq").innerHTML = "Sin determinar";
    document.querySelector("#extensImagenAtraccionPeq").innerHTML = "Sin determinar";

    document.querySelector("#img-foto-gra").setAttribute('src' , rutaImgDefault);
    document.querySelector(".nombreImagenGraCargadaAdd").innerHTML = "Sin subir una imágen válida ...";
    document.querySelector("#nombreImagenAtraccionGra").innerHTML = "Sin determinar";
    document.querySelector("#tamanoImagenAtraccionGra").innerHTML = "Sin determinar";
    document.querySelector("#extensImagenAtraccionGra").innerHTML = "Sin determinar";

}



let validador1 = (e) => {
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
       (keynum >= 48 && keynum <= 57)){                                     /**Números 0-9*/                                                   

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