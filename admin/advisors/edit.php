<?php
if (isset($_POST['edit_cat'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $speical_name = $_POST['speical_name'];
    $formerror = [];
    if (empty($name)) {
        $formerror[] = 'من فضلك ادخل اسم  ';
    }
    // main image
    if (!empty($_FILES['main_image']['name'])) {
        $main_image_name = $_FILES['main_image']['name'];
        $main_image_temp = $_FILES['main_image']['tmp_name'];
        $main_image_type = $_FILES['main_image']['type'];
        $main_image_size = $_FILES['main_image']['size'];
        $main_image_uploaded = time() . '_' . $main_image_name;
        move_uploaded_file(
            $main_image_temp,
            'advisors/images/' . $main_image_uploaded
        );
    } else {
        $main_image_uploaded = '';
    }

    $stmt = $connect->prepare("SELECT * FROM project_advisor WHERE name=? AND id !=?");
    $stmt->execute(array($name, $id));
    $count = $stmt->rowCount();
    if ($count > 0) {
        $formerror[] = ' اسم المستشار  موجود من قبل من فضلك ادخل اسم اخر  ';
    }
    if (empty($formerror)) {
        $stmt = $connect->prepare("UPDATE project_advisor SET name=?,speical_name=? WHERE id = ? ");
        $stmt->execute(array($name, $speical_name, $id));
        if (!empty($_FILES['main_image']['name'])) {
            $stmt = $connect->prepare("UPDATE project_advisor SET image=? WHERE id = ? ");
            $stmt->execute(array($main_image_uploaded, $id));
        }
        if ($stmt) {
            $_SESSION['success_message'] = "تم التعديل بنجاح ";
            header('Location:main?dir=advisors&page=report');
            exit();
        }
    } else {
        $_SESSION['error_messages'] = $formerror;
        header('Location:main?dir=advisors&page=report');
        exit();
    }
}
