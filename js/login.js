document.addEventListener("DOMContentLoaded", function () {
    const emailInput = document.getElementById("emailInput");
    const passwordInput = document.getElementById("passwordInput");
    const emailError = document.getElementById("emailError");
    const passwordError = document.getElementById("passwordError");
    const submitButton = document.getElementById("submit");
  
    submitButton.disabled = true; // Начально отключаем кнопку
  
    function validateEmail(email) {
      const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
      return emailPattern.test(email);
    }
  
    emailInput.addEventListener("input", function () {
      const email = emailInput.value;
      let isValidEmail = true;
      let emailErrorMessage = "";
  
      if (!validateEmail(email)) {
        isValidEmail = false;
        emailErrorMessage = "Введите корректный email адрес";
      }
  
      if (isValidEmail && passwordInput.value.length >= 8) {
        submitButton.disabled = false;
      } else {
        submitButton.disabled = true;
      }
  
      emailError.textContent = emailErrorMessage;
    });
  
    passwordInput.addEventListener("input", function () {
      const password = passwordInput.value;
      let isValidPassword = true;
      let passwordErrorMessage = "";
  
      // Пароль должен содержать не менее 8 символов
      if (password.length < 8) {
        isValidPassword = false;
        passwordErrorMessage = "Пароль должен содержать не менее 8 символов";
      }
  
      // Пароль должен содержать хотя бы одну букву в верхнем регистре, одну букву в нижнем регистре и одну цифру
      if (!/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/.test(password)) {
        isValidPassword = false;
        passwordErrorMessage +=
          " Пароль должен содержать хотя бы одну букву в верхнем регистре, одну букву в нижнем регистре и одну цифру";
      }
  
      // Пароль должен содержать хотя бы один специальный символ, такой как @, #, $ и т. д.
      if (!/[!@#\$%^&*()_+{}\[\]:;<>,.?~\\-]/.test(password)) {
        isValidPassword = false;
        passwordErrorMessage +=
          " Пароль должен содержать хотя бы один специальный символ, такой как @, #, $ и т. д.";
      }
  
      if (isValidPassword && validateEmail(emailInput.value)) {
        submitButton.disabled = false;
      } else {
        submitButton.disabled = true;
      }
  
      passwordError.textContent = passwordErrorMessage;
    });
  });