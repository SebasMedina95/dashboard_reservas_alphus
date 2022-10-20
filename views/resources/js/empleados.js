/*********************************************
************ DATA TABLE DE ADMINS ************
**********************************************/
$.ajax({

	"url":"jobs/json/tablaEmpleados.ajax.php",
	success: function(respuesta){
		
		//console.log("respuesta", respuesta);

	}

})

/*********************************************************************
********** CONFIGURACIONES PARA EL DATA TABLE DE EMPLEADOS ***********
**********************************************************************/
document.addEventListener('DOMContentLoaded' , (e) => {
    let tabla = new DataTable('#tablaEmpleados' , {
        "ajax":"jobs/json/tablaEmpleados.ajax.php",
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
            {"className": "dt-center", "targets": [0]}, /**La columna de despliegue de mas columnas */
            {"className": "dt-center", "targets": [1]}, /**La columna de las opciones de eliminación/edición ... */
            {"className": "dt-left", "targets": [2]}, /**La columna del documento */
            {"className": "dt-left", "targets": [3]}, /**La columna del nombre del empleado */
            {"className": "dt-left", "targets": [4]}, /**La columna del apellido del empleado */
            {"className": "dt-left", "targets": [5]}, /**La columna del email del empleado */
            {"className": "dt-center", "targets": [6]}, /**La columna del perfil del empleado */
            {"className": "dt-center", "targets": [7]}, /**La columna del usuario */
            {"className": "dt-center", "targets": [8]}, /**La columna del estado */
            {"className": "dt-center", "targets": [9]}, /**La columna de la foto */
            {"className": "dt-left", "targets": [10]}, /**La columna del Teléfono Fíjo */
            {"className": "dt-left", "targets": [11]}, /**La columna del Teléfono Móvil */
            {"className": "dt-left", "targets": [12]}, /**La columna de la dirección */
            {"className": "dt-center", "targets": [13]}, /**La columna del régimen */
            {"className": "dt-center", "targets": [14]} /**La columna de la persona */
        ], 
        "aLengthMenu": [[7, 10, 20, 40, 60, 100 , -1], [7, 10, 20, 40, 60, 100, "Todos"]], 
        "iDisplayLength" : 7,
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

/*********************************************************************
************* PREVISUALIZACIÓN DE IMÁGEN SUBIDA DE ADMIN *************
**********************************************************************/
document.querySelector("#fotoUsuario").addEventListener('change' , (e) => {
    console.log("Cargamos una imágen ...");
    let imagen = document.querySelector("#fotoUsuario").files[0];
    let tamaImg = imagen["size"];
    let tipoImg = imagen["type"];
    let nameImg = imagen["name"];
    let rutaImgDefault = "../../views/img/admins/default/default.png";

    console.log("imagen" , imagen);
    console.log("tamaImg" , tamaImg);
    console.log("tipoImg" , tipoImg);
    console.log("nameImg" , nameImg);
    console.log("rutaImgDefault" , rutaImgDefault);

    /**Solo admitiremos imágenes JPG y PNG */
    if(tipoImg != "image/jpeg" && tipoImg != "image/png"){

        document.querySelector("input[name='fotoUsuario']").value = "";
        document.querySelector(".nombreImagenCargadaAdd").innerHTML = "Sin subir una imágen válida ...";
        document.querySelector("#nombreImagenAdmins").innerHTML = "Sin determinar";
        document.querySelector("#tamanoImagenAdmins").innerHTML = "Sin determinar";
        document.querySelector("#extensImagenAdmins").innerHTML = "Sin determinar";
        document.querySelector("#img-foto").setAttribute('src' , rutaImgDefault);
  
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡ Solo imágenes JPG y PNG son permitidas !'
        })
            
    }else if(tamaImg > 2000000){ /**Equivalente a 2 Megas */

        document.querySelector("input[name='fotoUsuario']").value = "";
        document.querySelector(".nombreImagenCargadaAdd").innerHTML = "Sin subir una imágen válida ...";
        document.querySelector("#nombreImagenAdmins").innerHTML = "Sin determinar";
        document.querySelector("#tamanoImagenAdmins").innerHTML = "Sin determinar";
        document.querySelector("#extensImagenAdmins").innerHTML = "Sin determinar";
        document.querySelector("#img-foto").setAttribute('src' , rutaImgDefault);
  
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
            document.querySelector("#img-foto").setAttribute('src' , rutaImagen);
            document.querySelector(".nombreImagenCargadaAdd").innerHTML = nameImg+tipoImg+"(Peso: "+tamaImg+")";
            document.querySelector("#nombreImagenAdmins").innerHTML = nameImg;
            document.querySelector("#tamanoImagenAdmins").innerHTML = tamaImg;
            document.querySelector("#extensImagenAdmins").innerHTML = tipoImg;
        })

    }

})

