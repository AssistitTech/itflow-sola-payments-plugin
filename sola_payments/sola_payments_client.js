// JS for Sola Payments UI (optional)
// Example: intercept form submit, call backend endpoint, etc.
document.addEventListener('DOMContentLoaded', function() {
  // Example usage
  if (document.getElementById('sola-payments-form')) {
    document.getElementById('sola-payments-form').onsubmit = function(e) {
      e.preventDefault();
      // AJAX logic here
    }
  }
});