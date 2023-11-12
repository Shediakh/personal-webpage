<?php

$username = $_POST["username"];
$password = $_POST["password"];

$csvFile = fopen("../csv/users.csv", "r");

$loggedIn = false;

while (($row = fgetcsv($csvFile)) !== false) {
    $a_users[] = $row[0];
    $a_pass[] = $row[1];
    
    if (($username == $row[0]) && ($password == $row[1])) {
        $loggedIn = true;
        break;
    }
}

fclose($csvFile);


if ($loggedIn) {
    session_start();
    $_SESSION["username"] = $username;
    header("location:homepage.html");
} else {
    echo '<script>alert("Incorrect username or password");';
    echo 'window.location.href="../index.php";</script>';
}
?>