/************************************************************** */
/**LO MISMO ANTERIOR DE IMÁGEN PERO PARA EL TEMA DEL ACTUALIZAR */
/************************************************************** */
document.querySelector("#editarFotoUsuario").addEventListener('change' , (e) =>{
    let imagen = document.querySelector("#editarFotoUsuario").files[0];
    let tamaImg = imagen["size"];
    let tipoImg = imagen["type"];
    let nameImg = imagen["name"];
    let rutaImgDefault = "../../views/img/admins/default/default.png";

    console.log("imagen: " , imagen);
    console.log("tamaImg: " , tamaImg);
    console.log("tipoImg: " , tipoImg);
    console.log("nameImg: " , nameImg);

    /**Solo admitiremos imágenes JPG y PNG */
    if(tipoImg != "image/jpeg" && tipoImg != "image/png"){

        document.querySelector("input[name='editarFotoUsuario']").value = "";
        document.querySelector(".nombreImagenCargadaEdi").innerHTML = "Sin subir una imágen válida ...";
        document.querySelector("#editarnNombreImagenAdmins").innerHTML = "Sin determinar";
        document.querySelector("#editarTamanoImagenAdmins").innerHTML = "Sin determinar";
        document.querySelector("#editarExtensImagenAdmins").innerHTML = "Sin determinar";
        document.querySelector("#img-foto-edit").setAttribute('src' , rutaImgDefault);
  
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡ Solo imágenes JPG y PNG son permitidas !'
        })

    }else if(tamaImg > 2000000){

        document.querySelector("input[name='editarFotoUsuario']").value = "";
        document.querySelector(".nombreImagenCargadaEdi").innerHTML = "Sin subir una imágen válida ...";
        document.querySelector("#editarnNombreImagenAdmins").innerHTML = "Sin determinar";
        document.querySelector("#editarTamanoImagenAdmins").innerHTML = "Sin determinar";
        document.querySelector("#editarExtensImagenAdmins").innerHTML = "Sin determinar";
        document.querySelector("#img-foto-edit").setAttribute('src' , rutaImgDefault);

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
            document.querySelector("#img-foto-edit").setAttribute('src' , rutaImagen);
            document.querySelector(".nombreImagenCargadaEdi").innerHTML = nameImg+tipoImg+"(Peso: "+tamaImg+")";
            document.querySelector("#editarnNombreImagenAdmins").innerHTML = nameImg;
            document.querySelector("#editarTamanoImagenAdmins").innerHTML = tamaImg;
            document.querySelector("#editarExtensImagenAdmins").innerHTML = tipoImg;
        })
         

    }

})

