<html>
    <head>
    <meta http-equiv="content-type" content="text/html";
    charset="utf-8"/>
    <title>exercise 5 </title>
    </head>
    <body>
        <?php
            define('TAM', 10);
            echo "<table border=1>";
            $n=1;
            for($n1=1; $n1<=10; $n1++) {
                if($n1 % 2 == 0)
                    echo "<tr bgcolor=#bdc3d6>";
                else
                    echo "<tr>";
                for($n2=1; $n2<=10; $n2++) {
                    echo "<td>", $n, "</td>";
                    $n=$n+1;
                }
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </body>
</html>