<?php

require_once 'model/frontend.php';
require_once 'model/backend.php';
require_once 'utils/upload.php';

function logout() {
    unset($_SESSION['email']);
    unset($_SESSION['password_hash']);
    header('Location: index.php?page=connect');
    exit();
}

function menuAdmin() {
    if(!isset($_SESSION['email']) || !isset($_SESSION['password_hash'])) {
        header('Location: index.php?page=connect');
        exit();
    }


    if(isset($_POST['alt']) || isset($_POST['linkedin']) || isset($_POST['twitter']) || isset($_POST['github'])) {

        if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            upload($_FILES['image'], 100000, ['jpeg'], 'public/img/profile/profile.jpeg');
        }

        if(!isset($_SESSION['error'])) {
            updateMenuInfo($_POST['alt'], $_POST['linkedin'], $_POST['twitter'], $_POST['github']);
            $_SESSION['success'] = 'Vos modifications ont été prise en compte';
        }

        header('Location: index.php?page=menu');
        exit();
    }
    $info = getHeaderInfo();

    require_once 'view/backend/adminNavView.php';
}

function aboutAdmin() {

    if(!isset($_SESSION['email']) || !isset($_SESSION['password_hash'])) {
        header('Location: index.php?page=connect');
        exit();
    }

    if(isset($_POST['fullname']) || isset($_POST['birthday']) || isset($_POST['city']) || isset($_POST['email']) || isset($_POST['phone']) || isset($_POST['hobbies']) || isset($_POST['current_job']) || isset($_POST['description'])) {

        if(isset($_FILES['cv']) && $_FILES['cv']['error'] == 0) {
            upload($_FILES['cv'], 1000000, ['pdf'], 'public/download/CV.pdf');
        }

        if(!isset($_SESSION['error'])) {
            updateAbout($_POST['fullname'], $_POST['birthday'], $_POST['city'], $_POST['email'], $_POST['phone'], $_POST['hobbies'], $_POST['current_job'], $_POST['description']);
            $_SESSION['success'] = 'Vos modifications ont été prise en compte';

        }

        header('Location: index.php?page=about');
        exit();
    }

    $about = getAbout(true);

    require_once 'view/backend/adminAboutView.php';
}
