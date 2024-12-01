const steps = document.querySelectorAll(".form-step");
const nextBtn = document.querySelector("#nextBtn");
const prevBtn = document.querySelector("#prevBtn");
const submitBtn = document.querySelector("#submitBtn");

let currentStep = 0;

function validateInputs() {
    const inputs = steps[currentStep].querySelectorAll("input[required]");
    let valid = true;

    inputs.forEach(input => {
        if (!input.value.trim()) {
            valid = false;
            input.classList.add("error");
        } else {
            input.classList.remove("error");
        }
    });

    return valid;
}

function updateSteps() {
    steps.forEach((step, index) => {
        step.classList.toggle("active", index === currentStep);
    });

    prevBtn.style.display = currentStep === 0 ? "none" : "inline-block";
    nextBtn.style.display = currentStep === steps.length - 1 ? "none" : "inline-block";
    submitBtn.style.display = currentStep === steps.length - 1 ? "inline-block" : "none";
}

nextBtn.addEventListener("click", () => {
    if (currentStep < steps.length - 1) {
        currentStep++;
        updateSteps();
    }
});

prevBtn.addEventListener("click", () => {
    if (currentStep > 0) {
        currentStep--;
        updateSteps();
    }
});

submitBtn.addEventListener("click", (e) => {
    if (!validateInputs()) {
        e.preventDefault(); // Mencegah submit jika input belum lengkap
        alert("Harap isi semua input sebelum mendaftar!");
    }
});

// Initialize
updateSteps();


//flasher
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
