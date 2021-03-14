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

<!-- Escribir datos  -->
<!-- Para ejectura una consulta de tipo Insert -->
<!-- El metodo que permite ejecutar una consulta SQL de tipo UPDATE, INSERT, o DELETE es: exec() -->

<!-- Ejemplo de insert  -->
<!-- observe que el id_persona no se ha agregado la consulta, debido que es autoincremental, la base de datos se asignara
automaticamente -->
<?php
    try {
        $base = new PDO('mysql:host=127.0.0.1;dbname=prueba_pdo', 'root', 'a6zYXjc6YhWm94xR');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO persona(nombre, apellidos, edad) VALUES ('oliver', 'durán', 36)";
        // agregar datos en la tabla persona
        $base->exec($sql);
        echo "Persona agregada";
    }catch(Exception $e) {
        // mensaje en caso de error
        die('Error : '.$e->getMessage());
    }
?>

<?php
    try {
        $base = new PDO('mysql:host=127.0.0.1;dbname=prueba_pdo', 'root', 'a6zYXjc6YhWm94xR');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO persona(nombre, apellidos, edad) values ('gerardo', 'roldan', 64)";

        $base->exec($sql);
        echo "El identificador de la última persona agregada es: ";
        echo $base->lastInsertId().".";
    }catch(Exception $e) {
        // mensaje en caso de error
        die ('Error : '.$e->getMessage());
    }
?>

<!-- Eliminar datos  -->
<!-- el metodo que permite ejecutar una consulta sql de tipo update, insert, delete es exec() -->
<?php
    try {
        $base = new PDO('mysql:host=127.0.0.1;dbname=prueba_pdo', 'root', 'a6zYXjc6YhWm94xR');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM persona WHERE apellidos = 'lopez'";
        // eliminacion de datos  enla tabla persona
        $base->exec($sql);
        echo "persona eliminada lopez.";
        $base->exec("DELETE FROM persona WHERE apellidos = 'roldan'");
        echo "persona eliminada roldan.";
        $base->exec("DELETE FROM persona WHERE apellidos = 'durán'");
        echo "persona eliminada durán.";
    }catch(Exception $e) {
        die('Error : '.$e->getMessage());
    }
?>

<!-- Actualizar datos -->
<!-- para modificar datos, ejecute una consulta de tipo UPDATE -->
<!-- Para ejecutar una consulta SQL de tipo UPDATE, INSERT o DELETE es : exec() -->
<?php
    try {
        $base = new PDO('mysql:host=127.0.0.1;dbname=prueba_pdo', 'root', 'a6zYXjc6YhWm94xR');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE persona SET apellidos = 'lucas', edad=33 WHERE apellidos='Germán'";
        $numero = $base->exec($sql);
        echo "Numero de personas modificadas: ".$numero;
    }catch(Exception $e) {
        die('Error: '.$e->getMessage());
    }
?>

<!-- Consultas preparadas  -->
<!-- Consultas parametrizadas -->
<!-- Las consultas SELECT, UPDATE, DELETE, INSERT  se hacen con: prepare() -->
<!-- Luego para ejecutarla se utiliza execute -->
<?php
    try{
        
        $base = new PDO('mysql:host=127.0.0.1;dbname=prueba_pdo', 'root', 'a6zYXjc6YhWm94xR');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $sql = 'SELECT nombre, apellidos from persona WHERE edad > ? AND apellidos LIKE ?';
    
        $resultado = $base->prepare($sql);
        $resultado->execute(array(5, 'Mo%'));
        while($registro = $resultado->fetch()) {
            echo 'apellidos:'.$registro['apellidos'].', Nombre:'.$registro['nombre'].'<br />';
        }
    
        $resultado->closeCursor();
    }catch(Exception $e) {
        die('Error : '.$e->getMessage());
    }
?>

<!-- Using markers -->
<?php
    try {
        $base = new PDO('mysql:host=127.0.0.1;dbname=prueba_pdo', 'root', 'a6zYXjc6YhWm94xR');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT nombre, apellidos FROM persona WHERE edad > :edad AND apellidos LIKE :apellidos";

        $result = $base->prepare($sql);
        $result->execute(array('edad' => 5, 'apellidos' => 'Mo%'));

        while ($registro = $resultado->fetch()) {
            echo 'Apellidos: '.$registro['apellidos'].', Nombre:'.$registro['nombre'].'<br/>';
        }
        $resultado->closeCursor();
    }catch(Exception $e) {
        die('Error : '.$e->getMessage());
    }
