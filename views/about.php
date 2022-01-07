<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>The Unraveled Shop: About</title>
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
        <h1>About The Unraveled Store</h1>
        <div class="theCreator">
        <img src="/images/owner.png" alt="Creater of the Unraveled Store">
        <h2>Meet the creator:</h2>
        <p>Emily Patrick created the Unraveled Shop's first iteration in 2014 and quickly became consumed by the shear number of fish hats ordered. Over the next four years, she created a few more patterns and knitted over a hundred hats of all sizes. For four more years, Emily used her online business in numerous web design projects, culminating in this website.</p>
        </div>
        <div class="hatCustomization">
        <img src="/images/hatIcon.png" alt="Icon of a hat">
        <h3>Hat Customization</h3>
        <p>Four years of using the Etsy platform made me realize that ordering a hat that perfectly fits your preferences and personality was not easy. When you order a custom product from an internet shop, it can be difficult to know what you're getting before you buy it. I wanted to create a visual customization process so that the communication between the seller and customer would be more effective. Knowing all your options can be helpful and confusing at the same time. This visual customization process simplifies the decisions you need to make.</p>
        </div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php'; ?>
</body>

</html>