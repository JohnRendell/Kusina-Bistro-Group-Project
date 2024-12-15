<?php

require('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $username = htmlspecialchars($_POST['username']);
    $location = htmlspecialchars($_POST['location']);
    $dateTime = $_POST['dateTime'];
    $message = htmlspecialchars($_POST['message']);

    $sql = "UPDATE kusina.reservation SET name = :name, location = :location, reserveDate = :reserveDate, additionalMessage = :additionalMessage WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $params = [
        'id' => $id,
        'name' => $username,
        'location' => $location,
        'reserveDate' => $dateTime,
        'additionalMessage' => $message
    ];

    $stmt->execute($params);
}
