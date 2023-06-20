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
    icon.innerHTML = `<img src='img/Spinner-1s-200px.gif' alt='' />`;
    loading.appendChild(icon)
    document.body.appendChild(loading)
    setInterval(function () {
        loading.remove()
        document.body.style.overflow = 'auto'
    }, 2000)
}
