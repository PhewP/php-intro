<html>
    <head>
        <meta http-equiv="Content-type" content="text/hmlt" charset="utf-8">
        <title> Exercise 1</title>
    </head>

    <body>
        <H1>Consulta de noticias</H1>
        <?PHP
            $conection = mysqli_connect("localhost", "cursophp", "", "lindavista")
            or die("Cannot connect with the server");

            $query = "select * from noticias order by fecha desc";
            $consulta = mysqli_query($conection, $query) or die("Query failed");

            $nRows = mysqli_num_rows($consulta);
            if($nRows > 0) {
                print("<table>\n");
                print("<tr>\n");
                print("<th>Title</th>\n");
                print("<th>text</th>\n");
                print("<th>Category</th>\n");
                print("<th>date</th>\n");
                print("<th>image</th>\n");
                print("</tr>\n");
            

            for($i=0; $i<$nRows; $i++) {
                $res = mysqli_fetch_array($consulta);
                print("<TR>\n");
                print("<td>".$res["titulo"]."</td>\n");
                print("<td>".$res["texto"]."</td>\n");
                print("<td>".$res["categoria"]."</td>\n");
                print("<td>".$res["fecha"]."</td>\n");
            
            
            if($res["imagen"] != "") {
                print("<td><a target='_blank' href='img/".$res["imagen"].
                "'><img border='0' src='img/ico-fichero.gif' 
                alt='asociate image'></a></td>\n");

            }
            else {
                print("<td>&nbsp;</td>\n");
            }
            print("</tr>\n");
            }
            print("</table>\n");
        }
        else {
            print("There isnt news available");
        }

        mysqli_close($conection);

    ?>
    </body>


</html>




