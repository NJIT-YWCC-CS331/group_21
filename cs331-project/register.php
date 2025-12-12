<?php
include 'db.php';

if ($_POST) {
    $p = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare(
        "INSERT INTO Customer (Name, Email, Phone_Number, Address, password)
         VALUES (?, ?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "sssss",
        $_POST['name'],
        $_POST['email'],
        $_POST['phone'],
        $_POST['address'],
        $p
    );

    $stmt->execute();

    header("Location: index.php");
    exit;
}
?>


<link rel="stylesheet" href="style.css">
<div class="container">
    <h2>Register</h2>
    <form method="post">
        <input name="name" placeholder="Name">
        <input name="email" placeholder="Email">
        <input name="password" type="password" placeholder="Password">
        <input name="phone" placeholder="Phone Number">
        <input name="address" placeholder="Address">
        <button>Create Account</button>
    </form>
</div>