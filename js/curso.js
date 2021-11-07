// DROPDOWN PREGUNTAS FRECUENTES
const btnSub = document.querySelectorAll('.pato-sub');
btnSub.forEach(element => {
    element.addEventListener('click', e => {
        if(e.target.classList.contains('fa-chevron-right')) {
            e.target.classList.replace('fa-chevron-right', 'fa-chevron-down');
            e.target.parentElement.classList.add('preguntas-item-show')
        } else {
            e.target.classList.replace('fa-chevron-down', 'fa-chevron-right');
            e.target.parentElement.classList.remove('preguntas-item-show')
        }
        e.target.parentElement.nextElementSibling.getElementsByClassName('preguntas-texto-contenido')[0].classList.toggle('menu-dolor-show');
    });
});


// DROPDOWN VER PR0GRAMA
document.querySelector('.curso-programa-boton h4')?.addEventListener('click', () => {
    const prox = document.querySelector('.prox-text');
    if(prox) prox.style.display = prox.style.display === 'none' ? '' : 'none';
    document.querySelector('.drop-contenido').classList.toggle('menu-contenedor-show');
});