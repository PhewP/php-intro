<html>
    <head>
        <title>Excercise 12 php</title>
    </head>

    <body>
        <?php
            echo "Result: ";
            if($_POST["coin"] == 1)
                echo $_POST["quantity"] * 0.8615, " pounds";
            else
                echo $_POST["quantity"] * 0.8225, " dolas";
        ?>
    </body>
</html>