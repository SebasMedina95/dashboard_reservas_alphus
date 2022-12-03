/*******************************************************
************ DATA TABLE DE CONTRATOS ADMINS ************
********************************************************/
$.ajax({

    "url":"jobs/json/tablaContratosEmpleados.ajax.php",
	success: function(respuesta){
		
		//console.log("respuesta", respuesta);

	}

})

/*****************************************************************************************
************ CONFIGURACIONES PARA EL DATA TABLE DE CONTRATOS EMPLEADOS/ADMINS ************
******************************************************************************************/
document.addEventListener('DOMContentLoaded' , (e) => {
    let tabla = new DataTable('#tablaContratosEmpleados' , {
        "ajax":"jobs/json/tablaContratosEmpleados.ajax.php",
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

            "sProcessing":     "Procesando...",
            "sLengthMenu":     "<i class='fa-solid fa-eye'></i> Visualizar _MENU_ Registros al Tiempo.",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando del _START_ al _END_ Registro",
            "sInfoEmpty":      "Mostrando del 0 al 0",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "<div class='btn btn-primary ml-6'><i class='fas fa-search'></i> Buscar:</div>",
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
            {"className": "dt-center", "targets": [2]}, /**La columna de la fotografía */
            {"className": "dt-right", "targets": [3]}, /**La columna del documento del empleado */
            {"className": "dt-left", "targets": [4]}, /**La columna del Nombre del empleado */
            {"className": "dt-left", "targets": [5]}, /**La columna del código generado de contrato */
            {"className": "dt-right", "targets": [6]}, /**La columna del salario básico */
            {"className": "dt-right", "targets": [7]}, /**La columna de la cuenta de ahorros */
            {"className": "dt-right", "targets": [8]}, /**La columna del porcentaje de riesgo */
            {"className": "dt-left", "targets": [9]}, /**La columna del periodo de pago */
            {"className": "dt-left", "targets": [10]}, /**La columna del tipo de contratación */
            {"className": "dt-center", "targets": [11]}, /**La columna de la fecha de inicio de contratación */
            {"className": "dt-center", "targets": [12]}, /**La columna del cargo del empleado */
            {"className": "dt-center", "targets": [13]}, /**La columna del estado de contratación */
            {"className": "dt-left", "targets": [14]}, /**La columna de las anotaciones adicionales */
            {"className": "dt-left", "targets": [15]} /**La columna del registro y/o último movimiento de la tupla */
        ], 
        "aLengthMenu": [[7, 10, 20, 40, 60, 100 , -1], [7, 10, 20, 40, 60, 100, "Todos"]], 
        "iDisplayLength" : 7,
        "responsive": true, "lengthChange": true,
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

/*******************************************************************
/******* ACTIVO EL SELECT2 Y DE PASO ASIGNO LA EXTENSIÓN      ******
 * ***** ESPECIALIZADA PARA BOOTSTRAP 4 -> Select Admins      ******
 * ***** así como también Select Cargos lo cargamos           ******
 * ***** Nota: Es necesario hacerlo con JQuery completamente. ******
/*******************************************************************/
$(document).ready(function(){

    $('#selectCargos').select2({
        dropdownParent: $('#crearContratoEmpleado'),
        placeholder: "Buscar cargo ...",
        theme: 'bootstrap4',
    });

    $('#selectAdminEmp').select2({
        dropdownParent: $('#crearContratoEmpleado'),
        placeholder: "Buscar empleado ...",
        theme: 'bootstrap4',
    });
    
})
/*******************************************************************

/****************************************************************
/************** CAPTURO LOS VALUES DE CARGOS ********************
 ***** Por ser select2, librería, tendrá que ser con JQuery *****
/****************************************************************/
$(document).on('change', '#selectCargos', function(event) {
    let text = $("#selectCargos option:selected").text();
    let val = $("#selectCargos option:selected").val();
    console.log(text);
    console.log(val);
});

/*****************************************************************
/************ VAMOS A AUTOGENERAR CÓDIGO DE CONTRATO *************
 ****** Por ser select2, librería, tendrá que ser con JQuery *****
/*****************************************************************/
$(document).on('change', '#selectAdminEmp', function(event) {
    let text = $("#selectAdminEmp option:selected").text();
    let val = $("#selectAdminEmp option:selected").val();
    console.log(text);
    console.log(val);

    if(val == 0 || val == ""){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Se debe auto generar el código de contrato - Seleccione por favor un empleado válido ...'
        });
        $("#codigoContrato").val("");
        return;
    }

    /**Código de contrato tiene el esquema: CON-"+DOCUMENTOADMIN+"_"DIA.MES.AÑO-ALEATORIO4DIGITOS" */
    /**Ejemplo código => CON-12167179499_130920221436*/
    const fecha = new Date(); /**Obteniendo la fecha actual .... */
    /**Math.floor(Math.random() * (max - min + 1) + min); donde max = 9 y min = 0 */
    const aleatoro1 = Math.floor(Math.random() * (9 - 0 + 1) + 0).toString();
    const aleatoro2 = Math.floor(Math.random() * (9 - 0 + 1) + 0).toString();
    const aleatoro3 = Math.floor(Math.random() * (9 - 0 + 1) + 0).toString();
    const aleatoro4 = Math.floor(Math.random() * (9 - 0 + 1) + 0).toString();

    let con = "CON";
    let doc = text.split(" - ")[0];
    let dia = fecha.getDate().toString();
    let mes = fecha.getMonth().toString();
    let ano = fecha.getFullYear().toString();
    let ale = aleatoro1 + aleatoro2 + aleatoro3 + aleatoro4;

    let codigoContratoGen = con + "-" + doc + "_" + dia + mes + ano + ale;
    console.log("codigoContratoGen" , codigoContratoGen);

    //$("#codigoContrato").val(codigoContratoGen);
    document.querySelector("#codigoContrato").value = codigoContratoGen;

});

/******************************************************
/******* VALIDAMOS EL TIPO CONTRATO PARA FECHAS *******
/******************************************************/
document.querySelector('#tipoContrato').addEventListener("change" , () => {
    let select = document.querySelector('#tipoContrato');
    let text = select.options[select.selectedIndex].text;
    let val =  select.options[select.selectedIndex].value;
    console.log(text);
    console.log(val);

    if(val == 2){
        /**Trabajo desde el contenedor para ocultarlo en general .... */
        // console.log("Inhabilito")
        document.getElementById("divFinContrato").setAttribute("hidden","");

    }else{
        /**Remuevo el ocultar porque realmente si aplica .... */
        // console.log("Habilito")
        document.getElementById("divFinContrato").removeAttribute("hidden");
    }
})

/*************************************************************
************* VALIDAR FORMULARIO REGISTRO VÍA JS *************
******** Validaremos tanto el agregar como el editar *********
**************************************************************/
/**https://elcodigoascii.com.ar/ */
document.querySelector("#salarioBasico").addEventListener('keypress' , (e) => { validador1_Contratos(e); });
document.querySelector("#porcentajeRiesgo").addEventListener('keypress' , (e) => { validador1_Contratos(e); });
document.querySelector("#editarPorcentajeRiesgo").addEventListener('keypress' , (e) => { validador1_Contratos(e); });

document.querySelector("#cuentaAhorros").addEventListener('keypress' , (e) => { validador2_Contratos(e); });
document.querySelector("#editarCuentaAhorros").addEventListener('keypress' , (e) => { validador2_Contratos(e); });

document.querySelector("#anotaciones_contrato").addEventListener('keypress' , (e) => { validador3_Contratos(e); })
document.querySelector("#editarAnotaciones_contrato").addEventListener('keypress' , (e) => { validador3_Contratos(e); })

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

/*************************************************************
************** VALIDAR OBLIGATORIEDAD DE CAMPOS **************
******** TODO ESTO SERÁ USANDO JQUERY, SIMILAR EN JS *********
******** Lo usaremos tanto para agregar como editar  *********
**************************************************************/
function validarFormularioContratosAdmins(form){

    /**Capturamos si vamos a agregar, editar, eliminar, habilitar/inhabilitar */
    let formulario = form;
    /**Agregar */
    let empleado = document.querySelector("#selectAdminEmp").value;
    let codigo_contrato = document.querySelector("#codigoContrato").value;
    let salario_basico = document.querySelector("#salarioBasico").value;
    let cuenta_ahorros = document.querySelector("#cuentaAhorros").value;
    let porcentaje_riesgo = document.querySelector("#porcentajeRiesgo").value;
    let fecha_inicio = document.querySelector("#inicioContrato").value;
    let fecha_fin = document.querySelector("#finContrato").value;

    /**Editar */
    let editarCuenta_ahorros = document.querySelector("#editarCuentaAhorros").value;
    let editarPorcentaje_riesgo = document.querySelector("#editarPorcentajeRiesgo").value;
    let editarFecha_fin = document.querySelector("#editarFinContrato").value;
    
    let editarCodigo_cargo = document.querySelector("#editarSelectCargos").value;
    let editarCheckCodigo_cargo = document.querySelector("#deseaActualizarCargo");
    let chek;

    if(editarCheckCodigo_cargo.is(':checked')){
        console.log("SI - Se actualizará el cargo. Por ende debemos capturar nuevo valor");
        chek = "1"; /**Actualizaremos */
    }else{
        console.log("NO - Se actualizará el cargo");
        chek = "0"; /**No Actualizaremos */
    }

    if(formulario == "adicionar"){
        console.log('Vamos a adicionar ...');
        /**Validamos cada uno - Tanto para agregar como actualizar ... */
        if (empleado != "" && empleado != "0"){
            if (codigo_contrato != ""){
                if (salario_basico != "" && salario_basico.length >= 6){
                    if (cuenta_ahorros != ""){
                        if (porcentaje_riesgo != ""){
                            if (fecha_inicio != ""){
                                if (fecha_fin != ""){

                                    return true; /**Todos los campos están consistentes, no hay necesidad de validar vía PHP */

                                }else{
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'La fecha de finalización del contrato es requerida para los casos del tipo de contrato que no es indefinido ...'
                                    });
                                    return false; /**Errores, no podemos enviar el formulario */
                                }

                            }else{
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'La fecha de inicio del contrato es requerida ...'
                                });
                                return false; /**Errores, no podemos enviar el formulario */
                            }

                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'El porcentaje de riesgo es necesario para cálculos de nómina mas adelante ...'
                            });
                            return false; /**Errores, no podemos enviar el formulario */
                        }

                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'La cuenta de ahorros BANCOLOMBIA es requerida para consignar la nómina mas adelante ...'
                        });
                        return false; /**Errores, no podemos enviar el formulario */
                    }

                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'El salario básico es un campo obligatoio y debe tener al menos 6 dígitos ...'
                    });
                    return false; /**Errores, no podemos enviar el formulario */
                }

            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Debe seleccionar adecuadamente un empleado para el contrato y así generar el código de contrato, el código del contrato no puede ir vacío ...'
                });
                return false; /**Errores, no podemos enviar el formulario */
            }

        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debe seleccionar adecuadamente un empleado para el contrato y así generar el código de contrato ...'
            });
            return false; /**Errores, no podemos enviar el formulario */
        }

    }else if(formulario == "editar"){
        console.log('Vamos a editar ...');
        /**Validamos cada uno - Tanto para agregar como actualizar ... */
        if (editarCuenta_ahorros != ""){
            if (editarPorcentaje_riesgo != ""){
                if (editarFecha_fin != ""){
                    
                    /**------------------------------------------------------------------------------------------------- */
                    /**Tratamiento especial para el check de si cambiaremos cargo: */
                    if(chek == "0"){ /**No actualizaremos cargo */
                        return true; /**Todos los campos están consistentes, no hay necesidad de validar vía PHP */
                    }else{/**Actualizaremos cargo, por ende debemos pedir información:  */
                        if(chek == "1" && editarCodigo_cargo != "" && editarCodigo_cargo != "0"){
                            return true; /**Todos los campos están consistentes, no hay necesidad de validar vía PHP */
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Ha marcado la opción de actualizar cargo, por ende, debe seleccionar un nuevo cargo, si no desea actualizar el cargo desmarque la opción de que desea actualizar el cargo y vuelva a intentarlo ...'
                            });
                            return false; /**Errores, no podemos enviar el formulario */
                        }
                    }
                    /**------------------------------------------------------------------------------------------------- */

                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'La fecha de finalización del contrato es requerida para los casos del tipo de contrato que no es indefinido ...'
                    });
                    return false; /**Errores, no podemos enviar el formulario */
                }
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'El porcentaje de riesgo es necesario para cálculos de nómina mas adelante ...'
                });
                return false; /**Errores, no podemos enviar el formulario */
            }
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'La cuenta de ahorros BANCOLOMBIA es requerida para consignar la nómina mas adelante ...'
            });
            return false; /**Errores, no podemos enviar el formulario */
        }
    }
    
}

