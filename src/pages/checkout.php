<?php
    // require "./src/includes/calculateDays.inc.php"
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $pageTitle = "Checkout";
    session_start();


    require "../classes/Customer.class.php";
    require "../includes/createHotels.inc.php";
    require "../classes/Hotel.class.php";
    require "../includes/calculateDays.inc.php";

 
    if (isset ($_POST['detailsSubmission'])) {
        
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

        // calculate duration of trip
        try {
            $numDays = calculateDays( $_POST['checkin'], $_POST['checkout'] );
        } catch (Exception $err) {
            echo "
                <script>
                    console.log('Server error when calculating length of stay.. ' + $err)
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
                Welcome <?php echo $_SESSION['user']->getFirstname() ?> !
            </h1>
            <h2 class="is-flex p-3 mb-2 is-justify-content-center has-text-white">
                You are one step away from your vacation. The last thing you need to do is choose which hotel you wish stay at.
            </h2>
        </div>

    </body>
</html>