/*************************************************************
/************** ACTUALIZACIÓN DE ADMINISTRADORES *************
/*************************************************************/
async function editarAdministrador(id){
    try {
        console.log("Entrando a función editarAdministrador asíncrona ... Cargando Empleado: ");
        /**Capturamos los parámetros que vienen del botón de archivo tablaCargos.ajax.php */
        let idAdministrador = id;
        let btnComplet = document.querySelector('#botonEditAdmins'+id); /**Lo tengo personalizado para que cada Row sea dinámico */
        let imgDefault = "views/img/admins/default/default.png";

        console.log('idAdministrador ==> ' , idAdministrador);
        console.log('btnComplet ==> ' , btnComplet);
        console.log('imgDefault ==> ' , imgDefault);

        $('#spinnerCargaEditarEmpleado').modal('show'); // Abrir Modal por que todo está cargado - Para esta operación usamos JQuery ...
        document.querySelector("#spinnerCargaEditarEmpleado").classList.add("show");

        let respuesta = await fetch("jobs/empleados.ajax.php?"+"idAdministrador="+idAdministrador);
        json = await respuesta.json();
        await waitforme(1200);

        $('#spinnerCargaEditarEmpleado').removeClass('fade'); /**Remuevo class fade para que no cause corto con el modal editar */
        $('#spinnerCargaEditarEmpleado').modal('hide'); // Cerrar Modal por que todo está cargado - Para esta operación usamos JQuery ...

        let tipoDocuName;
        if(json["tipo_documento"] == "CC"){
            tipoDocuName = "Cédula Ciudadania";
        }else if(json["tipo_documento"] == "TE"){
            tipoDocuName = "Tarjeta Extranjería"; 
        }else if(json["tipo_documento"] == "CE"){
            tipoDocuName = "Cédula Extranjería"; 
        }else if(json["tipo_documento"] == "LM"){
            tipoDocuName = "Libreta Militar";
        }else if(json["tipo_documento"] == "PC"){
            tipoDocuName = "Pase Conducción";
        }else if(json["tipo_documento"] == "NIT"){
            tipoDocuName = "Nit Empresa";
        }else if(json["tipo_documento"] == "PSP"){
            tipoDocuName = "Pasaporte";
        }

        /************************************************************** */

        let tipoPerfilName;
        if(json["perfil"] == "Administrador"){
            tipoPerfilName = "Administrador - Acceso Total";
        }else if(json["perfil"] == "Super Editor"){
            tipoPerfilName = "Super Editor - Gestión General Reservas"; 
        }else if(json["perfil"] == "Menor Editor"){
            tipoPerfilName = "Menor Editor - Gestión General Habitaciones"; 
        }else if(json["perfil"] == "Contabilidad"){
            tipoPerfilName = "Contabilidad - Nómina y Cuentas";
        }else if(json["perfil"] == "Atracciones"){
            tipoPerfilName = "Atracciones - Servicio y Bodega";
        }else if(json["perfil"] == "Restaurante"){
            tipoPerfilName = "Restaurante - Servicio y Bodega";
        }else if(json["perfil"] == "Marketing"){
            tipoPerfilName = "Marketing";
        }

        /************************************************************** */

        let estadoCivil;
        if(json["estado_civil"] == "1"){
            estadoCivil = "Soltero(a)";
        }else if(json["estado_civil"] == "2"){
            estadoCivil = "Casado(a)"; 
        }else if(json["estado_civil"] == "3"){
            estadoCivil = "Viudo(a)"; 
        }else if(json["estado_civil"] == "4"){
            estadoCivil = "Divorciado(a)";
        }else if(json["estado_civil"] == "5"){
            estadoCivil = "Unión Libre";
        }

        /************************************************************** */

        let tipoRegimen;
        if(json["tipo_regimen"] == "1"){
            tipoRegimen = "Estado";
        }else if(json["tipo_regimen"] == "2"){
            tipoRegimen = "Gran Contribuyente"; 
        }else if(json["tipo_regimen"] == "3"){
            tipoRegimen = "Común"; 
        }else if(json["tipo_regimen"] == "4"){
            tipoRegimen = "Simple";
        }else if(json["tipo_regimen"] == "5"){
            tipoRegimen = "No Responsable";
        }else if(json["tipo_regimen"] == "6"){
            tipoRegimen = "Pendiente";
        }

        /************************************************************** */

        let tipoPersona;
        if(json["tipo_persona"] == "1"){
            tipoPersona = "Natural";
        }else if(json["tipo_persona"] == "2"){
            tipoPersona = "Jurídica"; 
        }

        /************************************************************** */

        document.querySelector('input[name="editarId"]').value = json["id"];

        document.querySelector('.editarTipoDocumentoOption').value = json["tipo_documento"];
        document.querySelector('.editarTipoDocumentoOption').innerHTML = tipoDocuName;

        document.querySelector('input[name="editarDocumento"]').value = json["documento"];
        document.querySelector('input[name="editarPrimerNombre"]').value = json["primer_nombre"];
        document.querySelector('input[name="editarSegundoNombre"]').value = json["segundo_nombre"];
        document.querySelector('input[name="editarPrimerApellido"]').value = json["primer_apellido"];
        document.querySelector('input[name="editarSegundoApellido"]').value = json["segundo_apellido"];
        document.querySelector('input[name="editarCorreoElectronico"]').value = json["email"];

        document.querySelector('.editarPerfilOption').value = json["perfil"];
        document.querySelector('.editarPerfilOption').innerHTML = tipoPerfilName;

        document.querySelector('input[name="editarTelefonoCelular"]').value = json["telefono_movil"];
        document.querySelector('input[name="editarTelefonoFijo"]').value = json["telefono_fijo"];
        document.querySelector('input[name="editarDireccion"]').value = json["direccion"];
        document.querySelector('input[name="editarFecha_nacimiento"]').value = json["fecha_nacimiento"];

        document.querySelector('.editarEstado_civilOption').value = json["estado_civil"];
        document.querySelector('.editarEstado_civilOption').innerHTML = estadoCivil;

        document.querySelector('.editarTipo_regimenOption').value = json["tipo_regimen"];
        document.querySelector('.editarTipo_regimenOption').innerHTML = tipoRegimen;

        document.querySelector('.editarTipo_personaOption').value = json["tipo_persona"];
        document.querySelector('.editarTipo_personaOption').innerHTML = tipoPersona;

        document.querySelector('input[name="editarNombreUsuario"]').value = json["usuario"];
        document.querySelector('input[name="passwordActual"]').value = json["password"];

        if(json["foto"] == ""){
            document.querySelector('input[name="imgFotoUserActual"]').value = imgDefault; /**Input oculto con img temporal */
            document.querySelector('img[id="img-foto-edit"]').setAttribute("src" , imgDefault); /**Input donde se carga previsualización */
            document.querySelector('input[name="editarFotoUsuario"]').setAttribute("value" , imgDefault); /**Input en que se carga img */
        }else{
            document.querySelector('input[name="imgFotoUserActual"]').value = json["foto"]; /**Input oculto con img temporal */
            document.querySelector('img[id="img-foto-edit"]').setAttribute("src" , json["foto"]); /**Input donde se carga previsualización */
            document.querySelector('input[name="editarFotoUsuario"]').setAttribute("value" , json["foto"]); /**Input en que se carga img */
        }

        document.querySelector('span[id="editarnNombreImagenAdmins"]').innerHTML = "Desde BD/Default";
        document.querySelector('span[id="editarTamanoImagenAdmins"]').innerHTML = "Desde BD/Default";
        document.querySelector('span[id="editarExtensImagenAdmins"]').innerHTML = "Desde BD/Default";
        document.querySelector(".nombreImagenCargadaEdi").innerHTML = "Imágen viene desde la Base de Datos";

        document.querySelector('textarea[name="editarAnotaciones_usuario"]').innerHTML = json["anotaciones"];

        console.log('json ==> ' , json);

        /**Así no lo recomienda Bootstrap, pequeña excepción cono JQuery para abrir Modal Programáticamente. */
        $('#editarAdministrador').modal('show'); // Abrir Modal por que todo está cargado ...
        
    } catch (error) {
        console.log("Error! -> " , error);
    }
}

