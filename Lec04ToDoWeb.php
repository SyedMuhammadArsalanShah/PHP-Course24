
<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "aptechgls2";

$con = mysqli_connect($server, $username, $password, $database);
if (!$con) {
    die("connection is failed" . mysqli_connect_error());
}

if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $delquery = "DELETE FROM info WHERE Id ='$id'";
    $resultdel = mysqli_query($con, $delquery);

    if ($resultdel) {
        echo "deleted";
        // header("location:Lec04ToDoWeb.php");
    }
}

if (isset($_POST["email"])) {
    $email = $_POST["email"];
    $description = $_POST["desc"];
    $sqliinsert = "INSERT INTO `info`(`Email`, `Description`) VALUES ('$email','$description')";
    $res = mysqli_query($con, $sqliinsert);

    if ($res) {
        echo "inserted";
    }
} else if (isset($_POST["emailupdate"])) {
    $id = $_POST["idupdate"];
    $emailaddress = $_POST["emailupdate"];
    $desc = $_POST["descupdate"];
    $update = "UPDATE `info` SET `Email`='$emailaddress',`Description`='$desc' WHERE Id = '$id'";
    $result = mysqli_query($con, $update);

    if ($result) {
        echo "updated";
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
    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button> -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Your Records</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="Lec04ToDoWeb.php" method="post">
                        <input type="hidden" name="idupdate" id="userid">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input type="email" name="emailupdate" class="form-control" id="emailV" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" name="descupdate" id="descV" rows="3"></textarea>
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
        <form action="Lec04ToDoWeb.php" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM info";
                $result = mysqli_query($con, $sql);
                $counter = 1;
                while ($a = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $counter++ . "</th>";
                    echo "<td scope='row'>" . $a["Email"] . "</td>";
                    echo "<td scope='row'>" . $a["Description"] . "</td>";
                    echo "<td scope='row'>" . $a["Date"] . "</td>";
                    echo "<td scope='row'>
                        <div class='d-grid gap-2 d-md-block'>
                            <button class='btn btn-primary edit' data-bs-toggle='modal' data-bs-target='#exampleModal' type='button' id=" . $a["Id"] . ">Edit</button>
                            <button class='btn btn-danger delete' type='button' id=" . $a["Id"] . ">Delete</button>
                        </div>
                    </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        editkaro = document.getElementsByClassName("edit");
        Array.from(editkaro).forEach((index) => {
            index.addEventListener("click", (i) => {
                tr = i.target.parentNode.parentNode.parentNode;
                title = tr.getElementsByTagName("td")[0].innerText;
                desc = tr.getElementsByTagName("td")[1].innerText;
                console.log(title, desc);
                emailV.value = title;
                descV.value = desc
                userid.value = i.target.id;
                console.log(i.target.id);
            });
        });

        deletekaro = document.getElementsByClassName("delete");
        Array.from(deletekaro).forEach((index) => {
            index.addEventListener("click", (i) => {
                sno = i.target.id;
                if (confirm("Kya app delete krna chaty hen ???")) {
                    window.location = `/PhpClasses11f/Lec04ToDoWeb.php?delete=${sno}`;
                }
            });
        });
    </script>
</body>

</html>
```