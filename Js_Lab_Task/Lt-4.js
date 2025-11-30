document.addEventListener("DOMContentLoaded", function() {
    var nameInput = document.getElementById("nameInput");
    var rollInput = document.getElementById("rollInput");
    var departmentInput = document.getElementById("departmentInput");
    var addButton = document.getElementById("addButton");
    var studentTable = document.getElementById("studentTable");
    
    addButton.addEventListener("click", function() {
        var name = nameInput.value.trim();
        var roll = rollInput.value.trim();
        var department = departmentInput.value.trim();
        
        if (name === "" || roll === "" || department === "") {
            alert("Please fill in all fields");
            return;
        }
        
        var newRow = document.createElement("tr");
        
        var nameCell = document.createElement("td");
        nameCell.innerText = name;
        
        var rollCell = document.createElement("td");
        rollCell.innerText = roll;
        
        var departmentCell = document.createElement("td");
        departmentCell.innerText = department;
        
        var actionCell = document.createElement("td");
        var deleteButton = document.createElement("button");
        deleteButton.innerText = "Delete";
        deleteButton.addEventListener("click", function() {
            studentTable.removeChild(newRow);
        });
        actionCell.appendChild(deleteButton);
        
        newRow.appendChild(nameCell);
        newRow.appendChild(rollCell);
        newRow.appendChild(departmentCell);
        newRow.appendChild(actionCell);
        
        studentTable.appendChild(newRow);
        
        nameInput.value = "";
        rollInput.value = "";
        departmentInput.value = "";
    });
});

