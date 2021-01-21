// CountDown

var httpRequest = new XMLHttpRequest();
httpRequest.open("GET", "profilControleur.php?action=countDown", true)
httpRequest.send()

httpRequest.onreadystatechange = function () {
    if (httpRequest.readyState === 4) {
        var dateEmb = httpRequest.responseText
        console.log(dateEmb);
        if (dateEmb !== "") {   
            // Date de départ
            var countDownDate = new Date(dateEmb).getTime();
    
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
        } else {
            var countDown = document.getElementById("countDown");
            countDown.removeAttribute('class');
            countDown.innerHTML = "";
            countDown.innerHTML = "Vous n'avez pas encore de voyage de prévue";
            countDown.style.fontSize = "x-large";
            var div1 = document.createElement("div");
            div1.className = "container";
            var div2 = document.createElement("div");
            div2.className = "text-center pt-2";
            var boutton = document.createElement("boutton");
            boutton.className = "btn btn-warning rounded-pill text-white";
            var a = document.createElement("a");
            a.href = "../billeterie/billeterieController.php";
            var t = document.createTextNode("Billeterie");
            boutton.style.fontSize = "25px";
            boutton.style.textShadow = "black 1px 1px 1px"
            boutton.appendChild(t);
            a.appendChild(boutton);
            div2.appendChild(a);
            div1.appendChild(div2);
            countDown.appendChild(div1);
        }
    }
}

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