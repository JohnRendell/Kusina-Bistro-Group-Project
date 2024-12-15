<?php
require('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $sql = "DELETE FROM kusina.hero_content WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $params = ['id' => $id];

    $stmt->execute($params);

    $filePath = './hero_Images/' . basename($_POST['image']); // Construct full path to the file

    if (file_exists($filePath)) {
        if (unlink($filePath)) {
            echo "Record and file deleted successfully.";
        } else {
            echo "Record deleted, but failed to delete file: " . $filePath;
        }
    } else {
        echo "Record deleted, but file does not exist: " . $filePath;
    }
}
