<?php

$server = "localhost";
$username = "root";
$pass = "";
$db = "LRSystem";

$connection = mysqli_connect($server, $username, $pass, $db);

if (!$connection) {
    die("connection is failed " . mysqli_connect_error());
} else {
    // echo"success";
}
$sqldb = "create database if not exists LRSystem";

$res = mysqli_query($connection, $sqldb);

if ($res) {
    // echo "db is created";
}




$sqltbl = "create table if not exists info(
Id int primary key not null auto_increment,
Name varchar(255),
Email varchar(255),
Password varchar(255),
Contact varchar(255)
)";

$res = mysqli_query($connection, $sqltbl);

if ($res) {
    echo "tbl is created";
}
