<?php
function displayReview()
{
    require __DIR__ . "./siteManagementSystem/connection.php";
    $stmt = $pdo->prepare("SELECT * FROM review");

    $stmt->execute();

    $reservation = $stmt->fetchAll();

    return $reservation;
}

function displayHero()
{
    require __DIR__ . "./siteManagementSystem/connection.php";
    $stmt = $pdo->prepare("SELECT * FROM hero_content");

    $stmt->execute();

    $hero = $stmt->fetchAll();

    return $hero;
}

function displayDish()
{
    require __DIR__ . "./siteManagementSystem/connection.php";
    $stmt = $pdo->prepare("SELECT * FROM dishes");

    $stmt->execute();

    $hero = $stmt->fetchAll();

    return $hero;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KUSINA BISTRO</title>
    <!-- Google Font -->
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400,500,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=sunny" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Rubik:ital,wght@0,300..900;1,300..900&family=Yuji+Mai&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Agu+Display&family=Oswald:wght@200..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Rubik:ital,wght@0,300..900;1,300..900&family=Yuji+Mai&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- Preloader -->
    <link rel="stylesheet" href="css/preloader.css" type="text/css" media="screen, print" />

    <!--Web icon-->
    <link rel="icon" href="IMG/Web Icon Logo.png">

    <!-- Icon Font-->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.default.css">
    <!-- Animate CSS-->
    <link rel="stylesheet" href="css/animate.css">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">



    <!-- Style -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="js/lte-ie7.js"></script>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <header id="HOME" style="background-position: 50%;">
        <section>
            <div class="section_overlay">
                <nav class="navbar navbar-default navbar-fixed-top" style="background-color: hsl(0, 0%, 100%); border: none;">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <img src="IMG/Kusina Logo.png" alt="" style="margin-top: -200px; margin-left: -150px; margin-bottom: -240px;">
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="padding-bottom: -800px;">
                            <ul class="nav navbar-nav navbar-right" style="padding-bottom: -800px; margin-bottom: -500px;">
                                <li><a href="#HOME">Home</a></li>
                                <li><a href="#SERVICE">Menu</a></li>
                                <li><a href="#RESERVATION">Reservation</a></li>
                                <li><a href="#TESTIMONIAL">Reviews</a></li>
                                <li><a href="#fun_facts">About Us</a></li>
                                <li><a href="account.html">Account</a></li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container -->
                </nav>

                <div class="container">
                    <div class="row align-items-center" style="display: flex; align-items: center;">
                        <!-- Left Column for the Text -->
                        <div class="col-md-6 text-center" style="margin-left: 95px;">
                            <div class="home_text wow fadeInUp animated">
                                <h2 class="agu-display-misc" style="font-size: 50px;">KAMUSTA</h2>
                            </div>
                        </div>

                        <!-- Right Column for the Carousel -->
                        <div class="col-md-10">
                            <div id="welcomeCarousel" class="carousel slide" data-ride="carousel">

                                <div class="carousel-inner" style="margin-left: -590px;">
                                    <?php
                                    $imageIncre = 1;
                                    foreach (displayHero() as $hero) :
                                        $isFirst = $imageIncre == 1 ? "class='item active'" : "class='item'";
                                    ?>
                                        <div <?= $isFirst ?>>
                                            <img src="./siteManagementSystem/hero_images/<?= $hero['dir'] ?>" alt="Image <?= $imageIncre ?>" style="width: 100%; height: auto;">
                                        </div>
                                        <?php $imageIncre++; ?>
                                    <?php endforeach; ?>
                                </div>

                                <!-- Automatic sliding controls (Optional, remove if not needed) -->
                                <script>
                                    $('.carousel').carousel({
                                        interval: 3000, // Change slide every 3 seconds
                                        pause: "hover"
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="scroll_down">
                                <a href="#SERVICE"><img src="images/scroll.png" alt=""></a>
                                <h4>Scroll Down</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </header>
    <section class="services" id="SERVICE">
        <div class="container">
            <div class="row">
                <div class="col-md-3 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="1s">
                        <h2>Breakfast</h2>
                        <p>Start your day with a classic silog breakfast—garlic fried rice (sinangag), sunny-side-up eggs (itlog), and your choice of savory meat like tapa (cured beef) or tocino (sweet pork) we also serve authentic tuyo (Sun-Dried Fish) for an authentic Pinoy morning treat.</p>
                        <div class="menu-container">
                            <!--Modal for breakfast Menu-->
                            <button class="btn btn-default submit-btn form_submit" data-toggle="modal" data-target="#breakfastMenu" style="width: 170px;">View our Breakfast menu</button>
                        </div>
                    </div>
                    <div class="modal fade" id="breakfastMenu" tabindex="-1" role="dialog" aria-labelledby="breakfastMenu" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="./siteManagementSystem/">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-menu-title" id="menuModalLabel">BREAKFAST MENU</h4>
                                        <span aria-hidden="true">&times;</span>
                                    </div>
                                    <div class="modal-body">
                                        <div class="meal-item"></div>
                                        <h5>Tapsilog</h5>
                                        <p>Tender beef strips (tapa), garlic fried rice (sinangag), and a sunny-side-up egg (itlog)</p>
                                        <img src="/IMG/Galleria/6dd933aa-4dd7-4014-84b5-87da8b00d385.jpg" alt="Tapsilog" style="width: 200px; height: auto;">
                                        <hr>
                                        <h5>Longsilog</h5>
                                        <p>Sweet Filipino sausage (longganisa), garlic fried rice (sinangag), and a sunny-side-up egg (itlog)</p>
                                        <img src="/IMG/Galleria/bbf469be-e319-490a-bd4a-fb62a70d5021.jpg" alt="Longsilog" style="width: 200px; height: auto;">
                                        <hr>
                                        <h5>Tocilog</h5>
                                        <p>Sweet cured pork (tocino), garlic fried rice (sinangag), and a sunny-side-up egg (itlog)</p>
                                        <img src="/IMG/Galleria/3461401e-dd2d-49e3-8abc-f0131f56c4ad.jpg" alt="Tocilog" style="width: 200px; height: auto;">
                                        <hr>
                                        <h5>Bangsilog</h5>
                                        <p>Fried milkfish (bangus), garlic fried rice (sinangag), and a sunny-side-up egg (itlog)</p>
                                        <img src="/IMG/Galleria/5fef9b39-6e4e-4b7a-95bc-643793d6c49a.jpg" alt="Bangsilog" style="width: 200px; height: auto;">
                                        <hr>
                                        <h5>Arroz Caldo</h5>
                                        <p>Rice porridge with chicken, garlic, and ginger, topped with spring onions and boiled eggs.</p>
                                        <img src="/IMG/Galleria/aa3b3630-c813-4add-95da-fe2c575519fa.jpg" alt="ArrozCaldo" style="width: 200px; height: auto;">
                                        <hr>
                                    </div>
                                    <div class="modal-footer">

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="2s">
                        <h2>Lunch</h2>
                        <p>Savor your midday meal with a hearty silog lunch—garlic fried rice (sinangag), sunny-side-up eggs (itlog), and specialty meats such as Lechon Kawali (Pork Belly), Pinakbet (mixed vegetables), or adobo (braised meat) for a fulfilling Pinoy lunchtime dish.</p>
                        <div class="menu-container">
                            <button class="btn btn-default submit-btn form_submit" data-toggle="modal" data-target="#lunchMenu" style="width: 170px;">View our Lunch menu</button>
                        </div>
                    </div>
                    <div class="modal fade" id="lunchMenu" tabindex="-1" role="dialog" aria-labelledby="lunchMenu" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="./siteManagementSystem/">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-menu-title" id="menuModalLabel">LUNCH MENU</h4>
                                        <span aria-hidden="true">&times;</span>
                                    </div>
                                    <div class="modal-body">
                                        <div class="meal-item"></div>
                                        <h5>Adobo</h5>
                                        <p>Marinated pork or chicken in soy sauce, vinegar, garlic, and bay leaves, slow-cooked to perfection.</p>
                                        <img src="/IMG/Galleria/c4296b4e-5244-4c1e-96fc-df6218f568bd.jpg" alt="Adobo" style="width: 200px; height: auto;">
                                        <hr>
                                        <h5>Sinigang</h5>
                                        <p>Tamarind-based sour soup with pork or shrimp, mixed with vegetables like kangkong, radish, and okra.</p>
                                        <img src="/IMG/Galleria/dcc9e9a2-df7e-457d-8c6a-7145169481e9.jpg" alt="Sinigang" style="width: 200px; height: auto;">
                                        <hr>
                                        <h5>Kare-Kare</h5>
                                        <p>Oxtail stew in peanut sauce, served with vegetables and shrimp paste (bagoong).</p>
                                        <img src="/IMG/Galleria/ea76d0a9-edcb-4fe6-b31f-03ab990ffdd8.jpg" alt="Kare-Kare" style="width: 200px; height: auto;">
                                        <hr>
                                        <h5>Lechon Kawali</h5>
                                        <p>Crispy deep-fried pork belly served with a side of liver sauce.</p>
                                        <img src="/IMG/Galleria/e5527249-2cd9-4c1d-8d79-21bf353e80cb.jpg" alt="Lechon Kawali" style="width: 200px; height: auto;">
                                        <hr>
                                        <h5>Pinakbet</h5>
                                        <p>Mixed vegetables (eggplant, bitter melon, squash) stewed in shrimp paste (bagoong).</p>
                                        <img src="/IMG/Galleria/089263ac-7c94-4583-b0a8-4319e7df40bc.jpg" alt="Pinakbet" style="width: 200px; height: auto;">
                                        <hr>
                                    </div>
                                    <div class="modal-footer">

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="3s">
                        <h2>Dinner</h2>
                        <p>End your day with a comforting silog dinner—garlic fried rice (sinangag), sunny-side-up eggs (itlog), and your choice of specialty meat like lechon (roast pork), kaldereta (beef stew), or sinigang na baboy (pork tamarind soup) for a satisfying Pinoy evening meal.</p>
                        <div class="menu-container">
                            <button class="btn btn-default submit-btn form_submit" data-toggle="modal" data-target="#dinnerMenu" style="width: 170px;">View our Dinner menu</button>
                        </div>
                    </div>
                    <div class="modal fade" id="dinnerMenu" tabindex="-1" role="dialog" aria-labelledby="dinnerMenu" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="./siteManagementSystem/">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-menu-title" id="menuModalLabel">DINNER MENU</h4>
                                        <span aria-hidden="true">&times;</span>
                                    </div>
                                    <div class="modal-body">
                                        <div class="meal-item">
                                            <h5>Bulalo</h5>
                                            <p>Slow-cooked beef shank soup with bone marrow, corn, and green beans.</p>
                                            <img src="/IMG/Galleria/01d0b228-5a22-49cd-9073-bb36834cf662.jpg" alt="Bulalo" style="width: 200px; height: auto;">
                                            <hr>
                                            <h5>Laing</h5>
                                            <p>Taro leaves simmered in coconut milk and served with chili and shrimp paste.</p>
                                            <img src="/IMG/Galleria/ee60b1a2-9222-4fc7-9694-58b0f822f35d.jpg" alt="Laing" style="width: 200px; height: auto;">
                                            <hr>
                                            <h5>Inihaw na Liempo</h5>
                                            <p>Grilled pork belly marinated in vinegar, soy sauce, and spices.</p>
                                            <img src="/IMG/Galleria/75851b33-e7e5-4295-8c3e-b29cdc669e26.jpg" alt="Inihaw na Liempo" style="width: 200px; height: auto;">
                                            <hr>
                                            <h5>Paksiw na Lechon</h5>
                                            <p>Roast pork (lechon) cooked in vinegar and soy sauce, with liver sauce.</p>
                                            <img src="/IMG/Galleria/a9a9b6c1-60d4-4503-ba03-3eb6f3218846.jpg" alt="Paksiw na Lechon" style="width: 200px; height: auto;">
                                            <hr>
                                            <h5>Chicken Inasal</h5>
                                            <p>Grilled chicken marinated in a mixture of vinegar, garlic, lemongrass, and ginger.</p>
                                            <img src="/IMG/Galleria/a733dd5e-cd56-4432-9f48-9dfeaa730af6.jpg" alt="Chicken Inasal" style="width: 200px; height: auto;">
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="modal-footer">

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="4s">
                        <h2>Specialties</h2>
                        <p>Indulge in authentic Filipino specialties with flavors like adobo (braised meat), kare-kare (peanut stew), and sinigang (tamarind soup). Enjoy hearty dishes like bulalo (beef soup), or the crispy perfection of lechon (roast pig) for a true taste of Pinoy cuisine.</p>
                        <div class="menu-container">
                            <button class="btn btn-default submit-btn form_submit" data-toggle="modal" data-target="#specialtiesMenu" style="width: 170px;">View our Specialties menu</button>
                        </div>
                    </div>
                    <div class="modal fade" id="specialtiesMenu" tabindex="-1" role="dialog" aria-labelledby="specialtiesMenu" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="./siteManagementSystem/">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-menu-title" id="menuModalLabel">DINNER MENU</h4>
                                        <span aria-hidden="true">&times;</span>
                                    </div>
                                    <div class="modal-body">
                                        <div class="meal-item">
                                            <h5>Bulalo</h5>
                                            <p>Slow-cooked beef shank soup with bone marrow, corn, and green beans.</p>
                                            <img src="/IMG/Galleria/01d0b228-5a22-49cd-9073-bb36834cf662.jpg" alt="Bulalo" style="width: 200px; height: auto;">
                                            <hr>
                                            <h5>Laing</h5>
                                            <p>Taro leaves simmered in coconut milk and served with chili and shrimp paste.</p>
                                            <img src="/IMG/Galleria/ee60b1a2-9222-4fc7-9694-58b0f822f35d.jpg" alt="Laing" style="width: 200px; height: auto;">
                                            <hr>
                                            <h5>Inihaw na Liempo</h5>
                                            <p>Grilled pork belly marinated in vinegar, soy sauce, and spices.</p>
                                            <img src="/IMG/Galleria/75851b33-e7e5-4295-8c3e-b29cdc669e26.jpg" alt="Inihaw na Liempo" style="width: 200px; height: auto;">
                                            <hr>
                                            <h5>Paksiw na Lechon</h5>
                                            <p>Roast pork (lechon) cooked in vinegar and soy sauce, with liver sauce.</p>
                                            <img src="/IMG/Galleria/a9a9b6c1-60d4-4503-ba03-3eb6f3218846.jpg" alt="Paksiw na Lechon" style="width: 200px; height: auto;">
                                            <hr>
                                            <h5>Chicken Inasal</h5>
                                            <p>Grilled chicken marinated in a mixture of vinegar, garlic, lemongrass, and ginger.</p>
                                            <img src="/IMG/Galleria/a733dd5e-cd56-4432-9f48-9dfeaa730af6.jpg" alt="Chicken Inasal" style="width: 200px; height: auto;">
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="modal-footer">

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="display: flex;justify-content: center; align-items: center; margin-bottom: -150px; margin-right: 20px;">
            <img src="IMG/kusina-gallery/Group-iMAGE.png" style="margin-top: -150px; margin-left: -550px;">
            <div class=" wow fadeInUp" data-wow-delay="1s">
                <div class="oswald-misc" style="margin-top: -230px; font-size: 40px; margin-right: -350px;">
                    <p>HAVE A <span style="color: red;"> KUSINA </span>FEAST</p>
                    <p>WITH YOUR FRIENDS AND</p>
                    <p>LOVE ONES</p>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section class="work_area" id="WORK">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="work_title  wow fadeInUp animated">
                        <h1>DISHES</h1>
                        <img src="images/shape.png" alt="">
                        <p>Our restaurant celebrates the rich and diverse flavors of Filipino cuisine, blending tradition with a modern twist in a charming bistro-style setting. Each dish, from the savory tang of adobo to the comforting sourness of sinigang, is crafted with the freshest ingredients to honor the vibrant and warm essence of Filipino culture. Guests can savor classics like lechon kawali, indulge in the creamy richness of kare-kare, or enjoy the colorful sweetness of halo-halo, all served with the hospitality Filipinos are known for. Every bite tells a story of home, tradition, and togetherness, creating an experience that reconnects people with the flavors of the Philippines.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <?php $size = (count(displayDish()) / 2) === 3 ? (count(displayDish()) / 2) : count(displayDish());
                $hasRow = (count(displayDish()) / 2) === 3 ? true : false;
                ?>
                <?php for ($i = 0; $i < $size; $i++) :
                    $dish = displayDish()[$i];
                ?>
                    <div class="col-md-4 no_padding">
                        <div class="single_image">
                            <img src="<?= "./siteManagementSystem/dish_Images/" . $dish['image'] ?>" alt="" width="300" height="300">
                            <div class="image_overlay">
                                <a href=""><?= $dish['description'] ?></a>
                                <h2><?= $dish['dishName'] ?></h2>
                                <h4><?= $dish['tag'] ?></h4>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>

            <?php if ($hasRow) : ?>
                <div class="row pad_top">
                    <?php for ($i = $size; $i < count(displayDish()); $i++) :
                        $dish = displayDish()[$i];
                    ?>
                        <div class="col-md-4 no_padding">
                            <div class="single_image">
                                <img src="<?= "./siteManagementSystem/dish_Images/" . $dish['image'] ?>" alt="" width="300" height="300">
                                <div class="image_overlay">
                                    <a href=""><?= $dish['description'] ?></a>
                                    <h2><?= $dish['dishName'] ?></h2>
                                    <h4><?= $dish['tag'] ?></h4>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>

            <!--<div class="row">
                <div class="col-md-4 no_padding">
                    <div class="single_image">
                        <img src="IMG/Galleria/Gallery_Dish1.png" alt="">
                        <div class="image_overlay">
                            <a href="">Hearty Feast</a>
                            <h2>ADOBO</h2>
                            <h4>Specialty</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 no_padding">
                    <div class="single_image">
                        <img src="IMG/Galleria/Gallery_Dish2.png" alt="">
                        <div class="image_overlay">
                            <a href="">Hearty Feast</a>
                            <h2>Kare-Kare</h2>
                            <h4>Specialty</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 no_padding">
                    <div class="single_image">
                        <img src="IMG/Galleria/Gallery_Dish3.png" alt="">
                        <div class="image_overlay">
                            <a href="">Homie Rainy Days</a>
                            <h2>Sinigang</h2>
                            <h4>Specialty</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pad_top">
                <div class="col-md-4 no_padding">
                    <div class="single_image">
                        <img src="IMG/Galleria/Gallery_Dish4.png" alt="">
                        <div class="image_overlay">
                            <a href="">Craving for Bicolano authentic taste?</a>
                            <h2>Bicol Express</h2>
                            <h4>Authentic Specialty</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 no_padding">
                    <div class="single_image">
                        <img src="IMG/Galleria/Gallery_Dish5.png" alt="">
                        <div class="image_overlay">
                            <a href="">Comforting Comfort Food</a>
                            <h2>Lumpiang Shanghai</h2>
                            <h4>Filipino Comfort Meals</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 no_padding">
                    <div class="single_image last_padding">
                        <img src="IMG/Galleria/Gallery_Dish6.png" alt="">
                        <div class="image_overlay">
                            <a href="">It's not a filipino bistro without the authentic</a>
                            <h2>Pandesal</h2>
                            <h4>House Baked Goods</h4>
                        </div>
                    </div>
                </div>
            </div>-->

        </div>
    </section>
    <section class="reservation" id="RESERVATION">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="contact_title  wow fadeInUp animated">
                        <h1>Reserve a <span style="color: red;" ;">table</span></h1>
                        <img src="images/shape.png" alt="">
                        <p>Book your table now for an unforgettable dining experience! Choose your date, time and table number below.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3  wow fadeInLeft animated">
                    <div class="single_contact_info">
                        <h2><span style="color: red; margin-bottom: 50px;">Reservation Details</span></h2>
                        <p>Breakfast menu is available for only 7:00 AM to 11:00 PM</p>
                        <p>Lunch menu for 12:00 PM to 5:30 PM </p>
                        <p>And Dinner is available for 6:00 PM to 10:00PM</p>
                    </div>
                    <div class="single_contact_info" style="margin-bottom: 20px; margin-top: -30px;">
                        <h2><span style="color: red;">Call Us</span><i class="icon-dial"></i></h2>
                        <p>+0012-345-6789</p>
                    </div>
                    <div class="single_contact_info" style="margin-top: -30px;">
                        <h2><span style="color: red;">Location</span></h2>
                        <p>Quezon City</p>
                        <p>Makati City</p>
                        <P>Davao City</P>
                    </div>
                </div>
                <div class="col-md-9  wow fadeInRight animated">

                    <form class="contact-form" action="./siteManagementSystem/reservation.php" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="subject" style="color: rgb(255, 0, 0);">NAME:</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name...">
                                <label for="subject" style="color: red;">LOCATION:</label>
                                <input type="text" name="location" class="form-control" id="name" placeholder="Location...">
                                <label for="reserve-date" style="color: red;">RESERVE DATE: </label>
                                <input type="datetime-local" id="reserve-date" name="dateTime" style="margin-left: 10px;">
                            </div>
                            <div class="col-md-6">
                                <label for="message" style="color: red;">ADDITIONAL MESSAGE (OPTIONAL):</label>
                                <textarea class="form-control" id="message" rows="25" cols="10" placeholder="Message..." name="message"></textarea>
                                <input type="submit" class="btn btn-default submit-btn form_submit" name="submit" value="RESERVE NOW">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="work-with   wow fadeInUp animated">
                        <h3>looking forward to hearing from you!</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonial text-center wow fadeInUp animated" id="TESTIMONIAL">
        <div class="container">
            <div class="icon">
                <i class="icon-quote"></i>
            </div>

            <?php $carousel = count(displayReview()) > 1 ? 'class = "owl-carousel"' : ''; ?>
            <div <?= $carousel ?>>
                <?php foreach (displayReview() as $review) : ?>
                    <div class="single_testimonial text-center">
                        <p><?= $review['userReview'] ?></p>

                        <?php for ($i = 0; $i < $review['userRating']; $i++) : ?>
                            <span style="font-size:200%;color:red;">★</span>
                        <?php endfor; ?>
                        <?php for ($i = 0; $i < 5 - $review['userRating']; $i++) : ?>
                            <span style="font-size:200%;color:lightgray;">★</span>
                        <?php endfor; ?>

                        <h4><?= "-" . $review['user'] ?></h4>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if (count(displayReview()) == 0) : ?>
                <div>
                    <div class="single_testimonial text-center">
                        <p>Be the first one to review.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="write-a-review" style="margin-bottom: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="review-title">
                        <button class="btn btn-success" data-toggle="modal" data-target="#myReviewModal" style="background-color: red;">Write a Review</button>
                        <!-- Modal -->
                        <div class="modal fade" id="myReviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">

                                <form action="./siteManagementSystem/review.php" method="POST">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="reviewModalLabel">Let us hear your thoughts<i class="icon-pencil" style="margin-left: 20px;"></i></h4>

                                        </div>
                                        <!-- Modal Body -->
                                        <div class="modal-body">
                                            <input class="form-control" placeholder="Name" name="user" style="margin-bottom: 10px;">
                                            <textarea class="form-control" id="message" rows="10" cols="10" placeholder="Message..." name="userReview"></textarea>
                                        </div>
                                        <!-- Modal Footer -->
                                        <div class="modal-footer">
                                            <p style="display: inline-flex; margin-top: -50px;">Give us a rating: </p>

                                            <div class="star-rating" style="display: inline-flex; margin-right: 95px;">
                                                <input type="radio" id="star5" name="rating" value="5" onclick="rate('star5')" />
                                                <label for="star5" title="5 stars"></label>

                                                <input type="radio" id="star4" name="rating" value="4" onclick="rate('star4')" />
                                                <label for="star4" title="4 stars"></label>

                                                <input type="radio" id="star3" name="rating" value="3" onclick="rate('star3')" />
                                                <label for="star3" title="3 stars"></label>

                                                <input type="radio" id="star2" name="rating" value="2" onclick="rate('star2')" />
                                                <label for="star2" title="2 stars"></label>

                                                <input type="radio" id="star1" name="rating" value="1" />
                                                <label for="star1" title="1 star" onclick="rate('star1')"></label>
                                            </div>

                                            <!--Use for adding value in db-->
                                            <input type="text" id="ratingValue" value="" name="ratingValue" hidden>
                                            <button type="button" class="btn btn-default submit-btn form_submit" data-dismiss="modal" style="width: 20%;">Close</button>
                                            <input type="submit" name="submit" class="btn btn-default submit-btn form_submit" style="width: 25%;" value="Submit">
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- End Modal -->

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="fun_facts">
        <section class="header parallax home-parallax page" id="fun_facts" style="background-position: 200% -200px;">
            <div class="section_overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 wow fadeInLeft animated">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="single_count">
                                        <h3><span class="oswald-misc" style="color: red;">CHEFS</span></h3>
                                        <p>We have an excellent chef preparing and serving the most amaizing dishes.</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="single_count">
                                        <h3><span class="oswald-misc" style="color: red;">SERVER</span></h3>
                                        <p>We have an excellent team of personnel ready to cater your needs.</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="single_count">
                                        <h3><span class="oswald-misc" style="color: red;">MANAGEMENT</span></h3>
                                        <p>The Staff behind the scenes, of making sure KUSINA functions as a top-bistro on the map</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <section class="staff-gallery">
        <div class="col-md-4">
            <a href="#2" class="thumbnail">
                <img src="IMG/Personnel/462562995_1826443384831608_3042423347322807309_n.png">
            </a>
        </div>
        <div class="col-md-4">
            <a href="#2" class="thumbnail">
                <img src="IMG/Personnel/462562304_1565252521018745_9033962925732525254_n.png">
            </a>
        </div>
        <div class="col-md-4">
            <a href="#2" class="thumbnail">
                <img src="IMG/Personnel/521b4f22-a1bd-4570-a1f5-ba877461b207.jpg">
            </a>
        </div>
    </section>
    <section class="call_to_action">
        <div class="container">
            <div class="row">
                <div class="col-md-8 wow fadeInLeft animated">
                    <div class="left">
                        <h2>LOOKING FOR EXCLUSIVE DIGITAL SERVICES?</h2>
                        <p>Proin fringilla augue at maximus vestibulum. Nam pulvinar vitae neque et porttitor.
                            Integer non dapibus diam, ac eleifend lectus.</p>
                    </div>
                </div>
                <div class="col-md-3 col-md-offset-1 wow fadeInRight animated">
                    <div class="baton">
                        <a href="#CONTACT">
                            <button type="button" class="btn btn-primary cs-btn">Let's Talk</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-md-14 text-center">
                        <div class="footer_logo   wow fadeInUp animated">
                            <img src="IMG/Kusina Logo.png" alt="" style="margin-top: -100px; margin-bottom: -150px;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center   wow fadeInUp animated">
                        <div class="social" style="color: red;">
                            <h2>Copyright © 2024 Kusina. All Rights Reserved.</h2>
                        </div>
                        <div class="social">
                            <p>This website is a school project created for educational purposes only. All content, including text, images, and designs, is intended for demonstration and learning. Any resemblance to existing entities is purely coincidental. This website is not affiliated with or endorsed by any actual business named "Kusina."
                            </p>
                            <ul class="icon_list">
                                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                                <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- =========================
     SCRIPTS 
============================== -->


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/script.js"></script>

    <!--Separate js-->
    <script src="function.js"></script>

</body>

</html>