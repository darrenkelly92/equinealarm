<?php
/*
 * File: index.php
 * Project: /Users/david/Desktop/Darren/app/equinealarm
 * File Created: Thursday, 12th April 2018 9:57:34 pm
 * Author: david
 * -----
 * Last Modified: Sunday, 22nd April 2018 12:36:41 pm
 * Modified By: david
 * -----
 * Description: Display the data
 */


// require_once("dbconfig.php");

// /**
//  * @return DateTime|string
//  */
// function getTime() {
//     date_default_timezone_set("Europe/Dublin");
//     $server_time = new DateTime();
//     $server_time = $server_time->format('Y-m-d H:i:s');
//     return $server_time;
// }

// // Retrieve the data
// $sql = "SELECT temperature, createdAt FROM `data` WHERE deleted = 1";
// $result = $link->query($sql);

// //initialize the array to store the processed data
// $jsonArray = array();
// //check if there is any data returned by the SQL Query
// if ($result->num_rows > 0) {
//   //Converting the results into an associative array
//   while($row = $result->fetch_assoc()) {
//     $jsonArrayItem = array();
//     $jsonArrayItem['label'] = $row['createdAt'];
//     $jsonArrayItem['value'] = $row['temperature'];
//     //append the above created object into the main array.
//     array_push($jsonArray, $jsonArrayItem);
//   }
// }

// //Closing the connection to DB
// $link->close();
// //set the response content type as JSON
// header('Content-type: application/json');
// //output the return value of json encode using the echo function. 
// echo json_encode($jsonArray);


//address of the server where db is installed
$servername = "localhost";
//username to connect to the db
//the default value is root
$username = "remembu8_darren";
//password to connect to the db
//this is the value you would have specified during installation of WAMP stack
$password = "Darren123";
//name of the db under which the table is created
$dbName = "remembu8_equinealarm1";
//establishing the connection to the db.
$conn = new mysqli($servername, $username, $password, $dbName);
//checking if there were any error during the last connection attempt
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

/**
 * GET  data fro temperature over time graph
 */
//the SQL query to be executed
$query = "SELECT * FROM `data` ORDER BY `createdAt` DESC LIMIT 25";
//storing the result of the executed query
$result = $conn->query($query);
//initialize the array to store the processed data
$jsonArray = array();
//check if there is any data returned by the SQL Query
if ($result->num_rows > 0) {
  //Converting the results into an associative array
  while($row = $result->fetch_assoc()) {
    $jsonArrayItem = array();
    $jsonArrayItem['label'] = $row['createdAt'];
    $jsonArrayItem['value'] = $row['temperature'];
    //append the above created object into the main array.
    array_push($jsonArray, $jsonArrayItem);
  }
}
//Closing the connection to DB
$conn->close();
//set the response content type as JSON
header('Content-type: application/json');
//output the return value of json encode using the echo function. 
echo json_encode(array_reverse($jsonArray));
?>    