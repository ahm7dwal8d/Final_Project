
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
    document.body.backgroundColor = mainBg
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
        document.body.style.backgroundColor = bg
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
    } else if(document.body.classList.contains('dark')) {
        box.forEach(el => {
            el.style.backgroundColor = '#1e293b'
            el.style.color = '#fff'
            el.style.transition = 'all 0.4s linear'
        })
    }
    document.body.style.backgroundColor = mainBg
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
            const mainDiv = document.querySelector('.carousel-inner')
            const activeSlide = document.querySelectorAll('.slide-items');
            console.log(activeSlide)
            activeSlide.forEach((slide) => {
                if (slide.classList.contains) {
                    mainDiv.prepend(slide)
                }
            })
        }
    })
})

let carContent = document.querySelector('.car-content')
let carBox = document.querySelectorAll('.car-content .col-lg-4')
let gridLi = document.querySelectorAll('.setting-box .grid li')

let mainGrid = localStorage.getItem('grid-item');

if (mainGrid !== null) {
    gridLi.forEach((el) => {
        el.classList.remove("active")
        if (el.dataset.grid === mainGrid) { 
            el.classList.add('active')
        }
    })
    if (mainGrid === 'grid') {
        carContent.classList.contains('row') ? console.log('found') : carContent.classList.replace("block", 'row')
        carBox.forEach((el) => {
            el.classList.value = 'col-lg-4 col-md-6 col-sm-4'
            el.style.transition = 'all 0.4s linear'
            el.style.width = ''
        })
        document.querySelectorAll('.car-content img').forEach((el) => {
            el.classList.add('w-100')
        })
        const box = document.querySelectorAll('.car-content .box')
        box.forEach((el) => {
            el.classList.add('d-block')
            el.classList.remove('d-flex')
        })
        carContent.style.transition = 'all 0.4s linear'
    } else if (mainGrid === 'block') {
        if (carContent !== null) {
            carContent.classList.replace("row", 'block')
            carContent.style.width = '100%'
        }
        carBox.forEach((el) => {
            el.classList.value = 'block-elemets'
            el.style.width = '60%'
            console.log(el)
        })
        const box = document.querySelectorAll('.car-content .box')
        box.forEach((el) => {
            el.classList.add('d-flex')
            el.classList.remove('d-block')
        })
        document.querySelectorAll('.car-content img').forEach((el) => {
            el.classList.remove('w-100')
            el.style.width = '60%'
        })
    }
}


gridLi.forEach((el) => {
    el.addEventListener('click', function () {
        let grid = el.getAttribute('data-grid')
        gridLi.forEach(el => { 
            el.classList.remove('active')
            this.classList.add('active')
        })
        if (el.dataset.grid === 'grid') { 
            carContent.classList.contains('row') ? console.log('found') : carContent.classList.replace("block", 'row')
            carBox.forEach((el) => {
                el.classList.value = 'col-lg-4 col-md-6 col-sm-4'
                el.style.transition = 'all 0.4s linear'
                el.style.width = ''
            })
            document.querySelectorAll('.car-content img').forEach((el) => {
                el.classList.add('w-100')
            })
            carContent.style.transition = 'all 0.4s linear'
            const box = document.querySelectorAll('.car-content .box')
            box.forEach((el) => {
                el.classList.add('d-block')
                el.classList.remove('d-flex')
            })
            localStorage.setItem('grid-item', 'grid')
        } else if (el.dataset.grid === 'block') {
            carContent.classList.replace("row", 'block')
            carBox.forEach((el) => {
                el.classList.value = 'block-elemets'
                el.style.width = '100%'
                console.log(el)
            })
            const box = document.querySelectorAll('.car-content .box')
            box.forEach((el) => {
                el.classList.add('d-flex')
                el.classList.remove('d-block')
            })
            document.querySelectorAll('.car-content img').forEach((el) => {
                el.classList.remove('w-100')
                el.style.width = '60%'
            })
            carContent.style.width = '100%'
            console.log(carBox)
            localStorage.setItem('grid-item', 'block')
        }
    })
})




let resetBtn = document.querySelector('.setting-box .btn');

resetBtn.addEventListener("click", function () {
    localStorage.removeItem('color')
    localStorage.removeItem('bg')
    localStorage.removeItem('slider-item')
    localStorage.removeItem('itmes-content')
    localStorage.removeItem('grid-item')
    location.reload()
})