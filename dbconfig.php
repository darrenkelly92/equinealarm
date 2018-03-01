<?php

$DBMS = 'MySQL';

$DB_Param = array();
$DB_Param['server'] = 'localhost:3306';
$DB_Param['database'] = 'remembu8_equinealarm1';
$DB_Param['user'] = 'remembu8_darren';
$DB_Param['password'] = 'Darren123';

$link = mysqli_connect($DB_Param['server'],$DB_Param['user'],$DB_Param['password']);
// Check connection
if($link === false) {
    die('Error: Could not connect to db :' . mysqli_connect_error());
}

// Use the database
if( !@((bool)mysqli_query($link, "USE " . $DB_Param['database'])) ) {
    debug_to_console( 'Could not connect to database.' );
}