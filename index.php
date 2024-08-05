<?php


$server = "localhost";
$username = "root";
$password = "";
$database = "shaaf";



$con = mysqli_connect($server, $username, $password, $database);




if (!$con) {
    die("connection failed hai " . mysqli_connect_error());
}





if (isset($_POST["usertitle"])) {




    $title = $_POST["usertitle"];
    $desc = $_POST["userdesc"];

    $sqlins = "INSERT INTO `info`(`Title`, `Description`) VALUES ('$title','$desc')";


    $result = mysqli_query($con, $sqlins);
    if ($result) {
        echo "mubarak ho data insert karlia";
    }
}



if (isset($_GET["delete"])) {

    $id = $_GET["delete"];


    $sqldel = "delete from info where  Id='$id'";

     $resdel= mysqli_query($con, $sqldel);;
     if ($resdel) {

          header("location:index.php");

     }


}



?>










<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



</head>

<body>


    <div class="container">



        <form action="index.php" method="post">




            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" name="usertitle" id="exampleFormControlInput1" placeholder="here is your title">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" name="userdesc" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>


            <button type="submit" class="btn btn-success"> Submit </button>
        </form>





        <h1>
            یہاں ڈیٹا آئے گا
        </h1>


        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>


                <?php

                $select = "Select * from info ";


                $listresult = mysqli_query($con, $select);

                $counter=1;
                while ($row = mysqli_fetch_assoc($listresult)) {


                    echo '
                   
                     <tr>
                    <th scope="row">' . $counter++ . '</th>
                    <td scope="row">' . $row["Title"] . '</td>
                    <td scope="row">' . $row["Description"] . '</td>
             
                    <td>
                        <button type="button" class="btn btn-success">Edit</button>
                        <button type="button" class="btn btn-danger delete" id=' . $row["Id"] . '>Delete</button></td>
                    </tr>
                   
                   ';
                }






                ?>


            </tbody>
        </table>










    </div>











    <script>
        deletekaro = document.getElementsByClassName("delete")


        Array.from(deletekaro).forEach((index) => {
            index.addEventListener("click", (apt) => {

                console.log("delete is working ...........khush hojaien sab", );


                sno = apt.target.id;
                if (confirm("kya app data delete karna chatay hen ?")) {
                    window.location = `/PhpClasses11f/index.php?delete=${sno}`
                }


            });




        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>