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

    case 'cariLapangan':
        $auth->cariLapangan();
        break;
    case 'listLapangan':
        include_once "views/listLapangan.php";
        break;
    case 'bookLapangan':
        $auth->bookLapangan();
        break;

    case 'historyUser':
        include_once 'views/historyUser.php';
        break;
    case 'historyPemilik':
        include_once 'views/historyPemilik.php';
        break;

    case 'pesananPemilik':
        include_once 'views/pesananPemilik.php';
        break;

    //LAPANGAN PEMILIK
    case 'listPemilik':
        include_once "views/listPemilik.php";
        break;
    case 'tambahLapangan':
        include_once 'views/tambahLapangan.php';
        break;
    case 'tLapanganProses':
        $auth->tambahLapangan();
        break;
    case 'uLapangan':
        $auth->updateLapangan();
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
