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