<header>
    <ul class="nav">
            <li >
                <a href="../../pages/blog/blog.php">
                    <img src="../../assets/img/logo.png" alt="logo" class="logo" >
                    <h1>HeroCorp</h1>
                </a>
            </li>
        <?php if (isLoggedIn()): ?>

            <li class="nav-item">
                <a href="../../pages/blog/blog.php" class="nav-link">
                    Feed
                </a>
            </li>
            <li class="nav-item">
                <a href="../../pages/discover/discover.php" class="nav-link button__discover">
                    Discover
                </a>
            </li>
            <li class="nav-item">
                <a href="../../index.php?logout" class="nav-link">
                    Logout
                </a>
            </li>
        <?php else: ?>
            <li class="nav-item">
                <a href="../../pages/login/inscription.php" class="nav-link">
                    Sign In
                </a>
            </li>
            <li class="nav-item">
                <a href="../../index.php" class="nav-link">
                    Sign up
                </a>
            </li>
        <?php endif; ?>
    </ul>
</header>