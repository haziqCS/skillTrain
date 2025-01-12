<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>skillTrain</title>

    <!--Bootstap CSS CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--Bootstap icon CDN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Load Alpine.js (Defer Loading) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <?php include('header.html');?>

</head>
<body>
    <div class="container">
        <main id="main">
            <div class="col p-5 vh-100">
                <div class="container h-100">
                    <div class="d-flex h-100 align-items-center justify-content-center pb-5">
                        <div class="container">
                            <h1 class="fw-bold text-body-emphasis">Never stop learning</h1>
                            <p class="lead">Welcome to skillTrain! Explore courses in networking, cybersecurity, and more, with expert instructors and flexible learning. Start your journey today!</p>
                            <div class="d-flex">
                                <a class="btn btn-lg btn-primary m-2 text-nowrap" href="explore.php" role="button">Start Learning</a>
                                <a class="btn btn-lg btn-secondary m-2 text-nowrap" href="#whyST" role="button">Why skillTrain?</a>
                            </div>
                        </div>
                        <div class="container d-none d-md-inline">
                            <img src="/assets/img/skillTrain.jpg" class="img-fluid" alt="...">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col p-5">
                <div class="container" id="whyST">
                    <div class="d-flex">
                        <div class="container">
                            <h1 class="display-5 fw-bold text-body-emphasis">Why skillTrain?</h1>
                            <p class="lead">Comparison to other online learning platforms.</p>
                            <div class="d-flex flex-column flex-md-row">
                                <div class="card" style="width: 18rem;">
                                    <img src="/assets/img/available.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Learn at your own pace, anytime, anywhere – we’re here to help you succeed!</p>
                                    </div>
                                </div>
                                <div class="card" style="width: 18rem;">
                                    <img src="/assets/img/interactive.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Engage in interactive learning, perfect for both beginners and experienced learners!
                                        </p>
                                    </div>
                                </div>
                                <div class="card" style="width: 18rem;">
                                    <img src="/assets/img/knowledge.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Explore a wide range of courses across different fields of expertise!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col p-5" style="height: 50vh">
                <div class="container" id="quote">
                <figure class="text-center">
                <blockquote class="blockquote">
                    <h3>"Once you stop learning, you start dying."</h3>
                </blockquote>
                <figcaption class="blockquote-footer">
                    Albert Einstein
                </figcaption>
                </figure>
                </div>
            </div>

            <div class="row" style="min-height: 50vh">
                <div class="container">
                    <h1 class="display-5 fw-bold text-body-emphasis text-center">Start Learning Now!</h1>
                    <div class="col-lg-6 mx-auto">
                    <p class="lead mb-4">What are you waiting for? Take the first step towards unlocking your potential and building the skills that will set you apart. Join skillTrain today and start learning at your own pace, with expert guidance every step of the way. Your future starts now!</p>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <a class="btn btn-primary btn-lg px-4 gap-3 text-nowrap" href="login.php" role="button">Join Now!</a>
                        <a class="btn btn-outline-secondary btn-lg px-4 gap-3 text-nowrap" href="explore.php" role="button">Explore courses</a>
                    </div>
                    </div>
                </div>
            </div>
            
        </main>
    </div>

    <?php include('footer.html');?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- Initialize data -->
    <script defer src="/assets/js/start.js"></script>
</body>
</html>