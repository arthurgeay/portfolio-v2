<?php

require_once 'model/backend.php';

function menuAdmin() {
    if(!isset($_SESSION['email']) || !isset($_SESSION['password_hash'])) {
        header('Location: index.php?page=connect');
        exit();
    }

    if(isset($_POST['alt']) || isset($_POST['linkedin']) || isset($_POST['twitter']) || isset($_POST['github'])) {
        updateMenuInfo($_POST['alt'], $_POST['linkedin'], $_POST['twitter'], $_POST['github']);
        $_SESSION['success'] = 'Vos modifications ont été prise en compte';
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
