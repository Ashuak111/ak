 <!DOCTYPE HTML>
<html>
<head>
</head>
<body>
<?php
$name = $email = $gender = $comment = $website = $date = $time = $subscribe = "";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $name = test_input($_GET["name"]);
    $email = test_input($_GET["email"]);
    $website = test_input($_GET["website"]);
    $comment = test_input($_GET["comment"]);
    $gender = test_input($_GET["gender"]);
    $date = test_input($_GET["date"]);
    $time = test_input($_GET["time"]);
    $subscribe = test_input(isset($_GET["subscribe"]) ? "Yes" : "No");
    if(empty($name) || !isset($gender)) {
        echo "Enter name and select gender<br>";
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<h2>PHP Form Validation Example</h2>
<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Name: <input type="text" name="name">
    <br><br>
    E-mail: <input type="text" name="email">
    <br><br>
    Website: <input type="text" name="website">
    <br><br>
    Date: <input type="date" name="date">
    <br><br>
    Time: <input type="time" name="time">
    <br><br>
    Comment: <textarea name="comment" rows="5" cols="40"></textarea>
    <br><br>
    Gender:
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <br><br>
    Subscribe to newsletter: <input type="checkbox" name="subscribe" value="yes">
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>
<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $date;
echo "<br>";
echo $time;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
echo "<br>";
echo "Subscribed: " . $subscribe;
?>
</body>
</html