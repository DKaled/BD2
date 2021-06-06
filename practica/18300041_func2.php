<?php
    function incrementa (&$a) {
        $a = $a + 1;
    }

    $a = 1;
    incrementa ($a);
    print $a; //Muestra un 2
?>