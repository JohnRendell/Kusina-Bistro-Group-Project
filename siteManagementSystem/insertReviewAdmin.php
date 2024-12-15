<?php
include('connection.php');
$userReview = htmlspecialchars($_POST['review'] ? $_POST['review'] : "No Review");
$userRating = htmlspecialchars($_POST['rating'] ? $_POST['rating'] : 0);
$user = htmlspecialchars($_POST['username'] ? $_POST['username'] : "Guest");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //sql for inserting datas into review
    $sql = "INSERT INTO review(user, userReview, userRating) VALUES(:user, :userReview, :userRating)";

    //prepare statement
    $stmt = $pdo->prepare($sql);

    //params for statement
    $params = [
        ':user' => $user,
        ':userReview' => $userReview,
        ':userRating' => (int)$userRating
    ];

    $stmt->execute($params);
}
