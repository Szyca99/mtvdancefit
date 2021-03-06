<?php
include './includes/dbh.inc.php';
// session_destroy();
session_start();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTV Dance Fit </title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./galleryStyle1.css">
    <link rel="stylesheet" href="./galleryUploadStyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="icon" href="./Images/favicon.ico">
    <!-- News Slider -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-1.12.4.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js" crossorigin="anonymous"></script>
    <!--End of News Slider -->

    <!-- Social Media Section -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Social Media Section -->

    <!-- Galerry Section  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

    <!-- Galerry Section  -->
</head>



<body class="custom-background">

    <!-- Navbar Section -->
    <nav class="navbar">
        <div class="navbar__container">
            <a href="./index.html" id="navbar__logo">MTV DANCE FIT</a>
            <div class="navbar__toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="navbar__menu">
                <li class="navbar__item">
                    <a href="./index.html" class="navbar__links" id="home-page">Strona g????wna</a>
                </li>

                <li class="navbar__item">
                    <a href="./aboutUs.html" class="navbar__links" id="about-page">O nas</a>
                </li>

                <li class="navbar__item">
                    <a href="./services.html" class="navbar__links" id="services-page">Oferta</a>
                </li>

                <li class="navbar__btn">
                    <a href="./gallery.html" class="navbar__links" id="services-page">Galeria</a>
                </li>

                <li class="navbar__btn">
                    <a href="./contact.html" class="navbar__links" id="services-page">Kontakt</a>
                </li>

                <li class="navbar__btn">
                    <a href="./login.php" class="button" id="signup">Zaloguj</a>
                </li>

                <?php

                if (isset($_SESSION['username'])) {
                    echo   '<li class="navbar__btn">
                    <a href="./login.php" class="navbar__links" name="logout" id="services-page">Wyloguj si?? </a>
                </li>';
                    if (isset($_POST['logout'])) {
                        session_destroy();
                    }
                }
                ?>
            </ul>
        </div>
    </nav>
    <!-- Animation navbar in js  -->
    <script src="./navMenu.js"></script>
    <!--End of Navbar Section -->
    <!-- Searching Section  -->

    <!-- Searching Section  -->


    <!-- Gallery Section   -->
    <div class="container-fluid">
        <div class="gallery-title">
            <h2>Galeria</h2>
        </div>
        <div class="cointainer-search">
            <div class="row">
                <div class="col-md-12 search">
                    <form class="search-form" method="POST">
                        <?php
                        if (isset($_POST['search'])) {

                            if (isset($_POST['date-order'])) {
                                $valueToSearch = $_POST['valueToSearch'];
                                $dateOrder = $_POST['date-order'];
                                echo '<p style="color:white;" > Szukana fraza to:    ' . $valueToSearch . ' <br> Sortuje od:  ' . $dateOrder . ' </p>';
                            } elseif (isset($_POST['date-from']) && isset($_POST['date-to'])) {
                                echo '<p style="color:white;" > Sortuje od :    ' . $_POST['date-from'] . ' do:  ' . $_POST['date-to'] . ' </p>';
                            } else {
                                $valueToSearch = $_POST['valueToSearch'];
                                echo '<p style="color:white;" > Szukana fraza to:    ' . $valueToSearch . ' </p>';
                            }
                        }
                        ?>
                        <input type="text" name="valueToSearch" placeholder="Szukaj" class="form-control"><br>
                        <input type="submit" name="search" value="Szukaj" class="btn btn-primary submit">
                        <a href="./gallery.php" class="btn btn-light">Wyczy????</a>
                        <div class="sorting">
                            <div class="checkbox">
                                Sortuj od: <br>
                                <input type="radio" name="date-order" value="najnowsze" id="new-one">
                                <label for="new-one">Najnowszy</label><br>
                                <input type="radio" name="date-order" value="najstarsze" id="old-one">
                                <label for="old-one">Najstarszy</label>
                            </div>
                            <div class="from-to">
                                Sortuj <br>
                                Od: <input type="date" name="date-from" id="date-start"><br>
                                Do: <input type="date" name="date-to" id="date-end">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>










        <div class="row mt-3">

            <?php

            // if (isset($_POST['clear-search'])) {
            //     $query = "SELECT * FROM `gallery`";
            //     $search_result = filterTable($query);
            // }

            if (isset($_POST['search'])) {
                $valueToSearch = $_POST['valueToSearch'];
                if (isset($_POST['date-order'])) {
                    $dateOrder = $_POST['date-order'];
                    // search in all table columns
                    // using concat mysql function
                    if ($dateOrder == 'najnowsze') {
                        $query = "SELECT * FROM `gallery` WHERE CONCAT(`titleGallery`, `descGallery`) LIKE '%" . $valueToSearch . "%' ORDER BY dateFoto DESC";
                        $search_result = filterTable($query);
                    } elseif ($dateOrder == 'najstarsze') {
                        $query = "SELECT * FROM `gallery` WHERE CONCAT(`titleGallery`, `descGallery`) LIKE '%" . $valueToSearch . "%' ORDER BY dateFoto ";
                        $search_result = filterTable($query);
                    }
                }  elseif (date($_POST['date-from'])) {
                    $dateFrom = $_POST['date-from'];
                    $dateTo = $_POST['date-to'];
    
                    $query = "SELECT * FROM `gallery` WHERE dateFoto > '$dateFrom' and dateFoto < '$dateTo' ORDER BY dateFoto ";
                    // $query = "SELECT * FROM `gallery` WHERE dateFoto >'2020-02-02'";
                    $search_result = filterTable($query);
                } else {
                    $query = "SELECT * FROM `gallery` WHERE CONCAT(`titleGallery`, `descGallery`) LIKE '%" . $valueToSearch . "%' ORDER BY orderGallery DESC";
                    $search_result = filterTable($query);
                }

               
            } else {
                $query = "SELECT * FROM `gallery` ORDER BY orderGallery DESC";
                $search_result = filterTable($query);
            }


           

            // function to connect and execute the query
            function filterTable($query)
            {
                include './includes/dbh.inc.php';
                $filter_Result = mysqli_query($conn, $query);
                return $filter_Result;
            }

            ?>

            <!-- populate table from mysql database -->
            <?php while ($row = mysqli_fetch_array($search_result)) :


                echo '<div class=" col-sm-6 col-md-3 mb-3 item">
                ' . $row["dateFoto"] . '
                            <a href="./Images/gallery/' . $row["imgFullNameGallery"] . '"; class="fancybox" data-fancybox="gallery1">
                        <img src="./Images/gallery/' . $row["imgFullNameGallery"] . '" width="100%" height="100%" alt="">
                        <h3>' . $row["titleGallery"] . '</h3>
                        <p> ' . $row["descGallery"] . '</p> 
                    </a>
                </div>';
            endwhile;
            ?>




        </div>

        <!-- Gallery Section   -->



        <!-- Upload Section  -->
        <?php
        if (isset($_SESSION['username'])) {
            if ($_SESSION['username'] == 'Admin') {
                echo '<div class="gallery-upload">
        <h2>Upload Image</h2>
        <form action="./includes/gallery-upload.inc.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="filename" placeholder="File name...">
            <input type="text" name="filetitle" placeholder="Image title...">
            <input type="text" name="filedesc" placeholder="Image description...">
            <input type="date" name="dateFoto">
            <input type="file" name="file">
            <button type="submit" name="submit">UPLOAD</button>
        </form>
        </div>';
            }
        }

        ?>
        <!-- End of upload Section  -->

    </div>

    <!-- Footer Section  -->
    <footer>
        <div class="footer__container">
            <div class="footer__about-us">
                <h2>O nas</h2>
                <p>Jeste??my szko???? ta??ca zajmuj??c?? si?? prowadzeniem zaj???? tanecznych w przedszkolach oraz r????nego
                    rodzaju
                    wydarzeniach i eventach, na terenie tr??jmiasta i okolic. Mamy wieloletnie do??wiadczenie oraz
                    wyszkolony
                    pe??en energii zesp???? instruktor??w.</p>
                <ul class="footer__social">
                    <li><a href="https://www.facebook.com/mtvdancefit"><i class="fa fa-facebook" target="_blank" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.instagram.com/mtvdancefit/"><i class="fa fa-instagram" target="_blank" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UCykfndUaOUGcUyC-YJKGbQg" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <div class="quick-links">
                <h2>Przydatne linki</h2>
                <ul>
                    <li><a href="./contact.html">Kontakt</a></li>
                    <li><a href="./aboutUs.html">O nas</a></li>
                    <li><a href="./services.html">Oferta</a></li>
                    <li><a href="./gallery.html">Galeria</a></li>
                </ul>
            </div>
            <div class="footer__contact">
                <h2>Kontakt</h2>
                <ul class="info">
                    <li>
                        <span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                        <span>Tr??jmiasto (Gda??sk, Gdynia, Sopot) <br>
                            oraz okolice</span>
                    </li>
                    <li>
                        <span><i class="fa fa-phone" aria-hidden="true"></i></span>
                        <!-- <span>+48 537 591 864</span> -->
                        <p><a href="tel: +48 537 591 864">+48 537 591 864</a></p>
                    </li>
                    <li>
                        <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        <!-- <span>mtvdancefit@wp.pl</span> -->
                        <p><a href="mailto: mtvdancefit@wp.pl">mtvdancefit@wp.pl</a></p>

                    </li>
                </ul>

            </div>
        </div>
    </footer>

    <div class="copyright">
        <p>Copyrights ?? 2021 MTVDanceFit. Wszystkie prawa zastrze??one.</p>
    </div>


    <!-- End of Footer Section  -->

</body>

</html>