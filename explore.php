<?php
$search = isset($_GET['search']) ? $_GET['search'] : '';
?>

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

    <link rel="stylesheet" href="/assets/css/style.css">
</head>
    
<body>
    <?php include("header.html")?>
    <div class="container pt-5" x-data="courseFilter">
        <div class="row">
            <!-- Sidebar Filter -->
            <div class="col-md-3 border-end">
                <h3>Filter by Categories</h3>
                <label><input type="checkbox" x-model="categories.networking"> Networking</label><br>
                <label><input type="checkbox" x-model="categories.routing"> Routing</label><br>
                <label><input type="checkbox" x-model="categories.security"> Security</label><br>
                <label><input type="checkbox" x-model="categories.python"> Python</label>
            </div>

            <!-- Courses Section -->
            <div class="col-md-9 px-5">
                <h2>Available Courses</h2>
                <div x-data="{ isExplorePage: window.location.pathname === '/explore.php' && window.location.search !== '' }">
                    <h4 class="lead" x-show="isExplorePage && search">
                        Displaying the results for "<strong><span x-text="search"></span></strong>"
                    </h4>
                </div>


                <div class="course-list">
                    <template x-for="course in filteredCourses" :key="course.name">
                        <div class="course-item border p-3 mb-3">
                            <h3>
                                <a :href="`detail.php?courseName=${encodeURIComponent(course.name)}`" 
                                x-text="course.name" 
                                class="text-decoration-none" 
                                @click.prevent="saveCurrentCourse(course)">
                                </a>                            
                            </h3>
                            <p x-text="course.description"></p>
                            <p><strong>Category:</strong> <span x-text="course.category"></span></p>
                        </div>
                    </template>
                    <div x-show="filteredCourses.length === 0" class="text-muted">
                        No courses found.
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('footer.html');?>
</body>
</html>