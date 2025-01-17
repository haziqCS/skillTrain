function loadFooter() {
    const footerElement = document.getElementById('footer-container');
    
    if (!footerElement) {
        console.error("Element with id 'footer-container' not found!");
        return;
    }

    fetch('footer.html')
        .then(response => response.text())
        .then(data => {
            footerElement.innerHTML = data;
        })
        .catch(error => console.error('Error loading footer:', error));
}

window.onload = loadFooter;