<!DOCTYPE html>
<html lang="en">

<head>
    <!--  
    Author: Gabriel Ortega
    Date: 10.5.18
    
    Filename: ViewFiles4.php
     -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> View Files 4 </title>
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>

    <h2>View Files 4</h2>

    <?php
    // Global Variables
    $dir = "../Exercise_02_01_01";
    $dirEntries = scandir($dir);
    
    // Create table
    echo "<table border='1' width='100%'>\n";
    echo "<tr><th colspan='4'>Directory Listing for <strong>" . htmlentities($dir) . "</strong></th></tr>\n";
    echo "<tr>";
    echo "<th><strong><em>Name</em></strong></th>";
    echo "<th><strong><em>Owner</em></strong></th>";
    echo "<th><strong><em>Permissions</em></strong></th>";
    echo "<th><strong><em>Size</em></strong></th>";
    echo "</tr>\n";
    // Run through array and display each file
    foreach ($dirEntries as $entry) {
        if (strcmp($entry, '.') !== 0 && strcmp($entry, '..') !== 0) {
            $fullEntryName = $dir . "/" . $entry;
            echo "<tr><td>";
            
            // Determine if this is a sub folder or a real file
            if (is_file($fullEntryName)) {
                echo "<a href=\"FileDownloader.php?fileName=$entry\">" . htmlentities($entry) . "</a>";
            } else {
                echo htmlentities($entry);
            }
            echo "</td><td align='center'>" . fileowner($fullEntryName);
            if (is_file($fullEntryName)) {
                // Return a decimal number
                $perms = fileperms($fullEntryName);
                $perms = decoct($perms % 01000);
                echo "</td><td align='center'>0$perms";
                echo "</td><td align='right'>" . number_format(filesize($fullEntryName), 0) . " bytes";
            } else {
                echo "</td><td colspan='2' align='center'>&lt;DIR&gt;";
            }
            echo "</td></tr>\n";
        }    
    }
    
    
    // End table
    echo "</table>\n";
    ?>

</body>

</html>