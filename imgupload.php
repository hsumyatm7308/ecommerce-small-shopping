<?php 
require_once "database.php";

?>


<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        
        <input type="file" name="image" accept="image/*">
        <input type="submit" value="Upload">
    </form>
</body>
</html>
