// Agregar Productos y validar

$("#btnProductos").click(function () {
    var producto_nombre = $("#p_nombre").val();
    var producto_descripcion = $("#p_descripcion").val();
    var producto_pcompra = $("#p_compra").val();
    var producto_pventa = $("#p_venta").val();
    var producto_modelo = $("#p_modelo").val();
    var producto_imagen = $("#p_imagen").val();
    var producto_color = $("#p_color").val();
    var producto_armado = $("#p_armado").val();
    var producto_categoria = $("#p_categoria").val();
    var producto_despachos = $("#p_despachos").val();
    var producto_marca = $("#p_marca").val();
    var producto_estado = $("#p_estado").val();
    var producto_altura = $("#p_altura").val();
    var producto_stock = $("#p_stock").val();
    var producto_produdidad = $("#p_produdidad").val();
    var producto_peso = $("#p_peso").val();
    var producto_ancho = $("#p_ancho").val();
})



//validacion de input
$("#p_nombre").blur(function () {
    var dato = $("#p_nombre").val();
    if (dato.trim() != '') {
        $('#p_nombre').removeClass('is-invalid');
        $('#p_nombre').addClass('is-valid');
    } else {
        $('#p_nombre').removeClass('is-valid');
        $('#p_nombre').addClass('is-invalid');
    }

});

$("#p_descripcion").blur(function () {
    var dato = $("#p_descripcion").val();
    if (dato.trim() != '') {
        $('#p_descripcion').removeClass('is-invalid');
        $('#p_descripcion').addClass('is-valid');
    } else {
        $('#p_descripcion').removeClass('is-valid');
        $('#p_descripcion').addClass('is-invalid');
    }

});

$("#p_venta").blur(function () {
    var dato = $("#p_venta").val();
    if (dato.trim() != '') {
        $('#p_venta').removeClass('is-invalid');
        $('#p_venta').addClass('is-valid');
    } if (parseint(dato) > 0) {
        $('#p_venta').removeClass('is-valid');
        $('#p_venta').addClass('is-invalid');

    } else {
        $('#p_venta').removeClass('is-valid');
        $('#p_venta').addClass('is-invalid');
    }

});
$("#p_compra").blur(function () {
    var dato = $("#p_compra").val();
    if (dato.trim() != '') {
        $('#p_compra').removeClass('is-invalid');
        $('#p_compra').addClass('is-valid');
    } else {
        $('#p_compra').removeClass('is-valid');
        $('#p_compra').addClass('is-invalid');
    }

});
//Validacion de modelos

var extensionesValidas = ".glb";
var pesoPermitido = 30024;

// Cuando cambie #fichero
$("#fichero").change(function () {

    $('#texto').text('');
    $('#img').attr('src', '');

    if (validarExtension(this)) {

        if (validarPeso(this)) {
            verImagen(this);
        }
    }
});

// Validacion de extensiones permitidas

function validarExtension(datos) {

    var ruta = datos.value;
    var extension = ruta.substring(ruta.lastIndexOf('.') + 1).toLowerCase();
    var extensionValida = extensionesValidas.indexOf(extension);

    if (extensionValida < 0) {
        $('#texto').text('La extensión no es válida Su fichero tiene de extensión: .' + extension);
        return false;
    } else {
        return true;
    }
}

// Validacion de peso del fichero en kbs

function validarPeso(datos) {

    if (datos.files && datos.files[0]) {

        var pesoFichero = datos.files[0].size / 1024;

        if (pesoFichero > pesoPermitido) {
            $('#texto').text('El peso maximo permitido del fichero es: ' + pesoPermitido + ' KBs Su fichero tiene: ' + pesoFichero + ' KBs');
            return false;
        } else {
            return true;
        }
    }
}

//======================================





