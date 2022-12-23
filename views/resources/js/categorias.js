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

$.ajax({

	"url":"jobs/json/tablaComodidades.ajax.php",
	success: function(respuesta){
		
		//console.log("respuesta", respuesta);

	}

})

/***************************************************************************************
************ CONFIGURACIONES PARA EL DATA TABLE DE CATEGORÍAS DE HABITACIÓN ************
****************************************************************************************/
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
            {"className": "dt-right", "targets": [8]},  /**La columna de continental alta */
            {"className": "dt-right", "targets": [9]},  /**La columna de continental baja */
            {"className": "dt-right", "targets": [10]}, /**La columna de americano alta */
            {"className": "dt-right", "targets": [11]}  /**La columna de americano baja */
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

/***************************************************************************************
************ CONFIGURACIONES PARA EL DATA TABLE DE CATEGORÍAS DE HABITACIÓN ************
****************************************************************************************/
document.addEventListener('DOMContentLoaded' , (e) => {
    let tabla = new DataTable('#tablaComodidades' , {
        "ajax":"jobs/json/tablaComodidades.ajax.php",
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
            {"className": "dt-left", "targets": [2]},  /**La columna de comodidad */
            {"className": "dt-left", "targets": [3]},  /**La columna de icono */
            {"className": "dt-center", "targets": [4]},  /**La columna de estado */
            {"className": "dt-center", "targets": [5]}     /**La columna de fecha */
        ], 
        "aLengthMenu": [[10, 10, 20, 40, 60, 100 , -1], [10, 10, 20, 40, 60, 100, "Todos"]], 
        "iDisplayLength" : 10,
        "responsive": true, "lengthChange": true, "autoWidth": true,
        "dom": 'tftp'   /**lftirtBpr */
    });
})

/*************************************************************
************* VALIDAR FORMULARIO REGISTRO VÍA JS *************
******** Validaremos tanto el agregar como el editar *********
**************************************************************/
/**https://elcodigoascii.com.ar/ */
document.querySelector("#rutaCategoria").addEventListener('keypress' , (e) => { validador1_categorias(e); });
document.querySelector("#descripcionCategoria").addEventListener('keypress' , (e) => { validador1_categorias(e); });
document.querySelector("#continental_alta").addEventListener('keypress' , (e) => { validador2_categorias(e); });
document.querySelector("#continental_baja").addEventListener('keypress' , (e) => { validador2_categorias(e); });
document.querySelector("#americano_alta").addEventListener('keypress' , (e) => { validador2_categorias(e); });
document.querySelector("#americano_baja").addEventListener('keypress' , (e) => { validador2_categorias(e); });

document.querySelector("#editarRutaCategoria").addEventListener('keypress' , (e) => { validador1_categorias(e); });
document.querySelector("#editarDescripcionCategoria").addEventListener('keypress' , (e) => { validador1_categorias(e); });
document.querySelector("#editarContinental_alta").addEventListener('keypress' , (e) => { validador2_categorias(e); });
document.querySelector("#editarContinental_baja").addEventListener('keypress' , (e) => { validador2_categorias(e); });
document.querySelector("#editarAmericano_alta").addEventListener('keypress' , (e) => { validador2_categorias(e); });
document.querySelector("#editarAmericano_baja").addEventListener('keypress' , (e) => { validador2_categorias(e); });

