<?php

session_start();

// verifies login 

if (isset($_SESSION["user_id"])) {
     require __DIR__ . "/connection.php";

     $sql = "SELECT * FROM admin_acc 
            WHERE id = :user_id";

     $stmt = $pdo->prepare($sql);

     $params = [
          "user_id" => $_SESSION["user_id"]
     ];

     $stmt->execute($params);

     $user = $stmt->fetch(PDO::FETCH_ASSOC);

     // selects existing content on hero section

     $selectSql = "SELECT * FROM hero_content WHERE id = :id";

     $selectStmt = $pdo->prepare($selectSql);

     $selectStmt->execute(['id' => 1]);

     $heroContent = $selectStmt->fetch(PDO::FETCH_ASSOC);
}



//function to display all reservation
function displayReservation()
{
     require __DIR__ . "/connection.php";

     $stmt = $pdo->prepare("SELECT * FROM kusina.reservation");

     $stmt->execute();

     $reservation = $stmt->fetchAll();

     return $reservation;
}

//function to display all review
function displayReview()
{
     require __DIR__ . "/connection.php";

     $stmt = $pdo->prepare("SELECT * FROM kusina.review");

     $stmt->execute();

     $reservation = $stmt->fetchAll();

     return $reservation;
}

//function to display all dish
function displayDish()
{
     require __DIR__ . "/connection.php";

     $stmt = $pdo->prepare("SELECT * FROM kusina.dishes");

     $stmt->execute();

     $reservation = $stmt->fetchAll();

     return $reservation;
}

function deleteDish($id, $imageToDelete)
{

     require __DIR__ . "/connection.php";

     $filePath = './dish_Images/' . basename($imageToDelete); 

     if (file_exists($filePath)) {
          if (unlink($filePath)) {
               echo "<script>alert('record deleted');</script>";
          }
     } else {
          echo "Record deleted, but file does not exist: " . $filePath;
     }

     $stmt = $pdo->prepare("DELETE FROM dishes WHERE ID = :value");

     $stmt->execute(["value" => $id]);
}

