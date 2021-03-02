<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;" 
        charset="utf-8"/>
    </head>
    <body>
        <?php
            if($folder = opendir('images')) {
                echo "<table border=1>";
                echo "<tr>";
                $col = 0;
                while(false !== ($file = readdir($folder))) {
                    if($file != "." && $file != "..") {
                        if($col == 4) {
                            $col = 0;
                            echo "</tr>";
                            echo "<tr>";
                        }

                        $col++;
                        echo "<td>";
                        echo "<a href=images/$file><img src=images/$file></a>";
                        echo "</td>";
                    }
                }
                echo "</tr>";
                echo "</table>";
                closedir($folder);
            }
        ?> 
    </body>
</html>