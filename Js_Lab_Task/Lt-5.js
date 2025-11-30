document.addEventListener("DOMContentLoaded", function() {
    var textarea = document.getElementById("textInput");
    var analyzeButton = document.getElementById("analyzeButton");
    var resultsDiv = document.getElementById("results");
    
    analyzeButton.addEventListener("click", function() {
        var text = textarea.value.trim();
        
        if (text === "") {
            resultsDiv.innerHTML = "<p>Please enter some text to analyze.</p>";
            return;
        }
        
        var totalCharacters = text.length;
        
        var words = text.split(" ").filter(function(word) {
            return word.length > 0;
        });
        var totalWords = words.length;
        
        var reversedText = "";
        for (var i = text.length - 1; i >= 0; i--) {
            reversedText += text[i];
        }
        
        resultsDiv.innerHTML = 
            "<h3>Analysis Results:</h3>" +
            "<p><strong>Total Characters:</strong> " + totalCharacters + "</p>" +
            "<p><strong>Total Words:</strong> " + totalWords + "</p>" +
            "<p><strong>Reversed Text:</strong> " + reversedText + "</p>";
    });
});

