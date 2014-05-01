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


function maskAttributes() {
    $('input.telefono').mask('000-000000');
    $('input.celular').mask('0000000000');
    $('input.ID').mask('0000000000');
    $('input.fax').mask('000-000000');
    $('input.numeric').mask('00000000000');
    $('input.money').mask('P999999999999999999999.ZZ', {
        translation: {
            'Z': {pattern: /[0-9]/, optional: true},
            'P': {pattern: /[1-9]/, },
        }});
    //continuar cargando formatos para input
}