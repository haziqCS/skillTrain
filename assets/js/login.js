// Fetch currentUser only after login or registration
function fetchCurrentUserData() {
    fetch('../api/currentUser.json')
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