<?php
include('connection.php');
$userReview = htmlspecialchars($_POST['userReview'] ? $_POST['userReview'] : "No Review");
$userRating = htmlspecialchars($_POST['ratingValue'] ? $_POST['ratingValue'] : 0);
$user = htmlspecialchars($_POST['user'] ? $_POST['user'] : "Guest");

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
    try {

        //sql for inserting datas into review
        $sql = "INSERT INTO kusina.review(user, userReview, userRating) VALUES(:user, :userReview, :userRating)";

        //prepare statement
        $stmt = $pdo->prepare($sql);

        //params for statement
        $params = [
            ':user' => $user,
            ':userReview' => $userReview,
            ':userRating' => (int)$userRating
        ];

        $stmt->execute($params);

        header("Location: ../");
        exit;
    } catch (PDOException $err) {
        echo $err;
    }
}