<?php
$response = file_get_contents("https://api.alquran.cloud/v1/meta");
$response = json_decode($response, true);

// print_r($response);



$dataQuranIndex = $response["data"]["surahs"]["references"];

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
            direction: rtl;
            font-family: 'Amiri Quran', serif;
           
        }


    </style>


</head>

<body>
    <!-- container  -->


    <div class="container">


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">SurahName</th>
                    <th scope="col">SurahTranslationName</th>
                    <th scope="col">Surah English Name </th>
                    <th scope="col">Verses </th>
                    <th scope="col">revelationType </th>
                    <th scope="col">ReadSurah </th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($dataQuranIndex as  $item) {
                    echo '<tr>
                <th scope="row">' . $item["number"] . '</th>
                <td>' . $item["name"] . '</td>
                <td>' . $item["englishName"] . '</td>
                <td>' . $item["englishNameTranslation"] . '</td>
                <td>' .  $item["numberOfAyahs"] . '</td>
                <td>' . $item["revelationType"] . '</td>
                <td>
                
                   <form action="surah.php" method="post">



    <input type="hidden" name="snum" value="' . $item["number"] . '">
    <input class="btn btn-primary" type="submit" value="ReadSurah">
    </form>
                
                
                
                </td>
                </tr>';
                }


                ?>
            </tbody>
        </table>

    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>