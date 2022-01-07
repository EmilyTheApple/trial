<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>The Unraveled Shop</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/header.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/nav.php'; ?>
    <main>
        <div class="shop">
            <h2>Choose a Product to Customize It</h2>
            <?php 
                $shopProducts = getShopProducts();
                $shopPage = buildShop($shopProducts);
            ?>
        </div>
        <div class="blurb"><p>For more chaos...</p><a href="/views/about.php">CLICK HERE</a></div>
        <div class="patternBanner"></div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php'; ?>
</body>

</html>