/****************************************************************************************
************* PREVISUALIZACIÓN DE IMÁGEN SUBIDA DE CATEGORÍAS DE HABITACIÓN *************
*****************************************************************************************/
document.querySelector("#fotoCategoria").addEventListener('change' , (e) => {
    console.log("Cargamos una imágen ...");
    let imagen = document.querySelector("#fotoCategoria").files[0];
    let tamaImg = imagen["size"];
    let tipoImg = imagen["type"];
    let nameImg = imagen["name"];
    let rutaImgDefault = "../../views/img/defaultCategorias/default.png";

    console.log("imagen" , imagen);
    console.log("tamaImg" , tamaImg);
    console.log("tipoImg" , tipoImg);
    console.log("nameImg" , nameImg);
    console.log("rutaImgDefault" , rutaImgDefault);

    /**Solo admitiremos imágenes JPG y PNG */
    if(tipoImg != "image/jpeg" && tipoImg != "image/png"){

        document.querySelector("input[name='fotoCategoria']").value = "";
        document.querySelector(".nombreImagenCargadaAddCategoria").innerHTML = "Sin subir una imágen válida ...";
        document.querySelector("#nombreImagenCategorias").innerHTML = "Sin determinar";
        document.querySelector("#tamanoImagenCategorias").innerHTML = "Sin determinar";
        document.querySelector("#extensImagenCategorias").innerHTML = "Sin determinar";
        document.querySelector("#img-foto-categoria").setAttribute('src' , rutaImgDefault);
  
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡ Solo imágenes JPG y PNG son permitidas !'
        })
            
    }else if(tamaImg > 2000000){ /**Equivalente a 2 Megas */

        document.querySelector("input[name='fotoCategoria']").value = "";
        document.querySelector(".nombreImagenCargadaAddCategoria").innerHTML = "Sin subir una imágen válida ...";
        document.querySelector("#nombreImagenCategorias").innerHTML = "Sin determinar";
        document.querySelector("#tamanoImagenCategorias").innerHTML = "Sin determinar";
        document.querySelector("#extensImagenCategorias").innerHTML = "Sin determinar";
        document.querySelector("#img-foto-categoria").setAttribute('src' , rutaImgDefault);
  
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
            document.querySelector("#img-foto-categoria").setAttribute('src' , rutaImagen);
            document.querySelector(".nombreImagenCargadaAddCategoria").innerHTML = nameImg+tipoImg+"(Peso: "+tamaImg+")";
            document.querySelector("#nombreImagenCategorias").innerHTML = nameImg;
            document.querySelector("#tamanoImagenCategorias").innerHTML = tamaImg;
            document.querySelector("#extensImagenCategorias").innerHTML = tipoImg;
        })

    }

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

/**VAMOS A TRABAJAR LA CAPTURA DE LOS CHECKS RELACIONADOS
 * CON LAS COMODIDADES QUE TIENE LA CATEGORÍA PARA GUARDAR
 * LA INFORMACIÓN -> AGREGAR CATEGORÍA DE HABITACIÓN. */

let editarCaracteristicasCategoria = [];

/****************************************************************************
/************** ACCIÓN DE INCLUSIÓN DE COMODIDADES PARA GUARDAR *************
/****************************************************************************/
async function accionIncluye(){

    /**Generamos el array donde guardaremos las selecciones */
    let caracteristicasCategoria = [];

    try {
        /**Definimos el JSON y una bandera para distinguir la búsqueda asíncrona de las comodiades,
         * la mecánica es, recorrer todo el JSON obtenido de comodidades y, panear la palabra comodidad-
         * concatenado con el ID de la comodidad en relación al id dinámico que se va generando en el DOM
         * al mostrar el listado de comodidades, si lo recorro y dibujados los elementos entonces voy accediento
         * a los que se van seleccionando: */
        let json1;
        let banderaComodidades = true;

        let resComodidades = await fetch("jobs/categorias.ajax.php?"+"banderaComodidades="+banderaComodidades);
        json1 = await resComodidades.json();
        await waitforme(250);

        //console.log("json1 => " , json1);

        /**Recorro lo que nos trae la selección: */
        for(x of json1){

            /**Obtengo el checkbox con el id de la concatenación dinámica y verifico
             * si está checked o no para determinar si debo anexarlo: */
            let checkbox = document.querySelector("#comodidad-" + x["id"]);
            let check = checkbox.checked;

            /**Indiferente del caso, obtengo mediante un Split cual es la comodidad y el ícono representativo: */
            let item =  checkbox.value.split(",")[0];
		    let icono =  checkbox.value.split(",")[1];

            /**Si el elemento está marcado, entonces lo agregamos al array */
            if(check){
                console.log("***** Hemos seleccionado *****");
                console.log("checkbox => " , checkbox);
                console.log("check => " , check);
                console.log("item => " , item);
                console.log("icono => " , icono);
                console.log("******* ******* ******* *******");
                
                /**Convierto el array ordinario en uno de objetos para enviar la 
                 * data codificada en formato JSON, para luego, desde el server,
                 * decodificar la data y recorrer para insertar los detalles: */
                caracteristicasCategoria.push({

                    "id" : x["id"],
                    "item" : item,
                    "icono" : icono
            
                });

            }

        }

        console.log("Selección: " , caracteristicasCategoria);

        document.querySelector('input[name="caracteristicasCategoria"]').value = JSON.stringify(caracteristicasCategoria);

    } catch (error) {
        console.log(error);
    }

}

