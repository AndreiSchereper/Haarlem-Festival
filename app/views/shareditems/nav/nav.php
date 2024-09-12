<?php
require_once __DIR__ . '/../../../models/user.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nav</title>
    <style>
        <?= include 'nav.css'; ?>
    </style>

</head>

<body>
    <div class="nav-bg-color">
        <nav class="container">
            <div class="d-sm-flex d-lg-flex justify-content-sm-between justify-content-lg-between ">
                <div class="d-lg-flex justify-content-lg-center align-items-lg-center">
                    <img class="d-none d-lg-block" src="./media/nav/Logo.png" alt="" height="50">
                    <div class="d-lg-none d-flex  justify-content-between ">
                        <div>
                            <button onclick="onClickHamburgerMenu()"
                                class="nav-bg-color pt-2 pb-2 d-sm-none d-lg-none position-absolute top-0 border-0"
                                id="hamburger-icon">
                                <i class="text-white fa-solid fa-bars"></i> </button>
                            <button onclick="onClickCrossBtn()"
                                class="nav-bg-color pt-2 pb-2 d-sm-none d-lg-none position-absolute top-0 d-none border-0"
                                id="cross-icon">
                                <i class="text-white fa-solid fa-x"></i> </button>
                        </div>
                        <div class="pt-2 pb-2">
                            <i class="text-white fa-regular fa-user me-3"></i>
                            <i class="text-white fa-solid fa-cart-shopping"></i>
                        </div>
                    </div>
                </div>


                <div class="d-flex justify-content-center align-items-center d-sm-block d-lg-block d-none mt-4"
                    id="nav-items">
                    <ul class="list-inline d-flex flex-column flex-sm-row flex-lg-row">
                        <li>
                            <a class="text-white text-decoration-none me-4" aria-current="page" href="/">Home</a>
                        </li>
                        <li>
                            <a class="text-white text-decoration-none me-4" aria-current="page"
                                href="/history">History</a>
                        </li>
                        <li>
                            <a class="text-white text-decoration-none me-4" aria-current="page"
                                href="/culture">Culture</a>
                        </li>
                        <li>
                            <a class="text-white text-decoration-none me-4" aria-current="page" href="/food">Food</a>
                        </li>
                        <li>
                            <a class="text-white text-decoration-none me-4" aria-current="page" href="/user">User</a>
                        </li>
                        <li>
                            <a class="text-white text-decoration-none me-4" aria-current="page" href="/dashboard">Manage User</a>
                        </li>

                    </ul>
                </div>
                <div class="d-none d-lg-flex justify-content-center align-items-center">
                    <div>
                        <?php if (isset($_SESSION['loggedUser'])):
                            ?>
                            <!-- If user is logged in, show Logout link -->
                            <a class="text-white text-decoration-none me-4" href="/auth/logout">
                                <i class="text-white text-decoration-none me-4 fas fa-sign-out"></i>
                                Logout
                            </a>

                        <?php else: ?>
                            <!-- If user is not logged in, show Login link -->
                            <a class="text-white text-decoration-none me-4" href="/auth/login">
                                <i class="text-white text-decoration-none me-4 fas fa-sign-in-alt"></i>
                                Login
                            </a>
                        <?php endif; ?>

                        <i class="text-white fa-solid fa-cart-shopping"></i>
                    </div>
                </div>
            </div>
        </nav>
        <script src="https://kit.fontawesome.com/b86b48068f.js" crossorigin="anonymous"></script>
    </div>
    <script>
        function onClickHamburgerMenu() {
            const getCrossIconById = document.getElementById("cross-icon");
            getCrossIconById.classList.remove("d-none");

            const getNavItemsById = document.getElementById("nav-items");
            getNavItemsById.classList.remove("d-none");

        }
        function onClickCrossBtn() {
            const getCrossIconById = document.getElementById("cross-icon");
            getCrossIconById.classList.add("d-none")

            const getHamburgerMenuById = document.getElementById("hamburger-icon");
            getHamburgerMenuById.classList.add("d-block")

            const getNavItemsById = document.getElementById("nav-items");
            getNavItemsById.classList.add("d-none");
        }

        function logout() {
            fetch('/auth/logout.php', {
                method: 'POST',
                credentials: 'include'
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.href = '/';
                    } else {
                        console.error('Logout failed:', data.error);
                    }
                })
                .catch(error => {
                    console.error('Logout failed:', error);
                });
        }
    </script>

</body>

</html>