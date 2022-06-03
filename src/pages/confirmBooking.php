<?php
    // enables errr messages
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);

    // require "./src/includes/calculateDays.inc.php";

    $pageTitle = "Choose Hotel";

    if (isset ($_POST['detailsSubmission'])) {
        
        session_start();

        $_SESSION['userInfo'] = [];

        // save only personal data to user session
        array_push( $_SESSION['userInfo'], $_POST['firstname']);
        array_push( $_SESSION['userInfo'], $_POST['lastname']);
        array_push( $_SESSION['userInfo'], $_POST['email']);

        var_dump($_SESSION['userInfo']);
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


        <div class="hero-text">
            <h1 class="p-3 mb-2">
                Welcome <?php echo $_SESSION['userInfo'][0] ?> !
            </h1>
            <h2 class="p-3 mt-2">
                You are one step away from your vacation. The last thing you need to do is choose which hotel you wish stay at.
            </h2>
        </div>

        <div class="box is-flex is-flex-direction-column">

        

        </div>

    </body>
</html>