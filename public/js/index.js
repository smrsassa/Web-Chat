const options = document.querySelector(".options"),
      optionsDropdown = document.querySelector(".optionsDropdown");


optionsDropdown.style.display = 'none';

options.onclick = () => {
    if (optionsDropdown.style.display == 'none') {
        return optionsDropdown.style.display = 'block';
    }
    optionsDropdown.style.display = 'none';
}