/*************************************************************
********** RUTA PARA LA CATEGORÍA DINÁMICA PARA URL **********
**************************************************************/
let newW;
document.querySelector("#rutaCategoria").addEventListener('keyup' , (e) => {
    //console.log("entrando ...");
    newW = limpiarUrl(document.querySelector("#rutaCategoria").value);
    //console.warn(newW)
    document.querySelector("#rutaCategoria").value = newW;
});

function limpiarUrl(texto){

    console.log("Entramos a limpiar la Ruta-URL: " , texto)
	var texto = texto.toLowerCase();
	texto = texto.replace(/[á]/g, 'a');
	texto = texto.replace(/[é]/g, 'e');
	texto = texto.replace(/[í]/g, 'i');
	texto = texto.replace(/[ó]/g, 'o');
	texto = texto.replace(/[ú]/g, 'u');
	texto = texto.replace(/[ñ]/g, 'n');
	texto = texto.replace(/ /g, '-');

	return texto;

}

/*******************************************************************************
/************** ACCIÓN DE GESTIÓN DE COMODIDADES PARA LA CATEGORÍA *************
/*******************************************************************************/
async function comodidadesCategoria(id){

    try {
        
        let idCategoria = id;
        let btnComplet = document.querySelector('#botonComodidadesCategorias'+id); /**Lo tengo personalizado para que cada Row sea dinámico */
        let imgDefault = "views/img/defaultCategorias/default.png";

        console.log('idCategoria ==> ' , idCategoria);
        console.log('btnComplet ==> ' , btnComplet);
        console.log('imgDefault ==> ' , imgDefault);

        /**Creo una Cookie para guardar la ficha y hacer una petición con PHP luego
         * que nos queda más fácil hacer el muestreo comodidades marcadas desde el servidor ... **/
        setCookie("idCategoriaHabitacionComodidades" , idCategoria , 1); 

        console.log("Creamos la cookie idCategoriaHabitacionComodidades");

        let banderaComodidades = true;
        let json1; //Para traer categoría
        let json2; //Para traer comodidades
        let json3; //Para traer detalles categoría y panearlos con comodidades.

        /**Primero nos traemos la información de la categoría, podemos usar el de editar: */
        $('#spinnerCargaComodidadesCategoria').modal('show'); // Abrir Modal por que todo está cargado - Para esta operación usamos JQuery ...
        document.querySelector("#spinnerCargaComodidadesCategoria").classList.add("show");

        let respuesta = await fetch("jobs/categorias.ajax.php?"+"idCategoria="+id);
        json1 = await respuesta.json();
        await waitforme(500);

        $('#spinnerCargaComodidadesCategoria').removeClass('fade'); /**Remuevo class fade para que no cause corto con el modal editar */
        $('#spinnerCargaComodidadesCategoria').modal('hide'); // Cerrar Modal por que todo está cargado - Para esta operación usamos JQuery ...

        console.log("json1" , json1);

        document.querySelector('input[name="idCategoriaComodidad"]').value = json1["id"];
        document.querySelector('input[name="tipoCategoriaComodidad"]').value = json1["tipo"] + ' - ' + json1["descripcion"];

        if(json1["img"] == ""){
            document.querySelector('img[id="img-foto-edit-categoria"]').setAttribute("src" , imgDefault); /**Input donde se carga previsualización */
        }else{
            console.log("Tenemos IMG en la BD ...");
            document.querySelector('img[id="img-foto-edit-categoria"]').setAttribute("src" , json1["img"]); /**Input donde se carga previsualización */
        }

        /**Ahora, vamos a marcar los checks que correspondan, se hará de manera cíclica y trabajando
         * también sobre el DOM de forma paralela: */

        /**1. Traigo las comodidades: */
        let resComodidadesMarcar = await fetch("jobs/categorias.ajax.php?"+"banderaComodidades="+banderaComodidades);
        json2 = await resComodidadesMarcar.json();
        await waitforme(250);

        console.log("Resultado del json2 => " , json2);

        /**2. Traigo los detalles de la categoría: */
        let resDetallesComodidadesMarcadas = await fetch("jobs/categorias.ajax.php?"+"idCategoriaDetalles="+idCategoria);
        json3 = await resDetallesComodidadesMarcadas.json();
        await waitforme(250);

        console.log("Resultado del json3 => " , json3);
        
        let div = "";
        let marcado = false;

        /**Recorro primero todas las comodidades registradas */
        for(x of json2){
            /**Inicializo la bandera para controlar:  */
            marcado = false;
            /**Ahora recorro cada uno de los detalles de la categoría. */
            for(y of json3){
                /**Si la comodidad coincide con algún detalle, dibujamos el check con el checked activo */
                if(x.id == y.id_comodidad){
                    
                    div = div + '<div class="col-4"><div class="input-group"><div class="icheck-success"><input checked onclick="accionIncluye()" type="checkbox" id="comodidad-'+x["id"]+'" value="'+x["comodidad"]+','+x["icono"]+'"/><label for="comodidad-'+x["id"]+'"><i class="'+x["icono"]+'"></i>  '+x["comodidad"]+'</label></div></div></div>';
                    /**Cambio la bandera para validar después */
                    marcado = true;

                }

            }
            /**Si no se marco, o sea quedo el false, quiere decir que en los detalles no había registrada esa comodidad,
             * si ese es e caso, dibujamos el check pero lo dibujamos sin el Checked activo, así nos quedará organizado. */
            if(!marcado){
                div = div + '<div class="col-4"><div class="input-group"><div class="icheck-success"><input onclick="accionIncluye()" type="checkbox" id="comodidad-'+x["id"]+'" value="'+x["comodidad"]+','+x["icono"]+'"/><label for="comodidad-'+x["id"]+'"><i class="'+x["icono"]+'"></i>  '+x["comodidad"]+'</label></div></div></div>';
            }

        }

        /**Destino una etiqueta el DOM llamada con el Id setDeChecks que es un Div para insertar allí los datos,
         * insertar -> Dibujar los datos que hemos organizado, usamos la cláusula outerHTML para que nos dibuje
         * considerando la etiqueta que estamso anexando y no la que actua como padre, esto último co la finalidad
         * de que nos dibuje mejor la data. **/
        let divCompact = document.querySelector("#setDeChecks");
        divCompact.outerHTML = div;

        /**Así no lo recomienda Bootstrap, pequeña excepción cono JQuery para abrir Modal Programáticamente. */
        $('#gestionarCategoria').modal('show'); // Abrir Modal por que todo está cargado ...

    } catch (error) {
        console.log(error);
    }

}

