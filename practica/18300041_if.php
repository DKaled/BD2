<?php
    $sexo = 'M';
    $nombre = 'Ana';

    if ($sexo == 'M')
        $saludo = "Bienvenida, ";
    else 
        $saludo = "Bienvenido, ";
    $saludo = $saludo . $nombre;
    print ($saludo);
?>