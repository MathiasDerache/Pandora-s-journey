// Animation du Bouton Connexion / inscription
const containerMenu = document.querySelector('.container-menu');
const btnMenu = document.querySelector('.btn-menu');

btnMenu.addEventListener('click', () => {
    // Ajout de la classe Active au click, Toggle fais un effet de flag(bool)
    containerMenu.classList.toggle('active')

})


//Animation du body, avec affichage ou non des éléments
const main = document.querySelector('.main');
const body = document.querySelector('.body');
const scrollDown = document.querySelector('.scroll-down');
const scrollUp = document.querySelector('.scroll-up');

// Partie Scroll Down
scrollDown.addEventListener('click', () =>{
    // Ajout de la classe DisplayNone au click
    main.classList.add('displayNone');
})

scrollDown.addEventListener('click', () =>{
    // Suppression de la classe DisplayNone au click
    body.classList.remove('displayNone');
})

// Partie Scroll Up 
scrollUp.addEventListener('click', () =>{
    // Suppression de la classe DisplayNone au click
    main.classList.remove('displayNone');
})

scrollUp.addEventListener('click', () =>{
    // Ajout de la classe DisplayNone au click
    body.classList.add('displayNone');
})


// Partie effet apparitions des sections

const ratio = .1;
const options = {
    root: null,
    rootMargin: '0px',
    threshold: ratio
}

// Utilisation Observer pour repérer les différentes sections
const handleIntersect = function(entries, observer){
    entries.forEach(function(entry){
        if(entry.intersectionRatio > ratio){
            // Ajout de la classe Reveal-visible quand l'élément est en partie visible
            entry.target.classList.add('reveal-visible')
            // Unobserve permet de ne plus observer une fois que la section à déjà etait observer uau moins une fois
            observer.unobserve(entry.target)
        }
    })

};

 // Permet de faire l'observation sur toute les classe  commençant par "reveal-"
const observer = new IntersectionObserver(handleIntersect, options);
document.querySelectorAll('[class*="reveal-"]').forEach(function(reveal){
    observer.observe(reveal);
});


$(function(){
    
	$('.menu-icon').click(function(e){
        e.preventDefault();
        $this = $(this);
        if($this.hasClass('is-opened')){
            $this.addClass('is-closed').removeClass('is-opened');
        }else{
            $this.removeClass('is-closed').addClass('is-opened');
        }
    })

});