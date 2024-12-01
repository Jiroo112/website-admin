document.addEventListener("DOMContentLoaded", function () {
    const flashMessage = document.querySelector(".flash-message");
    if (flashMessage) {
        flashMessage.classList.add("show");
  
  
        setTimeout(() => {
            flashMessage.classList.remove("show");
            flashMessage.classList.add("hide");
        }, 5000); 
  
  
        flashMessage.addEventListener("transitionend", function () {
            if (flashMessage.classList.contains("hide")) {
                flashMessage.remove(); 
            }
        });
    }
  });