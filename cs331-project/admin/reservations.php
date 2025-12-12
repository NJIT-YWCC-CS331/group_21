<?php include '../db.php'; ?>

<link rel="stylesheet" href="../style.css">

<div class="container">
    <h3 class="page-title">All Rentals</h3>

    <div class="table-wrapper">
        <table class="data-table">
            <tr>
                <th>User</th>
                <th>Car</th>
                <th>Start</th>
                <th>End</th>
            </tr>

            <?php
            $r = $conn->query("
                SELECT *
                FROM Rental_Agreement r
                JOIN Cars ca ON r.Car_ID = ca.Car_ID
                JOIN Customer c ON r.Customer_Id = c.Customer_ID
            ");

            while ($row = $r->fetch_assoc()):
            ?>
                <tr>
                    <td><?= $row['Name'] ?></td>
                    <td><?= $row['Brand'] ?> <?= $row['Model'] ?></td>
                    <td><?= $row['Start_Date'] ?></td>
                    <td><?= $row['End_Date'] ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>