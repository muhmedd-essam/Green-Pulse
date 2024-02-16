document.addEventListener("DOMContentLoaded", function () {
  const formOpenBtn = document.querySelector("#form-open"),
    home = document.querySelector(".home"),
    formContainer = document.querySelector(".form_container"),
    formCloseBtn = document.querySelector(".form_close"),
    signupBtn = document.querySelector("#signup"),
    loginBtn = document.querySelector("#login"),
    pwShowHide = document.querySelectorAll(".pw_hide"),
    fileInput = document.getElementById("profilePicture"),
    successMessage = document.getElementById("successMessage");
    governmentMessage = document.getElementById("verificationSuccessMessage");

  formOpenBtn.addEventListener("click", () => home.classList.add("show"));
  formCloseBtn.addEventListener("click", () => home.classList.remove("show"));

  pwShowHide.forEach((icon) => {
    icon.addEventListener("click", () => {
      let getPwInput = icon.parentElement.querySelector("input");
      if (getPwInput.type === "password") {
        getPwInput.type = "text";
        icon.classList.replace("uil-eye-slash", "uil-eye");
      } else {
        getPwInput.type = "password";
        icon.classList.replace("uil-eye", "uil-eye-slash");
      }
    });
  });

  signupBtn.addEventListener("click", (e) => {
    e.preventDefault();
    formContainer.classList.add("active");
  });

  loginBtn.addEventListener("click", (e) => {
    e.preventDefault();
    formContainer.classList.remove("active");
  });

  fileInput.addEventListener("change", function () {
    // Check if a file is selected
    if (fileInput.files.length > 0) {
      // Display success message
      successMessage.textContent = "Image successfully uploaded!";
    }
  });

  const usernameRegex = /^[a-zA-Z0-9_-]+$/;
});

// Add this inside your existing JavaScript
const governmentEmployeeSelect = document.getElementById("governmentEmployee");
const verificationUploadContainer = document.getElementById("verificationUploadContainer");

governmentEmployeeSelect.addEventListener("change", () => {
    const selectedValue = governmentEmployeeSelect.value;
    if (selectedValue === "yes") {
        verificationUploadContainer.style.display = "block";
    } else {
        verificationUploadContainer.style.display = "none";
    }
});
verificationFileInput.addEventListener("change", function () {
  // Check if a file is selected
  if (verificationFileInput.files.length > 0) {
    // Display success message for verification document upload
    verificationSuccessMessage.textContent = "Verification document successfully uploaded!";
  }
});