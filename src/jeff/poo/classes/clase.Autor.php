<?php
    class Autor {
        public const APELLIDOS_ENTRE_PARENTESIS = 1;
        public const APELLIDOS_DESPUES_COMILLAS = 2;

        private $nombre;
        private $apellidos;

        public function __construct($patronimico) {
            [$this->apellidos, $this->nombre] = explode(" ", $patronimico);
        }

        public function __toString()
        {
            return "$this->apellidos $this->nombre";
        }

        public function format($format = NULL) {
            if($format == Autor::APELLIDOS_ENTRE_PARENTESIS) {
                return "$this->nombre ($this->apellidos)";
            }
            else if($format == Autor::APELLIDOS_DESPUES_COMILLAS) {
                return "$this->apellidos $this->nombre";
            }
            else if($format == NULL) {
                return "$this->apellidos $this->nombre";
            }
            
            throw new Exception("Formato desconocido");
        }

    }
?>