window.onload = function () {
    let loading = document.createElement('div');
    loading.className = 'loading-overly d-flex justify-content-center align-items-center'
    loading.style.backgroundColor = '#fff';
    loading.style.position = 'fixed';
    loading.style.inset = 0;
    document.body.style.overflow = 'hidden'
    loading.style.transition = '0.5s linear'
    loading.style.zIndex = '9999999'
    let icon = document.createElement('div')
    icon.className = 'loading-icon';
    icon.style.width = 'fit-content'
    icon.innerHTML = `<img src='./img/Spinner-1s-200px.gif' alt='' />`;
    loading.appendChild(icon)
    document.body.appendChild(loading)
    setInterval(function () {
        loading.remove()
        document.body.style.overflow = 'auto'
    }, 100)
}



// let showForm = document.querySelector('.show-form');
// let sellForm = document.querySelector('.sell-form');

// showForm.addEventListener("click", function() {
//     let overly = document.createElement('div');
//     overly.className = 'overly';
//     overly.style.cssText = 'position: absolute; inset: 0; background-color: rgba(0, 0, 0, 0.5)'
//     document.body.appendChild(overly)
//     document.body.style.overflow = 'hidden'
//     let box = document.createElement('div');
//     box.className = 'box p-4 rounded';
//     box.style.cssText = 'position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #fff; width: 50%;'
//     sellForm.style.display = 'block'
//     box.appendChild(sellForm);
//     overly.appendChild(box);
//     let closeBtn = document.createElement("span");
//     closeBtn.className = 'close-btn text-danger fw-bold';
//     closeBtn.id = 'close-btn';
//     closeBtn.innerHTML = 'X';
//     closeBtn.style.cssText = 'position: absolute; top: 30px; right: 30px; cursor: pointer'
//     overly.appendChild(closeBtn)
//     document.addEventListener('click', function(e) {
//         if (e.target.id === 'close-btn' || e.target.className === 'overly') {
//             overly.remove()
//             document.body.style.overflow = 'auto'
//         }
//     })
// })