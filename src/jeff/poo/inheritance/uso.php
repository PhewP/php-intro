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

<!-- sobrecarga -->
<!-- Sirve par amodificar un método que ya existe en una clase madre con el objetivo de cambiar su comportamiento -->
<!-- El metodo existe en las dos clases diferentes y segun contexto ejecuta el de la clase hija o clase madre -->

<?php
    $pez = new Pez("gris", 8);
    $pez->setType(true);

    $otro_pez = new Pez("negro", 5);
    $otro_pez->setType(false);

    $pez->eat($otro_pez);
    echo "El tipo de pez comido es:".$otro_pez->getType()."<br />";
    echo "El peso del pez comido es:".$otro_pez->getWeight()." kg<br />";
?>

<!-- Herencia en cascada -->

<!-- La herencia múltiple no existe en php se tiene que realizar en cascada -->
<!-- animal->pez->pez_espada -->
<!-- pez eespada accede a sus métodos privados, protegidos y publicos -->
<!-- a todos los atributos protegidos y publicos de pez -->
<!-- a todos los atributos y metodos protegidos y publicos de la clase animal -->