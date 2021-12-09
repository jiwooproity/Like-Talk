const form = document.querySelector('.form__signup form');
const continueBtn = form.querySelector('.submit');
const errorText = document.querySelector('.error__text');

form.onsubmit = (e) => {
    e.preventDefault(); // 다시 시작 차단
}

continueBtn.addEventListener('click', () => {
    let xhr = new XMLHttpRequest(); // creating XML object
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                
                if(data == "success") {
                    location.href="users.php";
                } else {
                    errorText.style.display = "block";
                    errorText.textContent = data;
                }
            }
        }
    }

    let formData = new FormData(form);
    xhr.send(formData);
})