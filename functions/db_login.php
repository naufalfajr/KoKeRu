<?php
$db_host='localhost';
$db_database='kokeru';
$db_username='archerx';
$db_password='MySQLpasw0&';

//connect db
$db = new mysqli($db_host, $db_username, $db_password, $db_database);
if ($db->connect_errno)
{
    die ('could not connect to the database: <br />'.$db->connect_error);
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return ($data);
}
