<?php

//Proxy connection to the Unraveled database
// function unraveledConnect() {
//     $servername = 'us-cbr-east-04.cleardb.com';
//     $username = 'bea49f1b1b2107';
//     $password = 'a0175e56';
//     $dbname = 'heroku_3eee6f15e6e8991';
//     $connection = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password);
//     try {
//         $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         echo 'Connected';
//         return $connection;
//     } catch(PDOException $e) {
//         echo 'Connection failed:' . $e->getMessage();
//     }
// }

// function unraveledConnect() {
//     $server = parse_url(getenv("CLEARDB_DATABASE_URL"));;
//     $dbname = 'unraveled';
//     $username = 'bea49f1b1b2107';
//     $password = 'a0175e56';
//     $dsn = "mysql:host=$server;dbname=$dbname";
//     $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

//     try {
//         $link = new PDO($dsn, $username, $password, $options);
//         if(is_object($link)){
//             // echo 'It worked!';
//             return $link;
//         }
//     } catch(PDOException $e){
//         // echo 'Connection failed: ' . $e->getMessage();
//         header('Location: /views/500.php');
//         exit;
//     }
// }

// function unraveledConnect() {
// //Get Heroku ClearDB connection information
// $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
// $cleardb_server = $cleardb_url["host"];
// $cleardb_username = $cleardb_url["user"];
// $cleardb_password = $cleardb_url["pass"];
// $cleardb_db = substr($cleardb_url["path"],1);
// $active_group = 'default';
// $query_builder = TRUE;
// // Connect to DB
// $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
// return $conn;
// }

// $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
// $servername = $cleardb_url['host'];
// $username = $cleardb_url['user'];
// $password = $cleardb_url['pass'];

// $connection = new mysqli($servername, $username, $password);

// if ($connection->connect_error) {
//     die('Connection Failed: ' . $connection->connect_error);
// }
// echo 'Connected Successfully';