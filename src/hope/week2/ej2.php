<html>
    <head>
        <title>Excercise 2</title>
        <link rel = "stylesheet" type = "text/css" href = "estilo.css">
    </head>

    <body>
        <?php
            error_reporting(E_ALL & ~E_NOTICE);
            $send = $_POST['send'];
            if(isset($send))
            {
                $connection = mysqli_connect("localhost", "cursophp", "", "lindavista") 
                or die ("Cannot connect to server");

                $instruction = "select votos1, vosot2, from votos";
                $query = mysqli_query($connection, $instruction)
                or die ("Query failure");
                $result = mysqli_fetch_array($query);

                $vote1 = $result["votos1"];
                $vote2 = $result["votos2"];
                $vote = $_POST['voto'];
                if($vote == "si")
                    $vote1 =+ 1;
                if($vote == "no")
                    $vote =+ 1;

                $instruction = "update votos set votos1 = $vote1, votos2 = $vote2";
                $update = mysqli_query($connection, $instruction)
                or die ("Query failure");

                mysqli_close ($connection);

                print ("<P>Your vote has been registered. Thank you for your participation.</P>\n");
                print ("<A HREF='ej2-results.php'>Results</A>\n");
            }else
            {
        ?>
            <h1>Poll</h1>

            <p>Do you think that the price of the market will continue raising?</p>
            <form action = ej2.php method = post>
                <input type = radio name = voto value = si checked>Si<br>
                <input type = radio name = voto value = no checked>No<br>
                <input type = submit name = send value = vote>
            </form>

            <a href = "ej2-results.php">See results</a>
        <?php
            }
        ?>

    </body>

</html>