<!-- PDO es una libreria de funciones PHP que permite acceder a cualqueir base de datos
ya que aporta una capa de abstraccion al acceso a las bases de datos.
Es orientado a objetos aunque el funcionamiento no es muy distinto al de mysqli. -->

<?php
    try{
        $base = new PDO('mysql:host=127.0.0.1;dbname=prueba_pdo', 'root', 'a6zYXjc6YhWm94xR');
        $base ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //activa las excepciones de pdo
        echo "Conectado a la base de datos";
    }catch(Exception $e){
        die('Error :'.$e->getMessage()); // equivale a exit, es decir termina el escript mostrando 
                                         // un mensaje.
    }finally {
        $base = null; //cierra la conexión
    }
?>

<!-- Consultas no preparadas -->
    <!-- leer datos -->
    <!-- Método para ejecutra una consulta SQL es : query() -->
    <!-- método para saber el numero de instancias es rowCount() -->
    <!-- forma parte del objecto resultado que el método query ha devuelto -->
    <!-- Ejemplo obtener el numero de registros en la tabla Persona -->

<?php    
    try{
        $base = new PDO('mysql:host=127.0.0.1;dbname=prueba_pdo', 'root', 'a6zYXjc6YhWm94xR');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Recuperacion de datos de la tabla Persona
        $resultado = $base->query('SELECT * FROM Persona');
        echo "Numero de personas: ".$resultado->rowCount();
        // Muestra el número de registros

        $resultado->closeCursor();
    }catch(Exception $e) {
        // mensaje en caso de error
        die('Error :'.$e->getMessage());
    }
?>

<!-- Para mostrar los datos de la tabla Persona debe utilizar fetch, que permite leer el registro actual
y desplazarse al siguiente registro. -->
<!-- para realizar el fetch de la consulta es: fetch() -->
<!-- este metodo forma parte del objeto $resultado que el metodo query() ha devuelto -->

<?php 
    try {
        $base = new PDO('mysql:host=127.0.0.1;dbname=prueba_pdo', 'root', 'a6zYXjc6YhWm94xR');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Recuperacion de datos de la tabla persona
        $resultado = $base->query('SELECT nombre, apellidos FROM persona');

        echo "Numero de personas".$resultado->rowCount();
        // Mostrar el número de registros
        while ($datos = $resultado->fetch()) {
?>
        <p>
            Apellidos: <?php echo $datos['apellidos'];?>,
            Nombre:<?php echo $datos['nombre'];?>
        </p>
<?php
        }
        $resultado->closeCursor();// Cierre de la consulta
    }catch(Exception $e) {
        die("Error :".$e->getMessage());
    }
?>