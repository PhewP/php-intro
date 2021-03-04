<html>
    <head>
        <title>Excercise 9</title>
    </head>

    <body>
        <?php
            $directory = opendir('photos');
            while (false !== ($photo = readdir($directory)))
            {
                if($photo != "." && $photo != "..")
                {
                    echo "<td><a href = 'photos/$photo'>";
                    echo "<img src = 'photos/$photo' width = 100 height = 100></img>";
                    echo "</a></td>";
                }
            }
            closedir($directory);
        ?>
    </body>
</html>