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
                            <h1>Never stop learning</h1>
                            <p>With skillTrain, explore many exciting courses to expand your knowledge and skills, now easily accesible by your fingertips.</p>
                            <div class="d-flex">
                                <a class="btn btn-primary m-2 text-nowrap" href="explore.php" role="button">Start Learning</a>
                                <a class="btn btn-secondary m-2 text-nowrap" href="#whyST" role="button">Why skillTrain?</a>
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
                            <h1>Why skillTrain?</h1>
                            <p>Comparison to other online learning platforms.</p>
                            <div class="d-flex flex-column flex-md-row">
                                <div class="card" style="width: 18rem;">
                                    <img src="/assets/img/available.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card" style="width: 18rem;">
                                    <img src="/assets/img/interactive.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card" style="width: 18rem;">
                                    <img src="/assets/img/knowledge.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <?php include('footer.html');?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>