<?php
    interface Lectura {
        function get();
    }
    interface Escritura {
        function put($valor);
    }

    class unaClase implements Lectura, Escritura {
        private $x;
        public function get() {
            return $this->x;
        }
        public function put($valor) {
            $this->x = $valor;
        }

        public function accion() {
            if($this->x < 0) {
                throw new Exception('Accion prohibida', 123);
            }
        }
    }
?>