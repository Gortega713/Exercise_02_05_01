<!DOCTYPE html>
<html lang="en">

<head>
   <!--  
    Author: Gabriel Ortega
    Date: 10.2.18
    
    Filename: VisitorComments.php
     -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Visitor Comments </title>
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
                if (file_put_contents($saveFileName, $saveString) > 0) {
                    echo "File \"" . htmlentities($saveFileName) . "\" successfully saved.<br>\n";
                } else {
                    echo "There was an error writing \"" . htmlentities($saveFileName) . "\".<br>\n";
                }
            }
        }
    } else {
        mkdir($dir);
        chmod($dir, 0767);
    }
    ?>

    <h2>Visitor Comments</h2>
    <form action="VisitorComments.php" method="post">
        Your Name: <input type="text" name="name"><br>
        Your E-mail: <input type="email" name="email"><br>
        <textarea name="comment" rows="6" cols="100"></textarea><br>
        <input type="submit" name="save" value="Submit Your Comment"><br>
    </form>

</body>

</html>