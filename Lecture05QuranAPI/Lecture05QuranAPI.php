<?php

$response = file_get_contents("https://api.alquran.cloud/v1/meta");

$response = json_decode($response, true);
$quranindex = $response["data"]["surahs"]["references"]

// print_r($response["data"]["surahs"]["references"]);

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

  
    <div class="container">

        <div class="row">

            <?php
            foreach ($quranindex as  $value) {

                echo '
            
            
          
            <div class="col-sm-6 col-md-3 mb-5">
            
            <div class="card" style="width: 18rem;">
  
  <div class="card-body">
    <h5 class="card-title">' . $value["name"] . '</h5>
    <p class="card-text">' . $value["englishName"] . ' | ' . $value["englishNameTranslation"] . '</p>
   
    <form action="Surahs.php" method="post">


<input type="hidden" name="snum" value="' . $value["number"] . '"   >

<button type="submit" class="btn btn-primary">Read Surah</button>


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