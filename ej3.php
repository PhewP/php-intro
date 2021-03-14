<html>
    <head>
        <title>Excercise 3</title>
        <link rel = "stylesheet" type = "text/css" href = "estilo.css">
    </head>

    <body>
        <?php
            error_reporting(E_ALL & ~E_NOTICE);
            $send = $_POST['send'];
            if(isset($send))
            {
                $connection = mysqli_connect("localhost", "cursophp-ad", "php-hph", "lindavista") 
                or die ("Cannot connect to server");

                $instruction = "select votos1, votos2 from votos";
                $query = mysqli_query($connection, $instruction)
                or die ("Query failure");
                $result = mysqli_fetch_array($query);

                $vote1 = $result["votos1"];
                $vote2 = $result["votos2"];
                $vote = $_POST['vote'];
                if($vote == "si")
                    $vote1 = $vote1 + 1;
                if($vote == "no")
                    $vote2 = $vote2 + 1;

                $instruction = "update votos set votos1 = $vote1, votos2 = $vote2";
                $update = mysqli_query($connection, $instruction)
                or die ("Modification failure");

                mysqli_close ($connection);

                print ("<P>Your vote has been registered. Thank you for your participation.</P>\n");
                print ("<A HREF='ej2-results.php'>Results</A>\n");
            }else
            {
        ?>
            <h1>Insert news</h1>

            <form action = ej3.php method = post>
                <input type = text name = vote value = si><br>
                <Ttextarea name = text cols = 20 rows = 4></textarea>
                <input type = radio name = vote value = no>No<br>
                <input type = submit name = "Insert new" value = insert>
            </form>

            <a href = "ej1.php">See results</a>
        <?php
            }
        ?>

    </body>

</html>