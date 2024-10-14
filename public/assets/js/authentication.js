//Email extension function catch
document.querySelector('form').addEventListener('submit', function(e) {
    const email = document.getElementById('email').value;
    const domain = "@g.msuiit.edu.ph";
    
    // Check if the email ends with the allowed domain
    if (!email.endsWith(domain)) {
        e.preventDefault(); // Prevent form submission
        alert('Please use your My.IIT email with an extension ' + domain);
    }
});

//Password functions

  // Get references to the password fields and error message element
  const passwordField = document.getElementById('password');
  const passwordConfirmationField = document.getElementById('password_confirmation');
  const passwordError = document.getElementById('password-error');

  // Add event listeners to both fields
  passwordField.addEventListener('input', checkPasswordMatch);
  passwordConfirmationField.addEventListener('input', checkPasswordMatch);

  function checkPasswordMatch() {
    // Check if the password has at least 6 characters
    if (passwordField.value.length < 6) {
      passwordError.textContent = 'Password must be at least 6 characters long';
      passwordError.style.display = 'block'; // Show the length error message
      return;
    }

    // Only show the mismatch error if the user has started typing in the confirmation field
    if (passwordConfirmationField.value.length > 0) {
      if (passwordField.value !== passwordConfirmationField.value) {
        passwordError.textContent = 'Passwords do not match'; // Mismatch error
        passwordError.style.display = 'block'; // Show the error message
      } else {
        passwordError.style.display = 'none'; // Hide the error if passwords match
      }
    } else {
      passwordError.style.display = 'none'; // Hide the error if the confirmation field is empty
    }
  }