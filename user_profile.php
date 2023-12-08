<?php
session_start();

if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require_once 'config.php';

$username = $_SESSION['username'];
$sql = "SELECT username, firstname, lastname, picture, age, location, email, admin FROM users WHERE username = ?";
$result = $conn->prepare($sql);
$result->bind_param("s", $username);
$result->execute();
$result->bind_result($username, $firstname, $lastname, $picture, $age, $location, $email, $is_admin);

if ($result->fetch()) {
} else {
    header("Location: login.php");
    exit();
}

$result->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User profile</title>
</head>
<body>
    <h2>Bine ai venit, <?php echo $firstname; ?>!</h2>

    <?php if ($is_admin) : ?>
        <p><a href="admin_panel.php">Admin Panel</a></p>
    <?php endif; ?>    

    <p>username: <?php echo $username; ?> (<a href="logout.php">logout</a>)</p>
    <p>Prenume: <?php echo $firstname; ?></p>
    <p>Nume: <?php echo $lastname; ?></p>
    <p>Poza:<br><img src="<?php echo $picture; ?>" alt="User Picture"></p>
    <p>Varsta: <?php echo $age; ?> ani</p>
    <p>Locatie: <?php echo $location; ?></p>
    <p>Email: <a href="mailto: <?php echo $email; ?>"><?php echo $email; ?></a></p>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>

<?php
$conn->close();
?>