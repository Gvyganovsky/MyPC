// Функция для проверки валидности email
function isValidEmail(email) {
  const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  return emailRegex.test(email);
}

// Функция для проверки валидности имени
function isValidName(name) {
  const nameRegex = /^[A-Za-zА-Яа-я\s-]+$/;
  const isValidLength = name.length >= 2 && name.length <= 30;
  return nameRegex.test(name) && isValidLength;
}

// Функция для проверки валидности пароля
function isValidPassword(password) {
  if (password.length < 8) {
      return 'Пароль должен содержать не менее 8 символов';
  }

  const hasLowerCase = /[a-z]/.test(password);
  const hasUpperCase = /[A-Z]/.test(password);
  const hasDigit = /\d/.test(password);

  if (!(hasLowerCase && hasUpperCase && hasDigit)) {
      return 'Пароль должен содержать хотя бы одну букву в верхнем регистре, одну букву в нижнем регистре и одну цифру';
  }

  const hasSpecialChar = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/.test(password);
  if (!hasSpecialChar) {
      return 'Пароль должен содержать хотя бы один специальный символ, такой как @, #, $ и т. д.';
  }

  return true;
}

// Обработчик события отправки формы
document.getElementById('auth_form').addEventListener('submit', function (event) {
  const emailInput = document.getElementById('emailInput');
  const emailValue = emailInput.value;
  const firstNameInput = document.getElementById('first_nameInput');
  const firstNameValue = firstNameInput.value;
  const lastNameInput = document.getElementById('last_nameInput');
  const lastNameValue = lastNameInput.value;
  const passwordInput = document.getElementById('passwordInput');
  const passwordValue = passwordInput.value;
  const passwordRepeatInput = document.getElementById('passwordRepeatInput');
  const passwordRepeatValue = passwordRepeatInput.value;

  const emailError = document.getElementById('emailError');
  const firstNameError = document.getElementById('firstNameError');
  const lastNameError = document.getElementById('lastNameError');
  const passwordError = document.getElementById('passwordError');
  const passwordRepeatError = document.getElementById('passwordRepeatError');

  emailError.textContent = '';
  firstNameError.textContent = '';
  lastNameError.textContent = '';
  passwordError.textContent = '';
  passwordRepeatError.textContent = '';

  if (!isValidEmail(emailValue)) {
      emailError.textContent = 'Неверный формат email';
      event.preventDefault();
  }

  if (!isValidName(firstNameValue)) {
      firstNameError.textContent = 'Имя должно содержать буквы (латиницу или кириллицу) (2-30 символов)';
      event.preventDefault();
  }

  if (!isValidName(lastNameValue)) {
      lastNameError.textContent = 'Фамилия должна содержать буквы (латиницу или кириллицу) (2-30 символов)';
      event.preventDefault();
  }

  const passwordValidation = isValidPassword(passwordValue);
  if (passwordValidation !== true) {
      passwordError.textContent = passwordValidation;
      event.preventDefault();
  }

  if (passwordValue !== passwordRepeatValue) {
      passwordRepeatError.textContent = 'Пароли не совпадают';
      event.preventDefault();
  }
});
