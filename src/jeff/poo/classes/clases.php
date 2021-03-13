<!-- instanciación -->

<?php
    include('Usuario.php')
?>

<?php
    $yo = new Usuario('Olivier', 'Huertuel');
    echo "{$yo->informacion()}<br/>";

    $yo->setIdioma('en_US');
    echo "{$yo->informacion()}<br/>";

    $yo->setApellido(strtoupper($yo->getApellido())); 
    echo "{$yo->getApellido()}<br/>";

    echo "$yo <br />";
?>