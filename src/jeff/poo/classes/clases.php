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

<!-- llamadada a metodo en la instanciacion -->
<!-- Con este tipo de llamada el nuevo objeto se suprme inmediatamente después de su creacion -->
<?php
    $informacion = (new Usuario('Victor', 'Hugo'))->informacion();
    echo "$informacion<br/>"
?>