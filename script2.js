const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');
const regBtn = document.getElementById("hidd");
const logBtn = document.getElementById("hidd2");

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

logBtn.addEventListener('click', () => {
    container.classList.add("active");
});

regBtn.addEventListener('click', () => {
    container.classList.remove("active");
});
