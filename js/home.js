window.onload = function() {
    document.getElementById("bgColor").addEventListener("input", changeBgColor);
    document.getElementById("fontColor").addEventListener("input", changeFontColor);
    document.getElementById("fontSize").addEventListener("input", changeFontSize);
    document.getElementById("fontFamily").addEventListener("input", changeFontFamily);
    document.getElementById("fontDeco").addEventListener("input", changeFontDeco);
    document.getElementById("text").addEventListener("keyup", innerText);
    document.getElementById("resetBtn").addEventListener("click", resetPersonalization);
    document.getElementById("imageBtn").addEventListener("click", loadImage);
    document.getElementById("imageWidth").addEventListener("input", changeImageSize);
    document.getElementById("imageHeight").addEventListener("input", changeImageSize);
    }
    function innerText(e) {
        output.innerText = e.target.value;
    }
    function resetPersonalization() {
        output.style.backgroundColor = "";
        output.style.color = "white";
        output.style.fontSize = "";
        output.style.fontFamily = "";
        output.style.textDecoration = "none";
        container.innerHTML = "";
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
    let img;
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
        var imageUrl = input.value;
        var container = document.getElementById("image-container");
        
        img = document.createElement("img");
        img.src = imageUrl;
        img.alt = "Benutzerdefiniertes Bild";
        img.style.width = "100px"; 
        img.style.height = "50px"; 
        img.onerror = () => {
            alert("Das Bild konnte nicht geladen werden. Bitte URL überprüfen.");
        }

        container.appendChild(img);
    }
    function changeImageSize() {
        var width = document.getElementById("imageWidth").value;
        img.style.width = width + "px";
        var height = document.getElementById("imageHeight").value;
        img.style.height = height + "px";
      
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