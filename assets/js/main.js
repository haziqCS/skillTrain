// Fetch the JSON data from the external file
fetch('/assets/data/courses.json')
  .then(response => response.json())  // Parse the JSON data
  .then(coursesData => {
    // Save the courses data to localStorage
    localStorage.setItem('courses', JSON.stringify(coursesData.courses));

    // Optionally, you can check if the data is saved correctly by logging it to the console
    console.log('Courses data saved to localStorage:', JSON.parse(localStorage.getItem('courses')));
  })
  .catch(error => {
    console.error('Error loading the courses data:', error);
  });

  // Fetch the JSON data from the external file
fetch('/assets/data/users.json')
.then(response => response.json())  // Parse the JSON data
.then(usersData => {
  // Save the users data to localStorage
  localStorage.setItem('users', JSON.stringify(usersData.users));

  // Optionally, you can check if the data is saved correctly by logging it to the console
  console.log('Users data saved to localStorage:', JSON.parse(localStorage.getItem('users')));
})
.catch(error => {
  console.error('Error loading the users data:', error);
});

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
      notifications: [], // Add notifications array 


      init() {
          // Retrieve user data from localStorage
          const currentUser = JSON.parse(localStorage.getItem('currentUser'));

          if (currentUser) {
              this.fullname = currentUser.fullname;
              this.email = currentUser.email;
              this.registerDate = currentUser.date_registered;
              this.registeredCourses = currentUser.registeredCourses || [];
              this.waitlist = currentUser.waitlist || [];
              this.notifications = currentUser.notifications || []; // Load notifications

              console.log('Notifications length:', this.notifications.length);
          } else {
              console.error('No user data found in localStorage.');
          }
      },

      dropCourse(course) {
          // Remove the course from the registeredCourses array
          this.registeredCourses = this.registeredCourses.filter(c => c.name !== course.name);

          // Update the currentUser data in localStorage
          const currentUser = JSON.parse(localStorage.getItem('currentUser'));
          if (currentUser) {
              currentUser.registeredCourses = this.registeredCourses;
              localStorage.setItem('currentUser', JSON.stringify(currentUser));
          }

          // Optionally log the updated list to the console
          console.log('Updated registered courses:', this.registeredCourses);
      }
  }));
});
