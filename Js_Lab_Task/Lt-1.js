document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementById("registrationForm");
    
    form.addEventListener("submit", function(event) {
        event.preventDefault();
        
        var fullName = document.getElementById("fullName").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;
        var phoneNumber = document.getElementById("phoneNumber").value;
        
        var isValid = true;
        
        clearErrors();
        
        if (fullName.trim() === "") {
            showError("fullNameError", "Full Name is required");
            isValid = false;
        }
        
        if (email.trim() === "" || !email.includes("@") || !email.includes("..")) {
            showError("emailError", "Email must contain @ and ..");
            isValid = false;
        }
        
        if (password.length < 6) {
            showError("passwordError", "Password must be at least 6 characters long");
            isValid = false;
        }
        
        if (password !== confirmPassword) {
            showError("confirmPasswordError", "Passwords do not match");
            isValid = false;
        }
        
        if (phoneNumber.trim() === "" || isNaN(phoneNumber)) {
            showError("phoneError", "Phone Number must contain only digits");
            isValid = false;
        }
        
        if (isValid) {
            var successMsg = document.getElementById("successMessage");
            successMsg.innerText = "Registration Successful!";
            successMsg.style.color = "green";
            form.reset();
        }
    });
    
    function showError(elementId, message) {
        var errorElement = document.getElementById(elementId);
        errorElement.innerText = message;
        errorElement.style.color = "red";
    }
    
    function clearErrors() {
        document.getElementById("fullNameError").innerText = "";
        document.getElementById("emailError").innerText = "";
        document.getElementById("passwordError").innerText = "";
        document.getElementById("confirmPasswordError").innerText = "";
        document.getElementById("phoneError").innerText = "";
        document.getElementById("successMessage").innerText = "";
    }
});

