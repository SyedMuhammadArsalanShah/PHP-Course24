
<?php

function marksheet($eng, $math, $urdu)
{


    $obtainedmarks = $eng + $math + $urdu;

    echo "Obtained Marks = ". $obtainedmarks."<br>";

    $per = ($obtainedmarks / 300) * 100;

    echo "Percentage = ".$per."<br>";

    if ($per <= 100 && $per >= 90) {


        echo "grade A1";
    } else   if ($per <= 89 && $per >= 70) {


        echo "grade A";
    } else   if ($per <= 79 && $per >= 60) {


        echo "grade B";
    } else  if ($per <= 69 && $per >= 50) {


        echo "grade C";
    } else {

        echo "Iqraa jau";
    }

}



marksheet(56, 100, 100);