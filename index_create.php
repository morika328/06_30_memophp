<?php

// var_dump($_POST);
// exit();

$name = $_POST["name"];
$interest = $_POST["interest"];
$Dr = $_POST["Dr"];
$DH = $_POST["DH"];
$sonota = $_POST["sonota"];
$maker = $_POST["maker"];
$kikan = $_POST["kikan"];
$problem = $_POST["problem"];
$point = $_POST["point"];

$write_data = "{$name},{$interest},{$Dr},{$DH},{$sonota},{$maker},{$kikan},{$problem},{$point}\n";
$file = fopen('data/memo.csv', 'a');
flock($file, LOCK_EX);
fwrite($file, $write_data);
flock($file, LOCK_UN);
fclose($file);
header("Location:index.php");
