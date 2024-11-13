

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <form action="" method="post">

    <div class="form">
    <input type="text" name="description">
    <input type="number" name="receiver_id" id="rid" required>
    <input type="number" name="amount" value=0 required>
    <input type="submit" value="Send">
    </div>
    </form>
    
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include "connection.php";

        $id = $_POST["receiver_id"];
        $amount = $_POST["amount"];

        try{
            $conn->autocommit(FALSE);
            $senders_balance = $conn->query("SELECT balance FROM Balance WHERE user_id = 1;");
            $receiver_balance = $conn->query("SELECT balance FROM Balance WHERE user_id = $id;");

            $new_senders_balance = $senders_balance->fetch_assoc()["balance"] - $amount;
            $new_receiver_balance =  $receiver_balance->fetch_assoc()["balance"] + $amount;

            $conn->query("UPDATE Balance SET balance = $new_senders_balance WHERE id = 1");
            $conn->query("UPDATE Balance SET balance = $new_receiver_balance WHERE id = $id");

            $conn->commit();
        }catch(Exception $e){

        }


    }

    ?>