/******************************************************
************* CANCELAR AGREGADO DE ADMINS *************
*******************************************************/
const cancelarAdmins = (e) =>{
    console.log("----- CANCELAR OPERACIÓN -----");
    let rutaImgDefault = "../../views/img/admins/default/default.png";

    document.querySelector("#img-foto").setAttribute('src' , rutaImgDefault);
    document.querySelector(".nombreImagenCargadaAdd").innerHTML = "Sin subir una imágen válida ...";
    document.querySelector("#nombreImagenAdmins").innerHTML = "Sin determinar";
    document.querySelector("#tamanoImagenAdmins").innerHTML = "Sin determinar";
    document.querySelector("#extensImagenAdmins").innerHTML = "Sin determinar";

}

/************************************************************************/
/*********** SI SUBIO UNA IMÁGEN PERO SE ARREPIENTE (Agregar) ***********/
/************************************************************************/
const cancelarImgAdmins = (e) => {
    e.preventDefault();
    let rutaImgDefault = "views/img/admins/default/default.png";

    document.querySelector("input[name='fotoUsuario']").value = "";
    document.querySelector(".nombreImagenCargadaAdd").innerHTML = "Sin subir una imágen válida aún...";
    document.querySelector("#nombreImagenAdmins").innerHTML = "Sin determinar";
    document.querySelector("#tamanoImagenAdmins").innerHTML = "Sin determinar";
    document.querySelector("#extensImagenAdmins").innerHTML = "Sin determinar";
    document.querySelector("#img-foto").setAttribute('src' , rutaImgDefault);
    
}

