<?php
include "connection.php";
try{
    include "initialize.php";
  $result =  $conn->query("SELECT * FROM User;");
  if($result->fetch_assoc() === NULL){
    include "populatedata.php";
  }

  header("Location: sendmoney.php");
  exit();
}catch(Exception $e){
    try{
    
        include "initialize.php";
        include "populatedata.php";
        }catch(Exception $e){
            echo "Error: $e";
        }
        
}
?>