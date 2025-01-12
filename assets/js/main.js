//Check if main.js is included
console.log('main.js loaded');

// Fetch currentUser only after login or registration
function fetchCurrentUserData() {
    fetch('/assets/data/currentUser.json')
        .then(response => response.json())
        .then(data => {
            console.log('Current User:', data.currentUser);

            // Save the user's data to localStorage
            localStorage.setItem('currentUser', JSON.stringify(data.currentUser));

            // Optionally, you can check if the data is saved correctly by logging it to the console
            console.log('Current user data saved to localStorage:', JSON.parse(localStorage.getItem('currentUser')));
        })
        .catch(error => console.error('Error loading current user data:', error));
}

document.addEventListener('alpine:init', () => {
    console.log('Alpine initialized');  // Add this line to check if Alpine is properly initialized

    // Header Data Component
    Alpine.data('headerData', () => ({
        currentPage: window.location.pathname,
        currentUser: localStorage.getItem('currentUser'),
          // Log currentUser to console
          init() {
            console.log('Current User:', this.currentUser);
        },
        logout() {
            localStorage.removeItem('currentUser');
            window.location.href = 'login.php';
        }
    }));

    console.log("header data initialized");

    // Course Filter Component
    Alpine.data('courseFilter', () => ({
        search: new URLSearchParams(window.location.search).get('search') || "",
        categories: {
            networking: false,
            routing: false,
            security: false,
            python: false,
        },
        courses: JSON.parse(localStorage.getItem('courses')) || [],
        get filteredCourses() {
            console.log("Filtering courses");  // Add a log to check if this function is called
            const searchQuery = this.search.trim().toLowerCase();
            return this.courses.filter(course => {
                const matchesSearch = searchQuery === '' || course.name.toLowerCase().includes(searchQuery);
                const matchesCategory = Object.values(this.categories).some(val => val)
                    ? this.categories[course.category]
                    : true;
                return matchesSearch && matchesCategory;
            });
        },
        submitSearch() {
            window.location.href = `explore.php?search=${encodeURIComponent(this.search)}`;
        },
        saveCurrentCourse(course) {
            // Save the course to localStorage
            localStorage.setItem('currentCourse', JSON.stringify(course));
    
            // Navigate to the detail page
            const courseName = encodeURIComponent(course.name);
            window.location.href = `detail.php?courseName=${courseName}`;
        }
    }));

    // User Profile Component
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
        this.waitlist = currentUser.waitlist || [];  // Ensure this is initialized as an empty array if not found
        this.notifications = currentUser.notifications || [];
        console.log('User profile loaded from localStorage:', currentUser);
    } else {
        console.error('No user profile found in localStorage.');
        this.waitlist = []; // Initialize waitlist in case no user is found
    }
},
    
        // Check if the course is already registered
        isRegistered(course) {
            return this.registeredCourses.some(c => c.name === course.name);
        },
    
        // Add course to the waitlist
        addToWaitlist(course) {
            if (!course || !course.name) {
                console.error('Invalid course object:', course);
                return;
            }
        
            if (!this.isRegistered(course)) {
                this.waitlist.push(course);
                const currentUser = JSON.parse(localStorage.getItem('currentUser'));
                if (currentUser) {
                    currentUser.waitlist = this.waitlist;
                    localStorage.setItem('currentUser', JSON.stringify(currentUser));
                }
                console.log('Added to waitlist:', course);
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

    // Course Data Component
    Alpine.data('courseData', () => ({
        course: {},
        async init() {
            const courses = JSON.parse(localStorage.getItem('courses')) || [];
            const courseName = new URLSearchParams(window.location.search).get('courseName');
            this.course = courses.find(course => course.name === courseName) || courses[0];

            if (!this.course) {
                console.error('Course not found in localStorage.');
            }
        },
        getStars(rating) {
            const fullStars = Math.floor(rating);
            const halfStar = rating % 1 >= 0.5 ? '&#9733;' : '';
            return '&#9733;'.repeat(fullStars) + halfStar + '&#9734;'.repeat(5 - fullStars - (halfStar ? 1 : 0));
        },
        registerCourse() {
            const modal = bootstrap.Modal.getInstance(document.getElementById('confirmationModal'));
            modal.hide();

            if (this.course.availability !== 'Open') {
                alert('This course is currently not available for registration.');
                return;
            }

            if (this.course.immediate_registration === 'Yes') {
                alert('You have successfully registered for the course!');
            } else {
                alert('You have successfully applied for the course!');
            }
        }
    }));

    // Course Registration Component
    Alpine.data('courseRegistration', () => ({
        course: {
            name: '',
            availability: '',
            immediate_registration: ''
        },
        isRegistered: false,
        isWaitlisted: false,

        init() {
            const currentUser = JSON.parse(localStorage.getItem('currentUser'));
        
            if (currentUser) {
                const registeredCourses = currentUser.registeredCourses.map(c => c.name);
                const waitlistedCourses = currentUser.waitlist.map(c => c.name);
        
                // Check if the course is in the registered courses or the waitlist
                this.isRegistered = registeredCourses.includes(this.course.name);
                this.isWaitlisted = waitlistedCourses.includes(this.course.name);

                console.log('Is Registered:', this.isRegistered);
                console.log('Is Waitlisted:', this.isWaitlisted);
            } else {
                console.error('No user data found in localStorage.');
            }
        },

        showConfirmationModal() {
            const modal = new bootstrap.Modal(document.getElementById('confirmationModal'));
            modal.show();
        },

        registerCourse() {
            const modal = bootstrap.Modal.getInstance(document.getElementById('confirmationModal'));
            modal.hide();

            if (this.course.availability !== 'Open') {
                alert('This course is currently not available for registration.');
                return;
            }

            if (this.course.immediate_registration === 'Yes') {
                alert('You have successfully registered for the course!');
                this.addCourseToUser('registered');
            } else {
                alert('You have successfully applied for the course!');
                this.addCourseToUser('waitlisted');
            }
        },

        addCourseToUser(status) {
            const currentUser = JSON.parse(localStorage.getItem('currentUser'));

            if (currentUser) {
                if (status === 'registered') {
                    currentUser.registeredCourses.push({
                        name: this.course.name,
                        description: this.course.description
                    });
                } else if (status === 'waitlisted') {
                    currentUser.waitlist.push({
                        name: this.course.name,
                        description: this.course.description
                    });
                }
                localStorage.setItem('currentUser', JSON.stringify(currentUser));
            }
        }
    }));

    // Course Lesson Page Component
    Alpine.data('lessonPageData', () => ({
        course: {},
        currentLessonIndex: 0,

        async init() {
            // Keep the course name functionality intact
            const courseName = new URLSearchParams(window.location.search).get('courseName');
            
            // Set course name
            this.course = { name: courseName };

            // Generate placeholder lessons
            this.course.lessons = [
                { name: 'Lesson 1: Introduction' },
                { name: 'Lesson 2: Basics of Programming' },
                { name: 'Lesson 3: Advanced Concepts' },
                { name: 'Lesson 4: Project Work' },
                { name: 'Lesson 5: Final Exam' }
            ];
        },

        get currentLesson() {
            return this.course.lessons ? this.course.lessons[this.currentLessonIndex] : {};
        }
    }));
});

//Lesson Sidebar Toggle
document.addEventListener("DOMContentLoaded", function () {
    const toggler = document.querySelector(".toggler-btn");
    toggler.addEventListener("click", function () {
        document.querySelector("#sidebar").classList.toggle("collapsed");
    });

    const tooltipTrigger = document.getElementById('tooltipButton');
    const tooltip = new bootstrap.Tooltip(tooltipTrigger);

    tooltipTrigger.addEventListener('click', function () {
        tooltip.hide(); // Hides the tooltip when the button is clicked
    });
});