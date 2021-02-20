<html>
    <head>
        <title>Excercise 4</title>
    </head>
    
    <body>
        <?php
        echo "<table border = 1>";
        $n = 1;
        for($i = 1 ; $i <= 10 ; $i++)
        {
            echo "<tr>";
            for($j = 1 ; $j <= 10 ; $j++)
            {
                echo "<td>",$n,"</td>";
                $n = $n + 1;
            }
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </body>    
</html>