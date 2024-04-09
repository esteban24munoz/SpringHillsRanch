//FOR SALE BTN
let showPhoneNumber = document.querySelectorAll(".forSale-btn");
let phoneNumber = document.querySelectorAll(".phone-number");
let phoneIcon = document.querySelectorAll(".phone-icon");
let showPhoneIcon = document.querySelectorAll("#hidePhoneIcon");

    showPhoneNumber.forEach((btn) => {

        btn.addEventListener('mouseover', mouseOver);
        showPhoneNumber.addEventListener('mouseout', mouseOut);
    });

//MOUSE OVER
function mouseOver(){
    phoneNumber.style.transition = "all 2s";
    phoneNumber.innerHTML = '417-737-BEEF <br> (2333)';
    phoneIcon.style.display = 'none';
    // show icon
    showPhoneIcon.style.display = 'inline-block';
    
}

//MOUSE OUT
function mouseOut(){
    phoneNumber.innerHTML = 'FOR SALE';
    phoneIcon.style.display = 'block';

    //hide icon
    showPhoneIcon.style.display = 'none';

}
  
