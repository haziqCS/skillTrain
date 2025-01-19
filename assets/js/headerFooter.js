function loadHeader() {
    const headerElement = document.getElementById('header-container');
    
    if (!headerElement) {
        console.error("Element with id 'header-container' not found!");
        return;
    }

    fetch('/components/header.html')
        .then(response => response.text())
        .then(data => {
            headerElement.innerHTML = data;
        })
        .catch(error => console.error('Error loading header:', error));
}

function loadFooter() {
    const footerElement = document.getElementById('footer-container');
    
    if (!footerElement) {
        console.error("Element with id 'footer-container' not found!");
        return;
    }

    fetch('/components/footer.html')
        .then(response => response.text())
        .then(data => {
            footerElement.innerHTML = data;
        })
        .catch(error => console.error('Error loading footer:', error));
}

window.onload = function() {
    loadHeader();
    loadFooter();
};