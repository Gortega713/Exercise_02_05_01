<!DOCTYPE html>
<html lang="en">

<head>
    <!--  
    Author: Gabriel Ortega
    Date: 10.18.18
    
    Filename: TheGame2.php
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> The Game </title>
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>

    <?php
    // Entry Code
    // Determine if user has submitted data
    // Yes - Process the data
    $dir = ".";
    $saveFileName = "./TheGamers2.txt";
    $saveString = "";
    $dataArray = array();
    
    function displayAlert($message) {
        echo "<script>alert(\"$message\")</script>";
    }
    
    if (is_dir($dir)) {
        // Success
        if (isset($_POST['submit'])) {
            if (empty($_POST['username'])) {
                // Failure
                displayAlert("Unknown Visitor");
            } else {
                // Success
                $dataArray[] = stripslashes($_POST['username']);
                $dataArray[] = md5(stripslashes($_POST['password']));
                $dataArray[] = stripslashes($_POST['fullName']);
                $dataArray[] = stripslashes($_POST['email']);
                $dataArray[] = stripslashes($_POST['age']);
                $dataArray[] = stripslashes($_POST['screenName']);
                $dataArray[] = stripslashes($_POST['comment']);
                $saveString = implode($dataArray, " ");
                $saveString .= "\n";
                echo $saveString;
                $fileHandle = fopen($saveFileName, "ab");
                if (!$fileHandle) {
                    displayAlert("There was an error creating $saveFileName");
                } else {
                    fclose($fileHandle);
                }
            }
        }
    }
    ?>
    
    <!--  HTML Code for the input form  -->
    
    <h1>Register for the Game</h1>
    
    <form action="TheGame2.php" method="post">
        User Name<br> <input type="text" name="username"><br>
        Password<br> <input type="password" name="password"><br>
        Full Name<br> <input type="text" name="fullName"><br>
        E-mail<br> <input type="email" name="email"><br>
        Age<br> <input type="number" name="age"><br>
        Screen Name<br> <input type="text" name="screenName"><br>
        Comments<br> <textarea rows="6" cols="40" name="comment"></textarea><br>
        <input type="submit" name="submit" value="Submit Your Registration"><br>
    </form>
    
    <?php
    // Display code to display all gamers
    ?>

</body>

</html>
