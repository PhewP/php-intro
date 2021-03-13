<!-- instanciación -->

<?php
    include('Usuario.php');
    include('claseMadre.php');
    include('Euclide.php');
    include('LecturaEscritura.php');
?>

<?php
    $yo = new Usuario('Olivier', 'Huertuel');
    echo "{$yo->informacion()}<br/>";

    $yo->setIdioma('en_US');
    echo "{$yo->informacion()}<br/>";

    $yo->setApellido(strtoupper($yo->getApellido())); 
    echo "{$yo->getApellido()}<br/>";

    echo "$yo <br />";
?>

<!-- llamadada a metodo en la instanciacion -->
<!-- Con este tipo de llamada el nuevo objeto se suprme inmediatamente después de su creacion -->
<?php
    $informacion = (new Usuario('Victor', 'Hugo'))->informacion();
    echo "$informacion<br/>"
?>

<!-- Herencia -->
<!-- Si la clase hija no tiene constructor, llama automáticamente a la clase madre -->
<!-- Si tiene constructor no hay ninguna llamada automática a la clase madre hay que usar parent::__construct() -->
<!-- para referenciar a cualquier metodo o atributo de la clase madre utsamos paren::nombre -->
<!-- Si queremos redefinir un método tiene que tener los mismos parámetros -->

<?php
    $yo = new Usuario_color('Olivier', 'azul, blanco, rojo');
    echo "{$yo->informacion()}<br/>";
    echo "{$yo->colores()}<br/>";
?>

<!-- Clases abstractas -->
<!-- Es una clase que no se puede instanciar, sirve de base para definir clases hijas que sí se pueden instanciar -->
<!-- Un metodo abstracto es un metodo que se define en una clase abstracta pero no se ha implementado, este metodo se implementa
de manera diferente en las clases hijas -->
<!-- Un metodo abstracto no puede ser privado -->

<!-- la clase hija que extiende de la clase abstracta puede sobrecargar los métodos omitiendo el
tipo del argumento o especificando tipo de retorno cuando no está definido en el 
principal -->

<?php
    $objeto = new claseHija();
    $objeto->put(123);
    echo $objeto->get().'<br/>'
?>

<!-- clases o métodos finales -->

<!-- No se puede heredar de una clase si es definida como final -->
<!-- Un metodo final no puede ser redefinido en una clase hija  -->

<!-- interfaces  -->

<!-- Es una clase que solo conteine las especificaciones de los métodos sin implementacion -->
<!-- Tampoco include ningún atributo -->
<!-- Las intefaces son siempre públicas por lo que se puede omitir la clave public -->
<!-- Se pueden implementar varias y se usa la palabra implements  -->

<!-- Métodos estáticos Constantes de clases-->
<!-- Metodos o atributos de clase (metodos estáticos) que se pueden usar sin instanciar ningún objeto -->
<!-- Para hacer referencia a ellos usamos nombreclase::atributo  -->


<!-- Traits -->
<!-- tipo de clase qeu reagrupa un conjunto de métodso o de atributos que pueden utilizarse en otras clases sin usar herencia  -->
<!-- Es un método fácil de reutilización refactorización de código ya que en PHP no tiene herencia múltiple -->

<!-- Un metodo heredado se reemplaza por un metodo con el mismo nombre surgido en un trait  -->
<!-- Un trait se reemplaza por un metodo del mismo nombre de la clase actual -->
<!-- Si dos traits insertan un metodo con el mismo nombre en una clase se produce un error a menos que se use insteadof o as -->
<!-- Un trait puede usar otros traits -->
<!-- caracteristicas -->
<!-- cambiar la visibilidad de los metodos de la clase que utiliza el trait  -->
<!-- definir atributos en un trait -->
<!-- definir los metodos abstractos en un trait ( estos metodos se tienen que implementar en la clase que use un trait ) -->
<!-- definir atributos o metodos estaticos en un trait (mismo funcionamiento que los atributos y los metodos estaticos definidos en una clase ) -->


