<?php
if (isset($_POST['add_pro'])) {
    $formerror = [];
    $banner_head = $_POST['banner_head'];
    $about_head = $_POST['about_head'];
    $about_short_head = $_POST['about_short_head'];
    $about_description = $_POST['about_description'];
    $about_head_short1 = $_POST['about_head_short1'];
    $about_head_short2 = $_POST['about_head_short2'];
    $about_head_short3 = $_POST['about_head_short3'];
    $about_head_short4 = $_POST['about_head_short4'];
    $about_desc_short1 = $_POST['about_desc_short1'];
    $about_desc_short2 = $_POST['about_desc_short2'];
    $about_desc_short3 = $_POST['about_desc_short3'];
    $about_desc_short4 = $_POST['about_desc_short4'];
    $benna_main_head = $_POST['benna_main_head'];
    $benna_head1 = $_POST['benna_head1'];
    $benna_head2 = $_POST['benna_head2'];
    $benna_desc1 = $_POST['benna_desc1'];
    $benna_desc2 = $_POST['benna_desc2'];
    $vision_head = $_POST['vision_head'];
    $vision_desc = $_POST['vision_desc'];
    $message_head = $_POST['message_head'];
    $message_desc = $_POST['message_desc'];


    // main image

    if (!empty($_FILES['banner_image']['name'])) {

        $banner_image_name = $_FILES['banner_image']['name'];
        $banner_image_name = str_replace(' ', '', $banner_image_name);
        $banner_image_temp = $_FILES['banner_image']['tmp_name'];
        $banner_image_type = $_FILES['banner_image']['type'];
        $banner_image_size = $_FILES['banner_image']['size'];
        $banner_image_uploaded = time() . '_' . $banner_image_name;
        move_uploaded_file(
            $banner_image_temp,
            'pages/about_images/' . $banner_image_uploaded
        );
    } else {
        $banner_image_uploaded = '';
    }
    // BENNA MAIN IMAGE 
    if (!empty($_FILES['benna_main_image']['name'])) {
        $benna_main_image_name = $_FILES['benna_main_image']['name'];
        $benna_main_image_name = str_replace(' ', '', $benna_main_image_name);
        $benna_main_image_temp = $_FILES['benna_main_image']['tmp_name'];
        $benna_main_image_type = $_FILES['benna_main_image']['type'];
        $benna_main_image_size = $_FILES['benna_main_image']['size'];
        $benna_main_image_uploaded = time() . '_' . $benna_main_image_name;
        move_uploaded_file(
            $benna_main_image_temp,
            'pages/about_images/' . $benna_main_image_uploaded
        );
    } else {
        $benna_main_image_uploaded = '';
    }
    // vision  image
    if (!empty($_FILES['vision_image']['name'])) {

        $vision_image_name = $_FILES['vision_image']['name'];
        $vision_image_name = str_replace(' ', '', $vision_image_name);
        $vision_image_temp = $_FILES['vision_image']['tmp_name'];
        $vision_image_type = $_FILES['vision_image']['type'];
        $vision_image_size = $_FILES['vision_image']['size'];
        $vision_image_uploaded = time() . '_' . $vision_image_name;
        move_uploaded_file(
            $vision_image_temp,
            'pages/about_images/' . $vision_image_uploaded
        );
    } else {
        $vision_image_uploaded = '';
    }

    // credit gallary 
    $file = '';
    $file_tmp = '';
    $location = "";
    $uploadplace = "pages/about_images/";
    if (isset($_FILES['more_images']['name'])) {
        foreach ($_FILES['more_images']['name'] as $key => $val) {
            $file = $_FILES['more_images']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp = $_FILES['more_images']['tmp_name'][$key];
            move_uploaded_file($file_tmp, $uploadplace . $file);
            $location .= $file . ",";
        }
    }

    if (empty($formerror)) {
        $stmt = $connect->prepare("UPDATE about_page SET banner_head=?,about_head=?
            ,about_short_head=? ,about_description=? ,about_head_short1=? ,about_head_short2=?
            ,about_head_short3=? ,about_head_short4=? ,about_desc_short1=? ,about_desc_short2=?
            ,about_desc_short3=? ,about_desc_short4=? ,benna_main_head=? ,benna_head1=?
            ,benna_head2=? ,benna_desc1=? ,benna_desc2=? ,vision_head=? ,vision_desc=?
            ,message_head=? ,message_desc=?");
        $stmt->execute(
            array(
                $banner_head,
                $about_head,
                $about_short_head,
                $about_description,
                $about_head_short1,
                $about_head_short2,
                $about_head_short3,
                $about_head_short4,
                $about_desc_short1,
                $about_desc_short2,
                $about_desc_short3,
                $about_desc_short4,
                $benna_main_head,
                $benna_head1,
                $benna_head2,
                $benna_desc1,
                $benna_desc2,
                $vision_head,
                $vision_desc,
                $message_head,
                $message_desc,
            )
        );
        if (!empty($_FILES['banner_image']['name']) && !empty($_FILES['benna_main_image']['name']) && !empty($_FILES['vision_image']['name']) && $file_tmp != '') {
            $stmt = $connect->prepare("UPDATE about_page SET banner_image=?,benna_main_image=?,vision_image=?,more_images=?");
            $stmt->execute(
                array(
                    $banner_image_uploaded,
                    $benna_main_image_uploaded,
                    $vision_image_uploaded,
                    $location
                )
            );
        }
        if (!empty($_FILES['banner_image']['name'])) {
            $stmt = $connect->prepare("UPDATE about_page SET banner_image=?");
            $stmt->execute(
                array(
                    $banner_image_uploaded
                )
            );
        }
        if (!empty($_FILES['benna_main_image']['name'])) {
            $stmt = $connect->prepare("UPDATE about_page SET benna_main_image=?");
            $stmt->execute(
                array(
                    $benna_main_image_uploaded
                )
            );
        }
        if (!empty($_FILES['vision_image']['name'])) {
            $stmt = $connect->prepare("UPDATE about_page SET vision_image=?");
            $stmt->execute(
                array(
                    $vision_image_uploaded
                )
            );
        }
        if ($file_tmp != '') {
            $stmt = $connect->prepare("UPDATE about_page SET more_images=?");
            $stmt->execute(
                array(
                    $location
                )
            );
        }
        if ($stmt) {
            $_SESSION['success_message'] = " تمت الأضافة بنجاح  ";
            if (isset($_SESSION['success_message'])) {
                $message = $_SESSION['success_message'];
                unset($_SESSION['success_message']);
?>
                <?php
                ?>
                <script src="plugins/jquery/jquery.min.js"></script>
                <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
                <script>
                    $(function() {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: '<?php echo $message; ?>',
                            showConfirmButton: false,
                            timer: 2000
                        })
                    })
                </script>
            <?php
            }
            header('Location:main.php?dir=pages&page=about');
        }
    } else {
        $_SESSION['error_messages'] = $formerror;
        foreach ($formerror as $error) {
            ?>
            <div class="alert alert-danger alert-dismissible" style="max-width: 800px; margin:20px">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error; ?>
            </div>
<?php
        }
        unset($_SESSION['error_messages']);
    }
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"> اقسام صفحة من نحن </h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="main.php?dir=dashboard&page=dashboard">الرئيسية</a></li>
                    <li class="breadcrumb-item active"> اقسام صفحة من نحن </li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content-header -->
