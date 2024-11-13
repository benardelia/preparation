<?php

include "connection.php";

$add_user_table = "CREATE TABLE IF NOT EXISTS User (id int AUTO_INCREMENT primary key, name varchar(255), email varchar(255));";
$add_transact_table = "CREATE TABLE IF NOT EXISTS Balance (id int AUTO_INCREMENT primary key, user_id int, balance bigint NOT NULL, foreign key(user_id) references User(id));";

try{
    $conn->autocommit(FALSE);
    $conn->query($add_user_table);
    $conn->query($add_transact_table);
    $conn->commit();

}catch(Exception $e){
    echo "Error $e";
    $conn->rollback();
}

?>