<?php
    $yo= new Usuario('Oliver', 'Hell');
    echo 'Yo se calcular';
    echo '10823 x 11409 = '.$yo->producto(10821, 11409);
?>


<!-- clases anonimas -->
<?php
    $euclide = new Euclide();
    $euclide->atribuirFigura(
        new class(2, 5) {
            public function __construct($ancho, $longitud) {
                $this->ancho = $ancho;
                $this->longitud = $longitud;
            }
            public function superficie() {
                return $this->ancho *$this->longitud;
            }
        }
    );

    echo $euclide ->mostrarSuperficie();
?>

<!-- Excepciones -->
<!-- Administrar los errores  -->
<!-- meter codigo entre bloques try/catch  -->
<!-- Bloque finally es opcional, siempre se ejecutará después de los bloques try o catch, se produzca una excepción o no  -->
<!-- la clase Exception tiene dos argumentos, mensaje y codigo -->
<?php
    $objeto = new unaClase();
    $objeto->put(1);
    echo'<br/>--<br/>';
    try {
        echo 'Objeto 1:';
        $objeto->accion();
        echo"OK<br/>";
    }catch(Exception $e) {
        echo 'Error'.$e->getCode().'-'.$e->getMessage().'<br/>';
    }

    $objeto = new unaClase();
    $objeto->put(-1);
    try {
        echo 'Objeto 2:';
        $objeto->accion();
        echo 'OK<br />';
    } catch(Exception $e) {
        echo 'ERROR'.$e->getCode().'-'.$e->getMessage().'<br/>';
    }
    echo'--<br/>';
?>

<!-- lo mismo pero con finally -->

<?php 
    $object = new unaClase();
    $object->put(1);
    try {
        echo "Objecto 1:";
        $object->accion();
        echo 'OK<br/>';
    }catch (Exception $e) {
        echo 'Error'.$e->getCode().'-'.$e->getMessage().'<br/>';
    }finally{
        echo 'Finally<br/>';
    }

    $object->put(-1);
    try {
        echo 'Objecto 2';
        $object->accion();
        echo 'OK<br/>';
    } catch (Exception $e) {
        echo 'Error'.$e->getCode().'-'.$e->getMessage().'<br/>';
    }finally {
        echo 'FINALLY<br/>';
    }
?>
<!-- 
Si una excepcion se no se procesa se producira un error fatal. Se puede definir un gesttor de excepcion 
por defeto utilizando set_exception_handler. -->

<!-- Puedes creatr tus propias escepciones ampliando la clase exception interna  -->
<!-- Se puede utilizar varios bloques catch para procesar diferentes excepciones  -->

<?php 
    $object = new unaClase();
    $object->put(1);
    try {
        echo "Objecto 1:";
        $object->accion();
        echo 'OK<br/>';
    }catch (Exception $e) {
        echo 'Error'.$e->getCode().'-'.$e->getMessage().'<br/>';
    }finally{
        echo 'Finally<br/>';
    }

    $object->put(-1);
    try {
        echo 'Objecto 2';
        $object->superAccion();
        echo 'OK<br/>';
    }catch (MyException $mye) {
        echo 'Error'.$mye->getSuperCode().'-'.$mye->getMessage().'<br/>';
    }catch (Exception $e) {
        echo 'Error'.$e->getCode().'-'.$e->getMessage().'<br/>';
    }finally {
        echo 'FINALLY<br/>';
    }

    // también se puede agrupar en una sola linea
    $object->put(-1);
    try {
        echo 'Objecto 3';
        $object->superAccion();
        echo 'OK<br/>';
    }catch (MyException | Exception $e) {
        echo 'Error'.$e->getCode().'-'.$e->getMessage().'<br/>';
    }finally {
        echo 'FINALLY<br/>';
    }
?>

<!-- Ejercicio Escribrir una clase  -->
<?php
    
?>