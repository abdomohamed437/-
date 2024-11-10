<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.html');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $image = $_FILES['product_image'];

    if ($image['error'] === 0) {
        $image_path = 'uploads/' . basename($image['name']);
        move_uploaded_file($image['tmp_name'], $image_path);
        echo "تم إضافة المنتج بنجاح!";
    } else {
        echo "حدث خطأ أثناء رفع الصورة!";
    }
}
?>
