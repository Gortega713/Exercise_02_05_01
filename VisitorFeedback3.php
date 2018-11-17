<!DOCTYPE html>
<html lang="en">

<head>
   <!--  
    Author: Gabriel Ortega
    Date: 10.9.18
    
    Filename: VisitorFeedback3.php
     -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Visitor Feeback </title>
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
   
     <h2>Visitor Feeback 3</h2>
   
    <?php
    $dir = "./Comments";
    if (is_dir($dir)) {
        // Read contents of folder/directory
        $commentFiles = scandir($dir);
        foreach ($commentFiles as $fileName) {
            var_dump($commentFiles);
            if ($fileName !== "." && $fileName !== "..") {
                echo "From <strong>$fileName</strong><br>";
                $comment = file($dir . "/" . $fileName);
                echo "From: " . htmlentities($comment[0]) . "<br>\n";
                echo "Email Address: " . htmlentities($comment[1]) . "<br>\n";
                echo "Date: " . htmlentities($comment[2]) . "<br>\n";
                $commentLines = count($comment);
                for ($i = 3; $i < $commentLines; $i++) {
                    echo htmlentities($comment[$i]) . "<br>\n";
                }
                echo "<hr>\n";
            } 
        }
    }
    ?>

</body>

</html>