<!DOCTYPE html>
<html lang="en">

<head>
    <!--  
    Author: Gabriel Ortega
    Date: 10.11.18 
    
    Filename: VisitorComments3.php
     -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Visitor Comments 3</title>
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>

    <?php
    $dir = "./Comments";
    if (is_dir($dir)) {
        if (isset($_POST['save'])) {
            if (empty($_POST['name'])) {
                echo "Unknown visitor\n";
            } else {
                // Create string that displays all information from form
                $saveString = stripslashes($_POST['name']) . "\n";
                $saveString .= stripslashes($_POST['email']) . "\n";
                $saveString .= date('r') . "\n";
                $saveString .= stripslashes($_POST['comment']) . "\n";
                // Display string
                echo "\$saveString: $saveString<br>";
                $currentTime = microtime();
                // Display current time
                echo "\$currentTime: $currentTime<br>";
                $timeArray = explode(" ", $currentTime);
                echo var_dump($timeArray) . "<br>";
                $timeStamp = (float)$timeArray[1] + (float)$timeArray[0];
                // Display timestamp
                echo "\$timeStamp: $timeStamp<br>";
                $saveFileName = "$dir/Comment.$timeStamp.txt";
                // Display new filename
                echo "\$saveFileName: $saveFileName<br>";
                // Start writing something new to existing file; "fopen" creates a new resource
                $fileHandle = fopen($saveFileName, "wb");
                if ($fileHandle === false) {
                    echo "There was an error creating \"" . htmlentities($saveFileName) . "\".<br>\n";
                } else {
                    if (flock($fileHandle, LOCK_EX)) {
                        if (fwrite($fileHandle, $saveString) > 0) {
                            echo "Successfully wrote to \"" . htmlentities($saveFileName) . "\".<br>\n";

                        } else {
                            echo "There was an error writing to \"" . htmlentities($saveFileName) . "\".<br>\n";
                        }
                        flock($fileHandle, LOCK_UN);
                    } else {
                        echo "There was an error locking file \"" . htmlentities($saveFileName) . "\" for writing.<br>\n";
                    }
                    // Dont forget to close your file handle; resource
                    fclose($fileHandle);       
                }
            }
        }
    } else {
        mkdir($dir);
        chmod($dir, 0767);
    }
    ?>

    <h2>Visitor Comments 3</h2>


    <form action="VisitorComments3.php" method="post">
        Your Name: <input type="text" name="name"><br>
        Your E-mail: <input type="email" name="email"><br>
        <textarea name="comment" rows="6" cols="100"></textarea><br>
        <input type="submit" name="save" value="Submit Your Comment"><br>
    </form>

</body>

</html>
