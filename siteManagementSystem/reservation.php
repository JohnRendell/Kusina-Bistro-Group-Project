<?php
include('connection.php');
date_default_timezone_set("Asia/Manila");

$name = htmlspecialchars($_POST['name'] ? $_POST['name'] : 'Guest');
$location = htmlspecialchars($_POST['location']);
$dateTime = $_POST['dateTime'] ? date("Y/m/d H:i:s", strtotime($_POST['dateTime'])) : date_format(date_create(), "Y/m/d H:i:s");
$message = htmlspecialchars($_POST['message'] ? $_POST['message'] : 'no message');
$submit = $_POST['submit'];

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($submit)) {
    try {
        if($location){
            $branches = array('QUEZON CITY', 'MAKATI CITY', 'DAVAO CITY', 'QUEZON', 'MAKATI', 'DAVAO');

            if(in_array(strtoupper($location), $branches)){
                //sql for inserting datas into reservation
                $sql = "INSERT INTO kusina.reservation(name, location, reserveDate, additionalMessage) VALUES(:name, :location, :reserveDate, :additionalMessage)";

                //prepare statement
                $stmt = $pdo->prepare($sql);

                //params for statement
                $params = [
                    ':name' => $name,
                    ':location' => $location,
                    ':reserveDate' => $dateTime,
                    ':additionalMessage' => $message
                ];

                $stmt->execute($params);
                header("Location: ../");
                exit;
            }
            else{
                echo "<script>alert('Please select branch that is available.')</script>";
                echo "<script>window.location.href = '../';</script>";
            }
        }
        else{
            echo "<script>alert('Location cannot be empty.')</script>";
            echo "<script>window.location.href = '../';</script>";
        }
    } catch (PDOException $err) {
        echo $err;
    }
}
