// JS form login
const openBtns = document.querySelectorAll('.js-form-open');
const modal = document.querySelector('.modal');

function OpenForm() {
    modal.classList.add('open');
}

for (const openBtn of openBtns) {
    openBtn.addEventListener('click', OpenForm);
}

const exitBtns = document.querySelectorAll('.js-form-exit');

function ExitForm() {
    modal.classList.remove('open');
}

for (const exitBtn of exitBtns) {
    exitBtn.addEventListener('click', ExitForm)
}   

 


// Js Top Header
window.onscroll = function() {
    myFunction();
    scrollFunction();
}

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
    if ( window.scrollY > sticky) {
        header.classList.add('sticky');
    } else {
        header.classList.remove('sticky');
    }
}

// Js Lên đầu
const myBtnTop = document.getElementById('myBtn')

function scrollFunction() {
    if(document.body.scrollTop > 20 || document.documentElement.scrollTop >20) 
    {
        myBtnTop.style.display = "flex"
    }else {
        myBtnTop.style.display = "none"
    }   
}

function topFunction() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

//  Js banner
let slideIndex = 1;
    showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}


function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    if (n > slides.length) {
        slideIndex = 1
    }    
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
    }

slides[slideIndex-1].style.display = "block";  
}

// JS downtime sales
var countDownDate = new Date("April 29, 2024 12:00:00").getTime();

var x = setInterval(function() {
var now = new Date().getTime();
var distance = countDownDate - now;
var days = Math.floor(distance / (1000 * 60 * 60 * 24));
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);

// document.getElementById("time").innerHTML =" " + days + " : " + hours + " : " + minutes + " : " + seconds + " ";
function formatTimeValue(value) {
    return value < 10 ? "0" + value : value;
}

    document.getElementById("days").innerHTML = " " + formatTimeValue(days) + " ";
    document.getElementById("hours").innerHTML = " " + formatTimeValue(hours) + " ";
    document.getElementById("minutes").innerHTML = " " + formatTimeValue(minutes) + " ";
    document.getElementById("seconds").innerHTML = " " + formatTimeValue(seconds) + " ";

if (distance < 0) {
    clearInterval(x);
    document.getElementById("box-time").innerHTML = "ĐÃ KẾT THÚC";
    var elements = document.getElementsByClassName("sale");
    for (var i = 0; i < elements.length; i++) {
        elements[i].style.display = "none";
    }
}
},1000);

// JS move sales title
var saleTitles = document.querySelectorAll('.sale__title-list');
var active = document.getElementsByClassName('sale__title-type')

    for (var i = 0; i < active.length; i++) {
        active[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("sale_active");
            current[0].className = current[0].className.replace(" sale_active", "");
            this.className += " sale_active";
    });
    }

// JS navbar 
function isActivePage(pageName) {
    return window.location.href.endsWith(pageName) ? 'header_active' : '';
}

function ActiveAdmin(pageName) {
    return window.location.href.endsWith(pageName) ? 'profile_active' : '';
}

// JS profile class 
var proActive = document.getElementsByClassName("profile__user-item");
    for (var i = 0; i < proActive.length; i++) {
        proActive[i].addEventListener("click", function() {
            var move = document.getElementsByClassName("profile_active");
            if (move.length > 0) {
                move[0].classList.remove("profile_active");
            }
            this.classList.add("profile_active");
        });
    }

// JS profile 
    var proActive = document.getElementsByClassName("profile__user-item");
    for (var i = 0; i < proActive.length; i++) {
        proActive[i].addEventListener("click", function() {
            var move = document.getElementsByClassName("profile_active");
            if (move.length > 0) {
                move[0].classList.remove("profile_active");
            }
            this.classList.add("profile_active");
        });
    }

    var profileOpen = document.querySelectorAll(".profile__view-update");
    var profileClick = document.querySelectorAll(".profile__view-edit-text");

    profileClick.forEach(function(element) {
        element.addEventListener("click", function() {
        profileOpen.forEach(function(item) {
            item.classList.add("profile__view-update-open");
        });
    });
    });

// JS icon heart
function toggleHeart() {
    var emptyHeart = document.getElementsByClassName('home-product-item__heart-icon-empty');
    var fillHeart = document.getElementsByClassName('home-product-item__heart-icon-fill');
    
    if (emptyHeart.style.display === 'none') {
        emptyHeart.style.display = 'inline-block';
        fillHeart.style.display = 'none';
    } else {
        emptyHeart.style.display = 'none';
        fillHeart.style.display = 'inline-block';
    }
}