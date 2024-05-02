<?php
// Include the vars.php file, which likely contains variable definitions
include 'vars.php';

// Define a function to handle upload errors
function uploadError($str = ''){
  // Output the error message and set the HTTP response code to 403
  echo $str;
  http_response_code(403);
  // Exit the script to prevent further execution
  exit();
}

// Check if a file is provided in the $_FILES array
if(!isset($_FILES['file'])) {
  // If no file is provided, call the uploadError function with an error message
  uploadError('Upload error: Maybe the file is too big. Maximum is 5GB.'); 
  // No file provided
}

// Get the original filename from the $_FILES array and sanitize it using htmlspecialchars
$filename = htmlspecialchars(basename($_FILES['file']['name'])); 
// File original name

// Generate a random filename using bin2hex and random_bytes to prevent enumeration
$randomname = bin2hex(random_bytes(32)); 
// File destination name, to prevent enumeration

// Construct the upload file path by concatenating the temporary directory and the random filename
$uploadfile = $tmp . $randomname;

// Check if the temporary directory exists, and create it if it doesn't
if (!file_exists($tmp)) {
  mkdir($tmp); 
  // Create tmp directory if doesnt exist already
}

// Check if the destination file already exists, which is very unlikely
if(file_exists($uploadfile)) {
  // If the file exists, call the uploadError function
  uploadError(); 
  // Destination file exist already, very unlikely
}

// Read the log file contents into a string
$log = file_get_contents($logfile);

// Decode the log contents from JSON into an associative array
$bdd = json_decode($log, true);

// Add the uploaded file information to the log array
$bdd[$randomname]['filename'] = $filename;
$bdd[$randomname]['date'] = date('d/m/y \a\t H:i:s');
$bdd[$randomname]['size'] = $_FILES['file']['size'];

// Move the uploaded file to the temporary directory
move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);

// Encode the updated log array back to JSON and write it to the log file
file_put_contents($logfile, json_encode($bdd));

// Output the random filename
echo $randomname;
?>
