<!DOCTYPE html>
<html lang="en">

<head>
   <!--  
    Author: Gabriel Ortega
    Date: 10.2.18
    
    Filename: ViewFiles.php
     -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> View Files </title>
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>

    <h2>View Files</h2>

    <?php
    // Global Variables
    $dir = "../Exercise_02_01_01";
    $openDir = opendir($dir);
    
    // While running through files, display them. Do not display directory dots (. / ..)
    while ($curFile = readdir($openDir)) {
        if (strcmp($curFile, '.') !== 0 && strcmp($curFile, '..') !== 0) {
            echo "<a href=\"$dir/$curFile\">$curFile</a><br>\n";
        }    
    }
    
    // Return directory
    closedir($openDir);
    ?>

</body>

</html>
