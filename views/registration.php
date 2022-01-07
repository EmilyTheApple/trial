<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Register</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/header.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/nav.php'; ?>
    <main>
    <h1>Register</h1>
        <p>Already have an account? <a class="registerbtn" href="/accounts/index.php" title="Log in">Log in</a></p>
        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
        ?>
        <form class="register" method="post">
            <fieldset>
                <label for="userFirstName">First Name:</label>
                <input type="text" id="userFirstName" name="userFirstName" required value="<?php if(isset($userFirstName)){echo $userFirstName;} ?>">
                <label for="userLastName">Last Name:</label>
                <input type="text" id="userLastName" name="userLastName" required value="<?php if(isset($userLastName)){echo $userLastName;} ?>">
                <label for="userAddress">Address:</label>
                <input type="textarea" name="userAddress" id="userAddress" value="<?php if(isset($userAddress)){echo $userAddress;} ?>">
                <label for="userCity">City:</label>
                <input type="text" id="userCity" name="userCity" value="<?php if(isset($userCity)){echo $userCity;} ?>">
                <label for="userState">State:</label>
                <input type="text" name="userState" id="userState" maxlength="2" value="<?php if(isset($userState)){echo $userState;} ?>">
                <label for="userZip">Zip Code:</label>
                <input type="numeric" name="userZip" id="userZip" maxlength="5" value="<?php if(isset($userZip)){echo $userZip;} ?>">
                <label for="userEmail">Email:</label>
                <input type="email" id="userEmail" name="userEmail" required value="<?php if(isset($userEmail)){echo $userEmail;} ?>">
                <label for="confirmUserEmail">Confirm Email:</label>
                <input type="email" id="confirmUserEmail" name="confirmUserEmail" required>
                <label for="userPassword">Password:</label>
                <input type="password" id="userPassword" name="userPassword" required pattern="(?=^.{8,}$)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                <!-- Password pattern, at least 8 characters, an uppercase letter, a lowercase letter, a number? -->
                <label for="confirmUserPassword">Confirm Password:</label>
                <input type="password" id="confirmUserPassword" name="confirmUserPassword" required pattern="(?=^.{8,}$)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                <input type="submit" name="submit" class="submit" value="Register">
                <input type="hidden" name="action" value="register">
            </fieldset>
        </form>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php'; ?>
</body>

</html>