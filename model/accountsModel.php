<?php 

//Accounts Model

//Check if userEmail is valid email for login
function checkEmail($userEmail){
    $valEmail = filter_var($userEmail, FILTER_VALIDATE_EMAIL);
    return $valEmail;
}

//Check if userPassword is valid password
function checkPassword($userPassword) {
    $pattern = '/^(?=^.{8,}$)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/';
    if(preg_match($pattern, $userPassword)){
        return $userPassword;
    } else {
        return 0;
    }
}

//Get user data from an email address
function getUser($userEmailValue){
    echo 'YOU MADE IT';
    $servername = '127.0.0.1';
    $username = 'bea49f1b1b2107';
    $password = 'a0175e56';
    $dbname = 'heroku_3eee6f15e6e8991';
    $connection = mysqli_connect($servername, $username, $password, $dbname);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    
    $sql = $connection->prepare('SELECT * FROM users WHERE userEmail = ?');
    $result = $connection->query($sql);

    $userEmail = $userEmailValue;
    // $stmt->execute();

    if ($result->num_rowns > 0) {
        while($row = $result->fetch_assoc()) {
            $userData = $row;
            return $row; 
        }
    } else {
        echo '0 results';
    }
    $connection->close();
}


//Register a new user
function regUser($userEmailValue, $hashedPasswordValue, $userFirstNameValue, $userLastNameValue, $userAddressValue, $userCityValue, $userStateValue, $userZipValue) {
    // $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $servername = '127.0.0.1';
    $username = 'bea49f1b1b2107';
    $password = 'a0175e56';
    $dbname = 'heroku_3eee6f15e6e8991';
    $connection = mysqli_connect($servername, $username, $password, $dbname);

    if (mysqli_connect_errno()) {
        echo 'I FAILED';
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $sql = 'INSERT INTO users (userEmail, userPassword, userFirstName, userLastName, userState, userCity, userZip, userAddress) VALUES ($userEmailValue, $hashedPasswordValue, $userFirstNameValue, $userLastNameValue, $userStateValue, $userCityValue, $userZipValue, $userAddressValue)';
    $result = mysqli_query($connection, $sql);

    if(mysqli_num_rows($result) > 0) {
        echo 'It worked!';
        $connection->close();
    } else {
        echo 'NOPE';
    }
    
    // $stmt = $connection->prepare('INSERT INTO users (userEmail, userPassword, userFirstName, userLastName, userState, userCity, userZip, userAddress) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
    // $stmt->bind_param('ssssssis', $userEmail, $userPassword, $userFirstName, $userLastName, $userState, $userCity, $userZip, $userAddress);
    
    // $userEmail = $userEmailValue;
    // $userPassword = $hashedPasswordValue;
    // $userFirstName = $userFirstNameValue;
    // $userLastName = $userLastNameValue;
    // $userState = $userStateValue;
    // $userCity = $userCityValue;
    // $userZip = $userZipValue;
    // $userAddress = $userAddressValue;
    // $stmt->execute();

    // echo 'We did it!';
    // $stmt->close();
    // $connection->close();
}

//Check for existing email
function checkExistingEmail($userEmail) {
    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $servername = 'us-cbr-east-04.cleardb.com';
    $username = 'bea49f1b1b2107';
    $password = 'a0175e56';
    $connection = new mysqli($servername, $username, $password);

    if ($connection->connect_error) {
        die('Connection Failed: ' . $connection->connect_error);
    }

    $sql = 'SELECT userEmail FROM users WHERE userEmail = ?';
    $result = $connection->query($sql);
    
    if ($result->num_rows >0) {
        return 0;
    } else {
        return 1;
    }

}

function getUserById($userId) {

}

// function editUser($userFirstName, $userLastName, $userEmail, $userId, $userState, $userCity, $userZip, $userAddress) {
//     try {
//         $db = unraveledConnect();
//         $sql = 'UPDATE users SET userFirstName=:userFirstName, userLastName=:userLastName, userEmail=:userEmail, userState=:userState, userCity=:userCity, userZip=:userZip, userAddress=:userAddress WHERE userId=:userId';
//         $stmt = $db->prepare($sql);
//         $stmt->bindValue(':userFirstName', $userFirstName, PDO::PARAM_STR);
//         $stmt->bindValue(':userLastName', $userLastName, PDO::PARAM_STR);
//         $stmt->bindValue(':userEmail', $userEmail, PDO::PARAM_STR);
//         $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
//         $stmt->bindValue(':userState', $userState, PDO::PARAM_STR);
//         $stmt->bindValue(':userCity', $userCity, PDO::PARAM_STR);
//         $stmt->bindValue(':userZip', $userZip, PDO::PARAM_INT);
//         $stmt->bindValue(':userAddress', $userAddress, PDO::PARAM_STR);
//         $stmt->execute();
//         $rowsChanged = $stmt->rowCount();
//         $stmt->closeCursor();
//         return $rowsChanged;
//     } catch(PDOException $ex) {
//         return $sql.'<br>'.$ex->getMessage();
//     }
// }

?>