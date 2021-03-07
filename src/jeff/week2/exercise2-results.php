<html>
    <head>
        <title>Survey. Votes result</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
        <h1>Survey. Results</h1>
        <?PHP 
            //Connect with the database
            $connection = mysqli_connect("localhost", "cursophp", "", "lindavista")
                or die("Cannot conect with the server");
            // Get actual votes 
            $queryString = "select * from votos";
            $query = mysqli_query($connection, $queryString)
                or die("Query failed");
            $res = mysqli_fetch_array($query);

            $yesVotes = $res["votos1"];
            $noVotes = $res["votos2"];
            $totalVotes = $yesVotes + $noVotes;

            // Show results

            print("<table>\n");
            print("<tr>\n");
            print("<th>Answer</th>\n");
            print("<th>Votes</th>\n");
            print("<th>Percentage</th>\n");
            print("<th>Graphic Respresentation</th>\n");
            print("</tr>\n");

            $percentage = round(($yesVotes/$totalVotes) * 100, 2);

            print("<tr>\n");
            print("<td class='left'>Si</td>\n");
            print("<td class='right'>$yesVotes");
            print("<td class='right'>$percentage%</td>\n");
            print("<td class='left'><img src='img/puntoamarillo.gif' height='10'
            width='".$percentage*4 . "'></td>\n");

            $percentage = round(($noVotes/$totalVotes) * 100, 2);

            print("<tr>\n");
            print("<td class='left'> No </td>\n");
            print("<td class='right'>$noVotes");
            print("<td class='right'>$percentage%</td>\n");
            print("<td class='left'><img src='img/puntoamarillo.gif' height='10'
            width='".$percentage*4 . "'></td>\n");
            
            print("</tr>\n");
            print("</table>\n");
            print("<p>Total number of votes: $totalVotes </p>\n");
            print("<p><a href='exercise2.php'>Vote Page</a></p>\n");

            mysqli_close($connection);
        ?>
    </body>
</html>