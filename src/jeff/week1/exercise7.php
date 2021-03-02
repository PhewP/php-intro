<html>

    <head>
        <meta http-equiv="content-type" content="text/html";
        charset="utf-8"/>
        <title>Exercise 7</title>
    </head> 

    <body>
        <?php
            for($n1=1; $n1<=5; $n1++) {
                $vect[$n1] = $n1 * 2;
            }

            for($n1=1; $n1 <= count($vect); $n1++) {
                echo $vect[$n1]."<br>";
            }
        ?>
    </body>

</>