<?php 
//Accounts Controller

session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
}

require_once $_SERVER['DOCUMENT_ROOT'].'/library/connections.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/model/mainModel.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/model/accountsModel.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/model/ordersModel.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/model/productsModel.php';

switch ($action){
    case 'registrationPage':
        include $_SERVER['DOCUMENT_ROOT'].'/views/registration.php';
        break;
    case 'login':
        $userEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_EMAIL);
        $userPassword = filter_input(INPUT_POST, 'userPassword', FILTER_SANITIZE_STRING);
        $userEmail = checkEmail($userEmail);
        $checkPassword = checkPassword($userPassword);
        if (empty($userEmail) || empty($userPassword)){
            $_SESSION['message'] = '<p>Please provide information for all empty for fields.</p>';
            include '../views/login.php';
        }
        $userData = getUser($userEmail);

        if ($userData){
            $hashCheck = password_verify($userPassword, $userData['userPassword']);
            if(!$hashCheck){
                $_SESSION['message'] = '<p>Please check your password and try again.</p>';
                include '../views/login.php';
            }
            $_SESSION['loggedin'] = TRUE;
            array_pop($userData);
            $_SESSION['userData'] = $userData;
            Header ('Location: /accounts/index.php/?action=admin');
            break;
        }
    case 'register':
        $userFirstName = filter_input(INPUT_POST, 'userFirstName', FILTER_SANITIZE_STRING);
        $userLastName = filter_input(INPUT_POST, 'userLastName', FILTER_SANITIZE_STRING);
        $userAddress = filter_input(INPUT_POST, 'userAddress', FILTER_SANITIZE_STRING);
        $userCity = filter_input(INPUT_POST, 'userCity', FILTER_SANITIZE_STRING);
        $userState = filter_input(INPUT_POST, 'userState', FILTER_SANITIZE_STRING);
        $userZip = filter_input(INPUT_POST, 'userZip', FILTER_SANITIZE_NUMBER_INT);
        $userEmail = filter_input(INPUT_POST, 'userEmail', FILTER_VALIDATE_EMAIL);
        $confirmUserEmail = filter_input(INPUT_POST, 'confirmUserEmail', FILTER_VALIDATE_EMAIL);
        $userPassword = filter_input(INPUT_POST, 'userPassword', FILTER_SANITIZE_STRING);
        $confirmUserPassword = filter_input(INPUT_POST, 'confirmUserPassword', FILTER_SANITIZE_STRING);
        $userEmail = checkEmail($userEmail);
        $userPassword = checkPassword($userPassword);
        $existingEmail = checkExistingEmail($userEmail);
        if($userPassword === 0) {
            $_SESSION['message'] = "<p>Password must have at least 8 characters, an uppercase letter, a lowercase letter, and a number</p>";
        }
        if($existingEmail) {
            $_SESSION['message'] = '<p>That email address already exists. Enter another email or <a class="registerbtn" href="/accounts/index.php" title="Log in">Log in</a></p>';
            $itsago = FALSE;
            include $_SERVER['DOCUMENT_ROOT'].'/views/registration.php';
            break;
        }
        if(empty($userEmail) || empty($userPassword) || empty($confirmUserEmail) || empty($confirmUserPassword) || empty($userFirstName) || empty($userLastName) || empty($userAddress) || empty($userCity) || empty($userState) || empty($userZip)) {
            $_SESSION['message'] = '<p>Please provide information for all empty form fields.</p>';
            $itsago = FALSE;
            include $_SERVER['DOCUMENT_ROOT'].'/views/registration.php';
            break;
        }
        if($userEmail !== $confirmUserEmail) {
            $_SESSION['message'] = "<p>The emails don't match. Please confirm your email.</p>";
            $itsago = FALSE;
            include $_SERVER['DOCUMENT_ROOT'].'/views/registration.php';
            break;
        }
        if($userPassword !== $confirmUserPassword) {
            echo $userPassword.$confirmUserPassword;
            $_SESSION['message'] ="<p>The passwords don't match. Please confirm your password.</p>";
            $itsago = FALSE;
            include $_SERVER['DOCUMENT_ROOT'].'/views/registration.php';
        }
        
        if($itsago !== FALSE){
            $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);
            $regOutcome = regUser($userEmail, $hashedPassword, $userFirstName, $userLastName, $userAddress, $userCity, $userState, $userZip);
            if($regOutcome === 1) {
                $_SESSION['message'] = '<p>Thank you for registering. Please use your email and password to log in.<p>';
                header('Location: /accounts?action=login');
                exit;
            } else {
                $_SESSION['message'] = '<p>Registration Failed. Please try again.</p>';
                include $_SERVER['DOCUMENT_ROOT'].'/views/registration.php';
            }
        } else {
            $_SESSION['message'] = '<p>Registration failed, please try again.</p>';
        }
        break;
    case 'logout':
        unset($_SESSION['userData']);
        session_destroy();
        header('Location: /index.php');
        exit;
    case 'admin': 
        if(!$_SESSION['loggedin']) {
            header('Location: /accounts/');
            exit;
        } 
        $displayName = SUBSTR($_SESSION['userData']['userFirstName'], 0, 1).$_SESSION['userData']['userLastName'];
        $userId = $_SESSION['userData']['userId'];
        $orders = getUserOrders($userId);
        // $cart = getUserCart($userId);
        $ordersPage = buildOrderOverview($orders, $displayName);
        // $cartPage = buildCartOverview($cart, $displayName);
        include $_SERVER['DOCUMENT_ROOT'].'/views/admin.php';
        break;
    case 'editPage':
        include $_SERVER['DOCUMENT_ROOT'].'/views/editUser.php';
        break;
    case 'edit':
        $userFirstName = filter_input(INPUT_POST, 'userFirstName', FILTER_SANITIZE_STRING);
        $userLastName = filter_input(INPUT_POST, 'userLastName', FILTER_SANITIZE_STRING);
        $userEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_EMAIL);        
        $userId = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_NUMBER_INT);
        $userState = filter_input(INPUT_POST, 'userState', FILTER_SANITIZE_STRING);
        $userCity = filter_input(INPUT_POST, 'userCity', FILTER_SANITIZE_STRING);
        $userZip = filter_input(INPUT_POST, 'userZip', FILTER_SANITIZE_NUMBER_INT);
        $userAddress = filter_input(INPUT_POST, 'userAddress', FILTER_SANITIZE_STRING);
        $userEmail = checkEmail($userEmail);
        if($userEmail != $_SESSION['userData']['userEmail']){
            $existingEmail = checkExistingEmail($userEmail);
        } else {
            $existingEmail = FALSE;
        }

        if($existingEmail){
            $_SESSION['message'] = '<p>That email already exists.</p>';
        }
 
        if(empty($userFirstName) || empty($userLastName) || empty($userEmail) || empty($userId) || empty($userState) || empty($userCity) || empty($userZip) || empty($userAddress)){
            $_SESSION['message'] = '<p>Please provide information for all empty form fields.</p>';
        }

        // $updateOutcome = editUser($userFirstName, $userLastName, $userEmail, $userId, $userState, $userCity, $userZip, $userAddress);
        if($userOutcome === 1){
            $_SESSION['message'] = '<p>Update was successful</p>';
            $userData = getUserById($userId);
            // array_pop($userData);
            $_SESSION['userData'] = $userData;
            header('Location: /seniorproject/accounts/?action=admin');
            exit;
        } else {
            $_SESSION['message'] = '<p>Sorry, but the update failed. Please try again.</p>';
            include $_SERVER['DOCUMENT_ROOT'] . '/views/editUser.php';
            break;
        }
        ;
        break;
    default:
        if(isset($_SESSION['loggedin'])){
            include $_SERVER['DOCUMENT_ROOT'].'/views/admin.php';
        } else {
        include $_SERVER['DOCUMENT_ROOT'].'/views/login.php';
}
}
