// CountDown
// Date de départ
var countDownDate = new Date("2021-01-22").getTime();

// Actualise le compte à rebours toutes les secondes
var x = setInterval(function() {

    // Date d'aujourd'hui en millisecondes
    var now = new Date().getTime();

    // Différence entre la date de départ et la date d'aujourd'hui
    var distance = countDownDate - now;

    // Calcul du temps pour les jours, les heures, les minutes et les secondes
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Affiche le résultat dans un élément avec l'id="countdown"
    document.getElementById("countDays").innerHTML = days;
    document.getElementById("countHours").innerHTML = hours;
    document.getElementById("countMinutes").innerHTML = minutes;
    document.getElementById("countSeconds").innerHTML = seconds;
}, 1000);

// Menu

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