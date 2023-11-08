<?php
//function sanitiser
function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nameErr = $firstnameErr = $genderErr = $emailErr = $countryErr = $subjectErr = "";
$name = $firstname = $gender = $email = $country = $subject = $message = "";

//vérifier que le formulaire a été soumis en utilisant la méthode POST.
if ($_SERVER["REQUEST_METHOD"] === "POST") {


    //NAME
    // si variable existe
    if (isset($_POST['name'])) {
        //sanitiser
        $name = sanitize($_POST["name"]);
        //vérifier si il est vide avec empty()
        //Si la validation échoue, afficher un message d'erreur
        if (empty($name)) {
            $nameErr =  'Name is required';
            //utiliser la fonction preg_match() avec une expression régulière pour vérifier que le nom ne contient que des lettres et des espaces.
            //Si la validation échoue, afficher un message d'erreur
        } elseif (!preg_match('/^[a-zA-Z ]+$/', $name)) {
            $nameErr =  'Only letters and white space allowed';
        }
    }


    //FIRSTNAME
    //si variable existe
    if (isset($_POST['firstname'])) {
        //sanitiser avec la function test_input
        $firstname = sanitize($_POST["firstname"]);
        //vérifier si il est vide avec empty(). 
        //Si la validation échoue, afficher un message d'erreur
        if (empty($firstname)) {
            $firstnameErr = 'Firstname is required';
            //utiliser la fonction preg_match() avec une expression régulière pour vérifier que le nom ne contient que des lettres et des espaces.
            //Si la validation échoue, afficher un message d'erreur
        } elseif (!preg_match('/^[a-zA-Z -]+$/', $firstname)) {
            $firstnameErr = 'Only letters and white space allowed';
        }
    }

    //GENDER
    //si variable existe
    if (isset($_POST['gender'])) {
        //sanitiser
        $gender = sanitize($_POST['gender']);
        //si validation échoue, afficher message d'erreur
    } else {
        $genderErr = 'Gender is required';
    }

    //EMAIL
    //si variable existe 
    if (isset($_POST['email'])) {
        //sanitiser
        $email = sanitize($_POST["email"]);
        //valider l'adresse e-mail en utilisant le filtre FILTER_VALIDATE_EMAIL
        if (empty($_POST["email"])) {
            // L'adresse e-mail est valide
            $emailErr = "Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // L'adresse e-mail est invalide, afficher message d'erreur.
            $emailErr = "Invalid format";
        }
    }


    //COUNTRY
    //si variable existe
    if (isset($_POST['country'])) {
        //sanitiser
        $country = sanitize($_POST["country"]);
        //vérifier si il est vide avec empty(). 
        //Si la validation échoue, afficher un message d'erreur
        if (empty($country)) {
            $countryErr = 'Country is required';
            //utiliser la fonction preg_match() avec une expression régulière pour vérifier que le nom ne contient que des lettres et des espaces.
            //Si la validation échoue, afficher un message d'erreur
        } elseif (!preg_match('/^[a-zA-Z ]+$/', $country)) {
            $countryErr = 'Only letters and white space allowed';
        }
    }

    //SUBJECT
    if (isset($_POST['subject'])) {
        //alors $subject prend la valeur de $_POST['subject']
        $subject = sanitize($_POST['subject']);
        //si validation échoue, afficher message d'erreur
    } else {
        $subjectErr = 'subject is required';
    }


    //MESSAGE
    //si variable existe
    if (isset($_POST['message'])) {
        //sanitiser
        $message = sanitize($_POST['message']);
    }



    // Si toutes les données sont valides, vous pouvez envoyer un e-mail
    if ($nameErr === "" && $firstnameErr === "" && $genderErr === "" && $emailErr === "" && $countryErr === "") {
        // Redirection vers la page de remerciement
        header("Location: merci.php");

        $to = "admin@wampserver.invalid";
        $subject = "New form submited";
        $message = "Name: $name\nFirstname: $firstname\nGender: $gender\nE-mail: $email\nCountry: $country\nSubject: $subject\nMessage: $message";
        if (mail($to, $subject, $message)) {
        } else {
            echo "Désolé, une erreur s'est produite lors de l'envoi de l'e-mail.";
        }
    }
}
