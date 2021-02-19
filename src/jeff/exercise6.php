<html>
    <head>
        <meta http-equiv="content-type" content="text/html";
        charset="utf-8"/>
        <title>Exercise 6</title>
    </head>
    <body>
        <?php
            define('TAM', 4);
            function myPow($base, $exp) {
                $res = pow($base, $exp);
                return $res;
            }

            echo "<table border=1>";
            for($n1=1; $n1<= TAM; $n1++) {
                echo "<tr>";
                for ($n2=1; $n2<= TAM; $n2++) {
                    echo "<td>".myPow($n1, $n2)."</td>";
                }   
                echo "<tr>";
            }
            echo "</table>";
            
        ?>
    </body>
</html>