<!-- To use the class first you have to import it -->
<?php 
    include('Animal.php');
?>

<!-- And now you can use it -->
<?php 
    $dog = new Animal("black", 10);

    echo "The weigth of the dog is: ".$dog -> getWeight()." kg<br />";
    $dog -> add_weight();
    echo "The weigth of the dog is: ".$dog -> getWeight()." kg<br />";
    $dog -> setWeight(15);
    echo "The weigth of the dog is: ".$dog -> getWeight()." kg<br />";
?>

<?php 
    $cat = new Animal("gray", 5);
    $cat -> setWeight(5);
    echo "The weight of the cat is: ".$cat -> getWeight()."kg<br />";
    $cat -> setColor("White");
    echo "The color of the cat is: ".$cat -> getColor()."<br />";
?>

<!-- Pass custom objetcts as arguments -->

<?php
    $fish = new Animal("blue", 0);
    $fish -> setWeight(1);
    $fish -> setColor("blue");
    echo "The color of the fish is : ".$fish -> getColor(). "<br/>";
    echo "The weight of the fish is : ".$fish -> getWeight(). "<br/>";
    
    // The cat eats the fish
    
    $cat -> eat($fish);
    
    echo "The wight of the cat now is : ".$cat -> getWeight(). "<br/>";
    
    // The atribures of the fish are
    echo "The color of the fish is : ".$fish -> getColor(). "<br/>";
    echo "The weight of the fish is : ".$fish -> getWeight(). "<br/>";


?>

<!-- destructor: to use is use de function unset(Object) -->
<?php
    unset($dog);
?>

<!-- to use class constants, use CLASS::CONSTANT -->

<?php
    $fish1 = new Animal("white", Animal::LIGTH_WEIGTH);
    $fish2 = new Animal("blue", Animal::HEAVY_WEIGTH);

    echo "Weigth fish 1: ".$fish1 -> getWeight()."kg <br />";
    echo "Weigth fish 2: ".$fish2 -> getWeight()."kg <br />";
    
    $fish2 -> eat($fish1);

    echo "Weigth fish 1: ".$fish1 -> getWeight()."kg <br />";
    echo "Weigth fish 2: ".$fish2 -> getWeight()."kg <br />";
?>

<!-- Static members to use it, same than constants Class::Name -->
<?php
    Animal::move();
    // you can use it with a objets, but this method cant use the members of that object $this.
    $fish1 = new Animal("white", 7);
    $fish1::move();
?>

<!-- use of static attributes -->

<?php
    $dog1 = new Animal("red", 10);
    $dog2 = new Animal("gray", 5);
    $dog3 = new Animal("black", 15);
    $dog4 = new Animal("white", 8);
    
    echo "The number of animals instantiated: ".Animal::getCounter()."<br />";
?>