<!DOCTYPE html>
<html lang="en">

<head>
   <!--  
    Author: Gabriel Ortega
    Date: 10.12.18
    
    Filename: ViewFiles.php
     -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Backup Comments </title>
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>

    <h2>Backup Comments</h2>

    <?php
    $source = "./Comments";
    $destination = "./Backups";
    // If directory does not exist, make it
    if (!is_dir($destination)) {
        mkdir($destination);
        chmod($destination, 0757);
    }
    
    // If directory does not exist, make it
    if (!is_dir($source)) {
        echo "The source directory did not exist, created it, no files to backup.<br>\n";
        mkdir($source);
        chmod($source, 0757);
    } else {
        // Counter Variables
        $totalFiles = 0;
        $filesCopied = 0;
        $dirEntries = scandir($source);
        foreach ($dirEntries as $entry) {
            if ($entry != "." && $entry !== "..") {
                ++$totalFiles;
                // "copy(file to copy, file to copt to)"
                if (copy("$source/$entry", "$destination/$entry")) {
                    // Success
                    ++$filesCopied;
                } else {
                    // Failure to copy file
                    echo "Could not copy file \"" . htmlentities($entry) . "\".<br>\n";
                    
                }
            }
        }
        echo "<p>$filesCopied of $totalFiles successfully backed up</p>\n";
    }
    ?>

</body>

</html>