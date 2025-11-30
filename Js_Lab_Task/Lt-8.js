document.addEventListener("DOMContentLoaded", function() {
    var dropdown = document.getElementById("userType");
    var rollNumberField = document.getElementById("rollNumber");
    var departmentField = document.getElementById("department");
    
    rollNumberField.style.display = "none";
    departmentField.style.display = "none";
    
    dropdown.addEventListener("change", function() {
        var selectedValue = dropdown.value;
        
        if (selectedValue === "Student") {
            rollNumberField.style.display = "block";
            departmentField.style.display = "none";
        } else if (selectedValue === "Teacher") {
            rollNumberField.style.display = "none";
            departmentField.style.display = "block";
        } else {
            rollNumberField.style.display = "none";
            departmentField.style.display = "none";
        }
    });
});

