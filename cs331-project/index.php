<?php include 'db.php';


if ($_POST) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $q = $conn->query("SELECT * FROM Customer WHERE Email='$email'");
    $u = $q->fetch_assoc();

    if (password_verify($pass, $u['password'])) {
        $_SESSION['user'] = $u;
        header("Location: dashboard.php");
    }
}
?>

<link rel="stylesheet" href="style.css">
<div class="container">
    <h2>Login</h2>
    <form method="post">
        <input name="email" placeholder="Email">
        <input name="password" type="password" placeholder="Password">
        <button>Login</button>
    </form>
    <a href="register.php">Register</a>
</div>