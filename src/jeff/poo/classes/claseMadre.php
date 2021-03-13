<?php 
    abstract class claseMadre {
        protected $x;

        public function get() {
            return "GET = $this->x";
        }
        abstract public function put($valor);
    }

    class claseHija extends claseMadre {
        public function put($valor) {
            $this->x = $valor;
        }
    }
?>