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

        $insert = true;
    }
} elseif (isset($_POST["usertitleupdate"])) {



    $id = $_POST["idupdate"];
    $titleupdate = $_POST["usertitleupdate"];
    $descupdate = $_POST["userdescupdate"];

    $sqlupdate = "UPDATE `info` SET `Title`='$titleupdate',`Description`='$descupdate' WHERE Id='$id'";

    $resultup = mysqli_query($con, $sqlupdate);
    if ($resultup) {
        // echo "updated ";
        $update = true;
    }
}


if (isset($_GET["delete"])) {

    $id = $_GET["delete"];


    $sqldel = "delete from info where  Id='$id'";

    $resdel = mysqli_query($con, $sqldel);;
    if ($resdel) {

        $delete = true;
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

    <link rel="stylesheet" href="//cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css">

</head>

<body>

    <?php


    if ($insert) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Successfully!</strong> Account Successfully created.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    }


    if ($update) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Successfully!</strong> Account Successfully created.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    }


    if ($delete) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Successfully!</strong> Account Successfully created.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    }



    ?>










    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="index.php" method="post">
                        <input type="hidden" name="idupdate" id="idu">



                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Title</label>
                            <input type="text" class="form-control" name="usertitleupdate" id="tu" placeholder="here is your title">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" name="userdescupdate" id="du" rows="3"></textarea>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>

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


        <table class="table table-striped table-hover" id="myTable">
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

                $counter = 1;
                while ($row = mysqli_fetch_assoc($listresult)) {


                    echo '
                   
                     <tr>
                    <td scope="row">' . $counter++ . '</td>
                    <td scope="row">' . $row["Title"] . '</td>
                    <td scope="row">' . $row["Description"] . '</td>
             
                    <td>
                        <button type="button" class="btn btn-success edit " data-bs-toggle="modal" data-bs-target="#exampleModal" id=' . $row["Id"] . '>Edit</button>
                        <button type="button" class="btn btn-danger delete" id=' . $row["Id"] . '>Delete</button></td>
                    </tr>
                   
                   ';
                }






                ?>


            </tbody>
        </table>










    </div>











    <script>
        editkaro = document.getElementsByClassName("edit")


        Array.from(editkaro).forEach((index) => {
            index.addEventListener("click", (aptgls) => {

                tr = aptgls.target.parentNode.parentNode;

                title = tr.getElementsByTagName("td")[1].innerText;
                desc = tr.getElementsByTagName("td")[2].innerText;


                tu.value = title;
                du.value = desc;
                idu.value = aptgls.target.id;
                console.log(aptgls.target.id)
                // console.log("edit is working ...........khush hojaien sab", title, desc);
            });
        });



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
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>