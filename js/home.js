window.onload = function() {
document.getElementById("bgColor").addEventListener("input", changeBgColor);
document.getElementById("fontColor").addEventListener("input", changeFontColor);
document.getElementById("fontSize").addEventListener("input", changeFontSize);
document.getElementById("fontFamily").addEventListener("input", changeFontFamily);
document.getElementById("fontDeco").addEventListener("input", changeFontDeco);
document.getElementById("text").addEventListener("keyup", innerText);
document.getElementById("resetBtn").addEventListener("click", resetPersonalization);
document.getElementById("imageBtn").addEventListener("click", loadImage);
document.getElementById("imageWidth").addEventListener("input", changeImageWidth);
document.getElementById("imageHeigth").addEventListener("input", changeImageHeight);

}
function innerText(e) {
    output.innerText = e.target.value;
}

function resetPersonalization() {
    output.style.backgroundColor = "white";
    output.style.color = "black";
    output.style.fontSize = "";
    output.style.fontFamily = "";
    output.style.textDecoration = "none";

    const container = document.getElementById("image-container");
    container.innerHTML = ""; // Entfernt das Bild
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

function loadImage() {
    var input = document.getElementById("imageLink");
    var container = document.getElementById("output");
    var imageUrl = input.value;

    container.innerHTML = "";

    var img = document.createElement("img");
    img.src = imageUrl;
    img.alt = "Benutzerdefiniertes Bild";
    img.onerror = () => {
        alert("Das Bild konnte nicht geladen werden. Bitte URL überprüfen.");
    };
    container.appendChild(img);
}
function changeImageWidth() {
    var imageWidth = document.getElementById("imageWidth");
    output.style.width = imageWidth + "px";
    alert(output.style.width = imageWidth + "px");

}
function changeImageHeight() {
    var imageHeight = document.getElementById("imageHeight");
    output.style.height = imageHeight + "px";
    alert(output.style.height = imageHeight + "px");
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