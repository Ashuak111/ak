[10:12 AM, 11/27/2024] SANJAI VIT: <!DOCTYPE html>
<html>
<head>
    <title>Session Example with PHP</title>
</head>
<body>

<h2>Session Example with PHP</h2>

<?php
session_start();

// Set session variables
if (!isset($_SESSION["username"]) && !isset($_SESSION["email"])) {
    $_SESSION["username"] = "JohnDoe";
    $_SESSION["email"] = "john.doe@example.com";
    echo "Session variables are set.<br>";
} else {
    echo "Session variables already set.<br>";
}

// Retrieve session variables
if (isset($_SESSION["username"]) && isset($_SESSION["email"])) {
    echo "Username: " . $_SESSION["username"] . "<br>";
    echo "Email: " . $_SESSION["email"] . "<br>";
} else {
    echo "No session variables are set.<br>";
}

// Destroy session
if (isset($_POST['destroy'])) {
    session_unset();
    se…
[10:12 AM, 11/27/2024] SANJAI VIT: session
[10:14 AM, 11/27/2024] SANJAI VIT: session_start(): Ensures the session is active.

session_unset(): Unsets all session variables.

session_destroy(): Destroys the session.
[10:15 AM, 11/27/2024] SANJAI VIT: <!DOCTYPE html>
<html>
<head>
    <title>Cookie Example with PHP</title>
</head>
<body>

<h2>Cookie Example with PHP</h2>

<?php
// Setting a cookie
$cookie_name = "user";
$cookie_value = "John Doe";
// Cookie will expire in one hour
setcookie($cookie_name, $cookie_value, time() + 3600, "/");

// Checking if the cookie is set
if(isset($_COOKIE[$cookie_name])) {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name] . "<br><br>";
} else {
    echo "Cookie '" . $cookie_name . "' is not set!<br><br>";
}

// Deleting the cookie
if(isset($_COOKIE[$cookie_name])) {
    // Empty the value and set the expiration date to one hour ago
    setcookie($cookie_name, "", time() - 3600, "/");
    echo "Cookie '" . $cookie_name . "' is deleted.<br>";
} else {
    echo "Cookie '" . $cookie_name . "' is not set, so can't delete!<br>";
}
?>

</body>
</html>