// Function to fetch and save data to localStorage
function fetchDataAndSaveToLocalStorage(key, url) {
    // Check if the data is already in localStorage
    if (!localStorage.getItem(key)) {
      fetch(url)
        .then(response => response.json()) // Parse the JSON data
        .then(data => {
          // Save the fetched data to localStorage
          localStorage.setItem(key, JSON.stringify(data[key]));
  
          // Log confirmation to the console
          console.log(`${key} data saved to localStorage:`, data[key]);
        })
        .catch(error => {
          console.error(`Error loading the ${key} data:`, error);
        });
    } else {
      console.log(`${key} data already loaded from localStorage:`, JSON.parse(localStorage.getItem(key)));
    }
  }
  
  // Fetch courses and users data
  fetchDataAndSaveToLocalStorage('courses', '/assets/data/courses.json');
  fetchDataAndSaveToLocalStorage('users', '/assets/data/users.json');

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

document.addEventListener('DOMContentLoaded', () => {
    console.log(window.location.pathname); // Should log something like "/profile.php"
});

  document.addEventListener('alpine:init', () => {
    // Course Filter Component
    Alpine.data('courseFilter', () => ({
        // Initialize the search value from the URL query parameter
        search: new URLSearchParams(window.location.search).get('search') || "",

        categories: {
            networking: false,
            routing: false,
            security: false,
            python: false,
        },

        // Retrieve the courses from localStorage, or use an empty array if not found
        courses: JSON.parse(localStorage.getItem('courses')) || [],

        get filteredCourses() {
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
            // Redirect to explore.php with the search query
            window.location.href = `explore.php?search=${encodeURIComponent(this.search)}`;
        }
    }));

    Alpine.data('userProfile', () => ({
        fullname: '',
        email: '',
        registerDate: '',
        registeredCourses: [],
        waitlist: [],
        notifications: [],
        courseToDrop: null, // Store the course to be dropped
    
        init() {
            const currentUser = JSON.parse(localStorage.getItem('currentUser'));
    
            if (currentUser) {
                this.fullname = currentUser.fullname;
                this.email = currentUser.email;
                this.registerDate = currentUser.date_registered;
                this.registeredCourses = currentUser.registeredCourses || [];
                this.waitlist = currentUser.waitlist || [];
                this.notifications = currentUser.notifications || [];
            } else {
                console.error('No user data found in localStorage.');
            }
        },
    
        dropCourse(course) {
            // Store the course to be dropped
            this.courseToDrop = course;
    
            // Show the confirmation modal
            const modal = new bootstrap.Modal(document.getElementById('dropCourseModal'));
            modal.show();
        },
    
        confirmDropCourse() {
            if (!this.courseToDrop) return;
    
            // Remove the course from the registeredCourses array
            this.registeredCourses = this.registeredCourses.filter(c => c.name !== this.courseToDrop.name);
    
            // Update the currentUser data in localStorage
            const currentUser = JSON.parse(localStorage.getItem('currentUser'));
            if (currentUser) {
                currentUser.registeredCourses = this.registeredCourses;
                localStorage.setItem('currentUser', JSON.stringify(currentUser));
            }
    
            // Optionally log the updated list to the console
            console.log('Updated registered courses:', this.registeredCourses);
    
            // Reset the courseToDrop
            this.courseToDrop = null;
    
            // Hide the modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('dropCourseModal'));
            modal.hide();
        }
    }));
    

  Alpine.data('courseData', () => ({
    course: {},
    async init() {
        // Retrieve courses from localStorage
        const courses = JSON.parse(localStorage.getItem('courses')) || [];
        const courseName = new URLSearchParams(window.location.search).get('courseName');

        // Find the specific course by name
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
      // Hide the modal
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

      // Optionally, you can store the registration in localStorage or update user data here
      // For example, adding the course to the user's registered courses list
  }
}));

Alpine.data('courseRegistration', () => ({
    course: {
        name: 'Networking Basics', // Example course name
        availability: 'Open', // Example course availability
        immediate_registration: 'Yes' // Example registration type
    },
    isRegistered: false,  // Initialize as false
    isWaitlisted: false,  // Initialize as false

    init() {
        // Access the currentUser data from localStorage
        const currentUser = JSON.parse(localStorage.getItem('currentUser'));

        if (currentUser) {
            // Check if the course is in the registeredCourses or waitlist
            const registeredCourses = currentUser.registeredCourses.map(c => c.name);
            const waitlistedCourses = currentUser.waitlist.map(c => c.name);

            // Update the registration status based on currentUser data
            this.isRegistered = registeredCourses.includes(this.course.name);
            this.isWaitlisted = waitlistedCourses.includes(this.course.name);
        } else {
            console.error('No user data found in localStorage.');
        }
    },

    showConfirmationModal() {
        // Show the confirmation modal (you need to have a modal with id 'confirmationModal' in your HTML)
        const modal = new bootstrap.Modal(document.getElementById('confirmationModal'));
        modal.show();
    },

    registerCourse() {
        // Hide the modal
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
        // Retrieve the currentUser data
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
            // Save the updated currentUser data back to localStorage
            localStorage.setItem('currentUser', JSON.stringify(currentUser));
        }
    }
}));


});
