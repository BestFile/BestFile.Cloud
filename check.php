<?php
// Include the vars.php file, which likely contains variable definitions
include 'vars.php';

// Output a message to check if the local directory is writable for the webserver
echo "Is local directory writable for the webserver ? ";
// Use the is_writable function to check if the current directory is writable
if(is_writable('.')) { 
  // If the directory is writable, output 'yes'
  echo 'yes'; 
} else { 
  // If the directory is not writable, output 'no'
  echo 'no'; 
}

// Output a message to check if the logfile is writable for the webserver
echo "<br> Is logfile writable for the webserver ? ";
// Use the is_writable function to check if the logfile is writable
if(is_writable($logfile)) { 
  // If the logfile is writable, output 'yes'
  echo 'yes'; 
} else { 
  // If the logfile is not writable, output 'no'
  echo 'no'; 
}

// Output a message to inform the user to ensure both the local directory and logfile are writable
echo "<br>Make sure both are writable. If not, edit permission.";
?>