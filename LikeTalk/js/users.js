const searchBar = document.querySelector('.search input');
const searchBtn = document.querySelector('.search button');
const userList = document.querySelector('.user__list');

searchBtn.addEventListener('click', () => {
    searchBar.classList.toggle('active');
    searchBar.focus();
    searchBtn.classList.toggle('active');
    searchBar.value = "";
})

searchBar.onkeyup = () => {
    let searchTerm = searchBar.value;

    if(searchTerm != "") {
        searchBar.classList.add("active");
    } else {
        searchBar.classList.remove("active");
    }

    let xhr = new XMLHttpRequest(); // creating XML object
    xhr.open("POST", "php/search.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                userList.innerHTML = data;
            }
        }
    }

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
}

setInterval(() => {
    let xhr = new XMLHttpRequest(); // creating XML object
    xhr.open("GET", "php/users_list.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                if(!searchBar.classList.contains("active")) {
                    userList.innerHTML = data;
                }
            }
        }
    }

    xhr.send();
}, 500);