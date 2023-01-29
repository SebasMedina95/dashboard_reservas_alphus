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
/*****************************************************/
/******************** 360 GRADOS *********************/
/**Requerimos JQuery para activarlo por plugin pano* */
/*****************************************************/

$(".360Antiguo").pano({
	img: $(".360Antiguo").attr("back")
});

/***********************************************************************/
/******************** CKEDITOR - TEXTO ENRIQUECIDO *********************/
/******** Requerimos JQuery para activarlo por plugin CKEDITOR* ********/
/***********************************************************************/

ClassicEditor.create(document.querySelector('#descripcionHabitacion'), {

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
    placeholder: 'Descripción Enriquecida de la Habitación ...',
    toolbar: [ 'heading', '|', 'Bold', 'Italic', '|', 'BulletedList', 'NumberedList', 'alignment' ,'|', 'Undo', 'Redo', '|'  , 'insertTable']

 }).then(function (editor) {
   
     $(".ck-content").css({"height":"400px"})
 
 }).catch(function (error) {
 
     // console.log("error", error);
 
 })

/*************************************************************************************
************ CONFIGURACIONES PARA EL DATA TABLE DE HABITACIONES DEL HOTEL ************
**************************************************************************************/
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

/*************************************************************
************* VALIDAR FORMULARIO REGISTRO VÍA JS *************
******** Validaremos tanto el agregar como el editar *********
**************************************************************/
/**https://elcodigoascii.com.ar/ */
document.querySelector(".seleccionarEstilo").addEventListener('keypress' , (e) => { validador1_habitacion(e); });
document.querySelector(".agregarVideo").addEventListener('keypress' , (e) => { validador2_habitacion(e); });
document.querySelector("#descripcionHabitacion").addEventListener('keypress' , (e) => { validador3_habitacion(e); });

/**************************************************
******** ARRASTRAR VARIAS IMAGENES GALERÍA ********
***************************************************/
let archivosTemporales = [];

/**dragenter es un evento para cuando arrastro elementos encima de un componente,
 * a la clase que tenemos subirGaleria le agregamos el evento y le colocamos como estilo
 * de fondo una imagen que de la sensación de que vamos a descargar elementos en un área especifica,
 * el efecto contrario a dragenter es dragleave que lo que hace es cuando no arrastremos sobre esa area o salgamos. */
document.querySelector(".subirGaleria").addEventListener('dragenter' , (e) =>{

    /**Evitamos acciones por defecto del navegador */
    e.preventDefault();
    e.stopPropagation();

    /**Cambiamos el background del componente para dar esa impresión de efecto de arrastre */
    document.querySelector(".subirGaleria").setAttribute("style" , "background:url(views/img/plantilla/pattern.jpg)");

});

document.querySelector(".subirGaleria").addEventListener('dragleave' , (e) =>{

    /**Evitamos acciones por defecto del navegador */
    e.preventDefault();
    e.stopPropagation();

    /**Quitamos el efecto de arrastre para dejar disponible, dar esa sensación */
    document.querySelector(".subirGaleria").setAttribute("style" , "background:''");

});

/**Actua en compañia de dragleave, por lo que debemos definirlo ... */
document.querySelector(".subirGaleria").addEventListener('dragover' , (e) =>{

    /**Evitamos acciones por defecto del navegador */
    e.preventDefault();
    e.stopPropagation();

});

/**Dar clic y agregar imágenes sin arrastrar */
document.querySelector("#galeria").addEventListener('change' , (e) =>{

    /**Evitamos acciones por defecto del navegador */
    let archivosSinArr = e.target.files; //El que aplicamos para el tema del change
    console.log("archivos -> " , archivosSinArr);
	adjuntarMultiplesArchivos(archivosSinArr);

});

/**Capturamos ahora los archivos de imagen que se arrastren ... */
document.querySelector(".subirGaleria").addEventListener('drop' , (e) =>{

    /**Evitamos acciones por defecto del navegador */
    e.preventDefault();
    e.stopPropagation();

    /**Quitamos el efecto de arrastre para dejar disponible, dar esa sensación */
    document.querySelector(".subirGaleria").setAttribute("style" , "background:''");
    
    let archivos = e.dataTransfer.files; //El que aplicamos para el tema del drop
    console.log("archivos -> " , archivos);
    adjuntarMultiplesArchivos(archivos);
    
});

