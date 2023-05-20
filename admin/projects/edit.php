<?php
if (isset($_POST['edit_cat'])) {
    $pro_id = $_POST['pro_id'];
    $name = $_POST['name'];
    $cat_id = $_POST['cat_id'];
    $description = $_POST['description'];
    $short_desc = $_POST['short_desc'];
    $project_adv = $_POST['project_adv'];
    $advisors = $_POST['advisors'];
    $advisors = implode(',', $advisors);
    $contact_number = $_POST['contact_number'];
    $formerror = [];
    if (empty($name)) {
        $formerror[] = 'من فضلك ادخل اسم المشروع ';
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
            'projects/images/' . $main_image_uploaded
        );
    } else {
        $main_image_uploaded = '';
    }

    $stmt = $connect->prepare("SELECT * FROM projects WHERE name=? AND id !=?");
    $stmt->execute(array($name, $pro_id));
    $count = $stmt->rowCount();
    if ($count > 0) {
        $formerror[] = ' اسم المشروع  موجود من قبل من فضلك ادخل اسم اخر  ';
    }
    if (empty($formerror)) {
        $stmt = $connect->prepare("UPDATE projects SET cat_id=?,name=?,short_desc=?,description=?,project_adv=?,advisors=?,contact_number=? WHERE id = ? ");
        $stmt->execute(array($cat_id, $name, $short_desc, $description, $project_adv, $advisors, $contact_number, $pro_id));
        if (!empty($_FILES['main_image']['name'])) {
            $stmt = $connect->prepare("UPDATE projects SET image=? WHERE id = ? ");
            $stmt->execute(array($main_image_uploaded, $pro_id));
        }
        if ($stmt) {
            $_SESSION['success_message'] = "تم التعديل بنجاح ";
            header('Location:main?dir=projects&page=report');
            exit();
        }
    } else {
        $_SESSION['error_messages'] = $formerror;
        header('Location:main?dir=projects&page=report');
        exit();
    }
}
