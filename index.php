<?php 
//Main Controller

session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
}

require_once $_SERVER['DOCUMENT_ROOT'].'/model/mainModel.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/model/accountsModel.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/model/ordersModel.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/model/productsModel.php';

switch ($action){
    case 'blurb':
        include $_SERVER['DOCUMENT_ROOT'].'/views/about.php';
        break;
    case 'contact':
        include $_SERVER['DOCUMENT_ROOT'].'/views/contact.php';
        break;
    case 'message':
        $userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
        $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
        $userMessage = filter_input(INPUT_POST, 'userMessage', FILTER_SANITIZE_STRING);
        break;
    default:
        include $_SERVER['DOCUMENT_ROOT'].'/views/home.php';
}
?>