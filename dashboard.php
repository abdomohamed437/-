<?php
session_start();

$correct_username = "Ali";
$correct_password = "password123";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if ($username === $correct_username && $password === $correct_password) {
        $_SESSION['loggedin'] = true;
    } else {
        echo "اسم المستخدم أو كلمة المرور غير صحيحة!";
        exit;
    }
}

if (!isset($_SESSION['loggedin'])) {
    header('Location: login.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>لوحة تحكم النوساني</h1>
    <form action="add-product.php" method="post" enctype="multipart/form-data">
        <label>اسم المنتج:</label>
        <input type="text" name="product_name" required>
        <label>السعر:</label>
        <input type="text" name="price" required>
        <label>صورة المنتج:</label>
        <input type="file" name="product_image" required>
        <button type="submit">إضافة المنتج</button>
    </form>
</body>
</html>
