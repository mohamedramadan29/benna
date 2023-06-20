<?php
if (isset($_POST['edit_cat'])) {
    $cat_id = $_POST['cat_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $short_description = $_POST['short_description'];
    $formerror = [];
    if (empty($name)) {
        $formerror[] = 'من فضلك ادخل اسم القسم';
    }
    // main image
    if (!empty($_FILES['main_image']['name'])) {
        $main_image_name = $_FILES['main_image']['name'];
        $main_image_name = str_replace(' ', '', $main_image_name);
        $main_image_temp = $_FILES['main_image']['tmp_name'];
        $main_image_type = $_FILES['main_image']['type'];
        $main_image_size = $_FILES['main_image']['size'];
        $main_image_uploaded = time() . '_' . $main_image_name;
        move_uploaded_file(
            $main_image_temp,
            'benna_categories/images/' . $main_image_uploaded
        );
    } else {
        $main_image_uploaded = '';
    }



    // main image banner
    if (!empty($_FILES['main_image_banner']['name'])) {
        $main_image_banner_name = $_FILES['main_image_banner']['name'];
        $main_image_banner_name = str_replace(' ', '', $main_image_banner_name);
        $main_image_banner_temp = $_FILES['main_image_banner']['tmp_name'];
        $main_image_banner_type = $_FILES['main_image_banner']['type'];
        $main_image_banner_size = $_FILES['main_image_banner']['size'];
        $main_image_banner_uploaded = time() . '_' . $main_image_banner_name;
        move_uploaded_file(
            $main_image_banner_temp,
            'benna_categories/images/' . $main_image_banner_uploaded
        );
    } else {
        $main_image_banner_uploaded = '';
    }



    $stmt = $connect->prepare("SELECT * FROM categories WHERE name=? AND id !=?");
    $stmt->execute(array($name, $cat_id));
    $count = $stmt->rowCount();
    if ($count > 0) {
        $formerror[] = ' اسم القسم موجود من قبل من فضلك ادخل اسم اخر  ';
    }
    if (empty($formerror)) {
        $stmt = $connect->prepare("UPDATE categories SET name=?,description=?,short_description=? WHERE id = ? ");
        $stmt->execute(array($name, $description, $short_description, $cat_id));
        if (!empty($_FILES['main_image']['name'])) {
            $stmt = $connect->prepare("UPDATE categories SET main_image=? WHERE id = ? ");
            $stmt->execute(array($main_image_uploaded, $cat_id));
        }
        if (!empty($_FILES['main_image_banner']['name'])) {
            $stmt = $connect->prepare("UPDATE categories SET main_image_banner=? WHERE id = ? ");
            $stmt->execute(array($main_image_banner_uploaded, $cat_id));
        }
        if ($stmt) {
            $_SESSION['success_message'] = "تم التعديل بنجاح ";
            header('Location:main?dir=benna_categories&page=report');
            exit();
        }
    } else {
        $_SESSION['error_messages'] = $formerror;
        header('Location:main?dir=benna_categories&page=report');
        exit();
    }
}
