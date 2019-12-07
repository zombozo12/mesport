<?php

// include_once("conn/database.php");
require("controller/authbookController.php");

$request = $_SERVER['REQUEST_URI'];
$uriSegments = explode("/", parse_url($request, PHP_URL_PATH));
$numSegments = count($uriSegments);
$segment = $uriSegments[$numSegments - 1];

$auth = new authbookController();

switch ($segment) {

    case '' :
        include_once('views/home.php');
    break;

    case 'home' :
        include_once('views/home.php');
    break;

    case 'registbook' :
        include_once('views/registerbook.php');
        break;

    case 'registpemilik' :
        include_once('views/registerpemilik.php');
        break;
    case 'registerUser' :
        $auth->registerUser();
        break;
    case 'registerPemilik':
        $auth->registerPemilik();
         break;
    case 'loginUser':
        $auth->loginUser();
        break;
    case 'loginPemilik':
        $auth->loginPemilik();
        break;
    case 'logout':
        $auth->logout();
        break;
    default :
    echo '404 Not Found';
    break;
}
?>
