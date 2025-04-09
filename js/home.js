window.onload = function () {
    document.getElementById("bgColor").addEventListener("input", changeBgColor);
    document.getElementById("fontColor").addEventListener("input", changeFontColor);
    document.getElementById("fontSize").addEventListener("input", changeFontSize);
    document.getElementById("fontFamily").addEventListener("input", changeFontFamily);
    document.getElementById("fontDeco").addEventListener("input", changeFontDeco);
    document.getElementById("text").addEventListener("keyup", innerText);
    document.getElementById("resetBtn").addEventListener("click", resetPersonalization);
    document.getElementById("imageWidth").addEventListener("input", changeImageSize);
    document.getElementById("imageHeight").addEventListener("input", changeImageSize);
    document.getElementById("jokeInput").addEventListener("load", importJoke);
    document.getElementById("imageBtn").addEventListener("click", loadImage);
    document.getElementById("saveBtn").addEventListener("click", jokeInput);
}
function innerText(e) {
    var textOutput = document.getElementById("textOutput");
    textOutput.innerText = e.target.value;
}

function resetPersonalization() {
    output.style.backgroundColor = "";
    output.style.color = "white";
    output.style.fontSize = "";
    output.style.fontFamily = "";
    output.style.textDecoration = "none";
    textOutput.innerHTML = " ";
    text.value = " ";
    imageOutput.innerHTML = " ";
    imageLink.value = " ";

}

function changeBgColor() {
    output.style.backgroundColor = document.getElementById("bgColor").value;
}

function changeFontColor() {
    output.style.color = document.getElementById("fontColor").value;
}

function changeFontSize() {
    var fontSize = document.getElementById("fontSize").value;
    output.style.fontSize = fontSize + "px";
}

function changeFontFamily(e) {
    var selectElem = e.target;
    var idx = selectElem.selectedIndex;
    var optionElem = selectElem.options[idx];
    if (optionElem.value > 0) {
        output.style.fontFamily = optionElem.innerText;
    }
}

function changeFontDeco(e) {
    var selectElem = e.target;
    var idx = selectElem.selectedIndex;
    var optionElem = selectElem.options[idx];
    if (optionElem.value > 0) {
        output.style.textDecoration = optionElem.innerText;
    }
}
let img;
function loadImage() {
    var input = document.getElementById("imageLink");
    var imageUrl = input.value;
    var container = document.getElementById("imageOutput");

    container.innerHTML = "";

    img = document.createElement("img");
    img.src = imageUrl;
    img.alt = "Benutzerdefiniertes Bild";
    img.style.width = "100px";
    img.style.height = "50px";
    container.appendChild(img);

}
function changeImageSize() {
    var width = document.getElementById("imageWidth").value;
    img.style.width = width + "px";
    var height = document.getElementById("imageHeight").value;
    img.style.height = height + "px";

}
async function importJoke() {
    var response = await fetch("https://witzapi.de/api/joke/", { "method": "GET" });
    var jsonData = await response.json();
    document.getElementById("jokeOutput").innerText = jsonData[0].text;
}
importJoke();
setInterval(importJoke, 60000)

function loadLocalImage(event) {
    var file = event.target.files[0]
    var conainer = document.getElementById("imageOutput");

    if (!file) {
        alert("Bitte eine Datei auswählen");
        return;
    }

    var reader = new FileReader();
    reader.onload = function (e) {
        conainer.innerHTML = "";
        var img = document.createElement("img");
        img.src = e.target.result; // Bild als Data-URL setzen
        img.alt = "Hochgeladenes Bild";
        img.style.width = "200px";
        img.style.height = "auto";

        container.appendChild(img);
    };
    reader.readAsDataURL(file);
}
function jokeInput() {
    const jokeDiv = document.getElementById("jokeOutput");
    const jokeInput = document.getElementById("jokeInput");
    jokeInput.value = jokeDiv.innerText;
}
/*function importImageFromComputer () {
    const input = document.querySelector('#imageLink');
    const image = document.querySelector('.image');
    input.addEventListener('change', e => {
        const file = input.files[0];
        if(file.type.match('image/*')) {
            const fileReader = new FileReader();
            fileReader.addEventListener('load', e => {
                const img = document.createElement('img');
                img.setAttribute('src', e.target.result);
                image.appendChild(img);
            });
            fileReader.readAsDataURL(file);
        }
    });
   }*/