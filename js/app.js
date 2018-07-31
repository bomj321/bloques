/************************************************CONTROL DEL FORMULARIO************************************/

function enviodatos(str) {
    if (str == "FISICO") {
        document.getElementById("respuesta_pago").innerHTML = '<div class="multi-horizontal" data-for="cedula_fisica">' +
            '<div class="form-group">' +
            '<label class="form-control-label mbr-fonts-style display-7" for="cedula_fisica">C&eacutedula F&iacute;sica</label>' +
            '<input type="text" class="form-control" name="cedula_fisica" data-form-field="cedula_fisica" required id="cedula_fisica" placeholder="Ingrese C&eacute;dula F&iacute;sica">' +
            '</div>' +
            '</div>' +

            '<div class="multi-horizontal" data-for="nombre_legal">' +
            '<div class="form-group">' +
            '<label class="form-control-label mbr-fonts-style display-7" for="nombre_legal">Nombre Rep Legal</label>' +
            '<input type="text" class="form-control" name="nombre_legal" data-form-field="nombre_legal" required id="nombre_legal" placeholder="Ingrese nombre">' +
            '</div>' +
            '</div>' +

            '<div class="multi-horizontal" data-for="nombre_comercio">' +
            '<div class="form-group">' +
            '<label class="form-control-label mbr-fonts-style display-7" for="nombre_comercio">Nombre del Comercio</label>' +
            '<input type="text" class="form-control" name="nombre_comercio" data-form-field="nombre_comercio" required id="nombre_comercio" placeholder="Ingrese nombre del comercio">' +
            '</div>' +
            '</div>' +

            '<div class="multi-horizontal" data-for="actividad">' +
            '<div class="form-group">' +
            '<label class="form-control-label mbr-fonts-style display-7" for="actividad">Actividad</label>' +
            '<input type="text" class="form-control" name="actividad" data-form-field="actividad" required id="actividad" placeholder="Ingrese actividad del comercio">' +
            '</div>' +
            '</div>' +

            '<div class="multi-horizontal" data-for="celular">' +
            '<div class="form-group">' +
            '<label class="form-control-label mbr-fonts-style display-7" for="celular">Celular</label>' +
            '<input type="text" class="form-control" name="celular" data-form-field="celular" required id="celular" placeholder="Ingrese numero telef&oacute;nico">' +
            '</div>' +
            '</div>' +

            '<div class="multi-horizontal" data-for="email">' +
            '<div class="form-group">' +
            '<label class="form-control-label mbr-fonts-style display-7" for="email">Email</label>' +
            '<input type="email" class="form-control" name="email" data-form-field="email" required id="email" placeholder="Ingrese email v&aacute;lido">' +
            '</div>' +
            '</div>' +

            '<div class="multi-horizontal" data-for="provincia">' +
            '<div class="form-group">' +
            '<label class="form-control-label mbr-fonts-style display-7" for="provincia" >Provincia</label>' +
            '<select name="provincia" onchange="cambio(this.value)" class="form-control" id="select_form" for="provincia" required>' +
            '<option selected value="">Seleccione su Provincia</option>' +
            '<option value="San Jos&eacute;">San Jos&eacute;</option>' +
            '<option value="Alajuela">Alajuela</option>' +
            '<option value="Cartago">Cartago</option>' +
            '<option value="Heredia">Heredia</option>' +
            '<option value="Guanacaste">Guanacaste</option>' +
            '<option value="Puntarenas">Puntarenas</option>' +
            '<option value="Lim&oacute;n">Lim&oacute;n</option>' +
            '</select>' +
            '</div>' +
            '</div>' +

            '<div id="canton">' +
            '<div class="multi-horizontal" data-for="canton">' +
            '<div class="form-group">' +
            '<label class="form-control-label mbr-fonts-style display-7" for="canton">Email</label>' +
            '<input type="text" class="form-control"  data-form-field="canton" disabled id="canton" placeholder="Seleccione una Provincia">' +
            '</div>' +
            '</div>' +
            '</div>' +

            '<div id="distrito">' +
            '<div class="multi-horizontal" data-for="distrito">' +
            '<div class="form-group">' +
            '<label class="form-control-label mbr-fonts-style display-7" for="distrito">Distrito</label>' +
            '<input type="text" class="form-control"  data-form-field="distrito" disabled id="distrito" placeholder="Seleccione un Cant&oacute;n">' +
            '</div>' +
            '</div>' +
            '</div>' +

            '<div class="multi-horizontal" data-for="direccion">' +
            '<div class="form-group">' +
            '<label class="form-control-label mbr-fonts-style display-7" for="direccion">Direcci&oacute;n</label>' +
            '<input type="text" class="form-control" name="direccion" data-form-field="direccion" required id="direccion" placeholder="Ingrese Direcci&oacute;n">' +
            '</div>' +
            '</div>' +

            '<div class="multi-horizontal" data-for="calculo_factura">' +
            '<div class="form-group">' +
            '<label class="form-control-label mbr-fonts-style display-7" for="calculo_factura" >Calculo Mensual Facturas</label>' +
            '<select name="calculo_factura" class="form-control" id="select_form" for="calculo_factura" required>' +
            '<option selected value="">Seleccione N&uacute;mero de Facturas</option>' +
            '<option value="1-300">1-300</option>' +
            '<option value="301-600">301-600</option>' +
            '<option value="601-1000">601-1000</option>' +
            '<option value="1001-3000">1001-3000</option>' +
            '<option value="3001-5000">3001-5000</option>' +
            '<option value="5001-10000">5001-10000</option>' +
            '</select>' +
            '</div>' +
            '</div>' +



            '<span class="input-group-btn">' +
            '<button type="submit" class="btn btn-primary btn-form display-4">PRE-REGISTRAR</button>' +
            '</span>';
        return;
    } else if (str == "JURIDICO") {
        document.getElementById("respuesta_pago").innerHTML = '<div class="multi-horizontal" data-for="cedula_fisica">' +
            '<div class="form-group">' +
            '<label class="form-control-label mbr-fonts-style display-7" for="cedula_fisica">C&eacutedula Jur&iacute;dica</label>' +
            '<input type="text" class="form-control" name="cedula_fisica" data-form-field="cedula_fisica" required id="cedula_fisica" placeholder="Ingrese C&eacute;dula Jur&iacute;dica">' +
            '</div>' +
            '</div>' +

            '<div class="multi-horizontal" data-for="nombre_legal">' +
            '<div class="form-group">' +
            '<label class="form-control-label mbr-fonts-style display-7" for="nombre_legal">Nombre Rep Legal</label>' +
            '<input type="text" class="form-control" name="nombre_legal" data-form-field="nombre_legal" required id="nombre_legal" placeholder="Ingrese nombre">' +
            '</div>' +
            '</div>' +

            '<div class="multi-horizontal" data-for="nombre_comercio">' +
            '<div class="form-group">' +
            '<label class="form-control-label mbr-fonts-style display-7" for="nombre_comercio">Nombre del Comercio</label>' +
            '<input type="text" class="form-control" name="nombre_comercio" data-form-field="nombre_comercio" required id="nombre_comercio" placeholder="Ingrese nombre del comercio">' +
            '</div>' +
            '</div>' +

            '<div class="multi-horizontal" data-for="actividad">' +
            '<div class="form-group">' +
            '<label class="form-control-label mbr-fonts-style display-7" for="actividad">Actividad</label>' +
            '<input type="text" class="form-control" name="actividad" data-form-field="actividad" required id="actividad" placeholder="Ingrese actividad del comercio">' +
            '</div>' +
            '</div>' +

            '<div class="multi-horizontal" data-for="celular">' +
            '<div class="form-group">' +
            '<label class="form-control-label mbr-fonts-style display-7" for="celular">Celular</label>' +
            '<input type="text" class="form-control" name="celular" data-form-field="celular" required id="celular" placeholder="Ingrese numero telef&oacute;nico">' +
            '</div>' +
            '</div>' +

            '<div class="multi-horizontal" data-for="email">' +
            '<div class="form-group">' +
            '<label class="form-control-label mbr-fonts-style display-7" for="email">Email</label>' +
            '<input type="email" class="form-control" name="email" data-form-field="email" required id="email" placeholder="Ingrese email v&aacute;lido">' +
            '</div>' +
            '</div>' +

            '<div class="multi-horizontal" data-for="provincia">' +
            '<div class="form-group">' +
            '<label class="form-control-label mbr-fonts-style display-7" for="provincia" >Provincia</label>' +
            '<select name="provincia" onchange="cambio(this.value)" class="form-control" id="select_form" for="provincia" required>' +
            '<option selected value="">Seleccione su Provincia</option>' +
            '<option value="San Jos&eacute;">San Jos&eacute;</option>' +
            '<option value="Alajuela">Alajuela</option>' +
            '<option value="Cartago">Cartago</option>' +
            '<option value="Heredia">Heredia</option>' +
            '<option value="Guanacaste">Guanacaste</option>' +
            '<option value="Puntarenas">Puntarenas</option>' +
            '<option value="Lim&oacute;n">Lim&oacute;n</option>' +
            '</select>' +
            '</div>' +
            '</div>' +

            '<div id="canton">' +
            '<div class="multi-horizontal" data-for="canton">' +
            '<div class="form-group">' +
            '<label class="form-control-label mbr-fonts-style display-7" for="canton">Email</label>' +
            '<input type="text" class="form-control"  data-form-field="canton" disabled id="canton" placeholder="Seleccione una Provincia">' +
            '</div>' +
            '</div>' +
            '</div>' +

            '<div id="distrito">' +
            '<div class="multi-horizontal" data-for="distrito">' +
            '<div class="form-group">' +
            '<label class="form-control-label mbr-fonts-style display-7" for="distrito">Distrito</label>' +
            '<input type="text" class="form-control"  data-form-field="distrito" disabled id="distrito" placeholder="Seleccione un Cant&oacute;n">' +
            '</div>' +
            '</div>' +
            '</div>' +

            '<div class="multi-horizontal" data-for="direccion">' +
            '<div class="form-group">' +
            '<label class="form-control-label mbr-fonts-style display-7" for="direccion">Direcci&oacute;n</label>' +
            '<input type="text" class="form-control" name="direccion" data-form-field="direccion" required id="direccion" placeholder="Ingrese Direcci&oacute;n">' +
            '</div>' +
            '</div>' +

            '<div class="multi-horizontal" data-for="calculo_factura">' +
            '<div class="form-group">' +
            '<label class="form-control-label mbr-fonts-style display-7" for="calculo_factura" >Calculo Mensual Facturas</label>' +
            '<select name="calculo_factura" class="form-control" id="select_form" for="calculo_factura" required>' +
            '<option selected value="">Seleccione N&uacute;mero de Facturas</option>' +
            '<option value="1-300">1-300</option>' +
            '<option value="301-600">301-600</option>' +
            '<option value="601-1000">601-1000</option>' +
            '<option value="1001-3000">1001-3000</option>' +
            '<option value="3001-5000">3001-5000</option>' +
            '<option value="5001-10000">5001-10000</option>' +
            '</select>' +
            '</div>' +
            '</div>' +



            '<span class="input-group-btn">' +
            '<button type="submit" class="btn btn-primary btn-form display-4">PRE-REGISTRAR</button>' +
            '</span>';
        return;

    } else if (str == "") {
        document.getElementById("respuesta_pago").innerHTML = ' ';
        return;

    }



}
/************************************************CONTROL DEL FORMULARIO************************************/

