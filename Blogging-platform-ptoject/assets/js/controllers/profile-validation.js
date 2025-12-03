document.getElementById('profileForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const fullName = document.getElementById('fullName').value.trim();
    const username = document.getElementById('username').value.trim();
    const bio = document.getElementById('bio').value.trim();
    
    clearErrors();
    
    let isValid = true;
    
    if (!fullName || fullName.length < 2) {
        showError('fullName', 'Full name must be at least 2 characters');
        isValid = false;
    }
    
    if (!username || username.length < 3) {
        showError('username', 'Username must be at least 3 characters');
        isValid = false;
    }
    
    if (!bio || bio.length < 10) {
        showError('bio', 'Bio must be at least 10 characters');
        isValid = false;
    }
    
    if (isValid) {
        showSuccess('Profile updated successfully!');
    }
});

function showError(field, message) {
    const errorElement = document.getElementById(field + 'Error');
    if (errorElement) {
        errorElement.textContent = message;
        errorElement.style.display = 'block';
    }
}

function showSuccess(message) {
    const successElement = document.getElementById('successMessage');
    if (successElement) {
        successElement.textContent = message;
        successElement.style.display = 'block';
        setTimeout(() => {
            successElement.style.display = 'none';
        }, 3000);
    }
}

function clearErrors() {
    const errorElements = document.querySelectorAll('.error-message');
    errorElements.forEach(el => {
        el.textContent = '';
        el.style.display = 'none';
    });
}

