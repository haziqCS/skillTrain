<!DOCTYPE html>
<html lang="en" x-data="{ showMessage: false, messageType: '', messageContent: '' }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>skillTrain</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icon CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Alpine.js (Defer Loading) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    
    <?php include('header.html');?>
</head>
<body>
    <div class="container mt-5" x-data="userProfile">
        <main id="main" class="d-flex justify-content-center align-items-center" style="min-height: 60vh;">
            <div class="card shadow" style="width: 24rem;">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">Login</h5>
                    <form 
                        @submit.prevent="
                            const email = document.getElementById('email').value;
                            const password = document.getElementById('password').value;
                            if (email === 'user@example.com' && password === '123') {
                                messageType = 'success';
                                messageContent = 'Login successful!';
                                showMessage = true;
                                new bootstrap.Modal(document.getElementById('messageModal')).show();
                                setTimeout(() => {
                                    window.location.href = 'index.php'; // Redirect to action.php
                                }, 1500); // Delay to show success message
                            } else {
                                messageType = 'error';
                                messageContent = 'Invalid email address or password!';
                                showMessage = true;
                                new bootstrap.Modal(document.getElementById('messageModal')).show();
                            }
                        "
                    >
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter your password" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary" onclick="fetchCurrentUserData()">Login</button>
                        </div>
                    </form>
                    <div class="mt-3 text-center">
                        <p>Don't have an account? <a href="register.php">Sign up</a></p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Bootstrap Modal -->
    <div 
        class="modal fade" 
        id="messageModal" 
        tabindex="-1" 
        aria-labelledby="messageModalLabel" 
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content" :class="messageType === 'success' ? 'bg-success text-white' : 'bg-danger text-white'">
                <div class="modal-header">
                    <h5 class="modal-title" id="messageModalLabel">
                        <template x-if="messageType === 'success'">Success</template>
                        <template x-if="messageType === 'error'">Error</template>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p x-text="messageContent"></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS CDN -->
    <?php include('footer.html');?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
