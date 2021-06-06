<?php
    $extension = "HTML";
    
    switch ($extension) {
        case ("PDF"):
            $tipo = "Documento Adobe PDF";
            break;
        case ("TXT"):
            $tipo = "Documento de texto";
            break;
        case ("HTML"):
        case ("HTM"):
            $tipo = "Documento HTML";
            break;
        default:
            $tipo = "Archivo " . $extension;
    }
    print ($tipo);
?>