/**Formatear fechas manualmente */
function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2){
        month = '0' + month;
    } else if (day.length < 2){
        day = '0' + day;
    } 

    if(month == "01"){month = "Enero"}
    if(month == "02"){month = "Febrero"}
    if(month == "03"){month = "Marzo"}
    if(month == "04"){month = "Abril"}
    if(month == "05"){month = "Mayo"}
    if(month == "06"){month = "Junio"}
    if(month == "07"){month = "Julio"}
    if(month == "08"){month = "Agosto"}
    if(month == "09"){month = "Septiembre"}
    if(month == "10"){month = "Octubre"}
    if(month == "11"){month = "Noviembre"}
    if(month == "12"){month = "Diciembre"}

    return [day, month, year].join('/');
}

/****************************************************************
/************** ACTUALIZACIÓN DE CONTRATOS DE ADMIN *************
/****************************************************************/
async function editarContratoAdmins(id){
    document.querySelector('input[name="editarFinContrato"]').removeAttribute("readonly");
    /**Capturamos el valor del atributo designado con el id desde el tablaContratosAdmins.ajax.php */
    let idContrato = id;
    let btnComplet = document.querySelector('#botonEditContrAdmins'+id); /**Lo tengo personalizado para que cada Row sea dinámico */

    // console.log("idContrato" , idContrato);
    // console.log("btnComplet" , btnComplet);

    let json1;
    let json2;
    let json3;

    $('#spinnerCargaGestionContrato').modal('show'); // Abrir Modal por que todo está cargado - Para esta operación usamos JQuery ...
    document.querySelector("#spinnerCargaGestionContrato").classList.add("show");

    let resContratos = await fetch("jobs/contratosEmpleados.ajax.php?"+"idContrato="+idContrato);
    json1 = await resContratos.json();
    await waitforme(500);

    // console.log("Respuesta de JSON1 = " , json1);

    let respuesta2 = await fetch("jobs/empleados.ajax.php?"+"idAdministrador="+json1["id_admin"]);
    json2 = await respuesta2.json();
    await waitforme(500);

    // console.log("Respuesta de JSON2 = " , json2);

    let respuesta3 = await fetch("jobs/cargos.ajax.php?"+"idCargo="+json1["id_cargo"]);
    json3 = await respuesta3.json();
    await waitforme(500);

    // console.log("Respuesta de JSON3 = " , json3);

    $('#spinnerCargaGestionContrato').removeClass('fade'); /**Remuevo class fade para que no cause corto con el modal editar */
    $('#spinnerCargaGestionContrato').modal('hide'); // Cerrar Modal por que todo está cargado - Para esta operación usamos JQuery ...

    let periodoPago;
    if(json1["periodo_pago"] == "1"){
        periodoPago = "Mensual";
    }else{
        periodoPago = "Quincenal";
    }

    /************************************************************** */

    let tipoContrato;
    if(json1["tipo_contrato"] == "1"){
        tipoContrato = "Término Fíjo";
    }else if(json1["tipo_contrato"] == "2"){
        tipoContrato = "Término Indefinido"; 
    }else if(json1["tipo_contrato"] == "3"){
        tipoContrato = "Obra o Labor"; 
    }else if(json1["tipo_contrato"] == "4"){
        tipoContrato = "Aprendizaje Productivo";
    }else if(json1["tipo_contrato"] == "5"){
        tipoContrato = "Ocasional Trabajo";
    }else if(json1["tipo_contrato"] == "6"){
        tipoContrato = "Aprendizaje Lectivo";
    }

    /************************************************************** */

    const formatter = new Intl.NumberFormat('es-CO', {
        style: 'currency',
        currency: 'COP',
        minimumFractionDigits: 0
    })



    let nomCompleteContrato =  json2["primer_nombre"] + " " + json2["segundo_nombre"] + " " + json2["primer_apellido"] + " " + json2["segundo_apellido"];

    document.querySelector('input[name="editarDocumentoEmpleadoContrato"]').value = json2["documento"];
    document.querySelector('input[name="editarNombreEmpleadoContrato"]').value = nomCompleteContrato;

    document.querySelector('input[name="editarCodigoContrato"]').value = json1["codigo_contrato"];
    document.querySelector('input[name="editarSalarioBasicoContrato"]').value = formatter.format(json1["salario_basico"]);
    document.querySelector('input[name="editarFechaInicioContrato"]').value = formatDate(json1["fecha_inicio"]);

    document.querySelector('input[name="editarIdContratosAdmin"]').value = json1["id"];

    document.querySelector('.editarPeriodoPagoOption').value = json1["periodo_pago"];
    document.querySelector('.editarPeriodoPagoOption').innerHTML = periodoPago;

    document.querySelector('.editarTipoContratoOption').value = json1["tipo_contrato"];
    document.querySelector('.editarTipoContratoOption').innerHTML = tipoContrato;

    document.querySelector('input[name="editarCuentaAhorros"]').value = json1["cuenta_ahorros"];
    document.querySelector('input[name="editarPorcentajeRiesgo"]').value = json1["porcentaje_riesgo"];
    document.querySelector('textarea[name="editarAnotaciones_contrato"]').innerHTML = json1["anotaciones_contrato"];
    
    document.querySelector('input[name="editarFinContrato"]').value = json1["fecha_fin"];
    
    /**Validamos si el contrato es a termino fijo o indefinido para saber fin contrato aplicable */
    document.getElementById("divEditarFinContrato").removeAttribute("hidden","");
    if(json1["tipo_contrato"] == "2"){
        console.log("Entre al condicional ....");
        document.getElementById("divEditarFinContrato").setAttribute("hidden","");
    }

    document.querySelector('input[name="actualEditarSelectCargosId"]').value = json3["id"];
    document.querySelector('.actualEditarSelectCargos').innerHTML = json3["cargo"];

    /**Así no lo recomienda Bootstrap, pequeña excepción cono JQuery para abrir Modal Programáticamente. */
    $('#actualizarContratoEmpleado').modal('show'); // Abrir Modal por que todo está cargado ...


}

