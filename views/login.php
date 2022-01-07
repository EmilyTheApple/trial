<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Log In</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/header.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/nav.php'; ?>
    <main>
        <h1>Log In</h1>
        <p>New user? <a class="registerbtn" href="?action=registrationPage" title="Register a new account">Register</a></p>
        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
        ?>
        <form class="login" method="post">
            <fieldset>
                <label for="userEmail">Email:</label><br>
                <input type="email" id="userEmail" name="userEmail" required><br>
                <label for="userPassword">Password:</label><br>
                <input type="password" id="userPassword" name="userPassword" required pattern="?=^.{8,}$)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>
                <input type="submit" class="submit" value="login">
                <input type="hidden" name="action" value="login">
            </fieldset>
        </form>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php'; ?>
</body>

</html>