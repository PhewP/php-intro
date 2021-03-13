<?php
    class Usuario {

        private $apellido;
        private $nombre;
        private $idioma;
        private $timestamp; // fecha de creación

        public function __construct($nombre, $apellido)
        {
            $this -> nombre = $nombre;
            $this -> apellido = $apellido;
            $this -> timestamp = time();
            
        }

        public function __destruct()
        {
            echo "<p><b> Eliminación de $this ->apellido</b></p>";
        }

        public function __toString()
        {
            return "__toString = $this -> apellido - $this -> nombre";
        }

        public function setIdioma($idioma){
            $this->idioma = $idioma;
        }

        private function FormatoDeLaMarcaDeTiempo(){
            setlocale(LC_TIME, $this->idioma);
            return strftime('%c', $this->timestamp);
        }

        public function informacion(){
            $creacion = $this->FormatoDeLaMarcaDeTiempo();
            return "$this->nombre $this->apelido - $creacion";
        }
    }
?>