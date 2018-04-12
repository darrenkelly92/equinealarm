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

$id = $x = $y = $temp = $sweat = $state = "";

if($_SERVER["REQUEST_METHOD"] == "GET") {

    $id = mysqli_real_escape_string($link,$_GET['id']);
    $x = mysqli_real_escape_string($link,$_GET['x']);
    $y = mysqli_real_escape_string($link,$_GET['y']);
    $temp = mysqli_real_escape_string($link,$_GET['temp']);
    $sweat = mysqli_real_escape_string($link,$_GET['sweat']);
    $state = mysqli_real_escape_string($link,$_GET['state']);

   if (!empty($id) && !empty($state)) {
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

                    echo "ID: , $id";

                } else {
                    echo "Please try again later.";
                }

    }
   }
    
 }