/************************************************************************/
/************ SI SUBIO UNA IMÁGEN PERO SE ARREPIENTE (Editar) ***********/
/************************************************************************/
const cancelarImgAdminsEdit = (e) => {
    e.preventDefault();
    console.log("Entre en la edición de la foto ...");
    let rutaImgEnBd = document.querySelector(".imgFotoUserActual").value;
    console.log("rutaImgEnBd" , rutaImgEnBd);
    console.log("Asignar rutaImgEnBd: " , rutaImgEnBd);

    document.querySelector("input[name='editarFotoUsuario']").setAttribute("value" , "");
    document.querySelector("#editarFotoUsuario").value = "";
    document.querySelector(".nombreImagenCargadaEdi").innerHTML = "La que traemos de la base de datos ...";
    document.querySelector("#editarnNombreImagenAdmins").innerHTML = "Sin determinar";
    document.querySelector("#editarTamanoImagenAdmins").innerHTML = "Sin determinar";
    document.querySelector("#editarExtensImagenAdmins").innerHTML = "Sin determinar";
    document.querySelector("#img-foto-edit").setAttribute('src' , rutaImgEnBd);

}

/*************************************************************
************* VALIDAR FORMULARIO REGISTRO VÍA JS *************
******** TODO ESTO SERÁ USANDO JQUERY, SIMILAR EN JS *********
******** Validaremos tanto el agregar como el editar *********
**************************************************************/
/**https://elcodigoascii.com.ar/ */
/**Los validadores del 1 al 5 están definidos para trabajar el evento Keypress independientes,
 * al trabajar JS Puro, tomar varios elementos al tiempo del DOM es mucho mas complejo, y como la idea
 * es no usar JQuery en la medida de lo posible, podemos hacerlo dividiendo los casos de la siguiente manera: */
document.querySelector("#primerNombre").addEventListener('keypress' , (e) => { validador1(e); });
document.querySelector("#segundoNombre").addEventListener('keypress' , (e) => { validador1(e); });
document.querySelector("#primerApellido").addEventListener('keypress' , (e) => { validador1(e); });
document.querySelector("#segundoApellido").addEventListener('keypress' , (e) => { validador1(e); });
document.querySelector("#editarPrimerNombre").addEventListener('keypress' , (e) => { validador1(e); });
document.querySelector("#editarSegundoNombre").addEventListener('keypress' , (e) => { validador1(e); });
document.querySelector("#editarPrimerApellido").addEventListener('keypress' , (e) => { validador1(e); });
document.querySelector("#editarSegundoApellido").addEventListener('keypress' , (e) => { validador1(e); });

document.querySelector("#anotaciones_usuario").addEventListener('keypress' , (e) => { validador2(e); });
document.querySelector("#editarAnotaciones_usuario").addEventListener('keypress' , (e) => { validador2(e); });

