<?php 
    abstract class claseMadre {
        protected $x;

        public function get() {
            return "GET = $this->x";
        }

        final public function metodoFinal() {
            echo "Metodo de la clase madre";
        }
        
        abstract public function put($valor);
    }

    class claseHija extends claseMadre {
        public function put($valor) {
            $this->x = $valor;
        }
    }
?>