/**Vamos a guardar las imagenes que vamos adjuntando */
function adjuntarMultiplesArchivos(archivos){

    let li = "";

    for(var i = 0; i < archivos.length; i++){
        /**Guardo la imagen que tengamos en el momento */
        let imagen = archivos[i];

        /**Condicionamos la imagen con las caracteristicas que llevamos manejando ... */
        if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '¡ Hay alguna(s) imágenes que no son JPG o PNG. Solo imágenes JPG y PNG son permitidas !'
            })

            return;

        }else if(imagen["size"] > 2000000){

			Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '¡ Hay alguna(s) imágenes que pesan mas de 2M. La imágen no puede pesar mas de 2MB !'
            })

	        return;

		}else{

            let datosImagen = new FileReader;
            datosImagen.readAsDataURL(imagen);

            /**Cuando hayamos cargado los datos, entonces empezamos a dibujar las imágenes ... */
            datosImagen.addEventListener('load' , (e) => {

                let rutaImagen = e.target.result;

                /**Vamos a crear manualmente toda la estructura DOM del li que necesitamos: */
                let etiquetai = document.createElement('i');
                etiquetai.className = "fas fa-trash";
                etiquetai.setAttribute('title' , 'Remover Imagen');

                let etiquetaButton = document.createElement('button');
                etiquetaButton.className = 'btn btn-danger btn-sm float-right shadow-sm quitarFotoNueva'; //Creamos quitarFotoNueva para apoyarnos en la función de quitar foto
                etiquetaButton.setAttribute('temporal' , '');
                etiquetaButton.onclick = quitarImagen;

                let etiquetaDivImg = document.createElement('div');
                etiquetaDivImg.className = 'card-img-overlay p-0 pr-3';

                etiquetaButton.appendChild(etiquetai);
                etiquetaDivImg.appendChild(etiquetaButton);

                let etiquetaImg = document.createElement('img');
                etiquetaImg.className = 'card-img-top';
                etiquetaImg.setAttribute('src' , rutaImagen);

                let etiquetaLi = document.createElement('li');
                etiquetaLi.className = 'col-12 col-md-6 col-lg-3 card px-3 rounded-0 shadow-none';

                etiquetaLi.appendChild(etiquetaImg);
                etiquetaLi.appendChild(etiquetaDivImg);

                document.querySelector(".vistaGaleria").appendChild(etiquetaLi);

			// 	   <li class="col-12 col-md-6 col-lg-3 card px-3 rounded-0 shadow-none">                      
            //         <img class="card-img-top" src="`+rutaImagen+`">
            //         <div class="card-img-overlay p-0 pr-3">	                      
            //            <button class="btn btn-danger btn-sm float-right shadow-sm quitarFotoNueva" temporal>	                         
            //              <i class="fas fa-times"></i>
            //            </button>
            //         </div>
            //     </li>		

                /**Recordemos que tenemos definido globalmente archivosTemporales
                 * Validamos que no esté vacío en primer lugar: Por que si si hay
                 * entonces simplemente agregamos mas al array, lo tengo que volver a convertir en array para
                 * poder hacer eso entonces esa parte es importante:*/
                if(archivosTemporales.length != 0){

                    archivosTemporales = JSON.parse(document.querySelector(".inputNuevaGaleria").value);

        		}

                /**Vamos agregando si es el caso ... */
                archivosTemporales.push(rutaImagen);    

                /**Al input oculto de nueva galeria le agregamos los archivos temporales, para tenerlo guardado,
                 * recordemos que será una cadena de texto, entonces por eso aplicamos JSON.stringify */
                document.querySelector(".inputNuevaGaleria").value = JSON.stringify(archivosTemporales);          

            })

        } /*Validaciones*/

    } /*Ciclo*/

}; /**Función de adjuntarMultiplesArchivos */

/***********************************************************
*************** QUITAR IMAGEN DE LA GALERÍA ****************
** Vamos a usar ciertas configuraciones con JQuery porque **
** por ahora no me fue posible estabilizarlo con JS Puro  **
************************************************************/
function quitarImagen(){

    console.log("*** QUITANDO LA IMAGEN DE LA GALERÍA NUEVA ***");

    let listaFotosNuevas = document.querySelectorAll(".quitarFotoNueva");
    console.log("listaFotosNuevas - quitar: " , listaFotosNuevas);

    let listaTemporales = JSON.parse(document.querySelector(".inputNuevaGaleria").value); 
    console.log("listaTemporales - quitar: " , listaTemporales);

    for(var i = 0; i < listaFotosNuevas.length; i++){

        listaFotosNuevas[i].setAttribute("temporal", listaTemporales[i]);

        let quitarImagen = $(this).attr("temporal"); /**JQuery ... Guardamos el elemento al que nos referimos con el click */

        if(quitarImagen == listaTemporales[i]){

            listaTemporales.splice(i, 1); /**Quito solo el indice requerido */
            document.querySelector(".inputNuevaGaleria").value = JSON.stringify(listaTemporales); /**Actualizo el input de la nueva galería */
            $(this).parent().parent().remove(); /**JQuery ...  Remover visualmente la imagen */

        }

    }

}

