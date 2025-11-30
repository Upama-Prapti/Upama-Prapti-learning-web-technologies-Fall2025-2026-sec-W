document.addEventListener("DOMContentLoaded", function() {
    var toggleButton = document.getElementById("themeToggle");
    var body = document.body;
    var isDarkMode = false;
    
    var lightTheme = {
        background: "#ffffff",
        text: "#000000"
    };
    
    var darkTheme = {
        background: "#1a1a1a",
        text: "#ffffff"
    };
    
    toggleButton.addEventListener("click", function() {
        if (isDarkMode) {
            body.style.backgroundColor = lightTheme.background;
            body.style.color = lightTheme.text;
            toggleButton.innerText = "Switch to Dark Mode";
            isDarkMode = false;
        } else {
            body.style.backgroundColor = darkTheme.background;
            body.style.color = darkTheme.text;
            toggleButton.innerText = "Switch to Light Mode";
            isDarkMode = true;
        }
    });
    
    var greetingElement = document.getElementById("greeting");
    
    function updateGreeting() {
        var now = new Date();
        var hours = now.getHours();
        
        var greeting = "";
        if (hours < 12) {
            greeting = "Good Morning";
        } else if (hours < 18) {
            greeting = "Good Afternoon";
        } else {
            greeting = "Good Evening";
        }
        
        greetingElement.innerText = greeting;
    }
    
    updateGreeting();
    setInterval(updateGreeting, 60000);
    
    var aboutLink = document.getElementById("aboutLink");
    var projectsLink = document.getElementById("projectsLink");
    var contactLink = document.getElementById("contactLink");
    
    var aboutSection = document.getElementById("aboutSection");
    var projectsSection = document.getElementById("projectsSection");
    var contactSection = document.getElementById("contactSection");
    
    function hideAllSections() {
        aboutSection.style.display = "none";
        projectsSection.style.display = "none";
        contactSection.style.display = "none";
    }
    
    aboutLink.addEventListener("click", function() {
        hideAllSections();
        aboutSection.style.display = "block";
    });
    
    projectsLink.addEventListener("click", function() {
        hideAllSections();
        projectsSection.style.display = "block";
    });
    
    contactLink.addEventListener("click", function() {
        hideAllSections();
        contactSection.style.display = "block";
    });
    
    var contactForm = document.getElementById("contactForm");
    var nameInput = document.getElementById("contactName");
    var emailInput = document.getElementById("contactEmail");
    var messageInput = document.getElementById("contactMessage");
    
    contactForm.addEventListener("submit", function(event) {
        event.preventDefault();
        
        var name = nameInput.value.trim();
        var email = emailInput.value.trim();
        var message = messageInput.value.trim();
        
        var isValid = true;
        
        clearContactErrors();
        
        if (name === "") {
            showContactError("nameError", "Name must not be empty");
            isValid = false;
        }
        
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === "" || !emailPattern.test(email)) {
            showContactError("emailError", "Email must be in a proper format");
            isValid = false;
        }
        
        if (message.length < 10) {
            showContactError("messageError", "Message must have a minimum of 10 characters");
            isValid = false;
        }
        
        if (isValid) {
            var successMsg = document.getElementById("contactSuccess");
            successMsg.innerText = "Message sent successfully!";
            successMsg.style.color = "green";
            contactForm.reset();
        }
    });
    
    function showContactError(elementId, message) {
        var errorElement = document.getElementById(elementId);
        errorElement.innerText = message;
        errorElement.style.color = "red";
    }
    
    function clearContactErrors() {
        document.getElementById("nameError").innerText = "";
        document.getElementById("emailError").innerText = "";
        document.getElementById("messageError").innerText = "";
        document.getElementById("contactSuccess").innerText = "";
    }
});

