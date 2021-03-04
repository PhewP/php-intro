<html>
    <head>
        <title>Excercise 6</title>
    </head>
    
    <body>
        <?php
            define('TAM', 4);
            echo "<table border = 1>";

            function potencia($i, $j){ return pow($i, $j); }
    
            for($i = 1 ; $i <= TAM ; $i++)
            {
                echo "<tr>";
                for($j = 1 ; $j <= TAM ; $j++)
                    echo "<td>",potencia($i, $j),"</td>";
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </body>
</html>