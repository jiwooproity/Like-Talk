const onceEyeBtn = document.querySelector('.field i');
const onecField = document.querySelector('.field input[type="password"]')
const loginError = document.querySelector('.error__text');
const loginForm = document.querySelector('.form__login form');
const continueBtn = loginForm.querySelector('.submit');

onceEyeBtn.addEventListener('click', () => {
    if(onecField.type == "password") {
        onecField.type = "text";
        onceEyeBtn.classList.add('active');
    } else {
        onecField.type = "password";
        onceEyeBtn.classList.remove('active');
    }
})

loginForm.onsubmit = (e) => {
    e.preventDefault(); // 다시 시작 차단
}

continueBtn.addEventListener('click', () => {
    let xhr = new XMLHttpRequest(); // creating XML object
    xhr.open("POST", "php/login_ok.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                
                if(data == "success") {
                    location.href="users.php";
                } else {
                    loginError.style.display = "block";
                    loginError.textContent = data;
                }
            }
        }
    }

    let formData = new FormData(loginForm);
    xhr.send(formData);
})