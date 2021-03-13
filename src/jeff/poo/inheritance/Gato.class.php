<?php
    class Gato extends Animal {
        private $raza;

        public function getRaza() {
            return $this->raza;
        }

        public function setRaza($raza) {
            $this->raza = $raza;
        }

        public function maullar() {
            echo "Miau <br/>";
        }
    }
?>