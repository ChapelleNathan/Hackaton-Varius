var playerButton = document.getElementById('player-button');
var id = document.getElementById('id');
var player = document.getElementById('player');
var displayed = false;

playerButton.onclick = function () {
    if (displayed) {
        var myIframe = document.getElementById('my-iframe');
        myIframe.remove();
        displayed = false;
    } else {
        var iframe = "<iframe id='my-iframe' scrolling=\"no\" frameborder=\"0\" allowTransparency=\"true\" src=\"http://www.deezer.com/plugins/player?format=square&autoplay=true&playlist=false&width=300&height=300&color=007FEB&layout=dark&size=medium&type=playlist&id=" + id.value + "&app_id=1\" width=\"300\" height=\"300\"></iframe>"
        player.innerHTML = iframe;
        displayed = true;

        const departMinutes = document.getElementById("timer").innerHTML;
        let temps = departMinutes * 60;

        const timerElement = document.getElementById("timer");

        setInterval(() => {
            let minutes = parseInt(temps / 60, 10);
            let secondes = parseInt(temps % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            secondes = secondes < 10 ? "0" + secondes : secondes;

            timerElement.innerText = `${minutes}:${secondes}`;
            temps = temps <= 0 ? 0 : temps - 1;
        }, 1000);
        var myIframe = document.getElementById('my-iframe');

        setTimeout(function(){myIframe.remove();}, (departMinutes*60000)+2000);


    }
}