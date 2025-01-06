<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>

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
        <div class="d-flex">
            <div class="col-3">
                <div class="container">
                    <img src="/assets/img/cropProfile.png" alt="Profile image" style="width:130px; height:130px">
                    <h5>Firstname Lastname</h5>
                    <p>email@placeholder.com</p>
                </div>
            </div>
            <div class="col">
                <div class="container">
                    <div class="container">
                        <h3>Achievement</h3>
                        <div class="row">
                            <div class="col">
                                <p>a1</p>
                            </div>
                            <div class="col">
                                <p>a2</p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <h3>Registered course</h3>
                        <div class="row">
                            <div class="col">
                                <p>Networking Basics</p>
                            </div>
                            <div class="col">
                                <p>Python for Networking</p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <h3>Waitlist</h3>
                        <div class="row">
                            <div class="col">
                                <p>Advanced Routing Techniques</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.html');?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>