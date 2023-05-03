<nav class="navbar navbar-expand-lg bg-secondary">
    <ul class="navbar-nav me-auto">
        <!-- Login Logout and Welcome Username session -->
        <?php
        if (!isset($_SESSION['username'])) { //session not active
            echo "
                <li class='nav-item'>
                <a class='nav-link' href='#'>Welcome Guest</a>
            </li>
                <li class='nav-item'>
                <a class='nav-link' href='./users_area/user_login.php'>Login</a>
            </li>
                ";
        } else {
            echo "
                <li class='nav-item'>
                <a class='nav-link' href='#'>Welcome " . $_SESSION['username'] . " </a>
            </li>

                <li class='nav-item'>
                <a class='nav-link' href='users_area/logout.php'>Logout</a>
            </li>
                ";
        }
        ?>
    </ul>
</nav>