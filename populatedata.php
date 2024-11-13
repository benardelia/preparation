<?php 

include "connection.php";

$users = array("benard", "karen", "ngaiza", "john", "danda");


foreach($users as $user){
    $conn->autocommit(FALSE);
    $conn->query("INSERT INTO User (name, email) VALUES ('$user', '$user@eganet.go.tz');");
    $results = $conn->query("SELECT id FROM User ORDER BY id DESC LIMIT 1;");
    $user = $results->fetch_assoc();
    $id = $user["id"];
    $conn->query("INSERT INTO Balance (user_id, balance) VALUES ('$id', 1000);");
    $conn->commit();
}


?>