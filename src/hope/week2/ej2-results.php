<html>
    <head>
        <title>Excercise 2: Results</title>
        <link rel = "stylesheet" type = "text/css" href = "estilo.css">
    </head>
    
    <body>
        <h1>Poll results:</h1>

        <?php
            $connection = mysqli_connect("localhost", "cursophp", "", "lindavista")
            or die ("Cannot connect to server");

            mysqli_close($connection);
        ?>
    </body>
    
</html>