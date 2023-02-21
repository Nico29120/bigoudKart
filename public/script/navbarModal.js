document.addEventListener("DOMContentLoaded", function() {
    const menuButton= document.getElementById('menu-button'); //récupération du bouton servant à faire apparaitre/disparaitre le menu
    const navList= document.getElementById('navList');//récupération de liste déroulante
    
    menuButton.addEventListener('click', () => {//écouteur click
        navList.classList.toggle('active');//change la classe de la liste pour la faire apparaitre/disparaitre
    })
});    