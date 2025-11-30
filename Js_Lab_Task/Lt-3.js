document.addEventListener("DOMContentLoaded", function() {
    var toggleButton = document.getElementById("toggleButton");
    var header = document.getElementById("header");
    var content = document.getElementById("content");
    var footer = document.getElementById("footer");
    var body = document.body;
    
    var isDarkMode = false;
    
    var lightTheme = {
        background: "#ffffff",
        text: "#000000",
        border: "#cccccc"
    };
    
    var darkTheme = {
        background: "#1a1a1a",
        text: "#ffffff",
        border: "#333333"
    };
    
    toggleButton.addEventListener("click", function() {
        if (isDarkMode) {
            body.style.backgroundColor = lightTheme.background;
            body.style.color = lightTheme.text;
            header.style.backgroundColor = lightTheme.background;
            header.style.color = lightTheme.text;
            header.style.borderColor = lightTheme.border;
            content.style.backgroundColor = lightTheme.background;
            content.style.color = lightTheme.text;
            content.style.borderColor = lightTheme.border;
            footer.style.backgroundColor = lightTheme.background;
            footer.style.color = lightTheme.text;
            footer.style.borderColor = lightTheme.border;
            toggleButton.innerText = "Switch to Dark Mode";
            isDarkMode = false;
        } else {
            body.style.backgroundColor = darkTheme.background;
            body.style.color = darkTheme.text;
            header.style.backgroundColor = darkTheme.background;
            header.style.color = darkTheme.text;
            header.style.borderColor = darkTheme.border;
            content.style.backgroundColor = darkTheme.background;
            content.style.color = darkTheme.text;
            content.style.borderColor = darkTheme.border;
            footer.style.backgroundColor = darkTheme.background;
            footer.style.color = darkTheme.text;
            footer.style.borderColor = darkTheme.border;
            toggleButton.innerText = "Switch to Light Mode";
            isDarkMode = true;
        }
    });
});

