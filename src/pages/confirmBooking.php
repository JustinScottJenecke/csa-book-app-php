<?php
    // require "./src/includes/calculateDays.inc.php"
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $pageTitle = "Choose Hotel";
    session_start();

    require "../classes/Customer.class.php";
    require "../includes/createHotels.inc.php";
    require "../classes/Hotel.class.php";

    $pic = file_get_contents("../../public/resource/a.txt");

    var_dump( $pic );

    if (isset ($_POST['detailsSubmission'])) {
        
        // Create instance of Customer in user
        $_SESSION['user'] = new Customer(
            rand(1000,9000),
            $_POST['firstname'],
            $_POST['lastname'],
            $_POST['email']
        );
        
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

        <div class=" is-flex is-flex-direction-column content-section">
            <?php foreach ($_SESSION['hotels'] as $hotel) {
            echo '
                <div class="card m-5 box">
                    <div class="card-image">
                        <figure class="image is-4by3">
                        <img src="../../public/resource/'. $hotel->getThumbnail() .'" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="media">
                        <div class="media-content">
                            <p class="title is-4 has-text-centered">'. $hotel->getName() .'</p>
                        </div>
                        </div>

                        <div class="content">
                            <p>Number of days: 3</p>
                            <p>
                                Hotel Features:
                                <ul>
                                ';
                                foreach ($hotel->getFeatures() as $feature) {
                                    echo "<li>$feature</li>";
                                }
                                 echo '
                                </ul>
                            </p>
                            <p>Daily Rate: R '. $hotel->getRate() .',00</p>
                            <p> <u>Total Cost:</u> <b>R amt</b> 
                            </p>
                            <form action="./thank.php" method="post" class=" is-flex is-justify-content-center">
                                <input type="hidden" name="choice" value="'. $hotel->getName() .'">
                                <input class="button is-black" type="submit" name="book" value="Book">
                            </form>
                        </div>
                    </div>
                </div>
            ';
            } ?>
        </div>

    </body>
</html>