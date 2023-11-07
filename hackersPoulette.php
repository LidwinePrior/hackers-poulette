<?php
require_once('./sanitisation.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/scss/style.css">
    <script src="https://kit.fontawesome.com/ceda9163bb.js" crossorigin="anonymous"></script>
    <title>Hackers Poulette</title>
</head>

<body>
    <header>
        <img src="./assets/img/hackers-poulette-logo.png" alt="logo hackers poulette">
    </header>

    <main>

        <p><span class=" error">* required field</span></p>

        <form method="POST" action="">

            <fieldset class="identity">
                <legend>Identity</legend>
                <label for="name">Name: </label>
                <input id="name" type="text" name="name" value="<?php echo $name; ?>">
                <span class="error">*<?php echo $nameErr; ?></span>
                <label for="firstname">Firstname: </label>
                <input id="firstname" type="text" name="firstname" value="<?php echo $firstname; ?>">
                <span class="error">*<?php echo $firstnameErr; ?></span>
            </fieldset>

            <fieldset class="gender">
                <legend>Gender</legend>

                <input id="genderF" type="radio" name="gender" value="female" <?php if (isset($gender) && $gender == "female") echo "checked"; ?>>
                <label for="genderF">Female</label>

                <input id="genderM" type="radio" name="gender" value="male" <?php if (isset($gender) && $gender == "male") echo "checked"; ?>>
                <label for="genderM">Male</label>

                <input id="genderO" type="radio" name="gender" value="other" <?php if (isset($gender) && $gender == "other") echo "checked"; ?>>
                <label for="genderO">Other</label>

                <span class="error">*<?php echo $genderErr; ?></span>
                <br>
            </fieldset>

            <fieldset class="contact">
                <legend>Contact details</legend>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>">
                <span class="error">*<?php echo $emailErr; ?></span>
                <label for="country">Country:</label>
                <input id="country" type="text" name="country" value="<?php echo $country; ?>">
                <span class="error">*<?php echo $countryErr; ?></span>
            </fieldset>

            <fieldset class="subject">
                <legend>Subject</legend>
                <label for="subjects">what do you need? <span class="error">*<?php echo $subjectsErr; ?></span></label>

                <select id="subjects" name="subjects">

                    <option value="">Others</option>
                    <option value="afterSale">After sales service</option>
                    <option value="default">Manufacturing defect</option>
                    <option value="delivery">delivery time</option>
                </select>

                <label for="message">Tell me:</label>
                <textarea id="message" name="message" value="<?php echo $message; ?>"></textarea>
                <br>
            </fieldset>
            <div class="button">
                <i class="fa-solid fa-paper-plane" style="color: #97feed;"></i>
                <input id="button" type="submit" name="action" value="send">
            </div>
        </form>
    </main>
</body>

</html>