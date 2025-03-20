<?php
include 'db_connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - RTBMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex justify-center items-center h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96 text-center">
        <h2 class="text-2xl font-bold mb-4">Welcome, <?php echo $user['name']; ?></h2>
        <p class="mb-2"><strong>Email:</strong> <?php echo $user['email']; ?></p>
        <p class="mb-2"><strong>Blood Group:</strong> <?php echo $user['blood_group']; ?></p>
        <p class="mb-2"><strong>Phone:</strong> <?php echo $user['phone']; ?></p>
        <p class="mb-4"><strong>City:</strong> <?php echo $user['city']; ?></p>
        <a href="logout.php" class="bg-red-500 text-white p-2 rounded hover:bg-red-600">Logout</a>
    </div>
</body>
</html>
