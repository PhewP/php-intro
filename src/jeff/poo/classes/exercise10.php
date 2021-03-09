<!-- includes -->
<?php
    include("Animal.php");
?>

<!-- Exercise 10 -->
<?php
    $fish1 = new Animal('grey', 10);
    $fish2 = new Animal('red', 7);

    echo 'Weight fish 1 is: '.$fish1 -> getWeight()."<br/>";
    echo 'Weight fish 2 is: '.$fish2 -> getWeight()."<br/>";
    
    $fish1 -> eat($fish2);
    
    echo 'Weight fish 1 is: '.$fish1 -> getWeight()."<br/>";
    echo 'Weight fish 2 is: '.$fish2 -> getWeight()."<br/>";

?>
