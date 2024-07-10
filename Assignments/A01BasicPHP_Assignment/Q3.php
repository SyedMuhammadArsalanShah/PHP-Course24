<?php

function Add($a, $b)
{

    $c = $a + $b;
    echo "Add " . $c."<br>";
}

function Avg($a, $b)
{

    $c = $a + $b / 2;
    echo "Avg " . $c."<br>";
}

function sub($a, $b)
{

    $c = $a - $b;
    echo "Sub " . $c."<br>";
}


function mul($a, $b)
{

    $c = $a * $b;
    echo "Mul " . $c."<br>";
}

function div($a, $b)
{

    $c = $a /$b;
    echo "Div " . $c."<br>";
}

function Square($a)
{

    $c = $a * $a;
    echo "Square " . $c."<br>";
}

function Cube($a)
{

    $c = $a * $a * $a;
    echo "Cube " . $c."<br>";
}


// calling of functions
Add(20,30);
sub(20,40);
mul(20,50);
div(20,30);
Avg(20,30);
Square(3);
cube(2);


