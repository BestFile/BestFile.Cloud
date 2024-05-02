<?php
// Check if the 'd' parameter is set in the GET request
if(isset($_GET['d'])){
  // Get the random name from the 'd' parameter
  $randomname = basename($_GET['d']);
  // Construct the file path by concatenating the temporary directory and the random name
  $filepath = $tmp . $randomname;

  // Read the log file contents into a string
  $log = file_get_contents($logfile);
  // Decode the log contents from JSON into an associative array
  $bdd = json_decode($log, true);

  // Check if the random name exists in the log array
  if(isset($bdd[$randomname])){
    // Get the filename from the log array
    $filename = $bdd[$randomname]['filename'];
    // Construct the download page URL with the random name and filename
    $downloadPage = "download_page.php?file=" . urlencode($randomname) . "&name=" . urlencode($filename);
    // Redirect to the download page
    header("Location: " . $downloadPage);
    // Exit the script to prevent further execution
    die();
  }
}

// If the 'd' parameter is not set or the random name is not found in the log, return a 404 error
http_response_code(404);
// Redirect to the 404 error page
header('Location: 404.php');
// Exit the script to prevent further execution
die();
?>