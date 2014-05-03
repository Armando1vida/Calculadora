<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
preparar($_POST);

function isAjax() {
    return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

function preparar($post = null) {
    $resul = array();
    if (isAjax()) {
        $a = $post['x'];
        $b = $post['y'];
        switch ($post['operacion']) {
            case 'sumar':
                suma($a, $b);
                break;
            case 'restar':
                resta($a, $b);
                break;
            case 'multiplicar':
                multiplicacion($a, $b);
                break;
            case 'dividir':
                division($a, $b);
                break;
        }
    } else {
        var_dump('false');
    }
}

function suma($a, $b) {
    $a = str_split($a);
    $b = str_split($b);
    imprimir(recorrer($a, $b));
}

function resta($a, $b) {
    $a = str_split($a);
    $b = str_split($b);
    $b = completemdo2($b);
    imprimir(recorrer($a, $b));
}

function multiplicacion($a, $b) {
    $a = str_split($a);
    $b = str_split($b);
    var_dump($a, $b);
}

function division($a, $b) {
    $a = str_split($a);
    $b = str_split($b);
    var_dump($a, $b);
}

/**
 * Retorna un array lleno con un valor en determinada posicion
 * @param type $posicion en la cual se va poner el valor
 * @param type $longitud del array
 * @param type $value valor a poner 
 * @return type
 */
function fila($posicion = 0, $longitud, $value = 0) {
    $fila_nueva = array_fill(0, $longitud, 0);
    $fila_nueva[$posicion] = $value;
    return $fila_nueva;
}

function tablasuma($param1, $param2, $param3 = 0) {
    $resultado = decoct(octdec($param1) + octdec($param2) + octdec($param3));
    $resultado = strlen($resultado) == 2 ? $resultado : '0' . $resultado;
    return str_split($resultado);
}

function tablamultiplicacion($param1, $param2) {
    $resultado = bindec($param1) * bindec($param2);
    return str_split(decbin($resultado));
}

function recorrer($array1, $array2) {
    $arrayresult = array();
    $resultado = fila(0, count($array1) + 1, 0);
    array_unshift($array1, 0);
    array_unshift($array2, 0);
    $fila = fila(0, count($array1), 0);
    $arrayresult[] = array($fila, $array1, $array2, $resultado);
    for ($index = count($array1) - 1; $index >= 0; $index--) {
        $r = tablasuma($array1[$index], $array2[$index], $fila[$index]);
        if ($index != 0) {
            $fila[$index - 1] = $r['0'];
        }
        $resultado[$index] = $r['1'];
        $arrayresult[] = array($fila, $array1, $array2, $resultado);
    }
    return $arrayresult;
}

function imprimir($param) {
    $cadresulatado = '';
    $cadresulatado .= '<h4>Resolución:</h4>';

    $paso = 1;
    foreach ($param as $value) {
        $cadresulatado .= '<div class="col-md-3">';
        $cadresulatado .= "<em class='text-left'>Paso $paso</em>";
        $cadresulatado .= '<p class="text-center">';

        foreach ($value as $val) {
            $cadresulatado.= implode("", $val);
            $cadresulatado.= '<br>';
        }
        $paso++;
        $cadresulatado .= '</p">';
        $cadresulatado .= '</div>';

//        $cadresulatado.= '------<br>';
    }
    echo $cadresulatado;
}

function completemdo2($param) {
    $resulta = array();
    $resultb = fila(count($param) - 1, count($param), '1');
    foreach ($param as $key => $value) {
        $resulta[$key] = 7 - $value;
    }
    $resultadocomplemento2 = recorrer($resulta, $resultb);
    $resultadocomplemento2 = $resultadocomplemento2[count($resultadocomplemento2) - 1];
    $resultadocomplemento2 = $resultadocomplemento2[count($resultadocomplemento2) - 1];
    array_shift($resultadocomplemento2);
    return $resultadocomplemento2;
}
