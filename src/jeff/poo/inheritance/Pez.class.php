<?php
    class Pez extends Animal {
        private $vive_en_el_mar;

        public function getType() {
            if ($this->vive_en_el_mar) {
                return "vive_en_el_mar";
            }
            else if($this->vive_en_el_mar === false) {
                return "no_vive_en_el_mar";
            } else {
                return "";
            }
        }

        public function setType($vive_en_el_mar) {
            $this->vive_en_el_mar = $vive_en_el_mar;
        }

        public function nadar() {
            echo "Nado <br />";
        }

        public function mostrarATributos() {
            echo "Type:".$this->vive_en_el_mar; // propio privado
            echo "Edad:".$this->edad; // protected de la clase madre
            echo "Peso:".$this->peso; // error, privado de la clase madre
        }

        public function eat(Animal $animal_comido) {

            parent::eat($animal_comido);

            if (isset($animal_comido->raza)) {
                $animal_comido->raza="";
            }
            if (isset($animal_comido->vive_en_el_mar)) {
                $animal_comido -> vive_en_el_mar="";
            }
        }

        
    }
?>