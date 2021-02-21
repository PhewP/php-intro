<html>
    <head>
        <title>Excercise 8</title>
    </head>
    
    <body>
        <?php
            $v[1] = 90;
            $v[30] = 7;
            $v['e'] = 99;
            $v['hola'] = 43;
            foreach($v as $index => $value)
                echo "$index element is $value <br>"; 
        ?>
    </body>
</html>