function cancelarDetallesCategoria(){
    window.location.reload();
}

async function guardarComodidades(){

    let idCategoria = document.querySelector('input[name="idCategoriaComodidad"]').value;
    console.log("idCategoria desde guardar comodidades - " , idCategoria);

    /**Generamos el array donde guardaremos las selecciones */
    let caracteristicasCategoria = [];

    try {
        
        /**Definimos el JSON y una bandera para distinguir la búsqueda asíncrona de las comodiades,
         * la mecánica es, recorrer todo el JSON obtenido de comodidades y, panear la palabra comodidad-
         * concatenado con el ID de la comodidad en relación al id dinámico que se va generando en el DOM
         * al mostrar el listado de comodidades, si lo recorro y dibujados los elementos entonces voy accediento
         * a los que se van seleccionando: */
        let json0;
        let json1;
        let json2;
        let banderaComodidades = true;

        /**Primero deberíamos eliminar los registros, esto porque, es mas fácil coger y elimianrlos y volverlos a crear, que ir 
         * a modificar uno a uno cada uno de los estados de control, eliminamos de los detalles de comodidad los que correspondan
         * a la categoría de habitación previamente seleccionado y al actualizar se generan nuevos elementos. */

        let elimComodidades = await fetch("jobs/categorias.ajax.php?"+"elimCategoComodidadesId="+idCategoria);
        json0 = await elimComodidades.json();
        await waitforme(250);

        console.log("Resultado de elimComodidades: " , elimComodidades);

        let resComodidades = await fetch("jobs/categorias.ajax.php?"+"banderaComodidades="+banderaComodidades);
        json1 = await resComodidades.json();
        await waitforme(250);

        /**Recorro lo que nos trae la selección: */
        for(x of json1){

            /**Obtengo el checkbox con el id de la concatenación dinámica y verifico
             * si está checked o no para determinar si debo anexarlo: */
             let checkbox = document.querySelector("#comodidad-" + x["id"]);
             let check = checkbox.checked;

             /**Indiferente del caso, obtengo mediante un Split cual es la comodidad y el ícono representativo: */
            let item =  checkbox.value.split(",")[0];
		    let icono =  checkbox.value.split(",")[1];

             /**Si el elemento está marcado, entonces lo agregamos al array */
            if(check){
                console.log("***** Hemos seleccionado *****");
                console.log("checkbox => " , checkbox);
                console.log("check => " , check);
                console.log("item => " , item);
                console.log("icono => " , icono);
                console.log("******* ******* ******* *******");
                
                /**Convierto el array ordinario en uno de objetos para enviar la 
                 * data codificada en formato JSON, para luego, desde el server,
                 * decodificar la data y recorrer para insertar los detalles: */
                caracteristicasCategoria.push({

                    "idCategoria" : idCategoria,
                    "idComodidad" : x["id"],
                    "item" : item,
                    "icono" : icono
            
                });

            }

        }

        console.log("Terminaríamos guardando entonces ::: " , caracteristicasCategoria);
        
        let band;
        /**Ahora recorremos el objeto y vamos guardando la información ... */
        for(let i in caracteristicasCategoria) {
            
            /**Variables para registrar detalle: */
            let idCategoriaInsert = caracteristicasCategoria[i]["idCategoria"];
            let idComodidadInsert = caracteristicasCategoria[i]["idComodidad"];
            
            console.warn(caracteristicasCategoria[i]["item"]);

            let resInsertComodidades = await fetch("jobs/categorias.ajax.php?"+"idCategoriaInsert="+idCategoriaInsert+"&"+"idComodidadInsert="+idComodidadInsert);
            json2 = await resInsertComodidades.json();
            //await waitforme(250);

            if(json2 == "ok"){
                band = true;
                console.log("Insertamos adecuadamente a: " , caracteristicasCategoria[i]["item"]);
            }else{
                band = false;
                console.log("Error insertando a: " , caracteristicasCategoria[i]["item"]);
            }

        } /**Terminamos de recorrer el objeto ... */

        if(band){
            Swal.fire({
                icon: 'success',
                title: 'Agregando Comodidades a la Categoría',
                text: 'Comodidades anexadas con éxito! ...'
            }).then(function(result){
    
                if(result.value || !result.value){
    
                    window.location = "categorias";
    
                } /**Si el resultado valida ok, logramos insertar comodidad y redirecciono */
    
            }) /**Swal de que se insertar comodidad correctamente */
        }

    } catch (error) {
        console.log(error);
    }

}

