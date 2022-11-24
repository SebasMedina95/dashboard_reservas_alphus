/**Cambiar los modos oscuro - claro */
$(".cambiarModoLuz").click(function(){

    /**Aplicamos modo claro */
    if($(".cambiarModoLuz").attr("modo") == "1"){
        console.log("Estamos aplicando el modo claro");
        $(".cambiarModoLuz").attr("modo" , "2");
        $(".cambiarModoLuz").html("<i title='Modo Oscuro' class='fa-solid fa-moon'></i>");
        $("#bodyPlantilla").removeClass("sidebar-mini control-sidebar-slide-open sidebar-collapse dark-mode");
        $("#bodyPlantilla").addClass("sidebar-mini control-sidebar-slide-open sidebar-collapse");
    /**Aplicamos modo oscuro */
    }else{
        console.log("Estamos aplicando el modo oscuro");
        $(".cambiarModoLuz").attr("modo" , "1");
        $(".cambiarModoLuz").html("<i title='Modo Claro' class='fa-solid fa-sun'></i>");
        $("#bodyPlantilla").removeClass("sidebar-mini control-sidebar-slide-open sidebar-collapse");
        $("#bodyPlantilla").addClass("sidebar-mini control-sidebar-slide-open sidebar-collapse dark-mode");
    }

});

$(document).ready(function(){
    /**Vamos a cargar directamente en cada JS y no general */

    // Summernote
    $('#summernote').summernote({
        height: 200,
        toolbar: [
            ['style', ['bold', 'italic', 'underline']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']]
          ]
    });

    // //Initialize Select2 Elements
    // $('.select2').select2()
    
    // //Initialize Select2 Elements
    // $('.select2bs4').select2({
    //   theme: 'bootstrap4'
    // })
    
    /***********************************************************
     * ************* Cargamos los componentes directamente:  
     *********************************************************** */
    // $('#selectCargos').select2({
    //     theme: 'bootstrap4',
    //     dropdownParent: $('#crearContratoAdministrador')
    // });

    // $('#editarSelectCargos').select2({
    //     theme: 'bootstrap4',
    //     dropdownParent: $('#actualizarContratoAdministrador')
    // });

    // $('#selectAddConceptoFicha').select2({
    //     theme: 'bootstrap4',
    //     dropdownParent: $('#agregarDetalleConceptoFicha')
    // });

})

/*********************************
********** COLOR PICKER **********
**********************************/
$(".colorPicker").colorpicker();
$('.my-colorpicker1').colorpicker();
$('.my-colorpicker2').colorpicker();

$('.my-colorpicker2').on('colorpickerChange', function(event) {
    $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
});


$("[name='my-checkbox']").bootstrapSwitch();

/*********************************************
***** Escoger Características con ICHECK *****
**********************************************/

// $('input[type="checkbox"], input[type="radio"]').iCheck({

// 	checkboxClass: 'icheckbox_flat-blue',
// 	radioClass   : 'iradio_flat-blue'
// })

/**Por medio de una petición de Ajax vamos a actualizar automáticamente
 * y de forma asíncrona el estilo oscuro o light del hotel, lo aplicaremos
 * en lo posible usando JS Puro para la generalidad y JQuery para la petición: 
 * 
 * NOTA! .....
 * Quemaremos las clases en variables, es decir, todo será aplicado en co - relación
 * a la plantilla AdminLte, por ende, LA VERSIÓN ES FUNDAMENTAL, trabajaremos para todo
 * este proyecto la versión 3.2 ... Octubre 3/2022
 * 
 * */
document.querySelector(".cambiarModoLuzPlantilla").addEventListener('click' , () => {
    console.log("CAMBIANDO MODO DE LUZ ...");
    let idPlantilla = 1; /**Traernos el primer elemento y único a decir verdad. */

    /**Defino los datos que enviaré a Ajax */
    let datos = new FormData();
  	datos.append("idPlantilla", idPlantilla);

    $.ajax({
        url:"ajax/plantilla-alphus.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success:function(respuesta){
            console.log("respuesta: " , respuesta);

            /**Asignamos las clases en variables */
            let headerModoClaro = "navbar-white"; /**Y quitamos navbar-dark */
            let headerModoOscuro = "navbar-dark"; /**Y quitamos navbar-white */
            let bodyModoClaro = "light-mode"; /**Y quitamos dark-mode */
            let bodyModoOscuro = "dark-mode"; /**Y quitamos light-mode */
            let queAplicaremos = "";
            let mensaje = "";
            let modo = "";

            if(respuesta["modoOscuroDashboard"] == "1"){
                console.log("Tenemos registrado [1] en [modoOscuroDashboard], o sea, Modo Osucro ---> Aplicamos Modo Claro [[[ 2 ]]] ");
                queAplicaremos = "2";
                mensaje = "¿Estás seguro de pasar a modo CLARO el gestor de contenido del Hotel Alphus?";
                modo = "CLARO";
            }else{
                console.log("Tenemos registrado [2] en [modoOscuroDashboard], o sea, Modo Claro ---> Aplicamos Modo Oscuro [[[ 1 ]]] ");
                queAplicaremos = "1";
                mensaje = "¿Estás seguro de pasar a modo OSCURO el gestor de contenido del Hotel Alphus?";  
                modo = "OSCURO";             
            }

            Swal.fire({
                title: 'Cambio Modo Iluminación del Gestor',
                text: mensaje,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, cambiar Modo!',
                cancelButtonText: 'Cancelar'
            }).then(function(result){

                if(result.value){
                    console.log("Cambio Realizado ... Pasaremos a: " , modo);

                    /**Haremos la siguiente petición de Ajax pero para hacer el cambio */
                    let idModoChange = queAplicaremos;
                    /**Defino los datos que enviaré a Ajax */
                    let datosEx = new FormData();
                    datosEx.append("idModoChange", idModoChange);

                    $.ajax({
                        url:"ajax/plantilla-alphus.ajax.php",
                        method: "POST",
                        data: datosEx,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success:function(respuestaEx){

                            if(respuestaEx == "ok"){
                                let mensajito = "Se ha cambiado el modo a " + modo + " correctamente!";

                                Swal.fire({
                                    icon: "success",
                                    title: "¡ Correcto !",
                                    text: mensajito
                                }).then(function(result){

                                    if(result.value || !result.value){

                                        window.location.reload(true);

                                    } /**Si el resultado valida ok, logramos cambiar y redirecciono */

                                }) /**Swal de que se cambio el modo correctamente */

                            }else{
                                Swal.fire({
                                    icon: "error",
                                    title: "No se pudo cambiar el MODO",
                                    text: "¡ No pudimos cambiar el modo de iluminación ... !"
                                })
                            }

                        }

                    }) /**Ajax ejecución de actualización */


                }else{

                    console.log("Cambio abortado ...");

                } /**Respuesta del Then */

            }) /**Then del Ajax que trae la información de la planilla */

        } /**Rspuesta del Ajax que trae la información */
        
    }) /**Ajax que trae la información para la actualización */

}) /**Document.QuerySelector(...).addEventListener(...) ... */

/**LIMPIAR CACHE Y RELOAD SITIO */
$(".limpiarCacheSitio").click(function(){
    window.location.reload(true); /**Con el true en el argumento forzamos la recarga del servidor y no almacenada en caché */
})
