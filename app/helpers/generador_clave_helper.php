<?php

function claveAleatoria($cant_caracteres){
    
    $caracteresPosibles = "0123456789!#$%&/()=?abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $clave='';
    
    for($i=0; $i<$cant_caracteres; $i++){

        $clave=$clave. $caracteresPosibles[rand(0,strlen($caracteresPosibles)-1)];

    }

    return $clave;

}

 

?>