document.querySelector('#editarTipoContrato').addEventListener("change" , () => {
    let select = document.querySelector('#editarTipoContrato');
    let text = select.options[select.selectedIndex].text;
    let val =  select.options[select.selectedIndex].value;
    console.log(text);
    console.log(val);

    if(val == 2){
        /**Trabajo desde el contenedor para ocultarlo en general .... */
        // console.log("Inhabilito")
        document.getElementById("divEditarFinContrato").setAttribute("hidden","");

    }else{
        /**Remuevo el ocultar porque realmente si aplica .... */
        // console.log("Habilito")
        document.getElementById("divEditarFinContrato").removeAttribute("hidden");
    }
})

/********** POR SI DESEA ACTUALIZAR EL CARGO DE UN CONTRATO
 * VAMOS A GESTIONAR WL CHECKBOX PARA HABILITAR O NO **********/
$("#deseaActualizarCargo").click(function(){
    let checkbox = $(this);
    if(checkbox.is(':checked')){
        console.log("SI - Se actualizará el cargo");
        $('select[name="editarSelectCargos"]').attr("disabled" , false);
        document.querySelector('input[name="valDeseaActualizarCargo"]').value = "S";
    }else{
        console.log("NO - Se actualizará el cargo");
        $('select[name="editarSelectCargos"]').attr("disabled" , true);
        document.querySelector('input[name="valDeseaActualizarCargo"]').value = "N";
    }
});

