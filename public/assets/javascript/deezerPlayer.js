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
    }
}