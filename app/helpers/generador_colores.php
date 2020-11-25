<?php

  
               
    function buscarColor(){
            $colores = array(
                1 => "#E6B0AA",
                2 => "#A9CCE3",
                3 => "#F9E79F",
                4 => "#F5CBA7",
                5 => "#CCD1D1",
                6 => "#D2B4DE",
                7 => "#AED581 ",
                8 => "#81A6D5",
                9 => "#A57651",
                10 => "#F85684",
            );
            $aleatorio = rand(1,10);
            
            return $colores[$aleatorio];
        
    }
?>
