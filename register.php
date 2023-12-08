<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $location = $_POST['location'];
    $email = $_POST['email'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
    move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);

    $sql = "INSERT INTO users (username, password, firstname, lastname, picture, age, location, email) VALUES ('$username', '$password', '$firstname', '$lastname', '$target_file', '$age', '$location', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful. <a href='login.php'>Login</a>";
    } else {
        echo "Error during registration: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>
<body>
    <h2>User Registration</h2>
    <form action="register.php" method="POST" enctype="multipart/form-data">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <br>
        <label for="firstname">Prenume:</label>
        <input type="text" name="firstname" required><br>
        <br>
        <label for="username">Nume:</label>
        <input type="text" name="lastname" required><br>
        <br>
        <label for="picture">Poza:</label>
        <input type="file" name="picture" accept="image/*" required><br>
        <br>
        <label for="age">Varsta:</label>
        <input type="number" name="age" required><br>
        <br>
        <label for="location">Locatie:</label>
        <input type="text" name="location" required><br>
        <br>
        <label for="email">Email:</label>
        <input type="text" name="email" required><br>
        <br>
        <input type="submit" value="Register">
    </form>
    <p><a href="login.php">Back to Login</a></p>
</body>
</html>
