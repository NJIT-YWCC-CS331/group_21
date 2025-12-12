<?php
include 'db.php';

$u = $_SESSION['user'];
$cus_id = $u['Customer_ID'];

// ✅ Always run this (NOT inside $_POST)
$sql = "
SELECT 
    r.Rental_ID,
    r.Start_Date,
    r.End_Date,
    r.Total_Cost,
    c.Brand,
    c.Model,
    c.Price_per_day
FROM Rental_Agreement r
JOIN Cars c ON r.Car_ID = c.Car_ID
WHERE r.Customer_ID = $cus_id
";

$result = $conn->query($sql);

if (!$result) {
    die("SELECT ERROR: " . $conn->error);
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h3>Profile</h3>
    <p><b>Name:</b> <?= $u['Name'] ?></p>
    <p><b>Email:</b> <?= $u['Email'] ?></p>
    <p><b>Role:</b> <?= $u['role'] ?></p>
</div>

<div class="container">
    <h3>My Rentals</h3>

    <table class="rental-table">
        <tr>
            <th>Car</th>
            <th>Daily Price</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Total Cost</th>
        </tr>

        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['Brand'] ?> <?= $row['Model'] ?></td>
                    <td>$<?= $row['Price_per_day'] ?>/day</td>
                    <td><?= $row['Start_Date'] ?></td>
                    <td><?= $row['End_Date'] ?></td>
                    <td><b>$<?= $row['Total_Cost'] ?></b></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No rentals yet.</td>
            </tr>
        <?php endif; ?>
    </table>
</div>