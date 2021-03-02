<html>
    <head>
        <meta http-equiv="Content-type" content="text/html" charset="utf-8">
        <title>Exercise 13</title>
    </head>
    <body>
       <?php 
        print_r($_FILES);

        $folder = './images/';
        $uploadImage = $folder.basename($_FILES['userfile']['name']);
        echo '<pre>';
        if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadImage)) {
            echo "File is valid, and was sucessfully uploaded.\n";
        } else {
            echo "Possible file upload attack! \n";
        }
        echo 'Here is some more debuggin infor:';
        print_r($_FILES);
        print "</pre>"
       ?> 
    </body>
</html>