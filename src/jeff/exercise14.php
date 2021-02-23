<html>
    <head>
        <meta http-equiv="Content-type"	content="text/html" charset="utf-8"/>
        <title>Exercise 14</title>
    </head>
    <body>
        <?php
            $name = $_POST['userName'];
            $surName = $_POST['surName'];
            $gender = $_POST['gender'];
            $nativeCity = $_POST['nativeCity'];
            $currentCity = $_POST['currentCity'];
            $degree = $_POST['degree'];
            $grade = $_POST['grade'];
            $biography = $_POST['biography'];

            print("Hi my name is $surName, $name $surName. 
            I'm a $gender straigth outta $nativeCity 
            that comes to live at $currentCity to study $degree.
            And I'm  in $grade right now!

            To finish, some words about me: \n
            \"$biography\"
            ");

        ?>
    </body>
</html>