$(function() {
    $('input#id_x').mask('ZZZZZZZZZZ', {
        translation: {
            'Z': {pattern: /[0-1]/},
        }});
    $('input#id_y').mask('ZZZZZZZZZZ', {
        translation: {
            'Z': {pattern: /[0-1]/},
        }});
    $('#tipo_ope').change(function() {
        $('input#id_x').val('');
        $('input#id_y').val('');
        if ($(this).val() == 'binario') {
            $('input#id_x').mask('ZZZZZZZZZZ', {
                translation: {
                    'Z': {pattern: /[0-1]/},
                }});
            $('input#id_y').mask('ZZZZZZZZZZ', {
                translation: {
                    'Z': {pattern: /[0-1]/},
                }});
        }
        else if ($(this).val() == 'octal') {
            $('input#id_x').mask('ZZZZZZZZZZ', {
                translation: {
                    'Z': {pattern: /[0-7]/},
                }});
            $('input#id_y').mask('ZZZZZZZZZZ', {
                translation: {
                    'Z': {pattern: /[0-7]/},
                }});
        }
        else if ($(this).val() == 'hexadecimal') {
            $('input#id_x').mask('ZZZZZZZZZZ', {
                translation: {
                    'Z': {pattern: /[A-F0-9]/},
                }});
            $('input#id_y').mask('ZZZZZZZZZZ', {
                translation: {
                    'Z': {pattern: /[A-F0-9]/},
                }});
        }
    });
});
function sumar() {
    $('#tipo_operacion').val('sumar');
    if (preparar($('#id_x').val(), $('#id_y').val())) {
        enviar($('#tipo_ope').val());
    }
}
function restar() {
    $('#tipo_operacion').val('restar');
    if (preparar($('#id_x').val(), $('#id_y').val())) {
        enviar($('#tipo_ope').val());
    }
}
function multiplicar() {
    $('#tipo_operacion').val('multiplicar');
    if (preparar($('#id_x').val(), $('#id_y').val())) {
        enviar($('#tipo_ope').val());
    }
}
function dividir() {
    $('#tipo_operacion').val('dividir');
    $base = base($('#tipo_ope').val());
    if (preparar($('#id_x').val(), $('#id_y').val()) && checkdivision($('#id_x').val(), $('#id_y').val(), $base)) {
        enviar($('#tipo_ope').val());
    }
}

function enviar(tipo) {
    $.ajax({
        url: 'page/' + tipo + '.php',
        type: 'POST',
        datatype: 'json',
        async: true,
        data: $('#form').serialize(),
        success: function(data) {
            $('div#resultado').html(data);
        },
        error: function(data) {
            $('div#resultado').html('error');
        }
    });
}
function preparar($x, $y) {
    if ($x.length == $y.length && $x != '' && $y != '') {
        return true;
    } else {
        bootbox.alert('Los operando tiene que tener la misma longitud o no pueden estar vacios');
        return false;
    }
}
function checkdivision($x, $y, $base) {
    var digit1 = parseInt($x, $base);
    var digit2 = parseInt($y, $base);
    if ((digit1 > digit2 || digit1 == digit2) && digit2 != 0) {
        return true;
    } else {
        bootbox.alert('El dividendo no puede ser mayor que el divisor o no puede ser cero');
        return false;
    }
}
function base($val) {
    if ($val == 'binario')
        return 2;
    else if ($val == 'octal')
        return 8;
    else if ($val == 'hexadecimal')
        return 16;
}

