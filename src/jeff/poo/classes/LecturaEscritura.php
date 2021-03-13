<?php
    include('MyException.php');
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
            echo "valor de x = ".$this->x."unidades";
            if($this->x < 0) {
                throw new Exception('Accion prohibida', 123);
            }
        }
        
        public function superAccion() {
            echo "valor de x = ".$this->x."unidades";
            if($this->x < 0) {
                throw new MyException('Accion prohibida', 123);
            }
        }
    }
?>