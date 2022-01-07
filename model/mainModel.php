<?php

//main unraveled model

function getShopProducts() {
    echo 'YOU MADE IT';
    // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    // $servername = '127.0.0.1';
    // $username = 'bea49f1b1b2107';
    // $password = 'a0175e56';
    // $dbname = 'heroku_3eee6f15e6e8991';

    $url = parse_url('mysql://bea49f1b1b2107:a0175e56@us-cdbr-east-04.cleardb.com/heroku_3eee6f15e6e8991?reconnect=true');
    
    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"], 1);

    $connection = new mysqli($server, $username, $password, $db);

    if ($connection->connect_errno) {
        die(" NONE CONNEC: ". $connection->connect_error);
    }

    echo ' YOU ARE HERE ';
    $sql = 'SELECT * FROM shopProducts';
    $result = $connection->query('SELECT * FROM users WHERE userName = "Penelope";');
    // echo 'DID IT WORK?';

    while ($row=$result->fetch_assoc()) {
        echo $row['userName'];
    }

    // $row = $result->fetch_array(MYSQLI_BOTH);
    // return $row;
    // $connection->close();
}

//Build the shop on the main page.
function buildShop($shopProducts) {
    foreach ($shopProducts as $shopProduct) {
        $shopDisplay = '<a href="/seniorproject/products/index.php?action=showProduct&shopProductId=';
        $shopDisplay .= $shopProduct['shopProductId'][0];
        $shopDisplay .= '"><img src="/seniorproject/images/';
        $shopDisplay .= $shopProduct['shopProductPhoto'];
        $shopDisplay .= '" alt="';
        $shopDisplay .= $shopProduct['shopProductName'];
        $shopDisplay .= '"><h4>';
        $shopDisplay .= $shopProduct['shopProductName'];
        $shopDisplay .= '</h4><p>Customize</p></a>';
        echo $shopDisplay;
    }
}
?>