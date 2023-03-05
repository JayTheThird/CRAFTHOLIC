// click hamburger menu
// const bar = document.getElementById('bar'); 
// const nav = document.getElementById('nav'); 

// if('bar'){
//     bar.addEventListener('click',() =>{
//         nav.classList.add('active');
//     }) 
// }

// function popup1(popup_name){
//     get_popup=document.getElementById(popup_name);
//     if(get_popup.style.display=="flex"){
//         get_popup.style.display="none";
//     }
//     else{
//         get_popup.style.display="flex"
//     }

// }

 // For User Profile Menu
 const UserMenu = document.getElementById('User-Menu');
 const UserClose = document.getElementById('User-Close');
 const nav2 = document.getElementById('User-slider');
 if ('UserMenu') {
     UserMenu.addEventListener('click', () => {
         nav2.classList.add('User-Active');
     })
 }
 if ('UserClose') {
     UserClose.addEventListener('click', () => {
         nav2.classList.remove('User-Active');
     })
 }