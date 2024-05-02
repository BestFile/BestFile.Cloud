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
       a width that adjusts to the container, and a maximum width of 200px */
    #logo-image {
      height: auto;
      width: 100%; /* Adjusts to the width of the container */
      max-width: 200px; /* Maximum width */
    }
  </style>

  <body>
    <!-- Display the logo image within an h1 heading -->
    <h1><img src="logo.png" alt="BestFile.Cloud Logo" id="logo-image"></h1>

    <!-- Set a hidden input field to specify the maximum file size -->
    <input type="hidden" name="MAX_FILE_SIZE" value="500000000000" />

    <!-- Create a file input field with an ID of "file-input" -->
    <input name="file" type="file" id="file-input"/>
    <!-- Create a label for the file input field, making it draggable -->
    <label for="file-input" id="file-label" draggable="true">
      <!-- Create a container for the upload box -->
      <div id="upload-box">
        <!-- Display a dynamic status message -->
        <span id="dynamic-status">Click or drag a file here</span>
        <!-- Display a static status message -->
        <span id="static-status"></span>
      </div>
    </label>
    <br>
    <br><br>

    <!-- Link to the index.js script -->
    <script src="index.js" charset="utf-8"></script>
  </body>
</html>