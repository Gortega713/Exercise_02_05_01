<!DOCTYPE html>
<html lang="en">

<head>
    <!--  
    Author: Gabriel Ortega
    Date: 10.2.18
    
    Filename: ViewFiles2.php
     -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> View Files 2 </title>
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>

    <h2>View Files 2</h2>

    <?php
    // Global Variables
    $dir = "../Exercise_02_01_01";
    $dirEntries = scandir($dir);
    
    
    
    // Run through array and display each file
    foreach ($dirEntries as $entry) {
        if (strcmp($entry, '.') !== 0 && strcmp($entry, '..') !== 0) {
            echo "<a href=\"$dir/$entry\">$entry</a><br>\n";
        }    
    }
    
    
    ?>

</body>

</html>