document.querySelector("#nombreUsuario").addEventListener('keypress' , (e) => { validador3(e); });
document.querySelector("#editarNombreUsuario").addEventListener('keypress' , (e) => { validador3(e); });
document.querySelector("#passwordUsuario").addEventListener('keypress' , (e) => { validador3(e); });
document.querySelector("#editarPasswordUsuario").addEventListener('keypress' , (e) => { validador3(e); });

document.querySelector("#correoElectronico").addEventListener('keypress' , (e) => { validador4(e); });
document.querySelector("#editarCorreoElectronico").addEventListener('keypress' , (e) => { validador4(e); });

document.querySelector("#telefonoCelular").addEventListener('keypress' , (e) => { validador5(e); });
document.querySelector("#telefonoFijo").addEventListener('keypress' , (e) => { validador5(e); });
document.querySelector("#editarTelefonoCelular").addEventListener('keypress' , (e) => { validador5(e); });
document.querySelector("#editarTelefonoFijo").addEventListener('keypress' , (e) => { validador5(e); });
document.querySelector("#documento").addEventListener('keypress' , (e) => { validador5(e); });
document.querySelector("#editarTelefonoCelular").addEventListener('keypress' , (e) => { validador5(e); });
document.querySelector("#editarDocumento").addEventListener('keypress' , (e) => { validador5(e); });

document.querySelector("#direccion").addEventListener('keypress' , (e) => { validador6(e); });
document.querySelector("#editarDireccion").addEventListener('keypress' , (e) => { validador6(e); });

/*************************************************************************
/************** ACTIVAR/DESACTIVAR UN ADMINISTRADOR/EMPLEADO *************
/*************************************************************************/
async function gestionarEstAdmins(id){

    try {
        /**Capturamos los parámetros que vienen del botón de archivo tablaCargos.ajax.php */
        let idAdmin = id;
        let btnComplet = document.querySelector('#botonCamEstAdmins'+id); /**Lo tengo personalizado para que cada Row sea dinámico */
        let estadoAdmin = btnComplet.getAttribute('estadoAdmin');

        console.log("idAdmin" , idAdmin);
        console.log('btnComplet' , btnComplet);
        console.log("estadoAdmin" , estadoAdmin);

        $('#spinnerCargaEditarEmpleado').modal('show'); // Abrir Modal por que todo está cargado - Para esta operación usamos JQuery ...
        document.querySelector("#spinnerCargaEditarEmpleado").classList.add("show");

        let respuesta = await fetch("jobs/empleados.ajax.php?"+"idAdministrador="+idAdmin);
        json1 = await respuesta.json();
        await waitforme(1000);

        $('#spinnerCargaEditarEmpleado').removeClass('fade'); /**Remuevo class fade para que no cause corto con el modal editar */
        $('#spinnerCargaEditarEmpleado').modal('hide'); // Cerrar Modal por que todo está cargado - Para esta operación usamos JQuery ...

        let documentoCap = json1["tipo_documento"] + " - " + json1["documento"];
        let nombreCap = json1["primer_nombre"] + " " + json1["segundo_nombre"] + " " + json1["primer_apellido"] + " " + json1["segundo_apellido"];
        let mensaje;

        if(estadoAdmin == "1"){
            mensaje = "¿Estás seguro de activar al empleado/administrador: " + documentoCap + " - " + nombreCap +" ?"
        }else{
            mensaje = "¿Estás seguro de desactivar al empleado/administrador: " + documentoCap + " - " + nombreCap +" ?"
        }

        /**Preguntamos primero */
        Swal.fire({
            title: 'Gestión de Empleado',
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
                habilitar_inhabilitar(idAdmin , estadoAdmin).then();

            } /**La persona selecciona que si desea eliminar */

        }) /**Estructura then del Sweet Alert */  

    } catch (error) {
        console.log("Error ==> " , error)
    }

}

