<?php
    include("YoSeCalcular.php");
?>

<?php
    class Usuario {

        use YoSoyLIsto, YoSeCalcular;

        private $apellido;
        private $nombre;
        private $idioma = 'es_ES';
        private $timestamp; // fecha de creación

        public function __construct($nombre, $apellido)
        {
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->timestamp = time();

            $this->decirHola();
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function setApellido($apellido) {
            $this->apellido = $apellido;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getApellido() {
            return $this->apellido;
        }

        public function __destruct()
        {
            echo "<p><b> Eliminación de $this->apellido</b></p>";
        }

        public function __toString()
        {
            return "__toString = $this->apellido - $this->nombre";
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
            return "$this->nombre $this->apellido - $creacion";
        }
    }

    // Clase que hereda de Usuario
    class Usuario_color extends Usuario {
        public $colores;

        public function __construct($nombre, $colores) {
            // llamda al constructor de la clase madre 
            parent::__construct($nombre, 'X');
            $this->colores = explode(",", $colores);
        }

        public function colores() {
            return implode(',', $this->colores);
        }
    }
?>