<?php 
//Orders Model

//get orders for one user
function getUserOrders($userId){
    $db = unraveledConnect();
    $sql = 'SELECT * FROM orders WHERE userId = :userId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $orders;
}

//build orders section on the main account page
function buildOrderOverview($orders, $displayName) {
    $ordersList = '<div class="orderList">';
    foreach ($orders as $order) {
        $orderDate = strtotime($order['orderDate']);
        $displayDate = date("h:i A F jS Y ", $orderDate);
        $ordersList .= '<a href="/seniorproject/orders/index.php?action=orderDetails&orderId=';
        $ordersList .= $orders['orderId'];
        $ordersList .= '" class="orderDisplay"><h4>';
        $ordersList .= $displayDate;
        $ordersList .= '</h4><p>';
        $ordersList .= $order['orderTotal'];
        $ordersList .= '</p></a>';
    }
}

function getOrderItemsByOrderId($orderId) {
    $db = unraveledConnect();
    $sql = 'SELECT c.';
}

function getOrderItemDetails($orderItemId) {

}

?>