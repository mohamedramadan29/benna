<?php
if (isset($_POST['add_cat'])) {
    $name = $_POST['name'];
    $cat_id = $_POST['cat_id'];
    $description = $_POST['description'];
    $short_desc = $_POST['short_desc'];
    $project_adv = $_POST['project_adv'];
    $project_adv_head = $_POST['project_adv_head'];
    //$advisors = $_POST['advisors'];
    //$advisors = implode(',', $advisors);
    $contact_number = $_POST['contact_number'];
    $formerror = [];
    if (empty($name)) {
        $formerror[] = 'من فضلك ادخل اسم القسم';
    }
    // credit gallary 
    $file = '';
    $file_tmp = '';
    $location = "";
    $uploadplace = "projects/images/";
    if (isset($_FILES['more_images']['name'])) {
        foreach ($_FILES['more_images']['name'] as $key => $val) {
            $file = $_FILES['more_images']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp = $_FILES['more_images']['tmp_name'][$key];
            move_uploaded_file($file_tmp, $uploadplace . $file);
            $location .= $file . ",";
        }
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
            'projects/images/' . $main_image_uploaded
        );
    } else {
        $main_image_uploaded = '';
    }
    // header image
    if (!empty($_FILES['header_image']['name'])) {
        $header_image_name = $_FILES['header_image']['name'];
        $header_image_name = str_replace(' ', '', $header_image_name);
        $header_image_temp = $_FILES['header_image']['tmp_name'];
        $header_image_type = $_FILES['header_image']['type'];
        $header_image_size = $_FILES['header_image']['size'];
        $header_image_uploaded = time() . '_' . $header_image_name;
        move_uploaded_file(
            $header_image_temp,
            'projects/images/' . $header_image_uploaded
        );
    } else {
        $header_image_uploaded = '';
    }
    // Advisor image
    if (!empty($_FILES['adv_image']['name'])) {
        $adv_image_name = $_FILES['adv_image']['name'];
        $adv_image_name = str_replace(' ', '', $adv_image_name);
        $adv_image_temp = $_FILES['adv_image']['tmp_name'];
        $adv_image_type = $_FILES['adv_image']['type'];
        $adv_image_size = $_FILES['adv_image']['size'];
        $adv_image_uploaded = time() . '_' . $adv_image_name;
        move_uploaded_file(
            $header_image_temp,
            'projects/images/' . $adv_image_uploaded
        );
    } else {
        $adv_image_uploaded = '';
    }
    $stmt = $connect->prepare("SELECT * FROM projects WHERE name = ?");
    $stmt->execute(array($name));
    $count = $stmt->rowCount();
    if ($count > 0) {
        $formerror[] = ' اسم المشروع  موجود من قبل من فضلك ادخل اسم اخر  ';
    }
    if (empty($formerror)) {
        $stmt = $connect->prepare("INSERT INTO projects (cat_id,name,short_desc,description,project_adv,project_adv_head,/*advisors,*/image,header_image,advan_image,contact_number,image_credits)
        VALUES (:zcat_id,:zname,:zshort_desc,:zdesc,:zadvantage,:zadv_head,/*:zadvisor,*/:zimage,:zheader_image,:zadvan_image,:zcontact_number,:zimage_credit)");
        $stmt->execute(
            array(
                "zcat_id" => $cat_id,
                "zname" => $name,
                "zshort_desc" => $short_desc,
                "zdesc" => $description,
                "zadvantage" => $project_adv,
                "zadv_head" => $project_adv_head,
                // "zadvisor" => $advisors,
                "zimage" => $main_image_uploaded,
                "zheader_image" => $header_image_uploaded,
                "zadvan_image" => $adv_image_uploaded,
                "zcontact_number" => $contact_number,
                "zimage_credit" => $location
            )
        );
        if ($stmt) {
            $_SESSION['success_message'] = " تمت الأضافة بنجاح  ";
            header('Location:main?dir=projects&page=report');
        }
    } else {
        $_SESSION['error_messages'] = $formerror;
        header('Location:main?dir=projects&page=report');
        exit();
    }
}
