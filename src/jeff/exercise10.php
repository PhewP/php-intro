<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
        <title>Exercise 10</title>
    </head>
    <body>
        <?php
            function checkExtension($file) {
                $correctExtension = false;

                if(preg_match("/jpg/i", $file) || preg_match("/gif/i", $file) || 
                    preg_match("/png/i", $file) || preg_match("/bmp/i", $file))
                    $correctExtension = true;
                
                return $correctExtension;
            }
            
            echo "<table border=1>";
            $folder = opendir("images");
            $colum = 1;

            while(false !== ($file = readdir($folder))) {
                if($file != "." && $file != ".." && checkExtension(($file))) {
                    if($colum == 1) {
                        echo "<tr>";
                    }
                    
                    echo "<td><a href='images/$file'>";
                    echo "<img src='images/$file' width=100 height=100></img>";
                    echo "</a></td>";
                    if ($colum==4) {
                        echo "</tr>";
                        $colum = 0;
                    }
                    $colum++;
                }
            }
            closedir($folder);
            echo "</table>";
        ?>
    </body>
</html>