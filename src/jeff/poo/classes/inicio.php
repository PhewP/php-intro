<?php
    include("clase.Autor.php")
?>
<html>
    <header>
        <title> Inicio</title>
    </header>
    <body>
        <?php
            $autor = new Autor("Mamahuevaso Elpepe");
            try{
                echo $autor."<br/>";
                echo "{$autor->format(Autor::APELLIDOS_DESPUES_COMILLAS)}<br/>";
                echo "{$autor->format(Autor::APELLIDOS_ENTRE_PARENTESIS)}<br/>";
                echo "{$autor->format(34)}<br/>";
            }catch(Exception $e) {
                echo "<b> Error: {$e->getMessage()}</b> <br/>";
            }
        ?>
    </body>
</html>