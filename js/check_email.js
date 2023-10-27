const regBtn = document.querySelector('.auth_but')

async function checkEmail(email) {
    const form = new FormData();
    const emailError = document.getElementById('emailUniq');
    form.append('email', email);
    try {
        let response = await fetch('../check_email.php', {
            method: 'POST',
            body: form
        });
        let result = await response.text();
        console.log('Проверка email:', result);
        if (result) {
            emailError.classList.add('hidden');
            // regBtn.disabled = false;
        } else {
            emailError.classList.remove('hidden');
            // regBtn.disabled = true;
        }
    } catch (err) {
        console.log('Ошибка при проверке email:', err);
    }
}

const emailForm = document.getElementById('auth_form');
emailForm.addEventListener('submit', () => {
    const emailInput = document.getElementById('emailInput');
    const emailValue = emailInput.value;
    checkEmail(emailValue);
})



// async function checkEmail(email) {
//     const form = new FormData();
//     form.append('email', email);
//     try {
//         let response = await fetch('../check_email.php', {
//             method: 'POST',
//             body: form
//         });
//         let result = await response.text();
//         console.log('Проверка email:', result);
//         return result === 'unique'; // Вернуть true, если почта уникальна
//     } catch (err) {
//         console.log('Ошибка при проверке email:', err);
//         return false; // Если произошла ошибка, считаем, что почта не уникальна
//     }
// }

// const emailForm = document.getElementById('auth_form');
// emailForm.addEventListener('submit', async (event) => {
//     event.preventDefault(); // Отмена отправки формы по умолчанию

//     const emailInput = document.getElementById('emailInput');
//     const emailValue = emailInput.value;

//     // Проверка на оригинальность почты в бд
//     const isEmailUnique = await checkEmail(emailValue);

//     const emailError = document.getElementById('emailUniq');
//     emailError.classList.add('hidden'); // Скрываем сообщение об ошибке

//     if (!isEmailUnique) {
//         emailError.classList.remove('hidden'); // Показываем сообщение об ошибке
//         return; // Остановка отправки формы и вывод сообщ
//     }
// })
