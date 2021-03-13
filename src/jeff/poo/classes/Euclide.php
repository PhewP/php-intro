<?php 
    class euclide {
        private $figura;
        public function atribuirFigura($figura) {
            $this -> figura = $figura;
        }
        public function mostrarSuperficie() {
            echo 'Superficie = '.$this->figura->superficie();
        }
    }
?>
