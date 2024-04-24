//FOR SALE BTN
let showPhoneNumber = document.querySelectorAll(".forSale-btn");
let phoneNumber = document.querySelectorAll(".phone-number");
let hidePhoneIcon = document.querySelectorAll("#hidePhoneIcon");

    //ADD EVENTS TO FOR SALE BTN
    showPhoneNumber.forEach((btn) => {

        btn.addEventListener('mouseover', mouseOver);
        btn.addEventListener('mouseout', mouseOut);
    });

//MOUSE OVER
function mouseOver(){

    showPhoneNumber.forEach((btn) => {
        btn.style.transition = "all 2s";
        btn.innerHTML = '<p> 417-737-BEEF <br> (2333) </p>';
    });

    hidePhoneIcon.forEach(btn => {
        //show phone Icon
        btn.style.display = 'inline-block';
    })
    
}

//MOUSE OUT
function mouseOut(){

    showPhoneNumber.forEach((btn) => {
        btn.innerHTML = '<h5>FOR SALE</h5><p class="phone-icon">$ Call for Pricing</p>';
    });

    hidePhoneIcon.forEach(btn => {
        //hide icon
        btn.style.display = 'none';
    })
}
  