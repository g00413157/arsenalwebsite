<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Get the name of the current file
$currentPage = basename($_SERVER['PHP_SELF']);

$cart_count = 0;
if (isset($_SESSION['cart_items'])) {
    foreach ($_SESSION['cart_items'] as $item) {
        $cart_count += $item['quantity'];
    }
}

// Pages where cart icon should not appear
$hideCartPages = ['cart.php', 'checkout.php', 'payment.php', 'thankyou.php'];
?>
<header class="header">
    <!-- Left navigation links -->
    <nav class="nav-links">
        <a id="plyrs" href="showplayers.php">Players</a>
        <a id="matchs" href="showmatches.php">Matches</a>
        <a id="merch" href="awfcInventory.php">Merchandise</a>
    </nav>

    <!-- Centered logo -->
    <div class="logo">
        <a href="index.php">
            <img src="cannon.png" alt="Logo">
        </a>
    </div>

    <!-- Right navigation links -->
    <nav class="nav-links">
        <?php if (isset($_SESSION['username'])): ?>
            <h3><span><?php echo htmlspecialchars($_SESSION['username']); ?></span></h3>
            <p><a href="logout.php">Log Out</a></p>

            <?php if (!in_array($currentPage, $hideCartPages)): ?>
                <a href="cart.php" class="cart-link">
                    🛒<span id="cart-count"><?php echo $cart_count; ?></span>
                </a>
            <?php endif; ?>

        <?php else: ?>
            <a href="loginpage.php">Login</a>
            <button class="create" onclick="showSignUp()">Create User</button>
        <?php endif; ?>
    </nav>
</header>
