
let settingBox = document.querySelector('.setting-box');
let settingIcon = document.querySelector('.setting-box .icon');

settingIcon.addEventListener('click', function () {
    settingBox.classList.toggle('active');
    this.classList.toggle("active")
})

let getColor = localStorage.getItem('color')
if (getColor !== null) {
    document.documentElement.style.setProperty("--main-Color", getColor)
    document.querySelectorAll(".setting-box .color li").forEach((element) => {
        element.classList.remove("active")
        if (element.dataset.color === getColor) {
            element.classList.add('active')
        }
    })
}

let colorEl = document.querySelectorAll(".setting-box .color li");
colorEl.forEach((el) => {
    el.addEventListener('click', function () { 
        let color = el.getAttribute('data-color');
        colorEl.forEach(el => {
            el.classList.remove("active")
            this.classList.add('active')
        })
        document.documentElement.style.setProperty("--main-Color", color)
        localStorage.setItem('color', color);
    })
})

let mainBg = localStorage.getItem('bg');

if (mainBg !== null) {
    document.documentElement.style.setProperty("--main-bg", mainBg)
    document.querySelectorAll(".setting-box .bg li").forEach((element) => { 
        element.classList.remove("active")
        if (element.dataset.bg === mainBg) {
            element.classList.add('active')
            document.body.classList.add(element.textContent)
        }
    })
}

let bgEl = document.querySelectorAll(".setting-box .bg li");

bgEl.forEach((el) => {
    el.addEventListener('click', function () { 
        let bg = el.getAttribute('data-bg');
        bgEl.forEach(el => { 
            el.classList.remove("active");
            this.classList.add("active")
        })
        document.body.classList.remove('light')
        document.body.classList.remove('dark')
        document.body.classList.add(el.textContent)
        document.documentElement.style.setProperty("--main-bg", bg)
        localStorage.setItem('bg', bg)
        boxTheme(el.textContent)
    })
})


let box = document.querySelectorAll('.row .box')
function boxTheme(theme) {
    if (theme === 'dark') {
        box.forEach((el) => { 
            el.style.backgroundColor = '#1e293b'
            el.style.color = '#fff'
            el.style.transition = 'all 0.4s linear'
        })
    } else {
        box.forEach((el) => { 
            el.style.backgroundColor = "#eee"
            el.style.color = '#000'
            el.style.transition = 'all 0.4s linear'
        })
    }
}
window.onload = function () {
    if (document.body.classList.contains('light')) {
        box.forEach((el) => {
            el.style.backgroundColor = '#eee'
            el.style.color = '#000'
            el.style.transition = 'all 0.4s linear'
        })
    } else {
        box.forEach(el => {
            el.style.backgroundColor = '#1e293b'
            el.style.color = '#fff'
            el.style.transition = 'all 0.4s linear'
        })
    }
}

let sliderEl = document.querySelectorAll('.setting-box .slider li')
let slide = document.querySelectorAll('.slide-items')

let sliderItem = localStorage.getItem('slider-item')

if (sliderItem !== null) {
    sliderEl.forEach((el) => { 
        sliderEl.forEach((el) => {
            el.classList.remove('active')
            if (el.dataset.slide === sliderItem) {
                el.classList.add('active');
            }
            if (sliderItem === 'true') {
                slide.forEach((slide) => {
                    slide.classList.add('carousel-item');
                    localStorage.setItem('slider-item', true);
                })
            } else {
                slide.forEach((slide) => {
                    slide.classList.remove('carousel-item');
                    localStorage.setItem('slider-item', false);
                })
            }
        })
    })
}

sliderEl.forEach((el) => {
    el.addEventListener('click', function () { 
        let slider = el.getAttribute('data-slide')
        sliderEl.forEach(el => {
            el.classList.remove("active")
            this.classList.add("active")
        })
        if (slider === 'true') {
            slide.forEach((slide) => {
                slide.classList.add('carousel-item');
                localStorage.setItem('slider-item', true);
            })
        } else {
            slide.forEach((slide) => {
                slide.classList.remove('carousel-item');
                localStorage.setItem('slider-item', false);
            })
        }
    })
})





let resetBtn = document.querySelector('.setting-box .btn');

resetBtn.addEventListener("click", function () {
    localStorage.removeItem('color')
    localStorage.removeItem('bg')
    localStorage.removeItem('slider-item')
    localStorage.removeItem('itmes-content')
    location.reload()
})