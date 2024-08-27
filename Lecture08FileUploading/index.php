<?php
$localhost = "localhost";
$username = "root";
$password = "";
$db = "Lecfile";


$con = mysqli_connect($localhost, $username, $password, $db);

if (!$con) {
    die("conection failed" . mysqli_connect_error());
}


if (isset($_FILES["files"])) {

    // echo "<pre>";
    // print_r($_FILES["files"]);

    $name = $_FILES["files"]["name"];
    $tmpName = $_FILES["files"]["tmp_name"];
    $type = $_FILES["files"]["type"];
    $size = $_FILES["files"]["size"];
    $path = $_FILES["files"]["full_path"];




    $upload = move_uploaded_file($tmpName, "images/" . $name);

    if ($upload) {

        $sqlinsert = "INSERT INTO `info`( `Name`, `path`) VALUES ('$name','$path')";
        $res = mysqli_query($con, $sqlinsert);
        if ($res) {
            echo "uploaded";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="index.php" method="post" enctype="multipart/form-data">

        <label for="uf">File Uploading</label>
        <input type="file" name="files" id="uf">


        <input type="submit" value="submit">

    </form>


</body>

</html>