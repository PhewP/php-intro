<html>
    <head>
        <title>Excercise 1</title>
        <link rel = "stylesheet" type = "text/css" href = "estilo.css">
    </head>
    
    <body>
        <h1>News:</h1>
        <?php
        //Connect to server
            $connection = mysqli_connect("localhost", "cursophp", "", "lindavista") 
            or die ("Cannot connect to server");

        //DB query
            $instruction = "select * from noticias order by fecha desc";
            $query = mysqli_query($connection, $instruction)
            or die ("Query failure");

        //Show query result
            $nrows = mysqli_num_rows($query);
            if($nrows > 0)
            {
                print("<table>");
                print("<tr>");
                print("<th>Tittle</th>");
                print("<th>Text</th>");
                print("<th>Category</th>");
                print("<th>Date</th>");
                print("<th>Img</th>");
                print("</tr>");

                for($i = 0; $i < $nrows; $i++)
                {
                    $result = mysqli_fetch_array($query);
                    print("<tr>");
                    print("<td>" . $result['titulo'] . "</td>");
                    print("<td>" . $result['texto'] . "</td>");
                    print("<td>" . $result['categoria'] . "</td>");
                    print("<td>" . $result['fecha'] . "</td>");

                    if($result['imagen'] != "")
                        print ("<td><a target = '_blank' href = 'photos/" . $result['imagen'] ."'>
                        <img border = '0' src = 'photos/ico-fichero.gif' alt = 'associated photo'></a></td>");
                    else
                        print("<td> &nbsp; </td>");

                    print("</tr>");
                }

                print("</table>");
            }
            else("No news abalilable");

        //close connection
            mysqli_close($connection);
        ?> 
    </body>
</html>