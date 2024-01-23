"use strict";

const verificationCheckbox = document.querySelector("#verificationCheckbox");
const removeVideoBtn = document.querySelector("#removeVideoBtn");
const removeVideoForm = document.querySelector("#removeVideoForm");
const videoId = document.querySelector("#removeVideoId");
const errorMessage = document.querySelector("#errorMessage");

removeVideoBtn.disabled = true;

verificationCheckbox.addEventListener("change", function () {
  removeVideoBtn.disabled = !this.checked;
});

function validateForm() {
  const videoIdValue = parseInt(videoId.value);

  const rules = [!isNaN(videoIdValue), videoIdValue > 0];

  const result = rules.every(Boolean);

  if (result === false) {
    videoId.classList.add("is-invalid");
    errorMessage.style.display = "block";
    errorMessage.textContent = "Proszę wpisać poprawny ID filmu.";
  } else {
    videoId.classList.remove("is-invalid");
    errorMessage.style.display = "none";
  }

  return result;
}

removeVideoForm.addEventListener("submit", function (event) {
  event.preventDefault();
  if (validateForm() === true) {
    this.submit();
  }
});