async function habilitar_inhabilitar(idAdmin , estadoAdmin){

    let respuesta = await fetch("jobs/empleados.ajax.php?"+"idAdmin="+idAdmin+"&"+"estadoAdmin="+estadoAdmin);
    json = await respuesta.json();
    console.log("json " , json);

    if(json == "ok"){

        if(estadoAdmin == 0){

            const boton = document.querySelector('#botonCamEstAdmins'+idAdmin);
            boton.classList.remove('btn-info');
            boton.classList.add('btn-dark');
            boton.innerHTML = "Desactivado";
            boton.setAttribute('estadoAdmin' , 1);

            Swal.fire({
                icon: 'info',
                title: 'Gestión de Estado',
                text: 'El Empleado fue Desactivado ...'
            });

        }else{

            const boton = document.querySelector('#botonCamEstAdmins'+idAdmin);
            boton.classList.remove('btn-dark');
            boton.classList.add('btn-info');
            boton.innerHTML = "Activado";
            boton.setAttribute('estadoAdmin' , 0);

            Swal.fire({
                icon: 'info',
                title: 'Gestión de Estado',
                text: 'El Empleado fue Activado ...'
            });

        } /**Estado */

    } /**Si la respuesta que retornamos es Ok */

}

/******************************************************
/***** DADO EL CASO QUE QUERAMOS DESACTIVAR ADMIN *****
/******************************************************/
const gestionarEstSuperAdmin = () => {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'El SUPER ADMINISTRADOR del sistema no puede ser inhabilitado, siempre se encuentra activo ...'
    });
    return;
}

/***********************************************************************
/************** ELIMINAR UN EMPLEADO QUE PUEDA SER BORRADO *************
/***********************************************************************/
async function eliminarAdministrador(id) {

    try {

        let idAdministradorElim = id;
        let btnComplet = document.querySelector('#botonElimAdmins'+id); /**Lo tengo personalizado para que cada Row sea dinámico */

        console.log("idAdministradorElim" , idAdministradorElim);
        console.log('btnComplet' , btnComplet);

        $('#spinnerCargaEditarEmpleado').modal('show'); // Abrir Modal por que todo está cargado - Para esta operación usamos JQuery ...
        document.querySelector("#spinnerCargaEditarEmpleado").classList.add("show");

        let respuesta = await fetch("jobs/empleados.ajax.php?"+"idAdministrador="+idAdministradorElim);
        json1 = await respuesta.json();
        await waitforme(1000);

        $('#spinnerCargaEditarEmpleado').removeClass('fade'); /**Remuevo class fade para que no cause corto con el modal editar */
        $('#spinnerCargaEditarEmpleado').modal('hide'); // Cerrar Modal por que todo está cargado - Para esta operación usamos JQuery ...

        let documentoCap = json1["tipo_documento"] + " - " + json1["documento"];
        let nombreCap = json1["primer_nombre"] + " " + json1["segundo_nombre"] + " " + json1["primer_apellido"] + " " + json1["segundo_apellido"];
        let mensaje = "¿Estás seguro de eliminar al empleado: ?" + documentoCap + " - " + nombreCap;

        /**Preguntamos primero */
        Swal.fire({
            title: 'Eliminación de Empleado',
            text: mensaje,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar empleado!',
            cancelButtonText: 'Cancelar'
        }).then(function(result){

            /**Si es verdadero, presionó la tecla aceptar */
            if(result.value){

                /**Habilitamos/Inhabilitamos:
                 * Debemos independizar la operación para manejar mejor la promesa que será resuelta.*/
                realizarEliminacion(idAdministradorElim).then();

            } /**La persona selecciona que si desea eliminar */

        }) /**Estructura then del Sweet Alert */  

    } catch (error) {
        console.log(error);
    }

}

