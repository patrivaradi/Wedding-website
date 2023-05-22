<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "wedding-website";

$con = new mysqli($host,$user,$pass,$db);
if (!$con){
    echo  "Error connecting to the database.";
}