$("#p_imagen").blur(function () {

    var tipoimagen = ".glb";
    var peso = 30024;

    var dato = $("#p_imagen").val();
    if (dato.trim() != '') {
        $('#p_imagen').removeClass('is-invalid');
        $('#p_imagen').addClass('is-valid');
    } else {
        $('#p_imagen').removeClass('is-valid');
        $('#p_imagen').addClass('is-invalid');
    }

});
$("#p_color").blur(function () {
    var dato = $("#p_color").val();
    if (dato.trim() != '') {
        $('#p_color').removeClass('is-invalid');
        $('#p_color').addClass('is-valid');
    } else {
        $('#p_color').removeClass('is-valid');
        $('#p_color').addClass('is-invalid');
    }

});
$("#p_armado").blur(function () {
    var dato = $("#p_armado").val();
    if (dato.trim() != '') {
        $('#p_armado').removeClass('is-invalid');
        $('#p_armado').addClass('is-valid');
    } else {
        $('#p_armado').removeClass('is-valid');
        $('#p_armado').addClass('is-invalid');
    }

});
$("#p_categoria").blur(function () {
    var dato = $("#p_categoria").val();
    if (dato.trim() != '') {
        $('#p_categoria').removeClass('is-invalid');
        $('#p_categoria').addClass('is-valid');
    } else {
        $('#p_categoria').removeClass('is-valid');
        $('#p_categoria').addClass('is-invalid');
    }

});
$("#p_despachos").blur(function () {
    var dato = $("#p_despachos").val();
    if (dato.trim() != '') {
        $('#p_despachos').removeClass('is-invalid');
        $('#p_despachos').addClass('is-valid');
    } else {
        $('#p_despachos').removeClass('is-valid');
        $('#p_despachos').addClass('is-invalid');
    }

});
$("#p_marca").blur(function () {
    var dato = $("#p_marca").val();
    if (dato.trim() != '') {
        $('#p_marca').removeClass('is-invalid');
        $('#p_marca').addClass('is-valid');
    } else {
        $('#p_marca').removeClass('is-valid');
        $('#p_marca').addClass('is-invalid');
    }

});
$("#p_estado").blur(function () {
    var dato = $("#p_estado").val();
    if (dato.trim() != '') {
        $('#p_estado').removeClass('is-invalid');
        $('#p_estado').addClass('is-valid');
    } else {
        $('#p_estado').removeClass('is-valid');
        $('#p_estado').addClass('is-invalid');
    }

});
$("#p_altura").blur(function () {
    var dato = $("#p_altura").val();
    if (dato.trim() != '') {
        $('#p_altura').removeClass('is-invalid');
        $('#p_altura').addClass('is-valid');
    } else {
        $('#p_altura').removeClass('is-valid');
        $('#p_altura').addClass('is-invalid');
    }

});
$("#p_stock").blur(function () {
    var dato = $("#p_stock").val();
    if (dato.trim() != '') {
        $('#p_stock').removeClass('is-invalid');
        $('#p_stock').addClass('is-valid');
    } else {
        $('#p_stock').removeClass('is-valid');
        $('#p_stock').addClass('is-invalid');
    }

});
$("#p_produdidad").blur(function () {
    var dato = $("#p_produdidad").val();
    if (dato.trim() != '') {
        $('#p_produdidad').removeClass('is-invalid');
        $('#p_produdidad').addClass('is-valid');
    } else {
        $('#p_produdidad').removeClass('is-valid');
        $('#p_produdidad').addClass('is-invalid');
    }

});
$("#p_peso").blur(function () {
    var dato = $("#p_peso").val();
    if (dato.trim() != '') {
        $('#p_peso').removeClass('is-invalid');
        $('#p_peso').addClass('is-valid');
    } else {
        $('#p_peso').removeClass('is-valid');
        $('#p_peso').addClass('is-invalid');
    }

});
$("#p_ancho").blur(function () {
    var dato = $("#p_ancho").val();
    if (dato.trim() != '') {
        $('#p_ancho').removeClass('is-invalid');
        $('#p_ancho').addClass('is-valid');
    } else {
        $('#p_compra').removeClass('is-valid');
        $('#p_ancho').addClass('is-invalid');
    }

});


