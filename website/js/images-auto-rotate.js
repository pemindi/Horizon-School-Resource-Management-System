// Wait for the DOM to be loaded
document.addEventListener("DOMContentLoaded", function() {
    // Get all slide elements
    var slides = document.querySelectorAll(".slide");
    
    // Set the initial active slide
    var currentSlide = 0;
    slides[currentSlide].classList.add("active");
    
    // Auto slide function
    function autoSlide() {
      // Remove active class from the current slide
      slides[currentSlide].classList.remove("active");
      
      // Increment the current slide index
      currentSlide++;
      
      // If reached the end, loop back to the first slide
      if (currentSlide >= slides.length) {
        currentSlide = 0;
      }
      
      // Add active class to the next slide
      slides[currentSlide].classList.add("active");
    }
    
    // Call autoSlide function every 3 seconds (adjust the delay as needed)
    setInterval(autoSlide, 3000);
  });