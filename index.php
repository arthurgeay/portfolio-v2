<?php
session_start();

require_once 'controller/frontend.php';
require_once 'controller/backend.php';

$page = (isset($_GET['page'])) ? $_GET['page'] : 'home';

switch($page) {
    case 'home':
        home();
        break;
    case 'connect':
        connect();
        break;
    case 'logout':
        logout();
        break;
    case 'menu':
        menuAdmin();
        break;
    case 'about':
        aboutAdmin();
        break;


}