/**************************************
************ AGREGAR VIDEO ************
***************************************/
document.querySelector(".agregarVideo").addEventListener("change" , (e) => {

    let codigoVideo = document.querySelector(".agregarVideo").value;
    document.querySelector(".vistaVideo").innerHTML = `<iframe width="100%" height="320" src="https://www.youtube.com/embed/`+codigoVideo+`" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`

})

/***********************************************
************ AGREGAR IMAGEN DE 360° ************
************************************************/
document.querySelector("#imagen360").addEventListener("change" , (e) => {

    let imagen = document.querySelector("#imagen360").files[0];

    /**Validamos el formato de la imagen */
    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

		document.querySelector("#imagen360").value = "";

		Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡ Solo imágenes JPG y PNG son permitidas !'
        });

        return;

	}else if(imagen["size"] > 2000000){

		document.querySelector("#imagen360").value = "";

		Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡ La imágen no puede pesar mas de 2MB !'
        });

        return;

	}else{

        console.log("----- PODEMOS CARGAR IMÁGEN DE 360° -----");
        let datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        datosImagen.addEventListener('load' , (event) => {
            
            let rutaImagen = event.target.result;
            document.querySelector(".ver360").innerHTML = 
            
            `<div class="pano 360Nuevo" back="`+rutaImagen+`">

                <div class="controls">
                <a href="#" class="left">&laquo;</a>
                <a href="#" class="right">&raquo;</a>
                </div>

            </div>`

            /**Con JQuery para el PANO: */
            $(".360Nuevo").pano({
		        img: $(".360Nuevo").attr("back")
		    });

        })

    }

});

/****************************************************************************
*********** QUITAR IMAGEN DE LA GALERÍA VIEJA - CARGADA DE LA BD ************
**** Tuve que usar JQuery completo, no encontré como hacerlo con JS PURO ****
*****************************************************************************/
$(document).on("click", ".quitarFotoAntigua", function(){

    console.log("*** QUITANDO LA IMAGEN DE LA GALERÍA ANTIGUA ***");

    let listaFotosAntiguas = document.querySelectorAll(".quitarFotoAntigua");
    console.log("listaFotosAntiguas - Antigua Galería - quitar: " , listaFotosAntiguas);

    let listaTemporales = document.querySelector(".inputAntiguaGaleria").value.split(","); //Lo convertimos en un array
    console.log("listaTemporales - Antigua Galería - quitar: " , listaTemporales);

    for(let i = 0; i < listaFotosAntiguas.length; i++){

        let quitarImagen = $(this).attr("temporal"); /**JQuery ... Guardamos el elemento al que nos referimos con el click */

        if(quitarImagen == listaTemporales[i]){

            listaTemporales.splice(i, 1);
            document.querySelector(".inputAntiguaGaleria").value = listaTemporales.toString(); /**Actualizo el input de la antigua galería */
            $(this).parent().parent().remove(); /**JQuery ...  Remover visualmente la imagen */

        }

    }

})

