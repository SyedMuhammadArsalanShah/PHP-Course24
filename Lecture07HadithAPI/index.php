<?php

$apikey = '$2y$10$BylaBcXs5Lw7ZOtYmQ3PXO1x15zpp26oc1FeGktdmF6YeYoRd88e';
$response = file_get_contents("https://hadithapi.com/api/books?apiKey=$apikey");

$response = json_decode($response, true);

// print_r($response["books"]);

$hadithbooks = $response["books"];


?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri+Quran&family=Aref+Ruqaa&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@400..700&display=swap" rel="stylesheet">


    <style>
        body {
        font-family: "jameel";
        }

        @font-face {
            font-family: "jameel";
            src: url(fonts/jameel.ttf);
        }

      
    </style>

</head>

<body>
    <div class="container">
        <div class="row">
            <?php
            foreach ($hadithbooks as  $value) {



                echo '
                  <div class="col-md-4 col-sm-6 mb-4">

                <div class="card" style="width: 18rem;">
                
                    <div class="card-body">
                        <h5 class="card-title">' . $value["bookName"] . '</h5>
                        <p class="card-text">  ' . $value["writerName"] . '</p>
                        <p class="card-text"> Hadith Chapters' . $value["chapters_count"] . ' | Total Hadith ' . $value["hadiths_count"] . '</p>
                           <form action="chapters.php" method="post">


                <input type="hidden"  name="booksSlug" value="' . $value['bookSlug'] . '">

                <input type="submit" class="btn btn-dark" value="Read Chapters">



            </form>
                    </div>
                </div>
            </div>
                
                
                ';
            }

            ?>








        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>