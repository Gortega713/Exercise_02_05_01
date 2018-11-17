<head>
   <!--  
    Author: Gabriel Ortega
    Date: 10.11.18
    
    Filename: VisitorFeedback4.php
     -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Visitor Feeback 4</title>
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
   
     <h2>Visitor Feeback 4</h2>
   
    <?php
    $dir = "./Comments";
    if (is_dir($dir)) {
        // Read contents of folder/directory
        $commentFiles = scandir($dir);
        foreach ($commentFiles as $fileName) {
            if ($fileName !== "." && $fileName !== "..") {
                echo "From <strong>$fileName</strong><br>";
                
                // Need a $fileHandle to read Random Access
                $fileHandle = fopen($dir . "/" . $fileName, "rb");
                // Test for success on opening the file
                if ($fileHandle === false) {
                    echo "There was an error reading file \"$fileName\".<br>\n";
                } else {
                    // Read first string from file
                    $from = fgets($fileHandle);
                    echo "From: " . htmlentities($from) . "<br>\n";
                    // Read Second string from file
                    $email = fgets($fileHandle);
                    echo "Email Address: " . htmlentities($email) . "<br>\n";
                    // Read Third string from file
                    $date = fgets($fileHandle);
                    echo "Date: " . htmlentities($date) . "<br>\n";
                    // Read comment from file; feof = File end of File
                    while (!feof($fileHandle)) {
                        // While not true (end of file marker), keep reading
                        $comment = fgets($fileHandle);
                        if (!feof($fileHandle)) {
                            echo htmlentities($comment) . "<br>\n";
                        } else {
                            echo htmlentities($comment) . "\n";
                        } 
                    }
                    echo "<hr>\n";
                    fclose($fileHandle);
                }
            } 
        }
    }
    ?>

</body>

</html>