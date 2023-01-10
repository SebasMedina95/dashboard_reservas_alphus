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

    toolbar: [ 'heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', '|', 'undo', 'redo']
 
 }).then(function (editor) {
   
     $(".ck-content").css({"height":"400px"})
 
 }).catch(function (error) {
 
     // console.log("error", error);
 
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

/**Capturamos ahora los archivos de imagen que se arrastren ... */
document.querySelector(".subirGaleria").addEventListener('drop' , (e) =>{

    /**Evitamos acciones por defecto del navegador */
    e.preventDefault();
    e.stopPropagation();

    /**Quitamos el efecto de arrastre para dejar disponible, dar esa sensación */
    document.querySelector(".subirGaleria").setAttribute("style" , "background:''");
    
    var archivos = e.dataTransfer.files;
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
                etiquetaButton.className = 'btn btn-danger btn-sm float-right shadow-sm quitarFotoNueva';
                etiquetaButton.setAttribute('temporal' , '');

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

                // $(".vistaGaleria").append(`

				// 	<li class="col-12 col-md-6 col-lg-3 card px-3 rounded-0 shadow-none">
                      
	            //         <img class="card-img-top" src="`+rutaImagen+`">

	            //         <div class="card-img-overlay p-0 pr-3">
	                      
	            //            <button class="btn btn-danger btn-sm float-right shadow-sm quitarFotoNueva" temporal>
	                         
	            //              <i class="fas fa-times"></i>

	            //            </button>

	            //         </div>

	            //     </li>

      			// `)

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

}