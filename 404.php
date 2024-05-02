<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <!-- Define the character encoding of the document -->
    <meta charset="utf-8">
    <!-- Set the title of the page -->
    <title>BestFile.Cloud</title>
    <!-- Link to the favicon image -->
    <link rel="icon" type="image/png" href="favicon.png" />
    <!-- Link to the stylesheet, applying only to screens with a minimum device width of 800px -->
    <link rel="stylesheet" href="styles.css" media="screen and (min-device-width: 800px)">
  </head>

  <!-- Define an inline stylesheet -->
  <style>
    /* Style the logo image to have an automatic height, 
       a width that adjusts to the container, and a maximum width of 500px */
    #logo-image {
      height: auto;
      width: 100%; /* Adjusts to the width of the container */
      max-width: 500px; /* Maximum width */
    }
  </style>

  <body>
    <!-- Display the logo image within an h1 heading -->
    <h1><img src="logo.png" alt="BestFile.Cloud Logo" id="logo-image"></h1>

    <!-- Set a hidden input field to specify the maximum file size -->
    <input type="hidden" name="MAX_FILE_SIZE" value="500000000000" />

    <!-- Display a dynamic status message -->
    <span id="dynamic-status">404 Error</span>
    <!-- Display a countdown message, which will be updated by JavaScript -->
    <span>You will be redirected in <span id="countdown">5</span> seconds.</span>

    <!-- Link to the index.js script -->
    <script src="index.js" charset="utf-8"></script>

    <!-- Define a JavaScript function to handle the countdown timer -->
    <script>
      // Initialize the countdown timer to 5 seconds
      var seconds = 5;
      // Get a reference to the countdown element
      var countdownElement = document.getElementById('countdown');
      // Set an interval to update the countdown every 1000 milliseconds (1 second)
      var interval = setInterval(function() {
        // Decrement the seconds counter
        seconds--;
        // Update the countdown element text content
        countdownElement.textContent = seconds;
        // If the countdown has reached 0, clear the interval and redirect to the homepage
        if (seconds <= 0) {
          clearInterval(interval);
          window.location.href = '/';
        }
      }, 1000);
    </script>
  </body>
</html>