<html>
    <head>
        <meta http-equiv="Content-type" content="text/html" charset="utf-8">
        <title> Exercise 4</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>

    <body>
        <H1>Consulta de noticias: Con eliminación</H1>
        <?PHP
            error_reporting(E_ALL & ~E_NOTICE);
            $deleteNews = $_REQUEST['deleteNews'];
            if(isset($deleteNews)){
                // connect with the bd
                $connection = mysqli_connect("localhost", "cursophp-ad", "php.hph", "lindavista")
                    or die("Cannot connect with the server");
                
                $delete = $_REQUEST['delete'];
                $nrows = count($delete);
                // Show deleted news
                for ($i=0; $i < $nrows; $i++) { 
                    //Close connection
                    // get the data of ith new
                    $queryString = "select * from noticias where id = $delete[$i]";
                    $query = mysqli_query($connection, $queryString)
                        or die("Failed to query");
                    $res = mysqli_fetch_array($query);

                    // show data of the ith news
                    print("Deleted new:\n");
                    print("<ul>\n");
                    print("<li>title: ".$res['titulo']);
                    print("<li>Description: ".$res['texto']);
                    print("<li>Category: ".$res["categoria"]);
                    print("<li>Date: ".$res['fecha']);
                    
                    if($res['imagen'] != ""){
                        print("<li>Imagen: ".$res['imagen']);
                    }
                    else {
                        print("<li>Imagen: (empty)");
                    }
                    print("</ul>\n");

                    //delete news
                    $stringQuery = "delete from noticias where id = $delete[$i]";
                    $query = mysqli_query($connection, $stringQuery)
                        or die("Delete failed");
                    
                    // delete associate image if exist
                    if($res['imagen'] != "") {
                        $fileName = "img/".$res['imagen'];
                        unlink($fileName);
                    }

                }

                print("<p> Number of News deleted: ".$nrows."</p>\n");
                //Close connection
                mysqli_close($connection);
                print("<p>[ <a href='exercise4.php'>Delete more news</a> ]</p>\n");
            }
            else {

                    $conection = mysqli_connect("localhost", "cursophp", "", "lindavista")
                    or die("Cannot connect with the server");
        
                    $query = "select * from noticias order by fecha desc";
                    $consulta = mysqli_query($conection, $query) or die("Query failed");
        
                    $nRows = mysqli_num_rows($consulta);
                    if($nRows > 0) {
                        print("<form action='exercise4.php' method='POST' name='delete'>\n");
                        print("<table>\n");
                        print("<tr>\n");
                        print("<th>Title</th>\n");
                        print("<th>text</th>\n");
                        print("<th>Category</th>\n");
                        print("<th>Date</th>\n");
                        print("<th>Image</th>\n");
                        print("<th>Delete</th>\n");
                        print("</tr>\n");
                    
        
                    for($i=0; $i<$nRows; $i++) {
                        $res = mysqli_fetch_array($consulta);
                        print("<tr>\n");
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
                        print("<td><input name='delete[]' value='".$res['id']."' type='checkbox'/></td>\n");
                    print("</tr>\n");
                    }
                    print("</table>\n");
                    print("<br>\n");
                    print("<input type='submit' name='deleteNews' value='delete news marked'>\n");
                    print("</form>\n");
                }
                else {
                    print("There isnt news available");
                }
        
                mysqli_close($conection);
            }
    ?>
    </body>


</html>