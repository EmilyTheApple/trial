<header>
    <a href="/index.php" class="mainHeader">
        <img class="logo" src="/images/unraveledLogo.svg" alt="The Unraveled Shop Logo">
        <h1>The Unraveled Shop</h1>
    </a>
    <?php
    if(isset($_SESSION['userData']['userFirstName'])){
        echo "<a class='firstName' href='/accounts/index.php?action=admin'>Welcome back, {$_SESSION['userData']['userFirstName']}</a>";
        echo '<a class="account" href="/accounts/?action=logout">Log Out</a>';
    } elseif(!isset($_SESSION['userData']['userFirstName'])){
        echo '<a class="loginbtn" href="/accounts/index.php">register/login</a>';
    }
    ?>
    <div class="userActionBar">
        <input type="text" placeholder="Search...">
        <a class="icon" href="tbd">
            <img src="/images/001-shopping-cart.svg" alt="Cart link">
        </a>
        <a class="icon" href="tbd">
            <img src="/images/002-user.svg" alt="User profile link">
        </a>
    </div>
</header>