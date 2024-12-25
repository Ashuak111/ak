<!DOCTYPE HTML>
<html>
<head>
    <title>PHP Date and Time Functions</title>
</head>
<body>
    <h2>Current Date and Time</h2>
    <?php
    // Set the timezone
    date_default_timezone_set("Asia/Kolkata");

    // Get the current date and time
    $currentDate = date("Y-m-d");   // Date in YYYY-MM-DD format
    $currentTime = date("H:i:s");   // Time in HH:MM:SS format

    // Display the date and time
    echo "Date: " . $currentDate . "<br>";
    echo "Time: " . $currentTime . "<br>";

    // Display full date and time
    $fullDateTime = date("Y-m-d H:i:s");
    echo "Full Date and Time: " . $fullDateTime . "<br>";

    // Custom formatted date and time
    $customFormat = date("l, F j, Y, g:i a");  // Example: Friday, March 23, 2023, 5:31 pm
    echo "Custom Formatted Date and Time: " . $customFormat . "<br>";

    // Create a timestamp for a specific date and time
    $timestamp = strtotime("2024-12-31 23:59:59");
    echo "Timestamp for 2024-12-31 23:59:59: " . $timestamp . "<br>";

    // Convert timestamp back to readable date and time
    $readableDateTime = date("Y-m-d H:i:s", $timestamp);
    echo "Readable Date and Time: " . $readableDateTime . "<br>";
    ?>
</body>
</html> 