<?php
include 'db.php';



$id = $_GET['id'];

// ✅ Fetch car price FIRST
$carQuery = $conn->query("SELECT Price_per_day FROM Cars WHERE Car_ID = $id");
$c = $carQuery->fetch_assoc();

if ($_POST) {

    
    $cus_id= $_SESSION['user']['Customer_ID'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    $startDate = new DateTime($start);
    $endDate = new DateTime($end);

    $days = $startDate->diff($endDate)->days;

    // ✅ Block 0-day rentals
    if ($days < 1) {
        echo "<p style='color:red'>End date must be after start date.</p>";
        exit;
    }

    // ✅ NOW final price is valid
    $finalPrice = $c['Price_per_day'] * $days;

    // ✅ Insert booking
    $sql = "INSERT INTO Rental_Agreement (Customer_id, Car_id, Start_Date, End_Date, Total_Cost)
            VALUES (
                $cus_id,
                $id,
                '$start',
                '$end',
                '$finalPrice'
            )";

    if (!$conn->query($sql)) {
        die("INSERT ERROR: " . $conn->error);
    }

    // ✅ Correct update
    $conn->query("UPDATE Cars SET Rental_Status='INACTIVE' WHERE Car_ID=$id");

    header("Location: dashboard.php");
    exit;
}
?>


<link rel="stylesheet" href="style.css">

<div class="container">
    <form method="post">
        Start Date <input type="date" name="start" required>
        End Date <input type="date" name="end" required>
        <button>Confirm Reservation</button>
    </form>

</div>