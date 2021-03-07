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

            $instruction = "select * from votos";
            $query = mysqli_query($connection, $instruction)
            or die ("Query failure");

            $result = mysqli_fetch_array($query);

            $votes1 = $result["votos1"];
            $votes2 = $result["votos2"];
            $votes = $votes1 + $votes2;

            print ("<table>"); 
            print ("<tr>");
            print ("<TH>Answers</TH>");
            print ("<TH>Votes</TH>");
            print ("<TH>Percents</TH>");
            print ("<TH>Graphics</TH>");
            print ("</tr>");

            $percent = round(($votes1 / $votes) * 100, 2);
            print("<tr>");
            print("<td class = 'left' >Si</td>");
            print("<td class = 'right'>$votes1</td>");
            print("<td class = 'right'>$percent%</td>");
            print("<td class = 'left'><img src='photos/puntoamarillo.gif' height='10' width='" . $percent * 4 . "'></td>");
            print("</tr>");

            $percent = round(($votes2 / $votes) * 100, 2);
            print("<tr>");
            print("<td class = 'left' >No</td>");
            print("<td class = 'right'>$votes2</td>");
            print("<td class = 'right'>$percent%</td>");
            print("<td class = 'left'><img src='photos/puntoamarillo.gif' height='10' width='" . $percent * 4 . "'></td>");
            print("</tr>");

            print("</table>");

            print("<p>Total votes: $votes</p>");
            print("<p><a href = 'ej2.php'>Voting page</a></p>");

            mysqli_close($connection);
        ?>
    </body>
    
</html>