<?php
    $a = "hola";
    $$a = "mundo";

    print "$a $hola\n";
    print "$a ${$a}";
?>