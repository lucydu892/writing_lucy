window.onload = function () {
    //Bildbearbeitung
    document.getElementById("bgColor").addEventListener("input", changeBgColor);
    document.getElementById("fontColor").addEventListener("input", changeFontColor);
    document.getElementById("fontSize").addEventListener("input", changeFontSize);
    document.getElementById("fontFamily").addEventListener("input", changeFontFamily);
    document.getElementById("fontDeco").addEventListener("input", changeFontDeco);
    //Text eingabe
    document.getElementById("text").addEventListener("keyup", innerText);
    //Reset 
    document.getElementById("resetBtn").addEventListener("click", resetPersonalization);
    //Bildbearbeitung
    document.getElementById("imageWidth").addEventListener("input", changeImageSize);
    document.getElementById("imageHeight").addEventListener("input", changeImageSize);
    //Ausgabe
    document.getElementById("jokeInput").addEventListener("load", importJoke);
    document.getElementById("saveBtn").addEventListener("click", jokeInput);

    // document.getElementById("test").addEventListener("click", loadLocalImage);

    //document.getElementById("download").addEventListener("click", downloadPostcard);
}
function innerText(e) {
    var textOutput = document.getElementById("textOutput");
    textOutput.innerText = e.target.value;
}

function resetPersonalization() {
    bgColor.value = "#0d0b4e";
    output.style.backgroundColor = "#0d0b4e";
    fontColor.value = "#FFFFFF";
    output.style.color = "#FFFFFF";
    fontSize.value = " "
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
    var optionElem = selectElem.options[selectElem.selectedIndex];
    if (optionElem.value) {
        output.style.fontFamily = optionElem.value;
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

function changeImageSize() {
    var width = document.getElementById("imageWidth").value;
    imgElement.style.width = width + "px";
    var height = document.getElementById("imageHeight").value;
    imgElement.style.height = height + "px";

}
async function importJoke() {
    var response = await fetch("https://witzapi.de/api/joke/", { "method": "GET" });
    var jsonData = await response.json();
    document.getElementById("jokeOutput").innerText = jsonData[0].text;
}
importJoke();
setInterval(importJoke, 60000)

function jokeInput() {
    const jokeDiv = document.getElementById("jokeOutput");
    const jokeInput = document.getElementById("jokeInput");
    jokeInput.value = jokeDiv.innerText;
}
function dropdownText() {
    document.getElementById("dropdownEditText").classList.toggle("show");
}
function dropdownImg() {
    document.getElementById("dropdownEditImg").classList.toggle("show");
}

 document.addEventListener('DOMContentLoaded', function () {
	document.getElementById('imageLocal').addEventListener('change', dateiauswahlGeändert, false);
 });
let imgElement;
function dateiauswahlGeändert(event) {
	const liste = document.getElementById('dateiListe'); // Nur noch ein gemeinsames Element
	liste.innerHTML = '';

	for (const file of event.target.files) {
		const listItem = document.createElement('div'); // Container für Dateiname + optionales Bild
		listItem.style.marginBottom = '10px';

		/* Dateiname hinzufügen
		const fileName = document.createElement('span');
		fileName.textContent = file.name;
		listItem.appendChild(fileName);
        */

		// Wenn es ein Bild ist, Thumbnail hinzufügen
		if (file.type.startsWith('image/')) {
			const thumbnailURL = URL.createObjectURL(file);
			imgElement = document.createElement('img');
			imgElement.src = thumbnailURL;
			imgElement.alt = file.name;
			imgElement.style.width = '100px';
            imgElement.style.height = '50px'; // Thumbnail etwas kleiner

			imgElement.onload = () => URL.revokeObjectURL(imgElement.src);
			listItem.appendChild(imgElement);
		}

		liste.appendChild(listItem);
	}
}
