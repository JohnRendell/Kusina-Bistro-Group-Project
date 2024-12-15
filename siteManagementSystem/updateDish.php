<?php

require('connection.php');

function uploadImage()
{
    if (isset($_FILES['uploadImage']) && $_FILES['uploadImage']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'dish_Images/';
        $fileTmpPath = $_FILES['uploadImage']['tmp_name'];
        $fileName = basename($_FILES['uploadImage']['name']);
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $newFileName = "dishImage_" . $_POST['ID'] . '.' . $fileExtension;
        $destPath = $uploadDir . $newFileName;

        move_uploaded_file($fileTmpPath, $destPath);

        return $newFileName;
    } else {
        echo "Error: No file uploaded or file upload error.";
        return "No Image Upload";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $ID = $_POST['ID'];
    $dishName = $_POST['dishName'];
    $description = $_POST['description'];
    $quotes = $_POST['quotes'];
    $tag = $_POST['tag'];

    $filePath = "./dish_Images/" . basename($_POST['prevImage']);

    if (file_exists($filePath)) {
        if (unlink($filePath)) {
            echo "Record and file deleted successfully.";
        } else {
            echo "Record deleted, but failed to delete file: " . $filePath;
        }
    } else {
        echo "Record deleted, but file does not exist: " . $filePath;
    }

    try {
        $uploadImage = uploadImage() !== "No Image Upload" ? uploadImage() : $_POST['prevImage'];
        $sql = "UPDATE dishes SET dishName = :dishName, description = :description, quotes = :quotes, tag = :tag, image = :image WHERE ID = :ID";

        $stmt = $pdo->prepare($sql);

        $params = [
            'ID' => $ID,
            'dishName' => $dishName,
            'description' => $description,
            'quotes' => $quotes,
            'tag' => $tag,
            'image' => $uploadImage
        ];

        $stmt->execute($params);

        echo "<script>alert('Record updated')</script>";
        echo "<script>window.location.href = '../siteManagementSystem';</script>";
    } catch (PDOException $err) {
        echo $err;
    }
}
