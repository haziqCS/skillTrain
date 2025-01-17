<?php
$search = isset($_GET['search']) ? $_GET['search'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>skillTrain</title>

    <?php include("../header.html")?>
</head>
<body>
    <div class="container pt-5" x-data="courseFilter">
        <div class="row">
            <!-- Sidebar Filter -->
            <div class="col-md-3 border-end ps-5 pb-5">
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
<?php include('../footer.html');?>
</body>
</html>