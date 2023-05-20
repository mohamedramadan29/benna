<?php
if (isset($_POST['add_cat'])) {
    $name = $_POST['name'];
    $speical_name = $_POST['speical_name'];
    $formerror = [];
    if (empty($name)) {
        $formerror[] = 'من فضلك ادخل الاسم ';
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

    $stmt = $connect->prepare("SELECT * FROM project_advisor WHERE name = ?");
    $stmt->execute(array($name));
    $count = $stmt->rowCount();
    if ($count > 0) {
        $formerror[] = ' اسم المستشار موجود من قبل من فضلك ادخل اسم اخر  ';
    }
    if (empty($formerror)) {
        $stmt = $connect->prepare("INSERT INTO project_advisor (name,speical_name,image)
        VALUES (:zname,:zspecial,:zimage)");
        $stmt->execute(array(
            "zname" => $name,
            "zspecial" => $speical_name,
            "zimage" => $main_image_uploaded,
        ));
        if ($stmt) {
            $_SESSION['success_message'] = " تمت الأضافة بنجاح  ";
            header('Location:main?dir=advisors&page=report');
        }
    } else {
        $_SESSION['error_messages'] = $formerror;
        header('Location:main?dir=advisors&page=report');
        exit();
    }
}
