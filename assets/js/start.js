//Data Initialization
//Check if data is inserted
console.log('start.js loaded');

// Function to fetch and save data to localStorage
function fetchDataAndSaveToLocalStorage(key, url) {
    // Check if the data is already in localStorage
    if (!localStorage.getItem(key)) {
        fetch(url)
            .then(response => response.json()) // Parse the JSON data
            .then(data => {
                // Save the fetched data to localStorage
                localStorage.setItem(key, JSON.stringify(data[key]));
                console.log(`${key} data saved to localStorage:`, data[key]);
            })
            .catch(error => {
                console.error(`Error loading the ${key} data:`, error);
            });
    } else {
        console.log(`${key} data already loaded from localStorage:`, JSON.parse(localStorage.getItem(key)));
    }
}

// Fetch courses and users data only if not present in localStorage
if (!localStorage.getItem('courses')) {
    fetchDataAndSaveToLocalStorage('courses', '/assets/data/courses.json');
}

if (!localStorage.getItem('users')) {
    fetchDataAndSaveToLocalStorage('users', '/assets/data/users.json');
}