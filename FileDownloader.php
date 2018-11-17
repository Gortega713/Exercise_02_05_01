<!DOCTYPE html>
<html lang="en">

<?php
    $dir = "../Exercise_02_01_01";
    if (isset($_GET['fileName'])) {
        $fileToGet = $dir . "/" . stripslashes($_GET['fileName']);
        if (is_readable($fileToGet)) {
            $errorMsg = "";
            $showErrorPage = false;
            header("Content-Description: File Transfer");
            header("Content-Type: application/force-download");
            header("Content-Disposition: attachment; filename=\"" . $_GET['fileName'] . "\"");
            header("Content-Transfer-Encoding: base64");
            header("Content-Length: " . filesize($fileToGet));
            readfile($fileToGet);
        } else {
            $errorMsg = "Cannot read \"$fileToGet\"";
            $showErrorPage = true;
        }
    } else {
        $errorMsg = "No filename specified";
        $showErrorPage = true;
    }
    if ($showErrorPage) {
?>

<head>
    <!--  
    Author: Gabriel Ortega
    Date: 10.4.18
    
    Filename: FileDownloader.php
     -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> File Download Error </title>
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>

    <p>There was an error downloading "<?php echo htmlentities($_GET['fileName']); ?>"</p>
    <p>
        <?php echo htmlentities($errorMsg); ?>
    </p>

   
    


</body>

</html>

<?php
    } 
?>
