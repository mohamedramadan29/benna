<?php
if (isset($_GET['cat_id']) && is_numeric($_GET['cat_id'])) {
    $cat_id = $_GET['cat_id'];
    $stmt = $connect->prepare('SELECT * FROM project_advisor WHERE id= ?');
    $stmt->execute([$cat_id]);
    $cat_data = $stmt->fetch();
    $cat_image = $cat_data['image'];
    if (file_exists($cat_image)) {
        $cat_image = "advisors/images/" . $cat_image;
        unlink($cat_image);
    }
    $stmt = $connect->prepare('DELETE FROM project_advisor WHERE id=?');
    $stmt->execute([$cat_id]);
    if ($stmt) {
        $_SESSION['success_message'] = "تم الحذف بنجاح";
        header('Location: main?dir=advisors&page=report');
        exit(); // Terminate the script after redirecting
    }
}
