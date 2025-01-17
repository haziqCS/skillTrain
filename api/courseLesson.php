<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Lesson</title>

    <?php include('../header.html');?>
</head>
<body>
    <div class="d-flex" x-data="courseData">
    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar-toggle border-end">
            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav p-0">
                <li class="sidebar-header">
                <h4>Navigation</h4>
                </li>
                <li class="sidebar-item">
                    <a @click="window.location.href = 'detail.php?courseName=' + course.name" class="sidebar-link" type="button">
                        <i class="bi bi-book"></i>
                        <span> Course Detail</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="profile.php" class="sidebar-link">
                        <i class="bi bi-person"></i>
                        <span> Profile</span>
                    </a>
                </li>
                <li class="sidebar-header border-top">
                    <h5>Lesson Topic</h5>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#topic1" aria-expanded="true" aria-controls="topic1">
                        <i class="lni lni-protection"></i>
                        <span>Topic 1</span>
                    </a>
                    <ul id="topic1" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Section 1</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Section 2</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#topic2" aria-expanded="true" aria-controls="topic2">
                        <i class="lni lni-protection"></i>
                        <span>Topic 2</span>
                    </a>
                    <ul id="topic2" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Section 3</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Section 4</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#topic3" aria-expanded="true" aria-controls="topic3">
                        <i class="lni lni-protection"></i>
                        <span>Topic 3</span>
                    </a>
                    <ul id="topic3" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Section 5</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Section 6</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-link-45deg"></i>
                        <span> Reference</span>
                    </a>
                </li>
            </ul>
            <!-- Sidebar Navigation Ends -->
        </aside>
        <!-- Sidebar Ends -->
        <!-- Main Component -->
        <div class="main">
            <nav class="navbar navbar-expand m-3">
                <button class="toggler-btn " data-bs-toggle="tooltip" data-bs-placement="top" title="Click this to toggle sidebar ;)" id="tooltipButton" type="button">
                    <i class="bi bi-caret-left-square"></i>
                </button>
                <main class="p-3">
                <div class="container-fluid">
                    <div class="text-center">
                        <h1>Lesson Title</h1>
                    </div>
                </div>
            </main>
            </nav>
            <div class="content text-center justify-content-center">
            <div id="carouselSlides" class="carousel slide">
                <div class="carousel-inner align-items-center">
                    <div class="carousel-item active">
                    <img src="../assets/img/slides1.jpg" class="d-block img-fluid" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="../assets/img/slides2.jpg" class="d-block img-fluid" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="../assets/img/slides3.jpg" class="d-block img-fluid" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselSlides" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span>Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselSlides" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span>Next</span>
                </button>
                </div>
            </div>
        </div>
    </div>
    <?php include('../footer.html');?>
    <script src="../assets/js/lesson.js" defer></script>
</body>
</html>