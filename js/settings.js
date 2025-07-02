document.getElementById("switchCheckDefault").addEventListener("keypress", turnOffMusic);

function turnOffMusic() {
    if (document.getElementById("switchCheckDefault").checked) {
        document.getElementById("backgroundMusic").pause();
        alert("Background music is turned off. You can turn it back on in the settings.");
    } else {
        document.getElementById("backgroundMusic").play();
    }
}