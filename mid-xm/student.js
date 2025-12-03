function validateAndSubmit() {
    var studentName = document.getElementById("studentName").value;
    var studentMarks = document.getElementById("studentMarks").value;
    var isValid = true;
    
    document.getElementById("nameError").innerHTML = "";
    document.getElementById("marksError").innerHTML = "";
    
    if (studentName === "") {
        document.getElementById("nameError").innerHTML = "<b>Name cannot be empty</b>";
        isValid = false;
    } else {
        var onlyLetters = true;
        for (var i = 0; i < studentName.length; i++) {
            var char = studentName.charAt(i);
            if ((char < "A" || char > "Z") && (char < "a" || char > "z")) {
                onlyLetters = false;
                break;
            }
        }
        if (!onlyLetters) {
            document.getElementById("nameError").innerHTML = "<b>Name must contain only letters</b>";
            isValid = false;
        }
    }
    
    if (studentMarks === "") {
        document.getElementById("marksError").innerHTML = "<b>Marks cannot be empty</b>";
        isValid = false;
    } else {
        var marksNum = Number(studentMarks);
        if (isNaN(marksNum)) {
            document.getElementById("marksError").innerHTML = "<b>Marks must be a number</b>";
            isValid = false;
        } else {
            if (marksNum < 0 || marksNum > 100) {
                document.getElementById("marksError").innerHTML = "<b>Marks must be between 0 and 100</b>";
                isValid = false;
            }
        }
    }
    
    if (isValid) {
        var table = document.getElementById("studentTable");
        var newRow = table.insertRow();
        var nameCell = newRow.insertCell(0);
        var marksCell = newRow.insertCell(1);
        nameCell.innerHTML = studentName;
        marksCell.innerHTML = studentMarks;
        
        if (marksNum > 50) {
            newRow.style.backgroundColor = "green";
        } else {
            newRow.style.backgroundColor = "red";
        }
        
        document.getElementById("studentName").value = "";
        document.getElementById("studentMarks").value = "";
    }
}

