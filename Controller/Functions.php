<?php

function codigoCaptcha(){
    $codigo = "";
    $valores= "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $cantidad = strlen($valores)-1;
    for($i=0;$i<6;$i++){
        $codigo .=  $valores[mt_rand(0,$cantidad)];
    }
    return $codigo;
}


//-------------------------------TEST----------------------------------
//echo codigoCaptcha();


?>