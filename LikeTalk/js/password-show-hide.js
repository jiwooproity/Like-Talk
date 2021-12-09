const passwordField = Array.from(document.querySelectorAll(".field input[type='password']"));
const toggleBtn = Array.from(document.querySelectorAll(".field i"));

toggleBtn.map((item, index) => {
    item.addEventListener('click', () => {
        if(passwordField[index].type == 'password') {
            passwordField[index].type = 'text';
        } else {
            passwordField[index].type = 'password';
        }
    })
})