/*************************************************************************************
/************** ACTIVAR/DESACTIVAR UN CONTRATO DE ADMINISTRADOR/EMPLEADO *************
/*************************************************************************************/
async function gestionarEstContratosAdmins(id){

    try {
        /**Capturamos los parámetros que vienen del botón de archivo tablaCargos.ajax.php */
        let idContrato = id;
        let btnComplet = document.querySelector('#botonCamEstContratos'+id); /**Lo tengo personalizado para que cada Row sea dinámico */
        let estadoAdmin = btnComplet.getAttribute('estadoContratoAdmin');

        console.log("idContrato" , idContrato);
        console.log('btnComplet' , btnComplet);
        console.log("estadoAdmin" , estadoAdmin);

        let json1;
        let json2;

        $('#spinnerCargaGestionContrato').modal('show'); // Abrir Modal por que todo está cargado - Para esta operación usamos JQuery ...
        document.querySelector("#spinnerCargaGestionContrato").classList.add("show");

        let respuesta1 = await fetch("jobs/contratosEmpleados.ajax.php?"+"idContrato="+idContrato);
        json1 = await respuesta1.json();
        await waitforme(600);

        let respuesta2 = await fetch("jobs/empleados.ajax.php?"+"idAdministrador="+json1["id_admin"]);
        json2 = await respuesta2.json();
        await waitforme(600);

        $('#spinnerCargaGestionContrato').removeClass('fade'); /**Remuevo class fade para que no cause corto con el modal editar */
        $('#spinnerCargaGestionContrato').modal('hide'); // Cerrar Modal por que todo está cargado - Para esta operación usamos JQuery ...

        let contrato = json1["codigo_contrato"];
        let documentoCap = json2["tipo_documento"] + " - " + json2["documento"];
        let nombreCap = json2["primer_nombre"] + " " + json2["segundo_nombre"] + " " + json2["primer_apellido"] + " " + json2["segundo_apellido"];
        let mensaje;

        if(estadoAdmin == "1"){
            mensaje = "¿Estás seguro de activar el contrato del empleado: " + documentoCap + " - " + nombreCap + " identificado con código de contrato: " + contrato + " ?"
        }else{
            mensaje = "¿Estás seguro de desactivar el contrato del empleado: " + documentoCap + " - " + nombreCap + " identificado con código de contrato: " + contrato + " ?"
        }

        /**Preguntamos primero */
        Swal.fire({
            title: 'Gestión de Contrato de Empleado',
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
                habilitar_inhabilitar(idContrato , estadoAdmin).then();

            } /**La persona selecciona que si desea eliminar */

        }) /**Estructura then del Sweet Alert */  

    } catch (error) {
        console.log("Error ==> " , error)
    }

}

