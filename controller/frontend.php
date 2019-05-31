<?php

require_once 'model/frontend.php';

function home() {
    $headerInfo = getHeaderInfo();
    $about = getAbout();
    $experiencesPro = getProfessionnalExperience();
    $formations = getEducationExperience();
    $skills = getSkills();
    $projects = getProjects();
    $contactMessage = getContentContact();

    if(isset($_POST['contact-form'])) {
        if(empty($_POST['firstname']) || empty($_POST['email']) || empty($_POST['message'])) {
            $_SESSION['error'] = 'Vous devez remplir tous les champs !';
        }

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'Veuillez saisir une adresse e-mail valide';
        }

        if(!isset($_SESSION['error'])) {
            $to = htmlentities($about['email_about']);
            $firstname = htmlentities($_POST['firstname']);
            $email = htmlentities($_POST['email']);
            $content = htmlentities($_POST['message']);
            $message = "Prénom de l'expéditeur : ".$firstname."\r\n\r\n";
            $message .= 'Message : '.$content;
            $headers = 'From: '. $email . "\r\n" .
                'Reply-To: '.$email . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            if(mail($to, 'Formulaire de contact - Portfolio Arthur Geay', $message, $headers)) {
                addMessage($firstname, $email, $content);
                $_SESSION['success'] = 'Votre email a bien été envoyé. Vous recevrez une réponse dans quelques jours.';
            }
        }
    }

    require_once 'view/frontend/homeView.php';
}

function connect() {
    if(isset($_SESSION['email']) && isset($_SESSION['password_hash'])) {
        header('Location: index.php?page=menu');
        exit();
    }
    /* Inscription */
    if (isset($_GET['action']) && $_GET['action'] == 'firstConnect' && isset($_POST['register'])) {

        if (empty($_POST['email']) || empty($_POST['password'])) {
            $_SESSION['error'][] = 'Vous devez remplir tous les champs';
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'][] = 'Veuillez saisir une adresse e-mail valide';
        }

        if(getUser()) {
            $_SESSION['error'][] = 'Vous ne pouvez pas vous inscrire car un compte administrateur existe déjà';
        }

        if (!isset($_SESSION['error'])) {
            registerUser($_POST['email'], $_POST['password']);
            $_SESSION['success'] = 'Votre compte administrateur a bien été créé. Vous pouvez désormais vous connecter.';
            header('Location: index.php?page=connect');
            exit();
        }
    }

    /* Connexion */
    if (isset($_POST['connect'])) {
        if (empty($_POST['email']) || empty($_POST['password'])) {
            $_SESSION['error'][] = 'Vous devez remplir tous les champs';
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'][] = 'Veuillez saisir une adresse e-mail valide';
        }

        $emailExist = emailExist(htmlentities($_POST['email']));
        $passwordExist = password_verify($_POST['password'], $emailExist['password_user']);

        if(!$emailExist || !$passwordExist) {
            $_SESSION['error'][] = 'Votre addresse e-mail ou votre mot de passe est incorrect';
        }

        if(!isset($_SESSION['error'])) {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password_hash'] = $emailExist['password_user'];

            header('Location: index.php?page=menu');
            exit();
        }

    }

    require_once 'view/frontend/connexionView.php';
}