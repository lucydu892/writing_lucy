<?php
require "models/home_model.php";
?>
<main class="home-main">
    <header>
        <h1>Bearbeitung</h1>
    </header>

    <audio autoplay>
        <source src="music\background_music_lofi.mp3" type="audio/mpeg">
        <p>If you are reading this, it is because your browser does not support the audio element.</p>
    </audio>
    <form class="content" method="post">
        <div class="content-Editor">
            <div>
                <label for="bgColor">Hintergrundfarbe:</label>
                <input id="bgColor" type="color" name="bgColor">
            </div>
            <br>
            <div>
                <label for="fontColor">Schriftfarbe:</label>
                <input id="fontColor" type="color" name="fontColor">
            </div>
            <br>
            <div>
                <label for="fontSize">Schriftgrösse:</label>
                <input id="fontSize" type="number" maxlength="3" name="fontSize">
            </div>
            <br>
            <div>
                <label for="fontFamily">Schriftart:</label>
                <select name="fontFamily" id="fontFamily">
                    <option value="none">Bitte wählen</option>
                    <option value="Arial, sans-serif">Arial, sans-serif</option>
                    <option value="Palatino Linotype">Palatino Linotype</option>
                    <option value="Helvetica">Helvetica</option>
                    <option value="Impact">Impact</option>
                    <option value="Times New Roman serif">Times New Roman serif</option>
                    <option value="Georgia serif">Georgia serif</option>
                    <option value="Lucida Sans Unicode">Lucida Sans Unicode</option>
                    <option value="Courier New monospace">Courier New monospace</option>
                    <option value="Arial Black">Arial Black</option>
                </select>
            </div>
            <br>
            <div>
                <label for="fontDeco">Textdekoration:</label>
                <select name="fontDeco" id="fontDeco">
                    <option value="1">Bitte wählen</option>
                    <option value="None">None</option>
                    <option value="line-through">line-through</option>
                    <option value="underline">underline</option>
                </select>
            </div>
            <br>

            <label for="text">Dein Text:</label>
            <br>
            <textarea name="text" id="text" cols="30" rows="6"></textarea>
            <br>
            <div>
                <label for="imageLink">Image-URl:</label>
                <input type="text" name="imageLink" id="imageLink">
                <br>
                <button id="imageBtn" type="button">Bild anzeigen</button>
            </div>
            <div>
                <label for="imageWidth">Breite des Bildes:</label>
                <input type="number" id="imageWidth" name="imageWidth">
                <br>
                <label for="imageHeight">Höhe des Bildes:</label>
                <input type="number" id="imageHeight" name="imageHeight">
            </div>

            <div>
                <button id="resetBtn" type="button">Reset</button>
            </div>
            <br>
            <div class="saveData">
                <button id="saveBtn" type="submit">Speichern</button>
            </div>
            <br>
        </div>
        <div class="content-Output" id="output">
            <input type="hidden" id="jokeInput" name="jokeOutput">
            <div id="jokeOutput" name="jokeOutput">Witz</div>
            <div id="textOutput"></div>
            <div id="imageOutput"></div>
        </div>
    </form>

</main>
<script src="js/home.js">
</script>