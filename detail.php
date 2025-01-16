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

</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5" x-data="courseData">
        <!-- Course Header -->
        <div class="row">
            <div class="col-md-8">
                <h1 class="display-4" x-text="course.name"></h1>
                <p class="text-muted">Category: <span class="badge bg-secondary" x-text="course.category"></span></p>
            </div>
            <div class="col-md-4 text-md-end">
                <p class="fs-5">Instructor: <strong x-text="course.instructor"></strong></p>
                <p class="fs-5">Ratings: <span class="text-warning" x-html="getStars(course.ratings)"></span> (<span x-text="course.ratings"></span>/5)</p>
            </div>
        </div>

        <hr>

        <!-- Course Description -->
        <div class="row mb-4">
            <div class="col-md-12">
                <h3>Description</h3>
                <p x-text="course.description"></p>
            </div>
        </div>

        <!-- Course Details -->
        <div class="row mb-4">
            <div class="col-md-6">
                <h5>Estimated Duration:</h5>
                <p x-text="course.estimated_duration"></p>

                <h5>Availability:</h5>
                <p><span class="badge" :class="course.availability === 'Open' ? 'bg-success' : 'bg-danger'" x-text="course.availability"></span></p>
            </div>
            <div class="col-md-6">
                <h5>Number of Students Enrolled:</h5>
                <p x-text="course.currently_enrolled"></p>

                <h5>Immediate Registration:</h5>
                <p x-text="course.immediate_registration"></p>
            </div>
        </div>

        <!-- Course Learning Objectives -->
        <div class="row mb-4">
            <div class="col-md-12">
                <h3>Course Learning Objectives (CLO)</h3>
                <ul>
                    <template x-for="objective in course.CLO" :key="objective">
                        <li x-text="objective"></li>
                    </template>
                </ul>
            </div>
        </div>

        <!-- Register Button -->
<div x-data="courseRegistration">
    <div class="row">
        <div class="col-md-12 text-center">
        <button 
        x-bind:class="{
            'btn': true,
            'btn-primary': course.availability.includes('Open') && course.immediate_registration === 'Yes' && !isRegistered && !isWaitlisted,
            'btn-secondary': !course.availability.includes('Open') || course.immediate_registration !== 'Yes' || isRegistered || isWaitlisted,
            'disabled': !course.availability.includes   ('Open') && !isRegistered && !isWaitlisted
        }"
            x-bind:disabled="course.availability !== 'Open' && !isRegistered && !isWaitlisted"
            x-text="
                isRegistered
                    ? 'Yeay! You\'ve already joined this course.'
                    : isWaitlisted
                        ? 'Registration submitted. Please check your email/notification for updates. ; )'
                        : course.immediate_registration === 'Yes'
                            ? 'Register Now'
                            : (course.availability === 'Open'
                                ? 'Apply for this Course'
                                : 'Oops, this course is already full.')
            "
            @click="!isRegistered && !isWaitlisted && showConfirmationModal"
        ></button>
        <!-- Button to Link to Course Lesson Page (only visible if registered) -->
        <!-- Button to navigate to the course lesson page -->
        <button 
            x-show="isRegistered"
            class="btn btn-success"
            :disabled="!isRegistered"
            @click="window.location.href = 'courseLesson.php?courseName=' + course.name">
            Go to Course Lessons
        </button>
        </div>
    </div>
</div>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirm Registration</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        Are you sure you want to 
                        <span x-text="course.immediate_registration === 'Yes' ? 'register' : 'apply'"></span> 
                        for this course?
                    </p>
                    <p x-show="course.immediate_registration !== 'Yes'">
                        You will be notified if your application is accepted.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" @click="registerCourse">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    </div>

    <?php include('footer.html');?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script src="/assets/js/main.js"></script>

</body>
</html>
