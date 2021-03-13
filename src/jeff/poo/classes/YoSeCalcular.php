<?php 
    trait YoSeCalcular {
        function suma($a, $b) {
            return $a + $b;
        }

        function producto($a, $b) {
            return $a * $b;
        }
    }

    trait YoSoyLIsto{
        function decirHola() {
            if (isset($this->nombre)) {
                echo "Hola {$this->nombre}!<br/>";
            }
            else {
                echo "Hola<br/>";
            }
        }
    }
?>