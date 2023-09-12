const burger = document.querySelector('.burger')
const nav = document.querySelector('.nav')
const log = document.querySelector('.inscription_connexion')

burger.addEventListener('click', () => {
    burger.classList.toggle('active')
    nav.classList.toggle('active')
    log.classList.toggle('active')
})
