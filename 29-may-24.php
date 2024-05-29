<?php

echo "<h1>Bismillah</h1>";
echo ("Bisma <br> Misbah <br> Nouman<br>");



$name="Arsaalan";
$age=11;
$height=6.7;
$isgamefun=false;
$initialname='A';

echo"StudentName =".$name."<br>";
echo "Game fun or not".$isgamefun;


$num1=12;
$num2=10;



$adding=$num1+$num2;
$subtracting=$num1-$num2;
$multplying=$num1*$num2;
$div=$num1/$num2;



echo "Add ke zarye ". $adding;
echo "S ke zarye ". $subtracting;
echo "M ke zarye ". $multplying;
echo "D ke zarye ". $div."<br>";

// = , += , -=, *=, /=
$num=100;

echo "Num default".$num."<br>";


// $num+=10;
// $num-=10;
// $num*=10;
// $num/=10;

echo "Num ".--$num;
echo "Num ".$num;


echo  "1==7".  var_dump(1==7)."<br>";
echo  "1!=7".  var_dump(1!=7)."<br>";
echo  "1<7 ".  var_dump(1<7 )."<br>";
echo  "1<=7".  var_dump(1<=7)."<br>";
echo  "1>7 ".  var_dump(1>7 )."<br>";
echo  "1>=7".  var_dump(1>=7)."<br>";



// 


define("PI", 3.14);

echo PI;

echo PI. "    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius saepe maiores a ex quae! Voluptates illo maiores consequatur,".PI. "iste laboriosam perspiciatis, et vitae ea inventore recusandae repellendus unde qui error?".PI;



$number=-12;



if ($number<0) {
  echo "negative";
}else{
    echo "positive";

}




$students= array("Nouman", "Sami", "Ali ", "Ali", "Zain","Misbah", "Bisma ");
echo" Student " . $students[0];
echo count($students)."<br>";







for ($i=0; $i < 10; $i++) { 
echo "index for ".$i."<br>";
}

$a=0;
while ($a < count($students)) {
    echo "index while ".$students[$a]."<br>";

    $a++;
}


$b=1;
do{
    echo "index do while ".$b."<br>";
    $b++;
}while($b<10);


foreach ($students as $ii) {

echo $ii."<br>";

}
  

function addkaro($ab, $ba){

$answer= $ab+$ba;

echo "add karny ke bd". $answer;

}
addkaro(112, 22);


?>