/**********************************************************************
/************** ACTUALIZACIÓN DE CATEGORÍAS DE HABITACIÓN *************
/**********************************************************************/
async function editarCategoria(id){

    try{

        let idCategoria = id;
        let btnComplet = document.querySelector('#botonEditCategorias'+id); /**Lo tengo personalizado para que cada Row sea dinámico */
        let imgDefault = "views/img/defaultCategorias/default.png";

        console.log('idCategoria ==> ' , idCategoria);
        console.log('btnComplet ==> ' , btnComplet);
        console.log('imgDefault ==> ' , imgDefault);

        /**Primero nos traemos la información de la categoría, podemos usar el de editar: */
        $('#spinnerCargaComodidadesCategoria').modal('show'); // Abrir Modal por que todo está cargado - Para esta operación usamos JQuery ...
        document.querySelector("#spinnerCargaComodidadesCategoria").classList.add("show");

        let respuesta = await fetch("jobs/categorias.ajax.php?"+"idCategoria="+id);
        json1 = await respuesta.json();
        await waitforme(500);

        $('#spinnerCargaComodidadesCategoria').removeClass('fade'); /**Remuevo class fade para que no cause corto con el modal editar */
        $('#spinnerCargaComodidadesCategoria').modal('hide'); // Cerrar Modal por que todo está cargado - Para esta operación usamos JQuery ...

        console.log("json1" , json1);

        document.querySelector('input[name="editarIdCategoria"]').value = json1["id"];
        document.querySelector('input[name="editarRutaCategoria"]').value = json1["ruta"];
        document.querySelector('input[name="editarColorCategoria"]').value = json1["color"];
        document.querySelector('input[name="editarTipoCategoria"]').value = json1["tipo"];

        document.querySelector("#colorAplicadoEdit").style.color = json1["color"]; //Para la clase del colorpicker aplicada

        document.querySelector('span[id="editarNombreImagenCategoria"]').innerHTML = "Desde BD/Default";
        document.querySelector('span[id="editarTamanoImagenCategoria"]').innerHTML = "Desde BD/Default";
        document.querySelector('span[id="editarExtensImagenCategoria"]').innerHTML = "Desde BD/Default";
        document.querySelector(".nombreImagenCargadaEdiCategoria").innerHTML = "Imágen viene desde la Base de Datos";

        if(json1["img"] == ""){
            document.querySelector('input[name="imgFotoCategoriaActual"]').value = imgDefault; /**Input oculto con img temporal */
            document.querySelector('img[id="img-foto-edit-categoria"]').setAttribute("src" , imgDefault); /**Input donde se carga previsualización */
            document.querySelector('input[name="editarFotoCategoria"]').setAttribute("value" , imgDefault); /**Input en que se carga img */
        }else{
            console.log("Tenemos IMG en la BD ...");
            document.querySelector('input[name="imgFotoCategoriaActual"]').value = json1["img"]; /**Input oculto con img temporal */
            document.querySelector('img[id="img-foto-edit-categoria"]').setAttribute("src" , json1["img"]); /**Input donde se carga previsualización */
            document.querySelector('input[name="editarFotoCategoria"]').setAttribute("value" , json1["img"]); /**Input en que se carga img */
        }

        document.querySelector('input[name="editarDescripcionCategoria"]').value = json1["descripcion"];
        document.querySelector('input[name="editarContinental_alta"]').value = json1["continental_alta"];
        document.querySelector('input[name="editarContinental_baja"]').value = json1["continental_baja"];
        document.querySelector('input[name="editarAmericano_alta"]').value = json1["americano_alta"];
        document.querySelector('input[name="editarAmericano_baja"]').value = json1["americano_baja"];

        /**Así no lo recomienda Bootstrap, pequeña excepción cono JQuery para abrir Modal Programáticamente. */
        $('#editarCategoria').modal('show'); // Abrir Modal por que todo está cargado ...

    }catch(error){
        console.log(error);
    }

}

