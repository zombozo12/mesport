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

    //PROFILE
    case 'profileUser':
        session_start();
        if(!isset($_SESSION['role'])){
            header('Location: home');
            return;
        }

        if($_SESSION['role'] != 'user'){
            header('Location: home');
            return;
        }

        include_once('views/profileUser.php');
        break;
    case 'uProfileUser':
        $auth->updateProfileUser();
        break;

    case 'profilePemilik':
        session_start();
        if(!isset($_SESSION['role'])){
            header('Location: home');
            return;
        }

        if($_SESSION['role'] != 'pemilik'){
            header('Location: home');
            return;
        }

        include_once('views/profilePemilik.php');
        break;
    case 'uProfilePemilik':
        $auth->updateProfilePemilik();
        break;
    //END PROFILE

    //LIST LAPANGAN PEMILIK
    case 'listPemilik':
        break;

    //HISTORY Pemilik
    case 'historyPemilik':
        break;

    //PESANAN MASUK
    case 'pesananPemilik':
        break;

    //REGISTRATION
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
    //END REGISTRATION

    //LOGIN
    case 'loginUser':
        $auth->loginUser();
        break;
    case 'loginPemilik':
        $auth->loginPemilik();
        break;
    //END LOGIN

    //LOGOUT
    case 'logout':
        $auth->logout();
        break;
    default :
        echo '404 Not Found';
        break;
}
?>
