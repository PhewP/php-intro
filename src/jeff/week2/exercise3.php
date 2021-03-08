<html>
    <head>
        <title>Exercise 3</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>

        <!-- if the form is sended: validate form -->
        <!-- if sended and the form is valid: process form  -->
        <!-- if not sended: show form -->

        <?php
            error_reporting(E_ALL & ~E_NOTICE);
            $sendNew = $_REQUEST['sendNew'];
            $title = $_REQUEST['title'];
            $description = $_REQUEST['description'];
            $category = $_REQUEST['category'];
            $error = false;

            if(isset($sendNew)) {
                if(trim($title) == ""){
                    $errors["title"] = "You must introduce a title!";
                    $error = true;
                }
                else {
                    $errors["title"] = "";
                }
                if(trim($description) == "") {
                    $errors["description"] = "You must introduce a description";
                    $error = true;
                }
                else {
                    $errors["description"] = "";
                }

                // upload image 
                $copyFile = false;

                // copy the image from the directory to uploaded files
                // You have to rename to avoid rewrite the actual file
                // To grant uniqueness of the name we will add a mark time.

                if(is_uploaded_file($_FILES['newImage']['tmp_name'])){
                    $folderName = "img/";
                    $imageName = $_FILES['newImage']['name'];
                    $copyFile = true;

                    // if the name exist yet, rename it`
                    $pathAndName = $folderName . $imageName;
                    if(is_file($pathAndName)) {
                        $idUnique = time();
                        $imageName = $idUnique . "-" . $imageName;
                    }
                }
                else if($_FILES["newImage"]["error"] == UPLOAD_ERR_FORM_SIZE) {
                    $maxsize = $_REQUEST['max_file_size'];
                    $errors["newImage"] = "The size of the newImage is more than the allowed ($maxsize bytes)!";
                    $error = true;
                }
                else if($_FILES['newImage']['name'] == "") {
                    $imageName = "";
                }
                else {
                    $errors["newImage"] = "Cannot upload newImage";
                    $error = true;
                }
            }

            // if the data are correct, process the form
            if(isset($sendNew) && $error==false) {
                $connection = mysqli_connect("localhost", "cursophp-ad", "php.hph", "lindavista")
                    or die("Cannot connect with the server");
                $date = date("Y-m-d"); // actual date
                $queryString = "insert into noticias (titulo, texto, categoria, fecha, imagen) values ('$title', '$description', '$category', '$date', '$imageName')";
                $query = mysqli_query($connection, $queryString) or die ("Failed to query");
                mysqli_close($connection);

                if($copyFile) {
                    move_uploaded_file($_FILES['newImage']['tmp_name'], $folderName . $imageName);
                }

                print("<h1>News management</h1>\n");
                print("<h2>Result of the insertion of the new news</h2>\n");
                print("The news has been received correctly");
                print("<ul>");
                print("<li>Title: ".$title);
                print("<li>Description: ".$description);
                print("<li>Category: ".$category);
                print("<li>Date: ".$date);
                if($imageName != ""){
                    print("<li> Image: <a targer='_blank' href='".$folderName.$imageName."'>".$imageName."</a>");
                }
                else {
                    print("<li>Image: (empty)");
                }
                print("</ul>");
                print("<br>");
                print("[<a href='exercise3.php'> Add a new news</a>]");
            }
            else {
        ?>

                <h1>New news Insertion</h1>
                <form  class="border" action="exercise3.php" method="POST" name="sendNew" enctype="multipart/form-data">
                    <!-- News title -->
                    <p>
                        <label for="title">Title: *</label>
                        <input type="text" name="title" size="50" maxlength="50"
                        <?php 
                            if(isset($sendNew)) {
                                print("value='$title'>\n");
                            }
                            else {
                                print(">\n");
                            }
                            if($errors["title"] != "") {
                                print("<br><span class='error'>".$errors["title"]."</span>");
                            }
                        ?>
                    </p>
                    <!-- New text description                 -->
                    <p>
                        <label for="description">Description: *</label>
                        <textarea name="description" cols="45" rows="5">
                        <?php
                            error_reporting(E_ALL & ~E_NOTICE);
                            if (isset($sendNew)){
                                print("$description");
                            }
                            print("</textarea>");
                            if($errors["description"] != "") {
                                print("<br><span class='error'>".$errors["description"]."</span>");
                            }
                        ?>
                    </p>
                    <!-- category -->
                    <p>
                        <label for="category">Category</label>
                            <select name="category">
                            <option selected>promotions</option>
                            <option>offers</option>
                            <option>coasts</option>
                        </select>
                    </p>
                    <!-- new image -->
                    <p>
                        <label for="newImage">Image</label>
                        <input type="hidden" name="max_file_size" value="102400">
                        <input type="file" size="44" name="newImage">
                        <?php
                            if($errors["newImage"] != "") {
                                print("<br><span class='error'>".$errors["newImage"]."</span>");
                            }
                        ?>
                    </p>
                    <!-- send button -->
                    <p><input type="submit" name="sendNew" value="Add new"></p>
                </form>
                <p>Note: the fields with (*) must be filled.</p>
            <?php    
            }
            ?>

    </body>

</html>