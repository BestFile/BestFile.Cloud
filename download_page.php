<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include a file containing variables used in this script
include 'vars.php';

// Check if 'file' and 'name' GET parameters are set
if (!isset($_GET['file']) || !isset($_GET['name'])) {
    header('Location: 404.php');
    exit;
}

// Get the random filename from the GET parameter 'file'
$randomname = basename($_GET['file']);

// Get the original filename from the GET parameter 'name'
$filename = basename($_GET['name']);

// Construct the full path to the file using the temporary directory and the random filename
$filepath = $tmp . $randomname;

// Get the size of the file in bytes
$filesize = filesize($filepath);

// Check if the file does not exist or is not readable
if ($filesize === false || !is_readable($filepath)) {
    header('Location: 404.php');
    exit;
}

// Convert the file size from bytes to megabytes
$filesizeMB = $filesize / 1024 / 1024;

// Format the file size for display, using MB if it's less than 1024 MB, otherwise use GB
if ($filesizeMB < 1024) {
    $sizeFormatted = number_format($filesizeMB, 2) . ' MB';
} else {
    $sizeFormatted = number_format($filesizeMB / 1024, 2) . ' GB';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Set the character encoding to UTF-8 -->
    <meta charset="UTF-8">
    
    <!-- Set the title of the page -->
    <title>BestFile.Cloud</title>
    
    <!-- Link to an external stylesheet -->
    <link rel="stylesheet" href="styles.css">
    
    <!-- Define inline styles for the logo image and download button -->
    <style>
        /* Make the logo image responsive, with a maximum width of 200px */
        #logo-image {
            height: auto;
            width: 100%;
            max-width: 200px;
        }
        
        /* Style the download button with a purple background, white text, and rounded corners */
        .download-button {
            padding: 10px 20px;
            background-color: #ce0c65;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <!-- Display the logo image -->
    <h1><img src="logo.png" alt="BestFile.Cloud Logo" id="logo-image"></h1>
    
    <!-- Display the filename and size, with the size formatted according to the previous logic -->
    <p><strong><?php echo htmlspecialchars($filename); ?></strong> (<?php echo $sizeFormatted; ?>)</p>
    
    <!-- Create a download link that passes the random filename and original filename as GET parameters -->
    <a href="force_download.php?file=<?php echo urlencode($randomname); ?>&name=<?php echo urlencode($filename); ?>" class="download-button">Download</a>
</body>
</html>