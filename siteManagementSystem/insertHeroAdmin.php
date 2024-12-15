
<?php

require "connection.php";
function uploadImage(){
    if (isset($_FILES['uploadImage']) && $_FILES['uploadImage']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'hero_Images/';
        $fileTmpPath = $_FILES['uploadImage']['tmp_name'];
        $fileName = basename($_FILES['uploadImage']['name']);
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $newFileName = uniqid('img_', true) . '.' . $fileExtension; 
        $destPath = $uploadDir . $newFileName;

        move_uploaded_file($fileTmpPath, $destPath);

        return $newFileName;
    } else {
        echo "Error: No file uploaded or file upload error.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //sql for inserting datas into review
    $sql = "INSERT INTO kusina.hero_content(dir) VALUES(:dir)";

    //prepare statement
    $stmt = $pdo->prepare($sql);

    //params for statement
    $params = [
        ':dir' => uploadImage()
    ];

    $stmt->execute($params);
}

?>