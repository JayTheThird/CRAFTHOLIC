function popup(search_name) {
    get_popup = document.getElementById(search_name);
    if (get_popup.style.display == "flex") {
        get_popup.style.display = "none";
    } else {
        get_popup.style.display = "flex"
    }
}

