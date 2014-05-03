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
    imprimir(recorrer($a, $b, $b), '+');
}

function resta($a, $b) {
    $a = str_split($a);
    $b = str_split($b);
    $cb = completemdo2($b);
    imprimir(recorrer($a, $cb, $b), '-');
}

function multiplicacion($a, $b) {
    imprimirdm(tablamultiplicacion($a, $b), 'X');
}

function division($a, $b) {
    imprimirdm(tabladivision($a, $b), '/');
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
    $resultado = dechex(hexdec($param1) + hexdec($param2) + hexdec($param3));
    $resultado = strlen($resultado) == 2 ? $resultado : '0' . $resultado;
    return str_split($resultado);
}

function tablamultiplicacion($param1, $param2) {
    $arrayresultado = array();
    $arrayresultado['a'] = $param1;
    $arrayresultado['b'] = $param2;
    $resultado = hexdec($param1) * hexdec($param2);
    $arrayresultado['r'] = dechex($resultado);

    return $arrayresultado;
}

function tabladivision($param1, $param2) {
    $arrayresultado = array();
    $puedo = true;
    $resultado = '0';
    $arrayresultado['a'] = $param1;
    $arrayresultado['b'] = $param2;
    $param1 = hexdec($param1);
    $param2 = hexdec($param2);
    $i = 0;
    while ($puedo) {
        $param1 = $param1 - $param2;
        if ($param1 < 0) {
            $param1 = $param1 + $param2;
            $puedo = false;
            $i = $i - 1;
        }
        if ($param1 == 0) {
            $puedo = false;
        }
        $i++;
    }
    $resultado = $i;
    $resuido = $param1;
    $arrayresultado['r'] = dechex($resultado);
    $arrayresultado['re'] = dechex($resuido);
    return $arrayresultado;
}

function recorrer($array1, $array2, $array3 = null) {
    $arrayresult = array();
    $resultado = fila(0, count($array1) + 1, 0);
    array_pop($resultado);
    $arrayresult[] = array(array(), $array1, $array3, $resultado);
    array_unshift($array1, 0);
    array_unshift($array2, 0);
    array_unshift($resultado, 0);
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

function imprimir($param, $tipoOperacion = null) {
    $cadresulatado = '';
    $cadresulatado .= '<h4>Resolución:</h4>';
    $paso = 1;
    foreach ($param as $key1 => $value) {

        $cadresulatado .= '<div class="col-md-3">';
        $cadresulatado .= "<em class='text-left'>Paso $paso</em>";
        $cadresulatado .= '<div class="row">';
        $cadresulatado .= '<div class="col-md-1">';
        $cadresulatado.=!($key1 == 0 ) ? '<br>' : '';
        $cadresulatado.= '<br>';
        $cadresulatado.=!($key1 == 0 ) ? '+' : $tipoOperacion;
        $cadresulatado.= '<br>';
        $cadresulatado.= '<br>';
        $cadresulatado.= '=';
        $cadresulatado .= '</div>';
        $cadresulatado .= '<div class="col-md-9">';
        foreach ($value as $key => $val) {
            if ($key == 0) {
                $cadresulatado .= '<p class="text-center text-primary">';
                $cadresulatado.= implode("", $val);
                $cadresulatado .= '</p">';
            } elseif (($key == count($value) - 1)) {
                $cadresulatado .= '<p class="text-center text-success"><strong>';
                $cadresulatado.= implode("", $val);
                $cadresulatado .= '</strong></p>';
            } elseif ($key1 == 0) {
                $cadresulatado .= '<p class="text-center">';
                $cadresulatado.= implode("", $val);
                $cadresulatado .= '</p">';
            } else {
                array_shift($val);
                $cadresulatado .= '<p class="text-center">';
                $cadresulatado.= implode("", $val);
                $cadresulatado .= '</p">';
            }
        }
        $cadresulatado.= '<br>';
        $paso++;
        $cadresulatado .= '</div>';
        $cadresulatado .= '</div>';
        $cadresulatado .= '</div>';
    }
    echo $cadresulatado;
}

function completemdo2($param) {
    $resulta = array();
    $resultb = fila(count($param) - 1, count($param), '1');
    foreach ($param as $key => $value) {
        $resulta[$key] = dechex(15 - hexdec($value));
    }
    $resultadocomplemento2 = recorrer($resulta, $resultb);
    $resultadocomplemento2 = $resultadocomplemento2[count($resultadocomplemento2) - 1];
    $resultadocomplemento2 = $resultadocomplemento2[count($resultadocomplemento2) - 1];
    array_shift($resultadocomplemento2);
    return $resultadocomplemento2;
}

function imprimirdm($param, $tipoOperacion) {
    $cadresulatado = '';
    $cadresulatado .= '<div class="jumbotron">';
    $cadresulatado .= '<h4>Resolución:</h4>';
    $cadresulatado .= '<div class="row">';
    $cadresulatado .= '<div class="col-md-3">';
    $cadresulatado.= '<br>';
    $cadresulatado.='<p class="text-right">' . $tipoOperacion . '</p>';
    $cadresulatado.= '<br>';
    $cadresulatado.= '<p class="text-right">=</p>';
    $cadresulatado .= '</div>';
    $cadresulatado .= '<div class ="col-md-9">';
    $cadresulatado .= '<p class="text-center text-primary">';
    $cadresulatado.= $param['a'];
    $cadresulatado .= '</p">';
    $cadresulatado .= '<p class="text-center text-primary">';
    $cadresulatado.= $param['b'];
    $cadresulatado .= '</p">';
    $cadresulatado .= '<p class="text-center text-primary">';
    $cadresulatado.= $param['r'];
    $cadresulatado .= '</p">';
    if (isset($param['re'])) {
        $cadresulatado .= '<p class="text-left text-primary">';
        $cadresulatado.= 'Residuo: ' . $param['re'];
        $cadresulatado .= '</p">';
    }
    $cadresulatado .= '</div>';
    $cadresulatado .= '</div>';
    $cadresulatado .= '</div>';
    echo $cadresulatado;
}
