function userRegistration() {
    return {
        user: {
            fullname: '',
            email: '',
            password: '',
            confirmPassword: ''
        },
        // Handle the registration form submission
        registerUser() {
            // Basic form validation
            if (!this.user.fullname || !this.user.email || !this.user.password || !this.user.confirmPassword) {
                alert("All fields are required!");
                return;
            }

            if (this.user.password !== this.user.confirmPassword) {
                alert("Passwords do not match!");
                return;
            }

            // Get existing users from localStorage
            let users = JSON.parse(localStorage.getItem('users')) || [];

            // Check if the user already exists
            if (users.some(u => u.email === this.user.email)) {
                alert("User with this email already exists!");
                return;
            }

            // Create new user object
            const newUser = {
                fullname: this.user.fullname,
                email: this.user.email,
                password: this.user.password,
                notifications: []
            };

            // Add new user to the list
            users.push(newUser);

            // Store the updated users array in localStorage
            localStorage.setItem('users', JSON.stringify(users));

            alert("User registered successfully!");

            // Reset the form
            this.user.fullname = '';
            this.user.email = '';
            this.user.password = '';
            this.user.confirmPassword = '';
        }
    }
}