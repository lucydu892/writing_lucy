function downloadPostcard(cardId, fileName) {
    const element = document.getElementById(cardId);
    if (!element) {
        console.error("Element nicht gefunden: " + cardId);
        return;
    }
    html2canvas(element).then(function (canvas) {
        const link = document.createElement("a");
        link.href = canvas.toDataURL("image/png");
        link.download = fileName + ".png";
        link.click();
    });
}
