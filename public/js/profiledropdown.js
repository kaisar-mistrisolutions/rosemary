let is_open = false;
document.getElementById("profile").style.zIndex = 9999;

document.getElementById("profile-list").style.display = "none";

function dropdownToggle() {
    if (is_open) {
        let dropdown = document.getElementById('profile-list');
        dropdown.style.display = "block";
        dropdown.style.transition = '.3s ease-in-out';
        is_open = false;
    }   else {
        let dropdown = document.getElementById('profile-list');
        dropdown.style.display = "none";
        dropdown.style.transition = '.3s ease-in-out';
        is_open = true;
    }
}
