const form = document.querySelector('.form__update form');
const continueBtn = form.querySelector('.submit');
const errorText = document.querySelector('.error__text');
const inputProfile = document.querySelector('.input__profile input');
const deleteFrame = document.querySelector('.delete__frame');

form.onsubmit = (e) => {
    e.preventDefault(); // 다시 시작 차단
}

continueBtn.addEventListener('click', () => {
    let xhr = new XMLHttpRequest(); // creating XML object
    xhr.open("POST", "php/update_profile.php", true);
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

function readURL(input) {
    if(input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview__profile').src = e.target.result;
            document.querySelector('.profile__frame').classList.add('active');
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        document.getElementById('preview__profile').src = "img/none_profile.jpg";
    }
}

deleteFrame.addEventListener('click', () => {
    document.querySelector('.profile__frame').classList.remove('active');
    document.getElementById('preview__profile').src = "img/none_profile.jpg";
    
    const inputImage = document.getElementById('input__profile');
    inputImage.select();
    document.selection.clear();
})