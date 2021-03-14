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