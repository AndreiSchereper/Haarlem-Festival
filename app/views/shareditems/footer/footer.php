<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        <?= include 'footer.css'; ?>
    </style>
</head>

<body>
    <div>
        <div class="footer-bg">
            <footer class="container">
                <div class="d-flex flex-column text-center d-lg-flex flex-lg-row justify-content-lg-between text-lg-start">
                    <section class="text-white mt-2 mb-2">
                        <p>About us</p>
                        <p>VisitHaarlem.nl is dedicates to<br />
                            present Haarlem’s offering in<br />
                            an engaging way</p>
                    </section>
                    <section class="mt-2 mb-2">
                        <p class="text-white">Follow us on</p>
                        <div class="d-flex flex-column">
                            <i class="text-white fa-brands fa-facebook mb-2 fs-2"></i>
                            <i class="text-white fa-brands fa-twitter mb-2 fs-2"></i>
                            <i class="text-white fa-brands fa-whatsapp mb-2 fs-2"></i>
                        </div>

                    </section>
                    <section class="text-white text-decoration-none mt-2 mb-2">
                        <p>Content</p>
                        <ul class="list-unstyled">
                            <li>
                                <a class="text-white text-decoration-none" aria-current="page" href="/">Home</a>
                            </li>
                            <li>
                                <a class="text-white text-decoration-none" aria-current="page"
                                    href="/history">History</a>
                            </li>
                            <li>
                                <a class="text-white text-decoration-none" aria-current="page"
                                    href="/culture">Culture</a>
                            </li>
                            <li>
                                <a class="text-white text-decoration-none" aria-current="page" href="/food">Food</a>
                            </li>
                        </ul>

                    </section>
                    <section class="text-white mt-2 mb-2">
                        <p>Contact Information</p>
                        <p>BugBusters<br />
                            Inholland Haarlem
                        </p>
                    </section>
                </div>
            </footer>
        </div>
        <script src="https://kit.fontawesome.com/b86b48068f.js" crossorigin="anonymous"></script>
</body>

</html>