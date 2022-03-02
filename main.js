const alert = document.querySelector('.alert');

window.onload = () => {
    if(alert) {
        setTimeout(()=> {
            alert.remove()
        }, 3000)
    }
}

