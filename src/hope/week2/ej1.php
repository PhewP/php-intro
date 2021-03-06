<html>
    <head>
        <title>Excercise 1</title>
    </head>
    
    <body>
        <h1>News:</h1>
        <?php
        //Connect to server
            $connection = mysqli_connect("localhost", "cursophp", "lindavista") 
            or die ("Cannot connect to server");

        //DB query
            $instruction = "select * from lindavista";
            $query = mysqli_query($connection, $instruction)
            or die ("Query failure");

        //Show query result
            $nrows = mysqli_num_rows($query);
            if($nrows > 0)
                
        ?> 
    </body>
</html>