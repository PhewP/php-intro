<?php 
    include('../classes/Animal.php')
?>

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
    }
?>