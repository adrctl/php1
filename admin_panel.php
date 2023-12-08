<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT admin FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($is_admin);
$stmt->fetch();
$stmt->close();

if (!$is_admin) {
    header("Location: index.php");
    exit();
}

$result = $conn->query("SELECT id, username, firstname, lastname, picture, age, location, email, admin FROM users");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        table {
            width: 100%;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid silver;
        }

        th, td {
            padding: 10px;
        }

        th {
            background-color: silver;
        }

        img {
            max-width: 50px;
            max-height: 50px;
        }
    </style>
</head>
<body>
    <h2>Admin panel</h2>
    <p>Admin username: <?php echo $_SESSION['username']; ?> (<a href="logout.php">logout</a>)</p>

    <h3>All Users:</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Prenume</th>
                <th>Nume</th>
                <th>Poza</th>
                <th>Varsta</th>
                <th>Locatie</th>
                <th>Email</th>
                <th>Admin</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><img src="<?php echo $row['picture']; ?>" alt="Profile Picture"></td>
                    <td><?php echo $row['location']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['admin']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<p><a href="user_profile.php">Back to user profile</a></p>
<p><a href="logout.php">Logout</a></p>
</body>
</html>

<?php
$conn->close();
?>
