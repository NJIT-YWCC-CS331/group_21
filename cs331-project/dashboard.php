<?php
include 'db.php';
if (!isset($_SESSION['user'])) header("Location: index.php");
?>

<link rel="stylesheet" href="style.css">

<div class="dashboard-header">
    <h2>Welcome, <?= $_SESSION['user']['Name'] ?></h2>

    <div class="nav-links">
        <a href="profile.php">My Profile</a>
        <a href="search.php">Search Cars</a>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

    <?php if ($_SESSION['user']['role'] == "ADMIN"): ?>
        <div class="admin-links">
            <a href="admin/users.php">Admin Users</a>
            <a href="admin/reservations.php">Admin Reservations</a>
        </div>
    <?php endif; ?>
</div>