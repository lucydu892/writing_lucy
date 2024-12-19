<?php
    
?>
<h1>Writing Lucy</h1>
<h2>Bearbeitung</h2>
    <main>
        <div>
            <label for="bgColor">Hintergrundfarbe:</label>
            <input id="bgColor"type="color">
        </div>
        <br>
        <div>
            <label for="fontColor">Schriftfarbe:</label>
            <input id="fontColor"type="color">
        </div>
        <br>
        <div>
            <label for="fontSize">Schriftgrösse:</label>
            <input id="fontSize" type="number" maxlength="3">
        </div>
        <br>
        <div>
            <label for="fontFamily">Schriftart:</label>
            <select  name="fontFamily" id="fontFamily">
                <option value="1">Bitte wählen</option>
                <option value="2">Arial, sans-serif</option>
                <option value="3">Palatino Linotype</option>
                <option value="4">Helvetica</option>
                <option value="5">Impact</option>
                <option value="6">Times New Roman serif</option>
                <option value="7">Georgia serif</option>
                <option value="8">Lucida Sans Unicode</option>
                <option value="9">Courier New monospace</option>
                <option value="10">Arial Black</option>
            </select>
        </div>
        <br>
        <div>
            <label for="fontDeco">Textdekoration:</label>
            <select  name="fontDeco" id="fontDeco">
                <option value="1">Bitte wählen</option>
                <option value="2">None</option>
                <option value="3">line-through</option>
                <option value="4">underline</option>
            </select>
        </div>
        <br>
        <div>
            <label for="text">Dein Text:</label>
            <br>
            <textarea name="text" id="text" cols="30" rows="6"></textarea>
        </div>
        <br>
        <div>
            <label for="imageLink">Image-URl:</label>
            <input type="text" name="imageLink" id="imageLink">
            <br>
            <button id="imageBtn">Bild anzeigen</button>
        </div>
        <div class="content">
            <div>
                <label for="imageWidth">Breite des Bildes:</label>
                <input type="number" id="imageWidth">
                <br>
                <label for="imageHeight">Höhe des Bildes:</label>
                <input type="number" id="imageHeight">
            </div>
        </div>
        <div>
            <button id="resetBtn">Reset</button>
        </div>
        
    </main>
    
    <h2>Beispiels Text</h2>
    <div id="output">
        <div id="text-output"></div>
        <div id="image-container"></div>
    </div> 
    
        
    <script src="js/home.js">
    </script>