/**Para habilitar/Inhabilitar -> La acción como tal: */
async function habilitar_inhabilitar(idContrato , estadoAdmin){

    let respuesta = await fetch("jobs/contratosEmpleados.ajax.php?"+"idContratoEst="+idContrato+"&"+"estadoAdmin="+estadoAdmin);
    json = await respuesta.json();
    console.log("json " , json);

    if(json == "ok"){

        if(estadoAdmin == 0){

            const boton = document.querySelector('#botonCamEstContratos'+idContrato);
            boton.classList.remove('btn-info');
            boton.classList.add('btn-dark');
            boton.innerHTML = "Contrato Inactivo";
            boton.setAttribute('estadoContratoAdmin' , 1);

            Swal.fire({
                icon: 'info',
                title: 'Gestión de Estado del Contrato',
                text: 'El Contrato de Empleado fue Desactivado ...'
            });

        }else{

            const boton = document.querySelector('#botonCamEstContratos'+idContrato);
            boton.classList.remove('btn-dark');
            boton.classList.add('btn-info');
            boton.innerHTML = "Contrato Activo";
            boton.setAttribute('estadoContratoAdmin' , 0);

            Swal.fire({
                icon: 'info',
                title: 'Gestión de Estado',
                text: 'El Contrato de Empleado fue Activado ...'
            });

        } /**Estado */

    } /**Si la respuesta que retornamos es Ok */

}


