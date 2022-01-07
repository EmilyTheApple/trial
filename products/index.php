<?php 
//Products Controller

session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

require_once $_SERVER['DOCUMENT_ROOT'].'/model/mainModel.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/model/accountsModel.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/model/ordersModel.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/model/productsModel.php';

switch ($action){
    case 'showProduct':
        $shopProductId = filter_input(INPUT_GET, 'shopProductId', FILTER_SANITIZE_NUMBER_INT);
        $product = getProductDetails($shopProductId);
        include $_SERVER['DOCUMENT_ROOT'].'/views/product.php';
        break;
    case 'customProduct':
        $shopProductId = filter_input(INPUT_GET, 'shopProductId', FILTER_SANITIZE_NUMBER_INT);
        $_SESSION['productId'] = $shopProductId;
        include $_SERVER['DOCUMENT_ROOT'].'/views/custom.php';
        break;
    case 'buildProduct':
        
        break;
    default:
        include $_SERVER['DOCUMENT_ROOT'].'/views/home.php';
}

?>