/*******************************************************************************
*********** GUARDAR HABITACIÓN - TAMBIÉN NOS SERVIRÁ PARA LA EDICIÓN ***********
********************************************************************************/
document.querySelector(".guardarHabitacion").addEventListener("click" , (e) => {

    let idHabitacion = document.querySelector(".idHabitacion").value; /**Para la edición si es el caso */
    let tipo = document.querySelector(".seleccionarTipo").value.split(",")[1];  /**Value que aplicamos: idCategoria,Categoria --TIPO para saber nombre carpeta para imágenes */
	let tipo_h = document.querySelector(".seleccionarTipo").value.split(",")[0];  /**Value que aplicamos: idCategoria,Categoria -- EL ID*/

    let estilo = document.querySelector(".seleccionarEstilo").value; /**Título para la habitación */

    let galeria = document.querySelector(".inputNuevaGaleria").value; /**La nueva galería para cuando agregamos - Formato array pero está como String */
    let galeriaAntigua = document.querySelector(".inputAntiguaGaleria").value; /**Por si requerimos la edición de la habitación */

    let video = document.querySelector(".agregarVideo").value;

    let recorrido_virtual = $(".360Nuevo").attr("back"); /**En el atributo back es donde tengo la rutaImagen -> Lo hacemos con JQuery por PANO.*/
    var antiguoRecorrido = $(".antiguoRecorrido").val(); /**Para el tema de la edición -> Lo hacemos con JQuery por PANO. */

    var descripcion = document.querySelector(".ck-content").innerHTML;

    if(tipo == "" || tipo_h == "" || tipo == null || tipo_h == null){

		Swal.fire({
            icon: 'error',
            title: 'Oops... Error Guardar',
            text: '¡ Se debe seleccionar una categoría de habitación !'
        });

    	return;

	}else if(estilo == "" || estilo == null){

	    Swal.fire({
            icon: 'error',
            title: 'Oops... Error Guardar',
            text: '¡ Debe asignar un nombre a la habitación !'
        });

	    return;

	}else if(video == "" || video == null){

	    Swal.fire({
            icon: 'error',
            title: 'Oops... Error Guardar',
            text: '¡ Debe asignar un vídeo a la habitación !'
        });

	    return;

	}else if(descripcion == "" || descripcion == null){

	    Swal.fire({
            icon: 'error',
            title: 'Oops... Error Guardar',
            text: '¡ Debe asignar una descripción a la habitación !'
        });

	    return;

  	}else{

        /**Guardo en un formulario de datos la información que voy a enviar: */
        var datosHabitacionAdd = new FormData();
    	datosHabitacionAdd.append("idHabitacion", idHabitacion);
    	datosHabitacionAdd.append("tipo_h", tipo_h);
    	datosHabitacionAdd.append("tipo", tipo);
    	datosHabitacionAdd.append("estilo", estilo);
    	datosHabitacionAdd.append("galeria", galeria);
    	datosHabitacionAdd.append("galeriaAntigua", galeriaAntigua);
    	datosHabitacionAdd.append("video", video);
    	datosHabitacionAdd.append("recorrido_virtual", recorrido_virtual);
    	datosHabitacionAdd.append("antiguoRecorrido", antiguoRecorrido);
    	datosHabitacionAdd.append("descripcion", descripcion);

        /**Mediante un fetch me comuinico con el archivo externo y, mediante el método POST envío los parámetros
         * necesarios para la gestión*/
        fetch("jobs/habitaciones.ajax.php", {

            method: "post",
            body: datosHabitacionAdd

        }).then(function(data){

            return data.json();

        }).then(myJson => { 

            console.log(myJson);

            if(myJson == "ok"){

                Swal.fire({
                    icon: 'success',
                    title: 'Gestión de Habitación',
                    text: '¡Se ha registrado y/o actualizado una habitación correctamente! ...'
                }).then(function(result){

                    if(result.value || !result.value){

                      window.location = "habitaciones";

                    }

                });

            }else{

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '¡Ocurrió algún error al gestionar la habitación! ...'
                });

            }

        });

    }

})

/******************************************
*********** ELIMINAR HABITACIÓN ***********
*******************************************/
document.querySelector(".eliminarHabitacion").addEventListener("click" , async (e) => {

    let btnComplet = document.querySelector('.eliminarHabitacion'); /**Lo obtengo directamente del panel derecho */
    let idHabitacionElim = btnComplet.getAttribute('idEliminarHab');
    let galeriaHabitacionElim = btnComplet.getAttribute('galeriaHabitacion');
    let recorritoVirHabitacionElim = btnComplet.getAttribute('recorridoHabitacion');

    console.log("btnComplet: " , btnComplet);
    console.log("idHabitacionElim: " , idHabitacionElim);
    console.log("galeriaHabitacionElim: " , galeriaHabitacionElim);
    console.log("recorritoVirHabitacionElim: " , recorritoVirHabitacionElim);

    let json1;

    /**Primero nos traemos la información de la categoría, podemos usar el de editar: */
    $('#spinnerCargaEstadosHabitacion').modal('show'); // Abrir Modal por que todo está cargado - Para esta operación usamos JQuery ...
    document.querySelector("#spinnerCargaEstadosHabitacion").classList.add("show");

    let respuesta = await fetch("jobs/habitaciones.ajax.php?"+"idHabitacionElim="+idHabitacionElim);
    json1 = await respuesta.json();
    await waitforme(500);

    $('#spinnerCargaEstadosHabitacion').removeClass('fade'); /**Remuevo class fade para que no cause corto con el modal editar */
    $('#spinnerCargaEstadosHabitacion').modal('hide'); // Cerrar Modal por que todo está cargado - Para esta operación usamos JQuery ...

    let mensaje = "¿Estás seguro de eliminar la habitación " + json1["estilo"] + " que pertenece a la categoría " + json1["tipo"] + "?";

    /**Preguntamos primero */
    Swal.fire({
        title: 'Eliminación de Habitación',
        text: mensaje,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar la habitación!',
        cancelButtonText: 'Cancelar'
    }).then(function(result){

        /**Si es verdadero, presionó la tecla aceptar */
        if(result.value){

            /**Habilitamos/Inhabilitamos:
             * Debemos independizar la operación para manejar mejor la promesa que será resuelta.*/
            realizarEliminacion(idHabitacionElim, galeriaHabitacionElim, recorritoVirHabitacionElim).then();

        } /**La persona selecciona que si desea eliminar */

    }) /**Estructura then del Sweet Alert */

})

