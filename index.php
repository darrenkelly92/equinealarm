<?php

require_once("dbconfig.php");

/**
 * @return DateTime|string
 */
function getTime() {
    date_default_timezone_set("Europe/Dublin");
    $server_time = new DateTime();
    $server_time = $server_time->format('Y-m-d H:i:s');
    return $server_time;
}

$id = $x = $y = $z = $temp = $sweat = "";

if($_SERVER["REQUEST_METHOD"] == "GET") {

    $id = mysqli_real_escape_string($link,$_GET['id']);
    $x = mysqli_real_escape_string($link,$_GET['x']);
    $y = mysqli_real_escape_string($link,$_GET['y']);
    $z = mysqli_real_escape_string($link,$_GET['z']);
    $temp = mysqli_real_escape_string($link,$_GET['temp']);
    $sweat = mysqli_real_escape_string($link,$_GET['sweat']);

    $sql = "INSERT INTO `data`(`horseId`, `accX`,`accY`,`accZ`,`temperature`,`humidity`, `createdAt`) VALUES (?,?,?,?,?,?,?)";

    if($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "sssssss", $p_horseId, $p_accX, $p_accY, $p_accZ, $p_temp, $p_hum, $p_time);
        $p_horseId = $id;
        $p_accX = $x;
        $p_accY = $y;
        $p_accZ = $z;
        $p_temp = $temp;
        $p_hum = $sweat;
        $p_time = getTime();

                if(mysqli_stmt_execute($stmt)){

                    echo "OK";

                } else {
                    echo "Please try again later.";
                }

    }
    
 }