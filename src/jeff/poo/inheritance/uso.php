<?php
    include("../classes/Animal.php");
    include('Pez.class.php');
    include('Gato.class.php');
?>

<?php
    $pez = new Pez("gris", 8);
    $gato = new Gato("blanco", 4);

    echo "El peso del pez es: ".$pez->getWeight()." kg<br />";
    echo "El peso del gato es: ".$gato->getWeight()." kg<br />";

    $pez->setType(true);
    echo "El tipo de pez es: ".$pez->getType()."<br/>";
    $pez->nadar();

    $gato->setRaza("Angora");
    echo "La raza dle gato es:".$gato->getRaza()."<br/>";
    $gato->maullar();

    echo "Numero de animales que se han instanciado: ".Animal::getCounter();

?>

<!-- protected  -->
<!-- Atributos de clase privados en clase madre que son heredados como privados en la clase hija -->

<?php 
    $pez = new Pez("gris", 8);
    echo "El peso del pez es:".$pez->getWeight()." kg<br />";

    $pez->setType(true);
    $pez->mostrarATributos();
?>