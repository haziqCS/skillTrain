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
            /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;  /* Ensures content is aligned horizontally */
            flex-direction: column;
            min-height: 100vh;
            box-sizing: border-box;
        }

        /* Sidebar for Filter */
        .filter-sidebar {
            width: 250px;  /* Fixed width for the sidebar */
            background-color: #fff;
            padding: 60px;
            border-right: 1px solid #ddd;
            position: static;
            top: 80px;  /* Fixed position below the header */
            bottom: 300px;  /* Stops above the footer */
            
        }

        /* Course List Styling */
        .course-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-around;
        }

        /* Course Item Styling */
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
       
    
        <!-- Sidebar Filter -->
        <div class="filter-sidebar">
            <h3>Filter by Categories</h3>
            <label><input type="checkbox" id="networking" onchange="filterCourses()"> Networking</label>
            <label><input type="checkbox" id="routing" onchange="filterCourses()"> Routing</label>
            <label><input type="checkbox" id="security" onchange="filterCourses()"> Security</label>
            <label><input type="checkbox" id="python" onchange="filterCourses()"> Python</label>
        </div>
    
        <!-- Main Content Section -->
        <div class="container">
            <h2 id="courses">Available Courses</h2>
            <div class="course-list" id="course-list">
                <!-- Course 1 -->
                <div class="course-item networking">
                    <h3>Networking Basics</h3>
                    <p>Learn the fundamentals of networking.</p>
                    <button>Learn More</button>
                </div>
    
                <!-- Course 2 -->
                <div class="course-item routing">
                    <h3>Cisco Routing & Switching</h3>
                    <p>Master routing and switching concepts with Cisco.</p>
                    <button>Learn More</button>
                </div>
    
                <!-- Course 3 -->
                <div class="course-item security">
                    <h3>Cybersecurity Essentials</h3>
                    <p>Get started with cybersecurity concepts.</p>
                    <button>Learn More</button>
                </div>
    
                <!-- Course 4 -->
                <div class="course-item python">
                    <h3>Python for Networking</h3>
                    <p>Learn how to use Python for network automation.</p>
                    <button>Learn More</button>
                </div>
    
                <!-- Course 5 -->
                <div class="course-item networking">
                    <h3>Cloud Networking</h3>
                    <p>Understand the basics of cloud networks.</p>
                    <button>Learn More</button>
                </div>
    
                <!-- Course 6 -->
                <div class="course-item routing">
                    <h3>Advanced Routing Techniques</h3>
                    <p>Dive deep into advanced routing methods.</p>
                    <button>Learn More</button>
                </div>
    
                <!-- Course 7 -->
                <div class="course-item security">
                    <h3>Network Security</h3>
                    <p>Learn advanced security techniques for networks.</p>
                    <button>Learn More</button>
                </div>
    
                <!-- Course 8 -->
                <div class="course-item networking">
                    <h3>Wireless Networking</h3>
                    <p>Explore the world of wireless communication.</p>
                    <button>Learn More</button>
                </div>
    
            </div>
        </div>
    
       
    
        <!-- JavaScript for Filtering -->
        <script>
            // Function to filter courses based on selected categories
            function filterCourses() {
                const networkingChecked = document.getElementById('networking').checked;
                const routingChecked = document.getElementById('routing').checked;
                const securityChecked = document.getElementById('security').checked;
                const pythonChecked = document.getElementById('python').checked;
    
                const courseItems = document.querySelectorAll('.course-item');
    
                courseItems.forEach(item => {
                    // Get the category classes for each course
                    const hasNetworking = item.classList.contains('networking');
                    const hasRouting = item.classList.contains('routing');
                    const hasSecurity = item.classList.contains('security');
                    const hasPython = item.classList.contains('python');
    
                    // Check if the course should be displayed based on selected filters
                    if (
                        (networkingChecked && hasNetworking) ||
                        (routingChecked && hasRouting) ||
                        (securityChecked && hasSecurity) ||
                        (pythonChecked && hasPython) ||
                        (!networkingChecked && !routingChecked && !securityChecked && !pythonChecked) // Show all if no filter is selected
                    ) {
                        item.style.display = 'block'; // Show course
                    } else {
                        item.style.display = 'none'; // Hide course
                    }
                });
            }
        </script>

<?php include('footer.html');?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>