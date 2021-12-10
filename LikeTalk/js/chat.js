const typingForm = document.querySelector('.typing__form');
const sendBtn = document.querySelector('.typing__form button');
const textField = document.querySelector('.text__field');
const chatBox = document.querySelector('.chat__box');

typingForm.onsubmit = (e) => {
    e.preventDefault();
}

sendBtn.addEventListener('click', () => {
    let xhr = new XMLHttpRequest(); // creating XML object
    xhr.open("POST", "php/chat_insert.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                textField.value = "";
                scrollBottom();
            }
        }
    }

    let formData = new FormData(typingForm);
    xhr.send(formData);
})

setInterval(() => {
    let xhr = new XMLHttpRequest(); // creating XML object
    xhr.open("POST", "php/get_chat.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;
            }
        }
    }

    let formData = new FormData(typingForm);
    xhr.send(formData);
}, 500);

function scrollBottom() {
    chatBox.scrollTop = chatBox.scrollHeight;
}