/************************************************CONTROL DE EVENTOS DEL FORMULARIO************************************/
function cambio(valor) {

    if (valor == "") {
        document.getElementById("canton").innerHTML =
            '<div class="multi-horizontal" data-for="canton">' +
            '<div class="form-group">' +
            '<label class="form-control-label mbr-fonts-style display-7" for="canton">Cant&oacute;n</label>' +
            '<input type="text" class="form-control" data-form-field="canton" disabled id="canton" placeholder="Seleccione una Provincia">' +
            '</div>' +
            '</div>'
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("canton").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "canton_front.php?valor=" + valor);
        xmlhttp.send();
    }
}



/**DISTRITOS**/
function dis(valor) {

    if (valor == "") {
        document.getElementById("distrito").innerHTML =
            '<div class="multi-horizontal" data-for="distrito">' +
            '<div class="form-group">' +
            '<label class="form-control-label mbr-fonts-style display-7" for="distrito">Distrito</label>' +
            '<input type="text" class="form-control" data-form-field="distrito" disabled id="distrito" placeholder="Seleccione un Cant&oacute;n">' +
            '</div>' +
            '</div>'
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("distrito").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "distrito_front.php?valor=" + valor);
        xmlhttp.send();
    }
}
/**DISTRITOS**/

/*AJAX DEL FORMULARIO DE REGISTRO*/
function registrarNuevoUsuario() {
    var parametros = new FormData($("#form_registro")[0]);
    $.ajax({
        data: parametros,
        url: "./ajax/registrar_usuarios.php",
        type: "POST",
        contentType: false,
        processData: false,
        beforesend: function () {
            toastr.options.progressBar = true;
            toastr.warning('Registrando cliente Espere...');
        },
        success: function (data) {
            toastr.options.progressBar = false;
            setTimeout(function () {
                toastr.success('Data Pre-Registrada Gracias!!!');
            }, 1000);
            /*$("#collapseTwo").removeClass('show');*/
            setTimeout(function () {
                location.reload();
            }, 3000);
        },
        error: function () {
            toastr.options.progressBar = false;
            toastr.error('Ha Ocurrido un Error.!!!');
        }
    });
}

function LimpiarVentaDeServicios() {
    $("#form_registro")[0].reset();
}
/*AJAX DEL FORMULARIO DE REGISTRO*/



/*AJAX DEL FORMULARIO DE PAGO*/
function enviarpago() {
    var parametros = new FormData($("#form_registro_pago")[0]);
    $.ajax({
        data: parametros,
        url: "./ajax/enviar_pagos.php",
        type: "POST",
        contentType: false,
        processData: false,
        beforesend: function () {
            toastr.options.progressBar = true;
            toastr.warning('Enviando Pago Espere...');
        },
        success: function (data) {
            toastr.options.progressBar = false;
            setTimeout(function () {
                toastr.success('Pago Enviando, Muchas Gracias!!!');
            }, 1000);
            /*$("#collapseTwo").removeClass('show');*/
            setTimeout(function () {
                location.reload();
            }, 3000);
        },
        error: function () {
            toastr.options.progressBar = false;
            toastr.error('Ha Ocurrido un Error.!!!');
        }
    });
}

function LimpiarVentaDeServicios() {
    $("#form_registro_pago")[0].reset();
}
/*AJAX DEL FORMULARIO DE PAGO*/



/************************************************CONTROL DE EVENTOS DEL FORMULARIO************************************/