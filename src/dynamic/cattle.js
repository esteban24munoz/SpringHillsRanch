//FOR SALE BTN
let showPhoneNumber = document.querySelector(".forSale-btn");
let phoneNumber = document.querySelector(".phone-number");
let phoneIcon = document.querySelector(".phone-icon");

showPhoneNumber.addEventListener('mouseover', mouseOver);
showPhoneNumber.addEventListener('mouseout', mouseOut);

//MOUSE OVER
function mouseOver(){
    phoneNumber.style.transition = "all 2s";
    phoneNumber.innerHTML = '417-737-BEEF (2333)';
    phoneIcon.style.display = 'none';
}

//MOUSE OUT
function mouseOut(){
    phoneNumber.innerHTML = 'FOR SALE';
    phoneIcon.style.display = 'block';
}
  
