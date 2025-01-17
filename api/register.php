<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>skillTrain - Register</title>

 <?php include('../header.html');?>
</head>
<body>
    <div class="container mt-5">
        <main id="main" class="d-flex justify-content-center align-items-center" style="min-height: 60vh;">
            <div class="card shadow" style="width: 24rem;">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">Register</h5>
                    <form action="index.php">
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your full name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter your password">
                        </div>
                        <div class="mb-3">
                            <label for="confirm-password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm-password" placeholder="Confirm your password">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                   
                </div>
            </div>
        </main>
    </div>
    <?php include('../footer.html');?>
</body>
</html>