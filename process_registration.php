<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registdata";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Під'єднання не вдалося: " . $conn->connect_error);
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$country = $_POST['country'];
$city = $_POST['city'];

$sql = "INSERT INTO infouserdata (Nickname, Email, Password, Name, Surname, Birthday, Gender, Country, City) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss", $username, $email, $password, $first_name, $last_name, $dob, $gender, $country, $city);

if ($stmt->execute()) {
    echo "Реєстрація успішна!";
} else {
    echo "Помилка: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
