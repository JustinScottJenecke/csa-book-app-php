<!-- ============================ Setup ================================= -->

<?php

    $pageTitle = "Create Booking";

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

?>

<!-- ============================ Page ================================= -->
<!DOCTYPE html>
<html lang="en">

    <?php
        require_once "../src/templates/pageHead.php"; ?>
        <link rel="stylesheet" href="./css/style.css">
    </head>
  
    <body>
        <header id="hero" class="hero is-flex is-flex-direction-column is-justify-content-center">

            <h1 class="has-text-white p-3 mb-2">
                OOP Booking App
            </h1>
            <h2 class="has-text-white p-3 mt-2">
                Your one-stop-shop for hotels and booking options
            </h2>

        </header>

        <div class="container p-5 mt-2">
            <h3>
                Help us help you to find your next holiday destination by filling in the form below
            </h3>
        </div>

        <form class="box is-flex is-flex-direction-column" action="../src/pages/confirmBooking.php" method="post">

            <div class="booking-form">
                <div class="box is-flex is-flex-direction-column">
                    <label class="has-background-black has-text-white p-2 my-1">
                        <h3>
                            Customer Details
                        </h3>
                    </label>
                    <input class="p-2 my-1" type="text" name="firstname" required placeholder="Name..">
                    <input class="p-2 my-1" type="text" name="lastname" required placeholder="Surname..">
                    <input class="p-2 my-1" type="email" name="email" required placeholder="Email Address..">
                </div>

                <div class="box is-flex is-flex-direction-column">
                    <label class="has-background-black has-text-white p-2 my-1">
                        <h3>
                            Booking Details
                        </h3>
                    </label>
                    <div class="date-grid">
                        <span class="p-2 my-1">Check-In Date</span>
                        <input class="p-2 my-1" type="date" name="checkin" required id="">
                        <span class="p-2 my-1">Check-Out Date</span>
                        <input class="p-2 my-1" type="date" name="checkout" required id="">
                    </div>
                </div>
            </div>

            <input class="button is-black mt-4 mx-6" type="submit" name="detailsSubmission" value="Submit">

        </form>

    </body>

</html>