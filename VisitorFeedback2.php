<!DOCTYPE html>
<html lang="en">

<head>
   <!--  
    Author: Gabriel Ortega
    Date: 10.9.18
    
    Filename: VisitorFeedback2.php
     -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Visitor Feeback 2</title>
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
   
     <h2>Visitor Feeback 2</h2>
   
    <?php
    $dir = "./Comments";
    if (is_dir($dir)) {
        // Read contents of folder/directory
        $commentFiles = scandir($dir);
        foreach ($commentFiles as $fileName) {
            if ($fileName !== "." && $fileName !== "..") {
                echo "From <strong>$fileName</strong><br>";
                echo "<pre>\n";
                $comment = readfile($dir . "/" . $fileName);
                echo $comment;
                echo "</pre>\n";
                echo "<hr>\n";
            } 
        }
    }
    ?>

</body>

</html>