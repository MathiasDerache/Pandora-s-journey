const containerMenu = document.querySelector('.container-menu');
const btnMenu = document.querySelector('.btn-menu');

btnMenu.addEventListener('click', () => {

    containerMenu.classList.toggle('active')

})

const video = document.querySelector('.video');
const body = document.querySelector('.body');
const scrollDown = document.querySelector('.scroll-down');
const scrollUp = document.querySelector('.scroll-up');

// Partie Scroll Down
scrollDown.addEventListener('click', () =>{
    video.classList.add('displayNone');
})

scrollDown.addEventListener('click', () =>{
    body.classList.remove('displayNone');
})

// Partie Scroll Up 
scrollUp.addEventListener('click', () =>{
    video.classList.remove('displayNone');
})

scrollUp.addEventListener('click', () =>{
    body.classList.add('displayNone');
})

// Partie effet sections

const ratio = .1;
const options = {
    root: null,
    rootMargin: '0px',
    threshold: ratio
}

const handleIntersect = function(entries, observer){
    entries.forEach(function(entry){
        if(entry.intersectionRatio > ratio){
            entry.target.classList.add('reveal-visible')
            observer.unobserve(entry.target)
        }
    })

};

const observer = new IntersectionObserver(handleIntersect, options);
document.querySelectorAll('[class*="reveal-"]').forEach(function(reveal){
    observer.observe(reveal);
});
