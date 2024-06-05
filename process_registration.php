<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registdata";

// Підключення до бази даних
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка підключення
if ($conn->connect_error) {
    die("Під'єднання не вдалося: " . $conn->connect_error);
}

// Отримання значень з POST-змінних
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$country = $_POST['country'];
$city = $_POST['city'];

// Підготовка SQL-запиту
$sql = "INSERT INTO infouserdata (Nickname, Email, Password, Name, Surname, Birthday, Gender, Country, City) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss", $username, $email, $password, $first_name, $last_name, $dob, $gender, $country, $city);

// Виконання запиту
if ($stmt->execute()) {
    echo "Реєстрація успішна!";
} else {
    echo "Помилка: " . $sql . "<br>" . $conn->error;
}

// Закриття підготовленого зв'язку та підключення до бази даних
$stmt->close();
$conn->close();
?>
