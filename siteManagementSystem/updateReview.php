<?php

require('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $username = htmlspecialchars($_POST['username']);
    $review = htmlspecialchars($_POST['review']);
    $rating = $_POST['rating'];

    $sql = "UPDATE kusina.review SET user = :username, userReview = :review, userRating = :rating WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $params = [
        'id' => $id,
        'username' => $username,
        'review' => $review,
        'rating' => $rating
    ];

    $stmt->execute($params);
}
