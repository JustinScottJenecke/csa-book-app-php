<?php
    // require "./src/includes/calculateDays.inc.php"
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require "../classes/Customer.class.php";
    require "../includes/createHotels.inc.php";
    require "../classes/Hotel.class.php";
    require "../classes/Booking.class.php";
    require "../includes/calculateDays.inc.php";

    $pageTitle = "Checkout";
    session_start();

    $hotelChoice;
 
    if (isset ($_POST['book'])) {

        // Create Hotels in hotel superglobal
        try {
            createHotels("../includes/hotelData.json");
        } catch (Exception $err) {
            echo "
                <script>
                    console.log('Server error in loading hotels.. ' + $err)
                </script>
            ";
        }

        // assign hotelChoice value of hotel chosen in form
        foreach ($_SESSION['hotels'] as $hotel) {
            if ($hotel->getName() == $_POST['choice']) {
                
                $hotelChoice = $hotel;
            }
        }

        // create booking entity
        try {
            $newBooking = new Booking(
                rand(1000,9000),
                $_SESSION['checkin'],
                $_SESSION['checkout'],
                $_SESSION['numDays'],
                $_POST['cost'],
                $hotelChoice->getName()
            );

        } catch (Exception $err) {
            echo "
                <script>
                    console.log('Server error creating booking. ' + $err)
                </script>
            ";
        }
    }

?>
<!--------------------------- Page -------------------->

<!DOCTYPE html>
<html lang="en">

    <?php 
        include_once "../templates/pageHead.php"; ?>
        <link rel="stylesheet" href="../../public/css/style.css">
    </head>
  
    <body>

        <div class="has-background-black">
            <h1 class="is-flex p-3 mb-2 is-justify-content-center has-text-white">
                Thank you for using our service <?php echo $_SESSION['user']->getFirstname() ?>..
            </h1>
            <h2 class="is-flex p-3 mb-2 is-justify-content-center has-text-white">
                Please ensure that all of the following details about your trip/booking are correct.
            </h2>
        </div>

        <div class="is-flex p-3 mb-2 is-justify-content-center is-flex-direction-column">
            <div class="columns is-justify-content-center">
                <div class="column is-flex">
                    <article class="message is-dark">
                        <div class="message-header">
                            <p>Customer Information</p>
                            <button class="delete" aria-label="delete"></button>
                        </div>
                        <div class="message-body">
                            <?php
                            echo '
                                <li> Customer No: #'.$_SESSION['user']->getId().'</li>
                                <li> Name: '.$_SESSION['user']->getFirstname() .' '. $_SESSION['user']->getLastname() .'</li>
                                <li> Email Address: '.$_SESSION['user']->getEmail().'</li>
                            ';
                            ?>
                        </div>
                    </article>
                </div>
                <div class="column is-flex">
                    <article class="message is-dark">
                        <div class="message-header">
                            <p>Hotel Information</p>
                            <button class="delete" aria-label="delete"></button>
                        </div>
                        <div class="message-body">
                            <?php
                            echo '
                                <li> Hotel Id: #'.$hotelChoice->getId().'</li>
                                <li> Hotel: '.$hotelChoice->getName().'</li>
                                <li> Daily Rate: R '.$hotelChoice->getRate().',00 </li>
                            ';
                            ?>
                        </div>
                    </article>
                </div>
                <div class="column is-flex">
                    <article class="message is-dark">
                        <div class="message-header">
                            <p>Booking Information</p>
                            <button class="delete" aria-label="delete"></button>
                        </div>
                        <div class="message-body">
                        <?php
                            echo '
                                <li> Booking No: #'.$newBooking->getId().'</li>
                                <li> Duration of stay: '.$newBooking->getDuration().'</li>

                                <p class="ml-5">- Start Date: '.$newBooking->getStartDate().'</p>
                                <p class="ml-5">- End Date: '.$newBooking->getEndDate().'</p>

                                <li> Total: R '.$newBooking->getCost().',00 </li>
                            ';
                            ?>
                        </div>
                    </article>
                </div>
            </div>
        </div>

        <div class="checkout">
            <h2>
                Your booking details will be sent to use via Email
            </h2>
            <button>
                Confirm Booking
            </button>
        </div>

    </body>
</html>