<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>

    <h1>SMArsalanShah</h1>

    <?php

    echo "<h1> PHP Complete Course </h1>  ";


    $variable1 = 10;
    $variable2 = 10;
    $addresult = $variable1 + $variable2;
    $subresult = $variable1 - $variable2;
    $divresult = $variable1 / $variable2;
    $mulresult = $variable1 * $variable2;

    echo "  <h1>Variable</h1> ";
    echo $variable1 . "<br>";
    echo $variable2 . "<br>";



    echo "<h1>Arithmetic Operators</h1> ";

    echo  "addition " . $addresult . "<br>";
    echo  "subtraction " . $subresult . "<br>";
    echo  "division " . $divresult . "<br>";
    echo  "multiplication " . $mulresult . "<br>";




    echo "<h1>Assignment Operators</h1> <br>";

    $num = 100;
    $value = $num;


    echo "value default  " . $value . "<br>";
    $value += 10;
    //value =value+10;
    echo  "addition "      . $value . "<br>";
    $value -= 10; //
    echo  "subtraction "   . $value . "<br>";
    $value /= 10;
    echo  "division "      . $value . "<br>";
    $value *= 10;
    echo  "multiplication " . $value . "<br>";



    // echo "<h1>comparision operators</h1> <br>";


    // //==,!=, >, >=, <, <=


    // // The var_dump() function is used to dump information about a variable. This function displays structured information such as type and value of the given variable. 


    echo "1==7 is" . var_dump(1 == 7) . "<br>";
    echo "1!=7 is" . var_dump(1 != 7) . "<br>";
    echo "1>=7 is" .  var_dump(1 >= 7) . "<br>";
    echo "1<=7 is" . var_dump(1 <= 7) . "<br>";


    // echo "<h1>Increment++ / decrement-- </h1> <br>";
    // // pre increment /decrement = ++$a/--$a
    // // post increment /decrement= $a++/ $a--

    $num = 100;
    // echo $num++;
    // echo $num--;
    echo ++$num;
    // echo --$num;
    echo "<br>";
    echo $num;



    echo "<h1> Logical Operator </h1> <br>";

    // and (&&) , or (||) ,xor  ,!


    $value1 = (true and true);
    $value1 = (false and true);
    $value1 = (false and false);
    $value1 = (true and false);


    $value1 = (true or true);
    $value1 = (false or true);
    $value1 = (false or false);
    $value1 = (true or false);

    $value1 = (true xor true); // false

    // echo "<br>";
    // echo var_dump($value1);



    // echo "<h1> Data type </h1> <br>";

    // //string, integer, float, boolean, array, object

    // $name="SMArsalanShah";
    // $number=10;
    // $numberf=10.5;
    // $game= true;

    echo "<h1> php constant </h1> <br>";

    define("SMArsalanShah", 2002);
    define("PI", 3.14);
    define("bilal", "kahtrnak bacha");
    echo SMArsalanShah;
    echo PI;
    echo "<br>" . bilal;






    echo "<h1> Conditional statement </h1> <br>";


    $value = 4;

    echo "Example one <br> ";
    if ($value > 0) {
        echo $value . "is Positive<br>";
    } else if ($value < 0) {

        echo $value . "is negative<br>";
    } else {
        echo $value . "is not a number<br>";;
    }



    echo "Example two <br>";


    $valuei = 4;

    if ($valuei > 5) {
        echo "<h5> executed </h5> <br>";
    } else if ($valuei < 5) {


        echo ++$valuei;
    } else {
        echo "<h5> isn't executed </h5> <br>";
    }




    echo "<h1> array </h1> <br>";
    $students = array("Fatimah", "Nouman", "anas", "affan");
    echo $students[0];
    echo count($students);


    echo "<h1> loop </h1> <br>";
    // by while loop
    echo "<h3> while Loop</h3>";

    $a = 0;
    while ($a <= 10) {
        echo $a . "by using  while loop <br>";


        $a++;
    }

    echo "<h3>array by using while loop</h3>";
    //array by using while loop
    $a = 0;
    while ($a < count($students)) {
        echo $students[$a] . "array by using  while loop <br>";
        $a++;
    }




    //do while loop
    echo "<h3>do while loop</h3>";

    $a = 200;
    do {
        echo $a . "by using do while loop <br>";
        $a++;
    } while ($a <= 10);


    // for loop
    echo "<h3>for loop</h3>";

    for ($i = 0; $i < 10; $i++) {

        echo $i . "by using for loop <br>";
    }

    // array loop

    echo "<h3>foreach loop</h3>";
    foreach ($students as $ii) {
        echo $ii . "by using foreach loop <br>";
    }

    echo "<h1>Functions</h1>";

    function engr_Name($name)
    {
        echo $name;
    }
    engr_Name("Ali");

    function addkaro($ab, $ba)
    {

        $answer = $ab + $ba;

        echo "add karny ke bd" . $answer;
    }
    addkaro(112, 22);


    ?>

</body>

</html>