<?php
$conn = new mysqli("sql1.njit.edu", "il96", "Ilialimonov05!", "il96", "3306");
if ($conn->connect_error) die("DB Error");
session_start();
