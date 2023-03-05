function popup(search_name) {
    get_popup = document.getElementById(search_name);
    if (get_popup.style.display == "flex") {
        get_popup.style.display = "none";
    } else {
        get_popup.style.display = "flex";
    }
}

// For Order
function track_order(popup_name) {
    get_popup = document.getElementById(popup_name);
    if (get_popup.style.display == "flex") {
        get_popup.style.display = "none";
    } else {
        get_popup.style.display = "flex";
    }
}


//  Placed order Msg
function msgPopup(popup_name) {
    get_popup = document.getElementById(popup_name);
    if (get_popup.style.display == "flex") {
        get_popup.style.display = "none";
    }
    else {
        get_popup.style.display = "flex";
    }
}


// For FeedBack
function Feedback(popup_name){
    get_popup = document.getElementById(popup_name);
    if (get_popup.style.display == "flex") {
        get_popup.style.display = "none";
    }
    else {
        get_popup.style.display = "flex";
    }

}





