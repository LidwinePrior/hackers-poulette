<?php
require_once('./sanitisation.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/scss/style.css">

    <title>Document</title>
</head>

<body>
    <div class="thanks">
        <h1>Thank you</h1>
        <h3>Your email has been sent successfully</h3>
    </div>
    <div class="print">
        <h4>Summary</h4>
        <?php
        echo '<pre>';
        print_r("Name:" . $name);
        echo '</pre>';
        echo '<pre>';
        print_r("Firstname:" . $firstname);
        echo '</pre>';
        echo '<pre>';
        print_r("Gender:" . $gender);
        echo '</pre>';
        echo '<pre>';
        print_r("Email:" . $email);
        echo '</pre>';
        echo '<pre>';
        print_r("Country:" . $country);
        echo '</pre>';
        echo '<pre>';
        print_r("Subject:" . $subject);
        echo '</pre>';
        echo '<pre>';
        print_r("Message:" . $message);
        echo '</pre>';

        ?>
    </div>
</body>

</html>