//function to display all hero images
function displayHeroImage()
{
     require __DIR__ . "/connection.php";

     $stmt = $pdo->prepare("SELECT * FROM kusina.hero_content");

     $stmt->execute();

     $reservation = $stmt->fetchAll();

     return $reservation;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteDish'])) {

     $parameter = $_POST['param'];
     $imageToDelete = $_POST['imageDelete'];
     deleteDish($parameter, $imageToDelete);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Admin Dashboard</title>
     <link rel="icon" href="../IMG/Web Icon Logo.png">
     <link rel="stylesheet" href="index-style.css">
</head>

<body>
     <center>
          <h1>FILE MANAGEMENT SYSTEM</h1>

          <?php if (isset($user)) : ?>

               <p> Welcome <?= htmlspecialchars($user["firstName"]) ?></p><br>

               <p><a href="logOut.php">Log out</a></p>

               <div>
                    <h1>---HERO SECTION---</h1>
                    <table>
                         <thead>
                              <td>Image Directory</td>
                              <td>Operation</td>
                         </thead>

                         <?php foreach (displayHeroImage() as $heroContent) : ?>
                              <!--Displaying hero content-->
                              <tr>
                                   <td><img src="<?= "hero_Images/" . $heroContent['dir'] ?>" alt="img" width="300" height="300"></td>
                                   <td>
                                        <button onclick="deleteHero('<?= $heroContent['ID'] ?>', '<?= $heroContent['dir'] ?>')">Delete</button>
                                   </td>
                              </tr>
                         <?php endforeach; ?>

                         <!--For adding a new record at hero section-->
                         <tr>
                              <td>
                                   <input type="file" accept="Image/*" id="hero-image-input">
                                   <div id="prevDiv" style="display: none;">
                                        <img src="" alt="" id="prevImage-Hero" width="200px" height="200px">
                                   </div>
                              </td>
                              <td>
                                   <div>
                                        <button onclick="insertHero()">Add Record</button>
                                   </div>
                              </td>
                         </tr>
                    </table>
               </div>
               <br> <br>

               <div>
                    <h1>---DISHES SECTION---</h1>

                    <table border="1">
                         <thead>
                              <tr>
                                   <th>Dish Name</th>
                                   <th>Description</th>
                                   <td>Quotes</td>
                                   <td>Tag</td>
                                   <th>Image</th>
                                   <th>Remove</th>
                                   <th>Modify</th>
                              </tr>
                         </thead>
                         <tbody>


                              <?php foreach (displayDish() as $dish) : ?>
                                   <!--Show dish-->
                                   <tr id="showDish-<?= $dish['ID'] ?>" style="display: table-row;">
                                        <td><?= $dish['dishName'] ?></td>
                                        <td><?= $dish['description'] ?></td>
                                        <td><?= $dish['quotes'] ?></td>
                                        <td><?= $dish['tag'] ?></td>
                                        <td><img src="<?= "./dish_Images/" . $dish['image'] ?>" alt="" width="300" height="300"></td>
                                        <td>
                                             <div>
                                                  <form method="POST" enctype="multipart/form-data">
                                                       <input type="hidden" name="param" value="<?= $dish["ID"] ?>">
                                                       <input type="text" value="<?=$dish['image']?>" name="imageDelete" hidden>
                                                       <button type="submit" name="deleteDish">Delete</button>
                                                  </form>
                                             </div>
                                        </td>
                                        <td>
                                             <div>
                                                  <button onclick="modifyDishTable('edit', '<?= $dish['ID'] ?>')">Edit</button>
                                             </div>
                                        </td>
                                   </tr>

                                   <!--Edit dish-->
                                   <tr id="editDish-<?= $dish['ID'] ?>" style="display: none;">
                                        <form action="updateDish.php" method="POST" enctype="multipart/form-data">
                                             <td><input type="text" placeholder="Dish name..." value="<?= $dish['dishName'] ?>" name="dishName"></td>
                                             <td><input type="text" placeholder="description..." value="<?= $dish['description'] ?>" name="description"></td>
                                             <td><input type="text" placeholder="dish quotes..." value="<?= $dish['quotes'] ?>" name="quotes"></td>
                                             <td><input type="text" placeholder="dish tag..." value="<?= $dish['tag'] ?>" name="tag"></td>
                                             <td>
                                                  <input type="file" accept="Image/*" name="uploadImage">
                                                  <input type="text" value="<?= $dish['image'] ?>" name="prevImage" hidden>
                                                  <input type="text" value="<?= $dish['ID'] ?>" name="ID" hidden>
                                             </td>
                                             <td>
                                                  <div>
                                                       <input type="submit" value="Save" name="submit">
                                                  </div>
                                             </td>
                                        </form>
                                        <td>
                                             <div>
                                                  <button onclick="modifyDishTable('cancel', '<?= $dish['ID'] ?>')">Cancel</button>
                                             </div>
                                        </td>
                                   </tr>
                              <?php endforeach; ?>

                         </tbody>
                    </table>

                    <a href="addDish.php">Add Dish</a>

               </div>
               <br> <br>


               <div>
                    <h1>---REVIEW SECTION---</h1>

                    <table border="1">
                         <thead>
                              <td>Name</td>
                              <td>Review</td>
                              <td>Star</td>
                              <td>Operation</td>
                         </thead>

                         <?php foreach (displayReview() as $review) : ?>
                              <tr id="showReview-<?= $review['id'] ?>" style="display: table-row;">
                                   <td><?= $review['user'] ?></td>
                                   <td><?= $review['userReview'] ?></td>
                                   <td><?= $review['userRating'] ?></td>
                                   <td>
                                        <div>
                                             <button onclick="modifyReviewTable('edit', '<?= $review['id'] ?>')">Edit</button>
                                             <button onclick="deleteReviewRow('<?= $review['id'] ?>')">Delete</button>
                                        </div>
                                   </td>
                              </tr>

                              <tr id="editReview-<?= $review['id'] ?>" style="display: none;">
                                   <td><input type="text" placeholder="username..." value="<?= $review['user'] ?>" id="username-<?= $review['id'] ?>"></td>
                                   <td><input type="text" placeholder="user review..." value="<?= $review['userReview'] ?>" id="review-<?= $review['id'] ?>"></td>
                                   <td><input type="number" min="0" max="5" value="<?= $review['userRating'] ?>" id="rating-<?= $review['id'] ?>"></td>
                                   <td>
                                        <div>
                                             <button onclick="saveReviewRow('<?= $review['id'] ?>')">Save</button>
                                             <button onclick="modifyReviewTable('cancel', '<?= $review['id'] ?>')">Cancel</button>
                                        </div>
                                   </td>
                              </tr>
                         <?php endforeach; ?>

                         <!--For adding a new record at review-->
                         <tr>
                              <td><input type="text" placeholder="new username..." value="" id="username-rev"></td>
                              <td><input type="text" placeholder="new review..." value="" id="review-rev"></td>
                              <td><input type="number" min="0" max="5" value="0" id="rating-rev"></td>
                              <td>
                                   <div>
                                        <button onclick="insertReview('username-rev', 'review-rev', 'rating-rev')">Add Record</button>
                                   </div>
                              </td>
                         </tr>
                    </table>
               </div>

               <br> <br>
               <div>
                    <h1>---RESERVATION SECTION---</h1>
                    <p>Branch: Quezon City, Makati City, Davao City</p>
                    <table border="1">
                         <thead>
                              <td>ID</td>
                              <td>Name</td>
                              <td>Location</td>
                              <td>Reserve Date</td>
                              <td>Additional Message</td>
                              <td>Operation</td>
                         </thead>

                         <?php foreach (displayReservation() as $reservation) : ?>
                              <tr id="showReservation-<?= $reservation['id'] ?>" style="display:table-row;">
                                   <td><?= $reservation['id'] ?></td>
                                   <td><?= $reservation['name'] ?></td>
                                   <td><?= $reservation['location'] ?></td>
                                   <td><?= $reservation['reserveDate'] ?></td>
                                   <td><?= $reservation['additionalMessage'] ?></td>
                                   <td>
                                        <div>
                                             <button onclick="modifyReservationTable('edit', '<?= $reservation['id'] ?>')">Edit</button>
                                             <button onclick="deleteReservation('<?= $reservation['id'] ?>')">Delete</button>
                                        </div>
                                   </td>
                              </tr>

                              <!--Edit inputs for each row table-->
                              <tr id="editReservation-<?= $reservation['id'] ?>" style="display:none;">
                                   <td><?= $reservation['id'] ?></td>
                                   <td><input type="text" placeholder="Username..." value="<?= $reservation['name'] ?>" id="username-res-<?= $reservation['id'] ?>"></td>
                                   <td><input type="text" placeholder="Location..." value="<?= $reservation['location'] ?>" id="location-res-<?= $reservation['id'] ?>"></td>
                                   <td><input type="datetime-local" id="dateTime-res-<?= $reservation['id'] ?>"></td>
                                   <td><input type="text" placeholder="Additional Message..." value="<?= $reservation['additionalMessage'] ?>" id="message-res-<?= $reservation['id'] ?>"></td>
                                   <td>
                                        <div>
                                             <button onclick="updateReservation('<?= $reservation['id'] ?>')">Save</button>
                                             <button onclick="modifyReservationTable('cancel', '<?= $reservation['id'] ?>')">Cancel</button>
                                        </div>
                                   </td>
                              </tr>
                         <?php endforeach; ?>

                         <!--For adding a new record at review-->
                         <tr>
                              <form action="insertReservationAdmin.php" method="post">
                                   <td>ID</td>
                                   <td><input type="text" placeholder="new username..." value="" name="username-res"></td>
                                   <td><input type="text" placeholder="Enter branch" name="location-res"></td>
                                   <td><input type="datetime-local" name="date-res"></td>
                                   <td><input type="text" placeholder="Additional Message" name="message-res"></td>
                                   <td>
                                        <div>
                                             <input type="submit" name="submit" value="Add Record">
                                        </div>
                                   </td>
                              </form>
                         </tr>
                    </table>
               </div>

          <?php else : ?>

               <p><a href="login.php">Log in</a></p>

          <?php endif; ?>

     </center>

</body>

</html>

<script src="adminFunctionality.js"></script>
<script src="reviewFunction.js"></script>
<script src="reservationFunction.js"></script>
<script src="heroFunction.js"></script>