<!-- DOM/Jquery table start -->
<?php
$stmt = $connect->prepare("SELECT * FROM about_page ORDER BY id DESC LIMIT 1");
$stmt->execute();
$page_data = $stmt->fetch();

$banner_head = $page_data['banner_head'];
$about_head = $page_data['about_head'];
$about_short_head = $page_data['about_short_head'];
$about_description = $page_data['about_description'];
$about_head_short1 = $page_data['about_head_short1'];
$about_head_short2 = $page_data['about_head_short2'];
$about_head_short3 = $page_data['about_head_short3'];
$about_head_short4 = $page_data['about_head_short4'];
$about_desc_short1 = $page_data['about_desc_short1'];
$about_desc_short2 = $page_data['about_desc_short2'];
$about_desc_short3 = $page_data['about_desc_short3'];
$about_desc_short4 = $page_data['about_desc_short4'];
$benna_main_head = $page_data['benna_main_head'];
$benna_head1 = $page_data['benna_head1'];
$benna_head2 = $page_data['benna_head2'];
$benna_desc1 = $page_data['benna_desc1'];
$benna_desc2 = $page_data['benna_desc2'];
$vision_head = $page_data['vision_head'];
$vision_desc = $page_data['vision_desc'];
$message_head = $page_data['message_head'];
$message_desc = $page_data['message_desc'];
/* /////////////////////////// */
$banner_image = $page_data['banner_image'];
$benna_main_image = $page_data['benna_main_image'];
$vision_image = $page_data['vision_image'];
$more_images = $page_data['more_images'];
?>
<section class="content">
    <div class="container-fluid">
        <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-body">
                            <span class='badge badge-info'> البانر الاساسي </span>
                            <div class="form-group">
                                <label for="inputName"> العنوان </label>
                                <input required type="text" id="banner_head" name="banner_head" class="form-control" value="<?php echo $banner_head ?>">
                            </div>
                            <div class="form-group">
                                <label for="description"> صورة البانر </label>
                                <input type="file" name='banner_image' class='form-control' accept='image/*'>
                            </div>
                            <div class='form-group'>
                                <img style='width:150px; height:150px' src="pages/about_images/<?php echo $banner_image ?>" alt="">
                            </div>
                            <span class='badge badge-info'> القسم الثاني ( من نحن ) </span>
                            <div class="form-group">
                                <label for="inputName"> العنوان </label>
                                <input required type="text" id="about_head" name="about_head" class="form-control" value="<?php echo $about_head ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputName"> العنوان الفرعي </label>
                                <input required type="text" id="about_short_head" name="about_short_head" class="form-control" value="<?php echo $about_short_head ?>">
                            </div>
                            <div class="form-group">
                                <label for="about_description"> الوصف </label>
                                <textarea style='height:60px' id="about_description" name="about_description" class="form-control" rows="4"><?php echo $about_description ?></textarea>
                            </div>
                            <span class='badge badge-danger'> محتوي الاقسام الفرعية </span>
                            <div class="form-group">
                                <label for="inputName"> العنوان   </label>
                                <input required type="text" id="about_head_short1" name="about_head_short1" class="form-control" value="<?php echo $about_head_short1 ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputName"> العنوان الفرعي  </label>
                                <input required type="text" id="about_head_short1" name="about_head_short1" class="form-control" value="<?php echo $about_head_short1 ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputName"> الوصف  </label>
                                <textarea required type="text" id="about_desc_short1" name="about_desc_short1" class="form-control"><?php echo $about_desc_short1 ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputName"> العنوان الفرعي الثاني </label>
                                <input required type="text" id="about_head_short2" name="about_head_short2" class="form-control" value="<?php echo $about_head_short2 ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputName"> الوصف الفرعي الثاني </label>
                                <textarea required type="text" id="about_desc_short2" name="about_desc_short2" class="form-control"><?php echo $about_desc_short2; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputName"> العنوان الفرعي الثالث </label>
                                <input required type="text" id="about_head_short3" name="about_head_short3" class="form-control" value="<?php echo $about_head_short3 ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputName"> الوصف الفرعي الثالث </label>
                                <textarea required type="text" id="about_desc_short3" name="about_desc_short3" class="form-control"><?php echo $about_desc_short3 ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputName"> العنوان الفرعي الرابع </label>
                                <input required type="text" id="about_head_short4" name="about_head_short4" class="form-control" value="<?php echo $about_head_short4 ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputName"> الوصف الفرعي الرابع </label>
                                <textarea required type="text" id="about_desc_short4" name="about_desc_short4" class="form-control"><?php echo $about_desc_short4; ?></textarea>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-body">
                            <span class='badge badge-info'> القسم الثالث ( أقسام مجموعة بناء ) </span>
                            <div class="form-group">
                                <label for="category_head"> العنوان الرئيسيى </label>
                                <input required type="text" id="benna_main_head" name="benna_main_head" class="form-control" value="<?php echo $benna_main_head ?>">
                            </div>
                            <div class="form-group">
                                <label for="category_head"> عنوان القسم الاول </label>
                                <input required type="text" id="benna_head1" name="benna_head1" class="form-control" value="<?php echo $benna_head1 ?>">
                            </div>
                            <div class="form-group">
                                <label for="category_head"> وصف القسم الاول </label>
                                <textarea required type="text" id="benna_desc1" name="benna_desc1" class="form-control"><?php echo $benna_desc1 ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="category_head"> عنوان القسم الثاني </label>
                                <input required type="text" id="benna_head2" name="benna_head2" class="form-control" value="<?php echo $benna_head2 ?>">
                            </div>
                            <div class="form-group">
                                <label for="category_head"> وصف القسم الثاني </label>
                                <textarea required type="text" id="benna_desc2" name="benna_desc2" class="form-control"><?php echo $benna_desc2 ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="description"> صورة القسم </label>
                                <input type="file" name='benna_main_image' class='form-control' accept='image/*'>
                            </div>
                            <div class='form-group'>
                                <img style='width:150px; height:150px' src="pages/about_images/<?php echo $benna_main_image ?>" alt="">
                            </div>
                            <span class='badge badge-info'> رؤيتنا </span>
                            <div class="form-group">
                                <label for="category_head"> العنوان </label>
                                <input required type="text" id="vision_head" name="vision_head" class="form-control" value="<?php echo $vision_head ?>">
                            </div>
                            <div class="form-group">
                                <label for="category_head"> الوصف </label>
                                <textarea required type="text" id="vision_desc" name="vision_desc" class="form-control"><?php echo $vision_desc ?></textarea>
                            </div>
                            <span class='badge badge-info'> رسالتنا </span>
                            <div class="form-group">
                                <label for="category_head"> العنوان </label>
                                <input required type="text" id="message_head" name="message_head" class="form-control" value="<?php echo $message_head ?>">
                            </div>
                            <div class="form-group">
                                <label for="category_head"> الوصف </label>
                                <textarea required type="text" id="message_desc" name="message_desc" class="form-control"><?php echo $message_desc ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="description"> صورة القسم </label>
                                <input type="file" name='vision_image' class='form-control' accept='image/*'>
                            </div>
                            <div class='form-group'>
                                <img style='width:150px; height:150px' src="pages/about_images/<?php echo $vision_image ?>" alt="">
                            </div>
                            <span class='badge badge-info'> القسم الاخير ( الاعتمادات ) </span>
                            <div class="form-group">
                                <label for="description"> صور الاعتمادات </label>
                                <input type="file" name='more_images[]' class='form-control' accept='image/*' multiple>
                            </div>
                            <div class="row">
                                <?php
                                $product_images = $page_data['more_images'];
                                $images = explode(",", $product_images);
                                $countfile = count($images) - 1;
                                for ($i = 0; $i < $countfile; ++$i) { ?>

                                    <div class="col-3">
                                        <div class="">
                                            <a target='_blank' href="pages/about_images/<?= $images[$i] ?>" data-toggle="lightbox" data-title="sample 2 - black">
                                                <img style="max-width: 100%;" src="pages/home_images/<?= $images[$i] ?>" class="img-fluid mb-2" alt="المعرض" />
                                            </a>
                                        </div>
                                    </div>

                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row" style="display: flex;justify-content: space-between;">
                <button type="submit" class="btn btn-primary" name="add_pro"> <i class="fa fa-save"></i> حفظ </button>
            </div>
        </form>
        <br>
        <br>
    </div>
    <!-- /.container-fluid -->
</section>