async function eliminarCategoria(id){

    try {
        
        let idCategoriaElim = id;
        let btnComplet = document.querySelector('#botonElimCategoria'+id); /**Lo tengo personalizado para que cada Row sea dinámico */
        let rutaImg = btnComplet.getAttribute('rutaCategoria');

        console.log("idCategoriaElim" , idCategoriaElim);
        console.log('btnComplet' , btnComplet);
        console.log('rutaImg' , rutaImg);

        /**Primero nos traemos la información de la categoría, podemos usar el de editar: */
        $('#spinnerCargaComodidadesCategoria').modal('show'); // Abrir Modal por que todo está cargado - Para esta operación usamos JQuery ...
        document.querySelector("#spinnerCargaComodidadesCategoria").classList.add("show");

        let respuesta = await fetch("jobs/categorias.ajax.php?"+"idCategoria="+id);
        json1 = await respuesta.json();
        await waitforme(500);

        $('#spinnerCargaComodidadesCategoria').removeClass('fade'); /**Remuevo class fade para que no cause corto con el modal editar */
        $('#spinnerCargaComodidadesCategoria').modal('hide'); // Cerrar Modal por que todo está cargado - Para esta operación usamos JQuery ...

        let mensaje = "¿Estás seguro de eliminar la categoría de habitación " + json1["tipo"] + " - " + json1["descripcion"] + "?";

        /**Preguntamos primero */
        Swal.fire({
            title: 'Eliminación de Categoría de Habitación',
            text: mensaje,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar la categoría!',
            cancelButtonText: 'Cancelar'
        }).then(function(result){

            /**Si es verdadero, presionó la tecla aceptar */
            if(result.value){

                /**Habilitamos/Inhabilitamos:
                 * Debemos independizar la operación para manejar mejor la promesa que será resuelta.*/
                realizarEliminacion(idCategoriaElim, rutaImg).then();

            } /**La persona selecciona que si desea eliminar */

        }) /**Estructura then del Sweet Alert */

    } catch (error) {
        console.log(error);
    }

}