/**Realizar la eliminación como tal ... */
async function realizarEliminacion(idHabitacionElim, galeriaHabitacionElim, recorritoVirHabitacionElim){

    /**Guardo en un formulario de datos la información que voy a enviar: */
    var datosHabitacionElim = new FormData();
    datosHabitacionElim.append("idHabitacionElimAction", idHabitacionElim);
    datosHabitacionElim.append("galeriaHabitacionElimAction", galeriaHabitacionElim);
    datosHabitacionElim.append("recorritoVirHabitacionElimAction", recorritoVirHabitacionElim);

    /**Mediante un fetch me comuinico con el archivo externo y, mediante el método POST envío los parámetros
         * necesarios para la gestión*/
     fetch("jobs/habitaciones.ajax.php", {

        method: "post",
        body: datosHabitacionElim

    }).then(function(data){

        return data.json();

    }).then(myJson => { 

        console.log(myJson);

        if(myJson == "ok"){

            Swal.fire({
                icon: 'success',
                title: 'Gestión de Habitación',
                text: '¡Se ha eliminado la habitación correctamente! ...'
            }).then(function(result){

                if(result.value || !result.value){

                  window.location = "habitaciones";

                }

            });

        }else{

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '¡Ocurrió algún error al gestionar la habitación en su proceso de eliminación! ...'
            });

        }

    });

}

/*************** VALIDACIONES POR EL EVENTO KEYPRESS ****************/

/**Validador1 = Validamos permitir caracteres de la a - z - áéíóú
 *              Validamos permitir caracteres de la A - Z - ÁÉÍÓÚ
 *              Validamos permitir caracteres de ñ - Ñ
/*************** *********************************** ****************/
let validador1_habitacion = (e) => {
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
       (keynum == 209) || (keynum == 241)){                                         /** ñ, Ñ */

        return true;

    }else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Este campo solo permite el ingreso de letras (Se permiten vocales tildadas pero no espacios) ...'
        });
        return false;

    }
}

/**Validador2 = Validamos permitir caracteres de la a - z
 *              Validamos permitir caracteres de la A - Z
 *              Validamos permitir números del 0 al 9
/*************** *********************************** ****************/
let validador2_habitacion = (e) => {
    let keynum = window.event ? window.event.keyCode : e.which; /**Obtenemos el código ASCII */
    console.log(e.which || e.keyCode);
    /**Realizamos la validación en estilo ASCII*/
    if((keynum >= 65 && keynum <= 90) ||                                           /**Letras de a-z */
       (keynum >= 97 && keynum <= 122) ||                                          /**Letras de A-Z */
       (keynum >= 48 && keynum <= 57)){                                            /**Números 0-9*/ 
 

        return true;

    }else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Este campo solo permite el ingreso de letras (No se permite tildes ni espacios) ...'
        });
        return false;

    }
}

/**Validador1 = Validamos permitir caracteres de la a - z - áéíóú
 *              Validamos permitir caracteres de la A - Z - ÁÉÍÓÚ
 *              Validamos permitir caracteres de ñ - Ñ
 *              Validamos permitir caracteres /
 *              Validamos permitir caracteres <
 *              Validamos permitir caracteres >
 *              Validamos permitir caracteres de 0 - 9
 *              Validamos permitir caracteres de , . ; ¡ ! ¿ ? " ' - _ 
 *              Validamos los espacios en blanco */
/*************** *********************************** ****************/
let validador3_habitacion = (e) => {
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
       (keynum == 209) || (keynum == 241) ||                                        
       (keynum >= 48 && keynum <= 57) ||                                            /** 0, 9 */
       (keynum == 44) || (keynum == 46) || (keynum == 59) || (keynum == 63) || (keynum == 191) || (keynum == 161) ||  (keynum == 33) ||
       (keynum == 34) || (keynum == 39) || (keynum == 60) || (keynum == 62) || (keynum == 47) || (keynum == 45) ||  (keynum == 95) ||  /** , . ; < > - _ ¿ ? ! ¡ */
       (keynum == 32)){                                                             /**Espacio */

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