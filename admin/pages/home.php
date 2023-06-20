<?php
if (isset($_POST['add_pro'])) {
  $formerror = [];
  $banner_head = $_POST['banner_head'];
  $banner_desc = $_POST['banner_desc'];
  $about_head = $_POST['about_head'];
  $about_description = $_POST['about_description'];
  $category_head = $_POST['category_head'];

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
      'pages/home_images/' . $banner_image_uploaded
    );
  } else {
    $banner_image_uploaded = '';
  }
  // about image
  if (!empty($_FILES['about_image']['name'])) {
    $about_image_name = $_FILES['about_image']['name'];
    $about_image_name = str_replace(' ', '', $about_image_name);
    $about_image_temp = $_FILES['about_image']['tmp_name'];
    $about_image_type = $_FILES['about_image']['type'];
    $about_image_size = $_FILES['about_image']['size'];
    $about_image_uploaded = time() . '_' . $about_image_name;
    move_uploaded_file(
      $about_image_temp,
      'pages/home_images/' . $about_image_uploaded
    );
  } else {
    $about_image_uploaded = '';
  }

  // credit gallary 
  $file = '';
  $file_tmp = '';
  $location = "";
  $uploadplace = "pages/home_images/";
  if (isset($_FILES['more_images']['name'])) {
    foreach ($_FILES['more_images']['name'] as $key => $val) {
      $file = $_FILES['more_images']['name'][$key];
      $file = str_replace(' ', '', $file);
      $file_tmp = $_FILES['more_images']['tmp_name'][$key];
      move_uploaded_file($file_tmp, $uploadplace . $file);
      $location .= $file . ",";
    }
  }
  // parteners gallay 
  $file2 = '';
  $file_tmp2 = '';
  $location2 = "";
  $uploadplace2 = "pages/home_images/parteners/";
  if (isset($_FILES['parteners_images']['name'])) {
    foreach ($_FILES['parteners_images']['name'] as $key => $val) {
      $file2 = $_FILES['parteners_images']['name'][$key];
      $file2 = str_replace(' ', '', $file2);
      $file_tmp2 = $_FILES['parteners_images']['tmp_name'][$key];
      move_uploaded_file($file_tmp2, $uploadplace2 . $file2);
      $location2 .= $file2 . ",";
    }
  }

  if (empty($formerror)) {
    $stmt = $connect->prepare("UPDATE home_page SET banner_head=?,banner_desc=?,about_head=?,
    about_description=?,category_head=?");
    $stmt->execute(
      array(
        $banner_head,
        $banner_desc,
        $about_head,
        $about_description,
        $category_head
      )
    );
    if (!empty($_FILES['banner_image']['name']) && !empty($_FILES['about_image']['name']) && $file_tmp != '') {
      $stmt = $connect->prepare("UPDATE home_page SET banner_image=?, about_image=?,page_credites=?");
      $stmt->execute(
        array(
          $banner_image_uploaded,
          $about_image_uploaded,
          $location
        )
      );
    }
    if (!empty($_FILES['banner_image']['name'])) {
      $stmt = $connect->prepare("UPDATE home_page SET banner_image=?");
      $stmt->execute(
        array(
          $banner_image_uploaded
        )
      );
    }
    if (!empty($_FILES['about_image']['name'])) {
      $stmt = $connect->prepare("UPDATE home_page SET about_image=?");
      $stmt->execute(
        array(
          $about_image_uploaded
        )
      );
    }
    if ($file_tmp != '') {
      $stmt = $connect->prepare("UPDATE home_page SET page_credites=?");
      $stmt->execute(
        array(
          $location
        )
      );
    }
    if ($file_tmp2 != '') {
      $stmt = $connect->prepare("UPDATE home_page SET parteners=?");
      $stmt->execute(
        array(
          $location2
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
          $(function () {
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
      header('Location:main.php?dir=pages&page=home');
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
        <h1 class="m-0 text-dark"> اقسام الصفحة الرئيسية </h1>
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="main.php?dir=dashboard&page=dashboard">الرئيسية</a></li>
          <li class="breadcrumb-item active"> اقسام الصفحة الرئيسية </li>
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
$stmt = $connect->prepare("SELECT * FROM home_page ORDER BY id DESC LIMIT 1");
$stmt->execute();
$page_data = $stmt->fetch();

$banner_head = $page_data['banner_head'];
$banner_desc = $page_data['banner_desc'];
$banner_image = $page_data['banner_image'];
$about_head = $page_data['about_head'];
$about_description = $page_data['about_description'];
$about_image = $page_data['about_image'];
$category_head = $page_data['category_head'];

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
                <input required type="text" id="banner_head" name="banner_head" class="form-control"
                  value="<?php echo $banner_head ?>">
              </div>
              <div class="form-group">
                <label for="description"> الوصف المختصر </label>
                <textarea style='height:60px' id="description" name="banner_desc" class="form-control"
                  rows="4"><?php echo $banner_desc ?></textarea>
              </div>
              <div class="form-group">
                <label for="description"> صورة البانر </label>
                <input type="file" name='banner_image' class='form-control' accept='image/*'>
              </div>
              <div class='form-group'>
                <img style='width:150px; height:150px' src="pages/home_images/<?php echo $banner_image ?>" alt="">
              </div>
              <span class='badge badge-info'> القسم الثالث ( الاقسام ) </span>
              <div class="form-group">
                <label for="category_head"> عنوان القسم </label>
                <input required type="text" id="category_head" name="category_head" class="form-control"
                  value="<?php echo $category_head ?>">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-body">
              <span class='badge badge-info'> القسم الثاني ( من نحن ) </span>
              <div class="form-group">
                <label for="inputName"> العنوان </label>
                <input required type="text" id="about_head" name="about_head" class="form-control"
                  value="<?php echo $about_head ?>">
              </div>
              <div class="form-group">
                <label for="about_description"> الوصف المختصر </label>
                <textarea style='height:60px' id="about_description" name="about_description" class="form-control"
                  rows="4"><?php echo $about_description ?></textarea>
              </div>
              <div class="form-group">
                <label for="description"> صورة من نحن </label>
                <input type="file" name='about_image' class='form-control' accept='image/*'>
              </div>
              <!-- start parteners  -->
              <div class='form-group'>
                <img style='width:150px; height:150px' src="pages/home_images/<?php echo $about_image ?>" alt="">
              </div>
              <span class='badge badge-info'>شركاءنا </span>
              <div class="form-group">
                <label for="description"> صور شركاءنا </label>
                <input type="file" name='parteners_images[]' class='form-control' accept='image/*' multiple>
              </div>
              <div class="row">
                <?php
                $parteners_images = $page_data['parteners'];
                $partimages = explode(",", $parteners_images);
                $countfile_part = count($partimages) - 1;
                for ($i = 0; $i < $countfile_part; ++$i) { ?>

                  <div class="col-3">
                    <div class="">
                      <a target='_blank' href="pages/home_images/parteners<?= $partimages[$i] ?>" data-toggle="lightbox"
                        data-title="sample 2 - black">
                        <img style="max-width: 100%;" src="pages/home_images/parteners<?= $partimages[$i] ?>"
                          class="img-fluid mb-2" alt="المعرض" />
                      </a>
                    </div>
                  </div>

                  <?php
                }
                ?>
              </div>
              <!-- end parteners -->
              <span class='badge badge-info'> القسم الاخير ( الاعتمادات ) </span>
              <div class="form-group">
                <label for="description"> صور الاعتمادات </label>
                <input type="file" name='more_images[]' class='form-control' accept='image/*' multiple>
              </div>
              <div class="row">
                <?php
                $product_images = $page_data['page_credites'];
                $images = explode(",", $product_images);
                $countfile = count($images) - 1;
                for ($i = 0; $i < $countfile; ++$i) { ?>

                  <div class="col-3">
                    <div class="">
                      <a target='_blank' href="pages/home_images/<?= $images[$i] ?>" data-toggle="lightbox"
                        data-title="sample 2 - black">
                        <img style="max-width: 100%;" src="pages/home_images/<?= $images[$i] ?>" class="img-fluid mb-2"
                          alt="المعرض" />
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