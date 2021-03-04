<html>
    <head>
        <title>Excercise 10</title>
    </head>

    <body>
        <?php
            echo "<h1>Gallery</h1>";
            function validatePhoto($photo)
            {
                $valide = 0;
                if(preg_match("/jpg/i", $photo)) $valide = 1;
                if(preg_match("/gif/i", $photo)) $valide = 1;
                if(preg_match("/png/i", $photo)) $valide = 1;
                if(preg_match("/bmp/i", $photo)) $valide = 1;
                return $valide;
            }
            
            echo "<table border=1>";
            $directory = opendir('photos');
            $i = 1;
            while (false !== ($photo = readdir($directory)))
            {
                if($photo != "." && $photo != ".." && validatePhoto($photo))
                {
                    if($i == 1)
                        echo "<tr>";
                    echo "<td><a href = 'photos/$photo'>";
                    echo "<img src = 'photos/$photo' width = 100 height = 100></img>";
                    echo "</a></td>";
                    if($i == 4)
                    {  
                        echo "</tr>"; 
                        $i = 0;
                    }
                    $i++;
                }
            }
            closedir($directory);
            echo "</table>";
        ?>
    </body>
</html>