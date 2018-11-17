<!DOCTYPE html>
<html lang="en">

<head>
    <!--  
     Author: Gabriel Ortega
     Date: 10.12.18
     
     Filename: TheGame.php
     -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> The Game </title>
</head>

<body>
    
    <?php   
    if (isset($_POST['submit'])) {
        //    Put each set of data on a new line
        $gamerInfo = stripslashes($_POST['username']) . "\n";
        $gamerInfo .= md5(stripslashes($_POST['password'])) . "\n";
        $gamerInfo .= stripslashes($_POST['name']) . "\n";
        $gamerInfo .= stripslashes($_POST['email']) . "\n";
        $gamerInfo .= stripslashes($_POST['age']) ."\n";
        $gamerInfo .= stripslashes($_POST['screenName']) ."\n";
        $gamerInfo .= stripslashes($_POST['comments']) ."\n";
        //    Save text in a file
          $fileHandle = fopen("TheGamers.txt", "a");
                if ($fileHandle === false) {
                    echo "Error";
                } else {
                    if (fwrite($fileHandle, $gamerInfo) > 0) {
                        echo "Thank you for registering!";

                    } else {
                        echo "There was an error with your registration. Please try again";
                    }
                    // Dont forget to close your file handle; resource
                    fclose($fileHandle);
        }
        
    }
    ?>

    <form action="TheGame.php" method="post">
        <!--    Username    -->
        Enter your username
        <input type="input" name="username"><br>
        <!--    Password    -->
        Enter your password
        <input type="password" name="password"><br>
        <!--    Full Name    -->
        Enter your full name
        <input type="input" name="name"><br>
        <!--    Email    -->
        Enter your email
        <input type="email" name="email"><br>
        <!--    Age    -->
        Enter your age
        <input type="number" name="age"><br>
        <!--    Screen Name    -->
        Enter your screen name
        <input type="input" name="screenName"><br>
        <!--    Comments    -->
        Enter your comments
        <textarea name="comments" rows="4" cols="50"></textarea><br>
        <!--  Submit Button  -->
        <input type="submit" name="submit" value="Submit Form">&nbsp;&nbsp;
        <!--  Reset Button  -->
        <input type="reset" value="Clear Form" placeholder="If you have no comment, type 'No comment'">
    </form>

    <?php
    // Check if form was submitted, grab data
    if (isset($_POST['submit'])) {
        $fileArray = file("TheGamers.txt");
        $i = 0;
        // While there is data within the file, display each line
        while ($i < count($fileArray)) {
            // Display each line of the file which should correspond with the fields. 
            // *BUG* : If there is a multiline comment, this shouldnt work
            echo "Username: " . $fileArray[$i] . "<br>\n";
            $i++;
            echo "Password: " . $fileArray[$i] . "<br>\n";
            $i++;
            echo "Full Name: " . $fileArray[$i] . "<br>\n";
            $i++;
            echo "Email: " . $fileArray[$i] . "<br>\n";
            $i++;
            echo "Age: " . $fileArray[$i] . "<br>\n";
            $i++;
            echo "Screen Name: " . $fileArray[$i] . "<br>\n";
            $i++;
            echo "Comment: " . $fileArray[$i] . "<br>\n";
            $i++;
        }
    }
    
    ?>


</body>

</html>
