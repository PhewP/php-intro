<html>
    <head>
        <title>Exercise 3</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
        <h1>New news Insertion</h1>
    </body>

    <form  class="border" action="exercise3.php" method="POST" enctype="multipart/form-data">
        <!-- News title -->
        <p>
            <label for="title">Title: *</label>
            <input type="text" name="title" size="50" maxlength="50">
        </p>
        <!-- New text description                 -->
        <p>
            <label for="description">Description: *</label>
            <textarea name="description" cols="45" rows="5"></textarea>
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
        </p>
        <!-- send button -->
        <p><input type="submit" name="sendNew" value="Add new"></p>
    </form>
    <p>Note: the fields with (*) must be filled.</p>
</html>