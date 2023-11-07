<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
//sanitiser
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nameErr = $firstnameErr = $genderErr = $emailErr = $countryErr = $subjectsErr = "";
$name = $firstname = $gender = $email = $country = $subjects = $message = "";

//vérifier que le formulaire a été soumis en utilisant la méthode POST.
if ($_SERVER["REQUEST_METHOD"] === "POST") {


    //NAME
    // si variable existe
    if (isset($_POST['name'])) {
        //sanitiser
        $name = test_input($_POST["name"]);
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
        $firstname = test_input($_POST["firstname"]);
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
        $gender = test_input($_POST['gender']);
        //si validation échoue, afficher message d'erreur
    } else {
        $genderErr = 'Gender is required';
    }

    //EMAIL
    //si variable existe 
    if (isset($_POST['email'])) {
        //sanitiser
        $email = test_input($_POST["email"]);
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
        $country = test_input($_POST["country"]);
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
        $subject = test_input($_POST['subject']);
        //si validation échoue, afficher message d'erreur
    } else {
        $subjectErr = 'subject is required';
    }


    //MESSAGE
    //si variable existe
    if (isset($_POST['message'])) {
        //sanitiser
        $message = test_input($_POST['message']);
    }



    // Si toutes les données sont valides, vous pouvez envoyer un e-mail
    if ($nameErr === "" && $firstnameErr === "" && $genderErr === "" && $emailErr === "" && $countryErr === "") {
        // Redirection vers la page de remerciement
        header("Location: merci.html");
    }
}


        // $to = "lili-p@hotmail.com";
        // $subject = "Nouveau formulaire soumis";
        // $message = "Nom: $name\nPrénom: $firstname\nGenre: $gender\nE-mail: $email\nPays: $country\nSujet: $subject\nMessage: $message";
        // if (mail($to, $subject, $message)) {
        // } else {
        //     echo "Désolé, une erreur s'est produite lors de l'envoi de l'e-mail.";
        // }