<?php
/*
 * File: log.php
 * Project: /Users/david/Desktop/Darren/app/equinealarm
 * File Created: Sunday, 22nd April 2018 12:35:56 pm
 * Author: david
 * -----
 * Last Modified: Sunday, 22nd April 2018 12:36:14 pm
 * Modified By: david
 * -----
 * Description: Log the data by GET
 */ 


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

$id = $x = $y = $temp = $sweat = $state = "";

if($_SERVER["REQUEST_METHOD"] == "GET") {

    $id = mysqli_real_escape_string($link,$_GET['id']);
    $x = mysqli_real_escape_string($link,$_GET['x']);
    $y = mysqli_real_escape_string($link,$_GET['y']);
    $temp = mysqli_real_escape_string($link,$_GET['temp']);
    $sweat = mysqli_real_escape_string($link,$_GET['sweat']);
    $state = mysqli_real_escape_string($link,$_GET['state']);

   if (!empty($id)) {
    $sql = "INSERT INTO `data`(`horseId`, `accX`,`accY`,`temperature`,`sweat`,`state`, `createdAt`) VALUES (?,?,?,?,?,?,?)";

    if($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "sssssss", $p_horseId, $p_accX, $p_accY, $p_temp, $p_sweat, $p_state, $p_time);
        $p_horseId = $id;
        $p_accX = $x;
        $p_accY = $y;
        $p_temp = $temp;
        $p_sweat = $sweat;
        $p_state = $state;
        $p_time = getTime();

                if(mysqli_stmt_execute($stmt)){

                    echo "<h1>Data</h1>";
                    echo "ID: $id";
                    echo "<br>";
                    echo "X: $x";
                    echo "<br>";
                    echo "Y: $y";
                    echo "<br>";                    
                    echo "Temp: $temp";
                    echo "<br>";
                    echo "Sweat: $sweat";
                    echo "<br>";
                    echo "State: $state";

                } else {
                    echo "Please try again later.";
                }

    }
   }
    
 }