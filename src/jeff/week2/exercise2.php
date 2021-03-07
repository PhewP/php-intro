<html lang="en">
    <head>
        <meta http-equiv="Content-type" content="text\html" charset="utf-8">
        <title>Exercise 2</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>

    <body>
        <?php
            error_reporting(E_ALL & ~E_NOTICE);
            $data_send = $_POST['send'];
            if (isset($data_send)) {
                print("<h1> Survey. Vote registered</h1>\n");
                // Conecting with the data base
                $connection = mysqli_connect("localhost", "cursophp","",
                "lindavista") or die ("Cannot connect to the server");

                // Get actual votes
                $stringQuery = "select votos1, votos2 from votos";
                $query = mysqli_query($connection, $stringQuery)
                or die ("Query failed");
                $res = mysqli_fetch_array($query);

                // update votes 
                $yesVotes = $res["votos1"];
                $noVotes = $res["votos2"];
                $actualVote = $_POST["actualVote"];
                if($actualVote == "yes") {
                    $yesVotes += 1;
                } else if($actualVote == "no") {
                    $noVotes += 1;
                }
                $updateStringQuery = "update votos set votos1=$yesVotes, votos2=$noVotes";
                $updateQuery = mysqli_query($connection, $updateStringQuery)
                    or die("Update failed");
                
                mysqli_close($connection);
                print("<p> Your vote has been registered. Thanks for participating.</p>\n");
                print("<a href='exercise2-results.php'> See results</a>\n");

            }
            else {
            ?>
            <h1>Survey</h1>
            <p> Do you think that house prices will continue to rise at the current rate?</p>
            <form action="exercise2.php" method="POST">
                <input type="radio" name="actualVote" value="yes" checked> Yes <br>
                <input type="radio" name="actualVote" value="no"> No <br>
                <input type="submit" name="send" value="vote">
            </form> 

            <a href="exercise2-results.php">See results</a>
            <?php
            }
            ?>
    </body>        
</html>