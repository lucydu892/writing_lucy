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
            <div class="dropdown">
                <p class="dropdownTextPara" onclick="dropdown()">
                    Textbearbeitung
                </p>
                <div class="dropdownTextEditor" id="dropdownTextEditor">
                    <label for="bgColor">Hintergrundfarbe:</label>
                    <br>
                    <input id="bgColor" type="color" name="bgColor">
                    <br>
                    <br>
                    <label for="fontColor">Schriftfarbe:</label>
                    <br>
                    <input id="fontColor" type="color" name="fontColor">
                    <br>
                    <label for="fontSize">Schriftgrösse:</label>
                    <br>
                    <input id="fontSize" type="number" maxlength="3" name="fontSize">
                    <br>
                    <label for="fontFamily">Schriftart:</label>
                    <br>
                    <select name="fontFamily" id="fontFamily">
                        <option value="">Bitte wählen</option>
                        <option value="Arial">Arial</option>
                        <option value="Palatino Linotype">Palatino Linotype</option>
                        <option value="Helvetica">Helvetica</option>
                        <option value="Impact">Impact</option>
                        <option value="Times New Roman serif">Times New Roman serif</option>
                        <option value="Georgia">Georgia serif</option>
                        <option value="Lucida Sans Unicode">Lucida Sans Unicode</option>
                        <option value="Courier New monospace">Courier New monospace</option>
                        <option value="Arial Black">Arial Black</option>
                    </select>
                    <br>
                    <label for="fontDeco">Textdekoration:</label>
                    <br>
                    <select name="fontDeco" id="fontDeco">
                        <option value="1">Bitte wählen</option>
                        <option value="None">None</option>
                        <option value="line-through">line-through</option>
                        <option value="underline">underline</option>
                    </select>
                    <br>
                </div>
            </div>
            <label for="text">Dein Text:</label>
            <textarea name="text" id="text" cols="30" rows="6"></textarea>
            <br>
            <div>
                <label for="imageLink">Image-URl:</label>
                <br>
                <input type="text" name="imageLink" id="imageLink">
                <br>
                <br>
                <button id="imageBtn" type="button">Bild anzeigen</button>
            </div>
            <div>
                <br>
                <label for="imageWidth">Breite des Bildes:</label>
                <input type="number" id="imageWidth" name="imageWidth">
                <br>
                <br>
                <label for="imageHeight">Höhe des Bildes:</label>
                <input type="number" id="imageHeight" name="imageHeight">
            </div>

            <div>
                <br>
                <button class="resetBtn" id="resetBtn" type="button">Reset</button>
            </div>
            <br>
            <?php
            if (isset($_SESSION['userId'])) { ?>
                <div class="saveData">
                    <button id="saveBtn" type="submit">Speichern</button>
                </div>
                <br>
            <?php } ?>

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