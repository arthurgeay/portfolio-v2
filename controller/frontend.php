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

        $to = htmlentities($about['email_about']);
        $firstname = htmlentities($_POST['firstname']);
        $email = htmlentities($_POST['email']);
        $message = htmlentities($_POST['message']);
        $headers = 'From: '. $email . "\r\n" .
            'Reply-To: '.$email . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        if(mail($to, 'Formulaire de contact', $message, $headers)) {
            echo 'ok';
        }
    }




    require_once 'view/frontend/homeView.php';
}