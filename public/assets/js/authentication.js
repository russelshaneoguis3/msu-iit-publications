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

//Password match function
  // Get references to the password fields and error message element
  const passwordField = document.getElementById('password');
  const passwordConfirmationField = document.getElementById('password_confirmation');
  const passwordError = document.getElementById('password-error');

  // Add an event listener to the password confirmation field
  passwordConfirmationField.addEventListener('input', checkPasswordMatch);

  function checkPasswordMatch() {
    // Only show the error message if the user has started typing in the confirmation field
    if (passwordConfirmationField.value.length > 0) {
      // Check if the passwords don't match
      if (passwordField.value !== passwordConfirmationField.value) {
        passwordError.style.display = 'block'; // Show the error message
      } else {
        passwordError.style.display = 'none'; // Hide the error message if they match
      }
    } else {
      passwordError.style.display = 'none'; // Hide the error message if confirmation field is empty
    }
  };