/********** FUNCIÓN PARA RE DIRIGIR Y VER LA FICHA DEL EMPLEADO
 * El objetivo será crear una variable en el LocalStorage que me almacene 
 * el id del empleado, el id por si mismo no supone peligro, y la idea es que cuando
 * se cargue el HTML, capturamos la variable del localstorage en una variable local,
 * presentamos la información y eliminamos el elemento en el localstorage. **********/
 function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
  }

let verFichaContrato = (contrato) => {
    console.log("Me llega el contrato: " , contrato);
    // localStorage.setItem("idContrato", contrato);
    setCookie("idContratoFicha" , contrato , 1); 
    
    window.location = "ficha-empleado";
}












/*************** VALIDACIONES POR EL EVENTO KEYPRESS ****************/

/**Validador1 = Validamos permitir números del 0 al 9
 *              Validamos permitir caracteres de . para separar decimales */
/*************** *********************************** ****************/
let validador1_Contratos = (e) => {
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

/**Validador2 = Validamos permitir números del 0 al 9 */
/*************** *********************************** ****************/
let validador2_Contratos = (e) => {
    let keynum = window.event ? window.event.keyCode : e.which; /**Obtenemos el código ASCII */
    console.log(e.which || e.keyCode);
    /**Realizamos la validación en estilo ASCII*/
    if((keynum >= 48 && keynum <= 57)){   /** 0-9 */                                                          

        return true;

    }else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No se permiten caracteres especiales en este campo ni letras, solo números y sin espacios ...'
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
let validador3_Contratos = (e) => {
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
