<?php include 'db.php'; ?>

<link rel="stylesheet" href="style.css">

<table>
    <tr>
        <th>Brand</th>
        <th>Model</th>
        <th>Category</th>
        <th>Year</th>
        <th>Price</th>
        <th>Book</th>
    </tr>

    <?php
    $cars = $conn->query("SELECT * FROM Cars WHERE Rental_Status='ACTIVE'");
    while ($c = $cars->fetch_assoc()):
    ?>
        <tr>
            <td><?= $c['Brand'] ?></td>
            <td><?= $c['Model'] ?></td>
            <td><?= $c['Category'] ?></td>
            <td><?= $c['Year_of_Manufacture'] ?></td>
            <td>$<?= $c['Price_per_day'] ?>/day</td>
            <td><a href="book.php?id=<?= $c['Car_ID'] ?>">Reserve</a></td>
        </tr>
    <?php endwhile; ?>
</table>