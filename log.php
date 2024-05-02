<?php
// Include the vars.php file, which likely contains variable definitions
include 'vars.php';

// Set the HTTP response header to plain text
header("Content-Type: text/plain");

// Read the log file contents into a string
$log = file_get_contents($logfile);

// Decode the log contents from JSON into an associative array
$bdd = json_decode($log, true);

// Initialize an empty array to store the filtered data
$list = [];

// Iterate through the decoded log array
foreach ($bdd as $randomname => $elem) {
  // Check if the 'link_private' element is set to 'false'
  if($elem['link_private'] == 'false'){
    // Add a new element to the list array with selected data
    $list[] = array(
      // Store the UUID (random name) in the 'uuid' key
      "uuid" => $randomname,
      // Store the filename in the 'filename' key
      "filename" => $elem['filename'],
      // Store the file size in the 'size' key
      "size" => $elem['size'],
      // Store the file date in the 'date' key
      "date" => $elem['date']);
  }
}
// Encode the list array to JSON and output it
echo json_encode($list);
?>