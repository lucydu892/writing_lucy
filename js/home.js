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
    document.getElementById("imageBtn").addEventListener("click", loadImage);
    document.getElementById("saveBtn").addEventListener("click", jokeInput);

    document.getElementById("test").addEventListener("click", loadLocalImage);
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
	document.getElementById('imageLocal')
		.addEventListener('change', dateiauswahlGeändert, false);
});

function dateiauswahlGeändert(event) {
	const dateiliste = document.getElementById('dateiListe');
	const thumbnailListe = document.getElementById('thumbnailListe');
	dateiliste.innerHTML = '';
	thumbnailListe.innerHTML = '';
	for (const file of event.target.files) {
		dateiliste.insertAdjacentHTML('beforeend',
			``
		);
		// Check if file is an image
		if (file.type.startsWith('image/')) {
			const thumbnailURL = URL.createObjectURL(file);
			const imgElement = document.createElement('img');
			imgElement.src = thumbnailURL;
			imgElement.alt = file.name;
			imgElement.onload = () => URL.revokeObjectURL(imgElement.src);
			thumbnailListe.appendChild(imgElement);
		}
	}
}
/*
const fileInput = document.getElementById('imageLocal');
const fileContent = document.getElementById('imageOutput');

// Function to read file content
function readFile(event) {
    const file = event.target.files[0];

    if (!file) {
        fileContent.textContent = 'No file selected.';
        return;
    }

    const reader = new FileReader();

    // This is the onload event for when the file is successfully read
    reader.onload = function (e) {
        // Display the file content in the div
        fileContent.textContent = e.target.result;
    };

    // This handles any errors during file reading
    reader.onerror = function (e) {
        fileContent.textContent = `Error reading file: ${e.target.error}`;
    };

    // Read the selected file as text (you can change this to read as other formats)
    reader.readAsText(file);
}

// Attach the event listener to the file input
fileInput.addEventListener('change', readFile);
const imageDisplay = document.getElementById('imageDisplay');
reader.onload = function (e) {
    imageDisplay.src = e.target.result;
};*/