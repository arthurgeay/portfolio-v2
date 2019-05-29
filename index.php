<?php
session_start();

require_once 'controller/frontend.php';

$page = (isset($_GET['page'])) ? $_GET['page'] : 'home';

switch($page) {
    case 'home':
        home();
        break;

}