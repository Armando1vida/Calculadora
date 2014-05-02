$(function() {
//     function() { 

//    $("html").niceScroll();

//  }
//    $('#resultado').niceScroll();
    $('input#id_x').mask('ZZZZZZZZZZ', {
        translation: {
            'Z': {pattern: /[0-1]/},
        }});
    $('input#id_y').mask('ZZZZZZZZZZ', {
        translation: {
            'Z': {pattern: /[0-1]/},
        }});
    $('#tipo_ope').change(function() {
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
            console.log($(this).val());
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
    if (preparar($('#id_x').val(), $('#id_y').val())) {
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

