<?php
$server = "localhost";
$username = "root";
$password = "";

// db
$database = "form";


$con = mysqli_connect($server, $username, $password, $database);



if (!$con) {
    die("connection is failed" . mysqli_connect_error());
} else {

    echo "success";
}

if (isset($_POST["usertitle"])) {


    $title = $_POST["usertitle"];
    $desc = $_POST["userdesc"];

    $sqlinsert = "Insert into info (Title, description)values('$title', '$desc')";

    $res = mysqli_query($con, $sqlinsert);

    if ($res) {
        echo "inserted";
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

    <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">


</head>

<body>

    <div class="container">
        <form method="POST" action="Lect03showquery.php">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input type="text" class="form-control" name="usertitle" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" name="userdesc" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>




    <div class="container">
        <h1>Data Information Table</h1>
        <table class="table" id="myTable">
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

                $selectshow = "Select * from info";
                $result = mysqli_query($con, $selectshow);
                // $rowdata = ;


                // echo(var_dump(mysqli_fetch_assoc($result))) ;
                // echo(var_dump(mysqli_fetch_assoc($result))) ;
                $counter = 1;

                while ($item = mysqli_fetch_assoc($result)) {

                    //   echo "This my raw data". var_dump( $item);


                    echo " <tr>";
                    echo "<th scope='row'>" . $counter++  . "</th>";
                    echo " <td>" . $item["Title"] . "</td>";
                    echo "  <td>" . $item["description"] . "</td>";
                    echo " <td>ED</td>";
                    echo "</tr>";
                }



                ?>





            </tbody>
        </table>


    </div>

 <!--jquery cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- js link datatable  -->
    <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>







    <script>
        let table = new DataTable('#myTable');
    </script>





</body>

</html>