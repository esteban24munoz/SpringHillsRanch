const wrapper = document.querySelector(".wrapper");
const carousel = document.querySelector(".carousel");
const arrowBtns = document.querySelectorAll(".wrapper i");
const firstCardWidth = carousel.querySelector(".card").offsetWidth;
const carouselChildrens = [...carousel.children];

let isDragging = false, startX, startScrollLeft, timeoutId;


//Number of card that can fit in the carousel at once
let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);

//Insert copues of the last few card to beginning of carouse for infinite scrolling
carouselChildrens.slice(-cardPerView).reverse().forEach(card => {
    carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
})

carouselChildrens.slice(0, -cardPerView).reverse().forEach(card => {
    carousel.insertAdjacentHTML("beforeend", card.outerHTML);
})



//Event listeneres for the arrow to scroll
arrowBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        carousel.scrollLeft += btn.id === "left" ? -firstCardWidth : firstCardWidth;
    })
});


const dragStart = (e) => {
    isDragging = true;
    carousel.classList.add("dragging");
    //record initial cursor and scroll position
    startX = e.pageX;
    startScrollLeft = carousel.scrollLeft;
}

const dragging = (e) => {
    if(!isDragging) return; //move left or right
    //update scroll position of the carousel based on cursor
  carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
}


const dragStop = () => {
    isDragging = false;
    carousel.classList.remove("dragging");
}

//AUTOPLAY

const autoPlay = () => {
    if(window.innerWidth < 800) return;//return if window is smaller than 800

    timeoutId = setTimeout(() => carousel.scrollLeft += firstCardWidth, 2500);
}


//INFINITE SCROLL

const infiniteScroll = () => {
    //if carousel is at the beginning, scroll to the end
    if(carousel.scrollLeft === 0){
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.scrollWidth - (2 * carousel.offsetWidth);
        carousel.classList.remove("no-transition");

    }

    //if the carousel is at the end, scroll to the beginning
    else if(Math.ceil(carousel.scrollLeft) === carousel.scrollWidth - carousel.offsetWidth){
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.offsetWidth;
        carousel.classList.remove("no-transition");
    }

    //clear existing timeout and start autoplay if mouse is not hovering
    clearTimeout(timeoutId);
    if(!wrapper.matches(":hover")) autoPlay();
}

carousel.addEventListener("mousedown", dragStart);
carousel.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);
carousel.addEventListener("scroll", infiniteScroll);
wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
wrapper.addEventListener("mouseleave", autoPlay);
