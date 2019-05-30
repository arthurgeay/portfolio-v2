<?php

require_once 'model/backend.php';

function menuAdmin() {
    if(!isset($_SESSION['email']) || !isset($_SESSION['password_hash'])) {
        header('Location: index.php?page=connect');
        exit();
    }


    if(isset($_POST['alt']) || isset($_POST['linkedin']) || isset($_POST['twitter']) || isset($_POST['github'])) {

        if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            if($_FILES['image']['size'] <= 100000) {
                $infosImg = pathinfo($_FILES['image']['name']);
                $extensionImgUploaded = $infosImg['extension'];
                $extensionAllowed = ['jpeg'];

                if(in_array($extensionImgUploaded, $extensionAllowed)) {
                    move_uploaded_file($_FILES['image']['tmp_name'], 'public/img/profile/profile.jpeg');
                } else {
                    $_SESSION['error'] = 'Le format de fichier accepté est le .jpeg uniquement';
                }
            } else {
                $_SESSION['error'] = 'La taille de votre image ne doit pas dépasser les 100 Ko';
            }
        }

        if(!isset($_SESSION['error'])) {
            updateMenuInfo($_POST['alt'], $_POST['linkedin'], $_POST['twitter'], $_POST['github']);
            $_SESSION['success'] = 'Vos modifications ont été prise en compte';
        }

        header('Location: index.php?page=menu');
        exit();
    }
    $info = getMenuInfo();

    require_once 'view/backend/adminNavView.php';
}

function logout() {
    unset($_SESSION['email']);
    unset($_SESSION['password_hash']);
    header('Location: index.php?page=connect');
    exit();
}
