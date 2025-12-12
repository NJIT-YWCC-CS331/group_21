<?php include '../db.php'; ?>
<link rel="stylesheet" href="../style.css">

<div class="container">
    <h3 class="page-title">Customers</h3>

    <div class="table-wrapper">
        <table class="data-table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>

            <?php
            $users = $conn->query("SELECT * FROM Customer");
            while ($u = $users->fetch_assoc()):
            ?>
                <tr>
                    <td><?= $u['Customer_ID'] ?></td>
                    <td><?= $u['Name'] ?></td>
                    <td><?= $u['Email'] ?></td>
                    <td>
                        <span class="role-badge role-<?= strtolower($u['role']) ?>">
                            <?= $u['role'] ?>
                        </span>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>