/**Realizar la eliminación como tal ... */
async function realizarEliminacion(idCategoriaElim, rutaImg){

    let respuesta = await fetch("jobs/categorias.ajax.php?"+"idCategoriaElim="+idCategoriaElim+"&"+"rutaImg="+rutaImg);
    json = await respuesta.json();
    console.log("json " , json);

    if(json == "ok"){

        Swal.fire({
            icon: 'success',
            title: 'Eliminación de Categoría de Habitación',
            text: 'La Categoría fue eliminado correctamente! ...'
        }).then(function(result){

            if(result.value || !result.value){

                window.location = "categorias";

            } /**Si el resultado valida ok, logramos eliminar y redirecciono */

        }) /**Swal de que se elimino correctamente */

    } /**Si la respuesta que retornamos es Ok */

}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}


/*************** VALIDACIONES POR EL EVENTO KEYPRESS ****************/

/**Validador1 = Validamos permitir caracteres de la a - z - áéíóú
 *              Validamos permitir caracteres de la A - Z - ÁÉÍÓÚ
 *              Validamos permitir caracteres de ñ - Ñ
 *              Validamos los espacios en blanco */
/*************** *********************************** ****************/
let validador1_categorias = (e) => {
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

/**Validador1 = Validamos permitir números del 0 al 9
 *              Validamos permitir caracteres de . para separar decimales */
/*************** *********************************** ****************/
let validador2_categorias = (e) => {
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