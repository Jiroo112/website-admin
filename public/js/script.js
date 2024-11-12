const body = document.querySelector("body"),
      sidebar = body.querySelector(".sidebar"),
      toggle = body.querySelector(".toggle");

      toggle.addEventListener("click", () =>{
        sidebar.classList.toggle("close");
      });

//Bagian Flasher

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

//Bagian Menu

  
//Bagian User
