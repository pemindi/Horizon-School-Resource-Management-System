const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

// Function to toggle the sign-in and sign-up modes
function toggleSignMode() {
  container.classList.toggle("sign-up-mode");
}

// Function to handle resizing of fonts and images
function handleResize() {
  const panelsContainer = document.querySelector(".panels-container");
  const panels = document.querySelectorAll(".panel");

  const panelWidth = panels[0].offsetWidth; // Get the width of a panel

  // Resize fonts based on panel width
  const fontSize = panelWidth / 15; // Adjust this ratio to your preference
  panels.forEach((panel) => {
    panel.style.fontSize = `${fontSize}px`;
  });

  // Resize images based on panel width
  const imageWidth = panelWidth * 0.8; // Adjust this ratio to your preference
  const images = document.querySelectorAll(".image");
  images.forEach((image) => {
    image.style.width = `${imageWidth}px`;
  });

  // Toggle sign-in and sign-up modes based on window width
  const windowWidth = window.innerWidth;
  if (windowWidth < 635 && container.classList.contains("sign-up-mode")) {
    container.classList.add("sign-up-mode");
  }  if (windowWidth >= 635 && container.classList.contains("sign-up-mode")) {
    container.classList.remove("sign-up-mode");
  }
  if (windowWidth < 635 && container.classList.contains("sign-in-mode")) {
    container.classList.add("sign-in-mode");
  } if (windowWidth >= 635 && container.classList.contains("sign-in-mode"))  {
    container.classList.remove("sign-in-mode");
 
  }
}

// Add event listeners
sign_in_btn.addEventListener("click", toggleSignMode);
sign_up_btn.addEventListener("click", toggleSignMode);
window.addEventListener("resize", handleResize);
window.addEventListener("load", handleResize);
