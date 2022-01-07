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
    <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        ?>
        <h1>Server Error</h1>
        <p class="error">
            Sorry, our server seemes to be experiencing some technical difficulties.
        </p>
        <!-- ?php echo phpinfo(); ?> -->
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php'; ?>
</body>

</html>