const searchBar = document.querySelector('.users .search input'),
  searchBtn = document.querySelector('.users .search button'),
  usersList = document.querySelector('.users .users-list');

searchBtn.onclick = () => {
  searchBar.classList.toggle('active');
  searchBar.focus();
  searchBtn.classList.toggle('active');
};

searchBar.onkeyup = () => {
  let searchTerm = searchBar.value;
  // start Ajax
  let xhr = new XMLHttpRequest(); // creating XML object
  xhr.open('POST', 'php/search.php', true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        console.log(data);
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded'")
  xhr.send("searchTerm" + searchTerm);
};

// ???
setInterval(() => {
  let xhr = new XMLHttpRequest(); // creating XML object
  xhr.open('POST', 'php/signup.php', true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        usersList.innerHTML = data;
      }
    }
  };
  xhr.send();
}, 500); //this function will run frequently after 500ms
