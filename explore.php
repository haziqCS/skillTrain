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

     <style>
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

       

        .container {
            padding: 20px;
        }

        .course-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-around;
        }

        .course-item {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            width: 250px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .course-item:hover {
            transform: scale(1.05);
        }

        .course-item h3 {
            color: #333;
        }

        .course-item p {
            color: #777;
        }

        .course-item button {
            background-color: #0066cc;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .course-item button:hover {
            background-color: #004c99;
        }

   
    </style>
</head>

<body>



<div class="container">
    <h2 id="courses">Available Courses</h2>
    <div class="course-list">
        <div class="course-item">
            <h3>Networking Basics</h3>
            <p>Learn the fundamentals of networking.</p>
            <button>Learn More</button>
        </div>

        <div class="course-item">
            <h3>Cisco Routing & Switching</h3>
            <p>Master routing and switching concepts with Cisco.</p>
            <button>Learn More</button>
        </div>

        <div class="course-item">
            <h3>Cybersecurity Essentials</h3>
            <p>Get started with cybersecurity concepts.</p>
            <button>Learn More</button>
        </div>

        <div class="course-item">
            <h3>Python for Networking</h3>
            <p>Learn how to use Python for network automation.</p>
            <button>Learn More</button>
        </div>
    </div>
</div>

<?php include('footer.html');?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>