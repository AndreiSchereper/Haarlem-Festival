<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Body</title>
    <style>
        <?= include 'home.css'; ?>
    </style>
</head>

<body>
    <div class="container">
        <div>
            <p class="text-center fw-bold pt-3 pb-2">What to do in haarlem?</p>
            <div class="d-lg-flex mt-3">
                <div class="card mb-3 me-lg-2">
                    <img class="pt-1" src="../media/home/history.png" class="card-img-top" alt="...">
                </div>
                <div class="card mb-3 me-lg-2">
                    <img class="pt-1" src="../media/home/culture.png" class="card-img-top" alt="...">
                </div>
                <div class="card mb-3">
                    <img class="pt-1" src="../media/home/food.png" class="card-img-top" alt="...">
                </div>
            </div>
        </div>
        <div>
            <p class="text-center">THE FESTIVAL</p>
            <div class="d-flex justify-content-center mb-2">
                <a class="text-decoration-none text-center " href="/">
                    <button class="btn-check-it-out border-0 rounded-2 p-2 text-white">CHECK IT OUT</button>
                </a>
            </div>
        </div>
        <div class="d-md-flex d-lg-flex">
            <div>
                <p class="text-center fw-bold mt-3 mb-3">Location</p>
                <div class="d-flex flex-column">
                    <img class="mt-2 mb-2" src="../media/home/map.png" alt="">
                    <p class="mt-2">Haarlem, one of the most attractive destinations in the Netherlands, is just at 15
                        minutes by train
                        away from Amsterdam. This small city is the capital of the province of North Holland. It is also
                        a
                        great destination to walk around. In it, you can find the beauty of Amsterdam but without those
                        huge
                        crowds of people.
                    </p>
                </div>
            </div>
            <div class="ms-md-3 ms-lg-3">
                <p class="text-center fw-bold mt-3 mb-3">Did you know?</p>
                <p class="border-did-you-know mt-2">Haarlem became a city long before Amsterdam and Rotterdam did.</p>
            </div>
        </div>
    </div>

    </div>
</body>

</html>