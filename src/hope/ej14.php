<html>
    <head>
        <title>Excercise 14 php</title>
    </head>

    <body>
        <?php
            if($_POST["sexo"] == 1)
                echo "El alumno ";
            else
                echo "La alumna ";
            echo $_POST["nombre"];
            echo " natural de ";
            echo $_POST["natal"];
            echo ", vive actualmente en ";
            echo $_POST["residencia"];
            echo " y cursa el ";
            switch($_POST["curso"])
            {
                case 1:
                    echo " primero año ";
                case 2:
                    echo " segundo año ";
                case 3:
                    echo " tercer año ";
                case 4:
                    echo " cuarto año ";
            }
            echo " de ";
            echo $_POST["grado"];
        ?>
    </body>
</html>