?>

<!-- Escribir datos -->
<!-- Igual que leer datos, utilizamos los métodos prepare() y execute() -->
<?php 
    try {
        $base = new PDO('mysql:host=127.0.0.1;dbname=prueba_pdo', 'root', 'a6zYXjc6YhWm94xR');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO persona (nombre, apellidos, edad) VALUES (:apellido, :nombre, :edad)";
        // preparar los datos
        $resultado = $base->prepare($sql);
        $resultado->execute(array('apellido' => "Rincon Lopez", 'nombre' => 'Clara', 'edad' => 42));

        echo "El identificador de la última persona agregada es : ";
        echo $base->lastInsertId().".";
        $resultado->closeCursor();
    }catch(Exception $e) {
        die('Error : '.$e->getMessage());
    }

?>

<!-- Ejecutar una insercion varias veces seguidas, utilizar el enlace de argumentos con el metodo binParam() -->
<?php
    try {
        $base = new PDO('mysql:host=127.0.0.1; dbname=prueba_pdo', 'root','a6zYXjc6YhWm94xR');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO persona (nombre, apellidos, edad) VALUES (:nombre, :apellido, :edad)";

        $resultado = $base->prepare($sql);

        $resultado->bindParam(':apellido', $apellidos);
        $resultado->bindParam(':nombre', $nombre);
        $resultado->bindParam(':edad', $edad);

        $apellidos = 'Lopez Ruiz';
        $nombre = 'Juan';
        $edad = 57;
        $resultado->execute();

        echo "El identificador de la última person agregada es:";
        echo $base->lastInsertId().".<br />";

        $nombre = "Bob";
        $apellidos = "Martinez";
        $edad = 45;
        $resultado->execute();
        
        echo "El identificador de la última persona agregada es:";
        echo $base->lastInsertId().".";
        $resultado->closeCursor();
    }catch(Exception $e) {
        die('Error : '.$e->getMessage());
    }
?>

<!-- eliminar datos -->
<?php
    try {
        $base = new PDO('mysql:host=127.0.0.1;dbname=prueba_pdo', 'root', 'a6zYXjc6YhWm94xR');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM persona WHERE apellidos =:apellido";
        $resultado = $base->prepare($sql);
        $resultado->execute(array('apellido' => 'Martinez'));
        echo "Persona eliminada.";
        $resultado->closeCursor();
    }catch(Exception $e) {
        die('Error : '.$e->getMessage());
    }
?>

<!-- modificar datos -->
<!-- igual que para escribir y leer datos va utilizar los metodos prepare() y execute() -->
<?php 

    try {

        $base = new PDO('mysql:host=127.0.0.1;dbname=prueba_pdo', 'root', 'a6zYXjc6YhWm94xR');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $sql = "UPDATE persona SET edad = :edad WHERE apellidos = :apellidos and nombre = :nombre";
    
        $resultado = $base->prepare($sql);
        $resultado->execute(array('edad' => 36, 'apellidos' => 'Morales HonHon', 'nombre' => 'Nanie'));
        
        echo "Persona modificada.";
        $resultado->closeCursor();
    }catch(Exception $e) {
        die('Error : '.$e->getMessage());
    }
?>

<!-- Llamar un procedimiento almacenado -->
<!-- un procedimiento almacenado tiene un nombre y puede tener agumentos de entrada y de salida -->

<?php
    try {
        $base = new PDO('mysql:host=127.0.0.1;dbname=prueba_pdo', 'root', 'a6zYXjc6YhWm94xR');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $base->prepare("CALL creacion_persona(?, ?, ?)");
        $apellidos = 'MORALES';
        $nombre = 'David';
        $edad = 40;
        $stmt->bindParam(1, $nombre, PDO::PARAM_STR, 20);
        $stmt->bindParam(2, $apellidos, PDO::PARAM_STR, 20 );
        $stmt->bindparam(3, $edad, PDO::PARAM_INT);

        $stmt->execute();
        echo "El procedimiento ha insertado una nueva persona.";
    } catch(Exception $e) {
        die('Error : '.$e->getMessage());
    }
?>