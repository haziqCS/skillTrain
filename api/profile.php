<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>

    <?php include('../header.html');?>
</head>
<body>
<div class="container" x-data="userProfile" x-init="init()">
    <div class="row">
        <!-- Left Column (Profile and Notifications) -->
        <div class="col-md-3 ps-5 order-1 order-md-1 pt-5 pe-5 border-end">
            <img src="/assets/img/cropProfile.png" alt="Profile image" style="width:130px; height:130px">
            <h5 x-text="fullname">Firstname Lastname</h5>
            <p x-text="email">email@placeholder.com</p>
            <p>Registered on: <span x-text="registerDate">Not Available</span></p>

            <!-- Notifications Section -->
            <div class="mt-4" x-show="notifications.length > 0">
                <h6><i class="bi bi-bell"></i> Notifications</h6>
                <ul class="list-group">
                    <template x-for="notification in notifications" :key="notification">
                        <li class="list-group-item" x-text="notification"></li>
                    </template>
                </ul>
            </div>
        </div>

        <!-- Right Column (Achievement, Courses, Waitlist) -->
        <div class="col-md-9 order-2 order-md-2 pt-5 ps-4">
            <!-- Achievement Section -->
            <div class="container">
                <h3><i class="bi bi-award"></i> Achievement</h3>
                <div class="row min-vh-20 align-items-center">
                    <div class="col">
                        <div class="row justify-content-center">
                            <img src="/assets/img/a1.svg" alt="achievement1" style="height:70px;">
                        </div>
                        <div class="row">
                            <p style="text-align:center;"><b>First step</b>: Joined skillTrain</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row justify-content-center">
                            <img src="/assets/img/a2.svg" alt="achievement2" style="height:80px;">
                        </div>
                        <div class="row">
                            <p style="text-align:center;"><b>One at a time</b>: Completed a course.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row justify-content-center">
                            <img src="/assets/img/a3.svg" alt="achievement3" style="height:80px;">
                        </div>
                        <div class="row">
                            <p style="text-align:center;"><b>Knowledge Sharer</b>: Share a course with a friend.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Registered Courses Section -->
            <h3>Registered Courses</h3>
            <div class="row">
                <template x-for="course in registeredCourses" :key="course.name">
                    <div class="col-md-5 mb-4">
                        <div class="card" style="width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title" x-text="course.name"></h5>
                                <p class="card-text" x-text="course.description"></p>
                                <a :href="`detail.php?courseName=${encodeURIComponent(course.name)}`" class="btn btn-sm btn-outline-primary">View Course</a>
                                <a href="#" class="btn btn-sm btn-danger ms-2" @click.prevent="dropCourse(course)">Drop Course</a>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Waitlist Section -->
            <h3>Waitlist</h3>
            <div class="row">
                <template x-for="course in waitlist" :key="course.name">
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title" x-text="course.name"></h5>
                                <p class="card-text" x-text="course.description"></p>
                                <a :href="`detail.php?courseName=${encodeURIComponent(course.name)}`" class="btn btn-sm btn-outline-primary">View Course</a>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>

    <!-- Warning Modal -->
    <div class="modal fade" id="dropCourseModal" tabindex="-1" aria-labelledby="dropCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dropCourseModalLabel">Confirm Drop Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to drop this course?</p>
                    <p class="text-danger">
                        <strong>Note:</strong> You can easily re-register for the course later. However, courses that do not offer immediate registration mean you'll have to reapply and wait to be accepted again.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" @click="confirmDropCourse">Drop Course</button>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php include('../footer.html');?>
</body>
</html>
