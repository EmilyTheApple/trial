<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>The Unraveled Shop</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/header.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/nav.php'; ?>
    <main>
        <h1><?php echo 'Hello, '.$_SESSION['userData']?></h1>
        <?php
        if (isset($_SESSION['message'])){
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
        ?>
        </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php'; ?>
</body>

</html>