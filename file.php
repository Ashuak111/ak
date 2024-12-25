<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload Form</title>
</head>
<body>
    <h2>Upload a File</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select file to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <br><br>
        <input type="submit" value="Upload File" name="submit">
    </form>

    <?php
    if (isset($_POST["submit"])) {
        if ($_FILES["fileToUpload"]["error"] > 0) {
            echo "Error: " . $_FILES["fileToUpload"]["error"] . "<br>";
        } else {
            // Check file type and size
            if ((($_FILES["fileToUpload"]["type"] == "image/gif")
                || ($_FILES["fileToUpload"]["type"] == "image/jpeg")
                || ($_FILES["fileToUpload"]["type"] == "image/pjpeg")
                || ($_FILES["fileToUpload"]["type"] == "image/png")
                || ($_FILES["fileToUpload"]["type"] == "application/pdf")
                || ($_FILES["fileToUpload"]["type"] == "application/msword")
                || ($_FILES["fileToUpload"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"))
                && ($_FILES["fileToUpload"]["size"] / 1024 <= 550)) {
                
                echo "Upload: " . $_FILES["fileToUpload"]["name"] . "<br>";
                echo "Type: " . $_FILES["fileToUpload"]["type"] . "<br>";
                echo "Size: " . ($_FILES["fileToUpload"]["size"] / 1024) . " KB<br>";
                echo "Temporary file location: " . $_FILES["fileToUpload"]["tmp_name"] . "<br>";

                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "Stored in: " . $target_file . "<br>";

                    // Open the file to write some content
                    $file = fopen($target_file, "a");
                    if ($file) {
                        fwrite($file, "\nThis is a sample line written to the file.\n");
                        fclose($file);
                        echo "Content written to the file.<br>";
                    } else {
                        echo "Unable to open the file for writing.<br>";
                    }

                    // Open the file to read its content
                    $file = fopen($target_file, "r");
                    if ($file) {
                        echo "File content:<br>";
                        while (($line = fgets($file)) !== false) {
                            echo htmlspecialchars($line) . "<br>";
                        }
                        fclose($file);
                    } else {
                        echo "Unable to open the file for reading.<br>";
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.<br>";
                }
            } else {
                echo "Invalid file type or file size exceeding 550 KB.<br>";
            }
        }
    }
    ?>
</body>
</html