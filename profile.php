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

    <!-- Define Alpine Component for userProfile -->
    <script>
        Alpine.data('userProfile', () => ({
            fullname: '',
            email: '',
            registerDate: '',
            registeredCourses: [],
            waitlist: [],
            notifications: [],
            courseToDrop: null,

            init() {
                const currentUser = JSON.parse(localStorage.getItem('currentUser'));

                if (currentUser) {
                    this.fullname = currentUser.fullname;
                    this.email = currentUser.email;
                    this.registerDate = currentUser.date_registered;
                    this.registeredCourses = currentUser.registeredCourses || [];
                    this.waitlist = currentUser.waitlist || [];
                    this.notifications = currentUser.notifications || [];
                    console.log('User profile loaded from localStorage:', currentUser);
                } else {
                    console.error('No user profile found in localStorage.');
                }
            },

            dropCourse(course) {
                this.courseToDrop = course;
                const modal = new bootstrap.Modal(document.getElementById('dropCourseModal'));
                modal.show();
            },

            confirmDropCourse() {
                if (!this.courseToDrop) return;

                // Remove the course from the registered courses list
                this.registeredCourses = this.registeredCourses.filter(c => c.name !== this.courseToDrop.name);

                const currentUser = JSON.parse(localStorage.getItem('currentUser'));
                if (currentUser) {
                    currentUser.registeredCourses = this.registeredCourses;
                    localStorage.setItem('currentUser', JSON.stringify(currentUser));
                }

                console.log('Updated registered courses:', this.registeredCourses);

                // Reset the courseToDrop and hide the modal
                this.courseToDrop = null;

                const modal = bootstrap.Modal.getInstance(document.getElementById('dropCourseModal'));
                modal.hide();
            }
        }));
    </script>

    <script defer src="/assets/js/main.js"></script>

    <?php include('header.html');?>
</head>
<body>
<div class="container" x-data="userProfile" x-init="init()">
        <div class="d-flex">
            <!-- Left Column (Profile and Notifications) -->
            <div class="col-3 pt-5 border-end">
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
            <div class="col pt-5">
                <!-- Achievement Section -->
                <div class="container">
                    <h3>Achievement</h3>
                    <div class="row min-vh-20 align-items-center">
                        <div class="col">
                            <div class="row justify-content-center">
                                <img src="/assets/img/a1.png" alt="achievement1" style="height:150px;width:180px;">
                            </div>
                            <div class="row">
                                <p style="text-align:center;"><b>First step</b>: Joined skillTrain</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row justify-content-center">
                                <img src="/assets/img/a2.png" alt="achievement2" style="height:150px;width:180px;">
                            </div>
                            <div class="row">
                                <p style="text-align:center;"><b>One at a time</b>: Completed a course.</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row justify-content-center">
                                <img src="/assets/img/a3.png" alt="achievement3" style="height:150px;width:180px;">
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
                                    <a :href="`detail.php?courseName=${encodeURIComponent(course.name)}`" class="btn btn-sm btn-outline-primary">View Course</a>                                </div>
                            </div>
                        </div>
                    </template>
                </div>
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

    <?php include('footer.html');?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