async function realizarEliminacion(idAdministradorElim){

    let respuesta = await fetch("jobs/empleados.ajax.php?"+"idEliminar="+idAdministradorElim);
    json = await respuesta.json();
    console.log("json " , json);

    if(json == "ok"){

        Swal.fire({
            icon: 'success',
            title: 'Eliminación de Empleado',
            text: 'El Empleado fue eliminado correctamente! ...'
        }).then(function(result){

            if(result.value || !result.value){

                window.location = "empleados";

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

/**Validador2 = Validamos permitir caracteres de la a - z - áéíóú
 *              Validamos permitir caracteres de la A - Z - ÁÉÍÓÚ
 *              Validamos permitir caracteres de ñ - Ñ
 *              Validamos permitir números del 0 al 9
 *              Validamos permitir caracteres como -, , _ , .
 *              Validamos los espacios en blanco */
let validador2 = (e) => {
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

/**Validador3 = Validamos permitir caracteres de la a - z
 *              Validamos permitir caracteres de la A - Z
 *              Validamos permitir caracteres de ñ - Ñ
 *              Validamos permitir números del 0 al 9 */
let validador3 = (e) => {
    let keynum = window.event ? window.event.keyCode : e.which; /**Obtenemos el código ASCII */
    console.log(e.which || e.keyCode);
    /**Realizamos la validación en estilo ASCII*/
    if((keynum >= 65 && keynum <= 90) ||                            /**Letras de a-z */
       (keynum >= 97 && keynum <= 122) ||                           /**Letras de A-Z */
       (keynum >= 48 && keynum <= 57) ||                            /**Números 0-9*/ 
       (keynum == 241) || (keynum == 209)){                         /**Ñ o ñ */                                                          

        return true;

        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No se permiten caracteres especiales en este campo, solo letras y números (NO se permiten vocales tildadas) ...'
            });
        return false;

    } 
}

/**Validador4 = Validamos permitir caracteres de la a - z
 *              Validamos permitir caracteres de la A - Z
 *              Validamos permitir caracteres de _ - . @ sin espacios
 *              Validamos permitir números del 0 al 9 */
let validador4 = (e) => {
    let keynum = window.event ? window.event.keyCode : e.which; /**Obtenemos el código ASCII */
    console.log(e.which || e.keyCode);
    /**Realizamos la validación en estilo ASCII*/
    if((keynum >= 65 && keynum <= 90) ||                                            /**Letras de a-z */
       (keynum >= 97 && keynum <= 122) ||                                           /**Letras de A-Z */
       (keynum >= 48 && keynum <= 57) ||                                            /**Numeros de 0-9*/
       (keynum == 95) || (keynum == 45) || (keynum == 46) || (keynum == 64)){       /** El - y _ y . y @*/                                                       

        return true;

        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No se permiten caracteres especiales en este campo, solo letras, números, -_.@ ... (NO se permiten vocales tildadas) ...'
            });
        return false;

    }
}

/**Validador5 = Validamos permitir números del 0 al 9 */
let validador5 = (e) => {
    let keynum = window.event ? window.event.keyCode : e.which; /**Obtenemos el código ASCII */
    console.log(e.which || e.keyCode);
    /**Realizamos la validación en estilo ASCII*/
    if((keynum >= 48 && keynum <= 57)){   /**Numeros de 0-9*/

        return true;

    }else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Este campo solo permite números ...'
        });
    return false;

    }  
}

/**Validador6 = Validamos permitir caracteres de la a - z
 *              Validamos permitir caracteres de la A - Z
 *              Validamos permitir caracteres de - y _ y  y # y ( y ) para direcciones
 *              Validamos permitir números del 0 al 9 */
let validador6 = (e) => {
    let keynum = window.event ? window.event.keyCode : e.which; /**Obtenemos el código ASCII */
    console.log(e.which || e.keyCode);
    /**Realizamos la validación en estilo ASCII*/
    if((keynum >= 65 && keynum <= 90) ||                                            /**Letras de a-z */
       (keynum >= 97 && keynum <= 122) ||                                           /**Letras de A-Z */
       (keynum >= 48 && keynum <= 57) ||                                            /**Numeros de 0-9*/
       (keynum == 45) || (keynum == 95) || (keynum == 32) || (keynum == 35) || (keynum == 40) || (keynum == 41)){       /** - y _ y  y # y ( y )*/  

        return true;

    }else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No se permiten caracteres especiales en este campo, solo letras, números, -_ #() ... (NO se permiten vocales tildadas) ...'
        });
    return false;

    } 
}

/**Función de espera para Async Await - Para ayudar los Time */
function waitforme(milisec) {
    return new Promise(resolve => {
        setTimeout(() => { resolve('') }, milisec);
    })
}