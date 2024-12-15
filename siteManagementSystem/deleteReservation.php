<?php

require('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $sql = "DELETE FROM reservation WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $params = ['id' => $id];

    $stmt->execute($params);
}
