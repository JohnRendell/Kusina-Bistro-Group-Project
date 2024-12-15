<?php

require __DIR__ . "/connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    if ($_POST['dishName'] !== '') {

        // File upload handling
        $imagePath = '';
        if ($_FILES['dish_Image']['name'] !== '') {

            $file = $_FILES['dish_Image'];

            if ($file['error'] === UPLOAD_ERR_OK) {

                // Directory for uploading the image
                $uploadDir = 'dish_Images/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                // Create a unique filename
                $filename = uniqid() . '-' . $file['name'];
                $fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

                // Allowed file types
                $allowedExtensions = ['jpg', 'jpeg', 'png'];

                // Check if the file extension is allowed
                if (in_array($fileExtension, $allowedExtensions)) {
                    // Move the file to the upload directory
                    if (move_uploaded_file($file['tmp_name'], $uploadDir . $filename)) {
                        $imagePath = $filename;
                    } else {
                        echo 'File Upload Error: ' . $file['error'];
                    }
                } else {
                    echo 'Invalid file type.';
                }
            }
        }

        // Insert the dish details and image path into the database
        if ($imagePath) {
            try {
                $sql = "INSERT INTO dishes (dishName, description, quotes, tag, image) 
                    VALUES (:dishName, :description, :quotes, :tag, :image)";

                $stmt = $pdo->prepare($sql);

                $params = [
                    "dishName" => $_POST["dishName"] ?: '',
                    "description" => $_POST["description"] ?: '',
                    "quotes" => $_POST["quotes"] ?: '',
                    "tag" => $_POST["tag"] ?: '',
                    "image" => $imagePath
                ];

                $stmt->execute($params);

                echo "<script>alert('Dish added successfully.')</script>";
                echo "<script>window.location.href = '../siteManagementSystem';</script>";
            } catch (PDOException $e) {
                echo "<script>alert('Dish Name already exist'); </script>";
            }
        } else {
            echo "<script>alert('Upload image first')</script>";
        }
    } else {
        echo "<script>alert('Must Enter Dish Name')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Dish</title>

    <link rel="stylesheet" href="addDish.css">

    <link rel="icon" href="../IMG/Web Icon Logo.png">
</head>

<body>

    <center>
        <div>
            <h1>ADD DISH FOR BREAKFAST</h1>

            <form method="POST" enctype="multipart/form-data" id="formStuff">
                Name: <input type="text" id="dishName" name="dishName" placeholder="dish name...">
                <br><br>

                Description: <input type="text" id="description" name="description" placeholder="description...">
                <br><br>

                Quotes: <input type="text" id="quotes" name="quotes" placeholder="quotes...">
                <br><br>

                Tag: <input type="text" id="tag" name="tag" placeholder="tag...">
                <br><br>

                Image: <input type="file" id="dish_Image" name="dish_Image" accept="Image/jpg, Image/jpeg, Image/png">
                <br><br>

                <input type="submit" name="submit" value="Add" id="submitBtn">
            </form>

            <br><a href="index.php">Back</a>
        </div>
    </center>
</body>

</html>