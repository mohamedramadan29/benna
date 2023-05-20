<?php
if (isset($_GET['pro_id']) && is_numeric($_GET['pro_id'])) {
    $pro_id = $_GET['pro_id'];
    $stmt = $connect->prepare('SELECT * FROM projects WHERE id= ?');
    $stmt->execute([$pro_id]);
    $cat_data = $stmt->fetch();
    $cat_image = $cat_data['image'];
    if (file_exists($cat_image)) {
        $cat_image = "projects/images/" . $cat_image;
        unlink($cat_image);
    }
    $stmt = $connect->prepare('DELETE FROM projects WHERE id=?');
    $stmt->execute([$pro_id]);
    if ($stmt) {
        $_SESSION['success_message'] = "تم الحذف بنجاح";
        header('Location: main?dir=projects&page=report');
        exit(); // Terminate the script after redirecting
    }
}
