document.addEventListener("DOMContentLoaded", function() {
    var paragraph = document.getElementById("sampleText");
    var changeBgButton = document.getElementById("changeBgButton");
    var increaseFontButton = document.getElementById("increaseFontButton");
    var centerTextButton = document.getElementById("centerTextButton");
    var resetButton = document.getElementById("resetButton");
    
    var originalFontSize = window.getComputedStyle(paragraph).fontSize;
    var fontSizeValue = parseInt(originalFontSize);
    
    changeBgButton.addEventListener("click", function() {
        paragraph.style.backgroundColor = "#ffffcc";
    });
    
    increaseFontButton.addEventListener("click", function() {
        fontSizeValue += 2;
        paragraph.style.fontSize = fontSizeValue + "px";
    });
    
    centerTextButton.addEventListener("click", function() {
        paragraph.style.textAlign = "center";
    });
    
    resetButton.addEventListener("click", function() {
        paragraph.style.backgroundColor = "";
        paragraph.style.fontSize = originalFontSize;
        paragraph.style.textAlign = "";
        fontSizeValue = parseInt(originalFontSize);
    });
});

