window.addEventListener('load', () => {
    const cookieDiv = document.querySelector('.cookie-div');
    if (!localStorage.getItem('cookie-accepted')) {
        cookieDiv.classList.remove('hidden');
    }
})

document.getElementById('accept-cookie').addEventListener('click', () => {
    const cookieDiv = document.querySelector('.cookie-div');
    cookieDiv.classList.add('hidden');
    localStorage.setItem('cookie-accepted', 'true');
})


const cookieDiv = document.querySelector('.cookie-div');
const acceptButton = document.getElementById('accept-cookie');

acceptButton.addEventListener('click', function () {
    cookieDiv.classList.add('hidden');
});