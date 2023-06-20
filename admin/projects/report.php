<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"> المشاريع </h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="main.php?dir=dashboard&page=dashboard">الرئيسية</a></li>
                    <li class="breadcrumb-item active"> المشاريع </li>
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
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <button type="button" class="btn btn-primary waves-effect btn-sm" data-toggle="modal"
                            data-target="#add-Modal"> أضافة مشروع جديد <i class="fa fa-plus"></i> </button>
                    </div>
                    <?php
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
                    } elseif (isset($_SESSION['error_messages'])) {
                        $formerror = $_SESSION['error_messages'];
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
                    ?>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="my_table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th>الأسم </th>
                                        <th> الوصف المختصر </th>
                                        <!-- <th> المستشارين </th> -->
                                        <th> الصورة </th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $stmt = $connect->prepare("SELECT * FROM projects ORDER BY id DESC");
                                    $stmt->execute();
                                    $allpro = $stmt->fetchAll();
                                    $i = 0;
                                    foreach ($allpro as $pro) {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $i; ?>
                                            </td>
                                            <td>
                                                <?php echo $pro['name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $pro['short_desc']; ?>
                                            </td>
                                            <!--
                                            <td>
                                                <?php
                                                $advisor = $pro['advisors'];
                                                $advisor = explode(',', $advisor);
                                                foreach ($advisor as $adv) {

                                                    $stmt = $connect->prepare("SELECT * FROM project_advisor WHERE id = ?");
                                                    $stmt->execute(array($adv));
                                                    $advisor_data = $stmt->fetch();
                                                    $adv_name = $advisor_data['name'];
                                                    echo $adv_name . "</br>";
                                                } ?>
                                            </td>
                                            -->
                                            <td> <img style="width: 60px; height:60px"
                                                    src="projects/images/<?php echo $pro['image']; ?> " alt=""></td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm waves-effect"
                                                    data-toggle="modal" data-target="#edit-Modal_<?php echo $pro['id']; ?>">
                                                    تعديل <i class='fa fa-pen'></i> </button>
                                                <a href="main.php?dir=projects&page=delete&pro_id=<?php echo $pro['id']; ?>"
                                                    class="confirm btn btn-danger btn-sm"> حذف <i class='fa fa-trash'></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <!-- EDIT NEW CATEGORY MODAL   -->
                                        <div class="modal fade" id="edit-Modal_<?php echo $pro['id']; ?>" tabindex="-1"
                                            role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"> تعديل المشروع </h4>
                                                    </div>
                                                    <form method="post" action="main.php?dir=projects&page=edit"
                                                        enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <input type='hidden' name="pro_id"
                                                                    value="<?php echo $pro['id']; ?>">
                                                                <label for="Company-2" class="block">الأسم </label>
                                                                <input id="Company-2" required name="name" type="text"
                                                                    class="form-control required"
                                                                    value="<?php echo $pro['name'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Company-2" class="block"> القسم </label>
                                                                <select name="cat_id" id="" class="form-control select2">
                                                                    <option value="" class=""> -- اختر القسم -- </option>
                                                                    <?php
                                                                    $stmt = $connect->prepare("SELECT * FROM categories");
                                                                    $stmt->execute();
                                                                    $allcat = $stmt->fetchAll();
                                                                    foreach ($allcat as $cat) {
                                                                        ?>
                                                                        <option <?php if ($pro['cat_id'] == $cat['id'])
                                                                            echo 'selected'; ?> value="<?php echo $cat['id']; ?>">
                                                                            <?php echo $cat['name']; ?> </option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Company-2" class="block"> الوصف </label>
                                                                <textarea style="height: 120px;" id="Company-2"
                                                                    name="description"
                                                                    class="form-control"><?php echo $pro['description'] ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Company-2" class="block"> وصف مختصر </label>
                                                                <textarea style="height: 120px;" id="Company-2"
                                                                    name="short_desc"
                                                                    class="form-control"><?php echo $pro['short_desc'] ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Company-2" class="block"> مميزات المشروع <span
                                                                        class="badge badge-info"> افصل بين كل ميزة ب ","
                                                                    </span> </label>
                                                                    <input type="text" name="project_adv_head" class="form-control" value="<?php echo $pro['project_adv_head'] ?>">
                                                                <textarea style="height: 120px;" id="Company-2"
                                                                    name="project_adv"
                                                                    class="form-control"><?php echo $pro['project_adv'] ?></textarea>
                                                            </div>
                                                            <!--
                                                            <div class="form-group">
                                                                <label for="Company-2" class="block"> المستشارين </label>
                                                                <select name="advisors[]" id="" class="form-control select2"
                                                                    multiple>
                                                                    <option value="" class=""> -- اختر المستشارين --
                                                                    </option>
                                                                    <?php
                                                                    $stmt = $connect->prepare("SELECT * FROM project_advisor");
                                                                    $stmt->execute();
                                                                    $alladvisor = $stmt->fetchAll();
                                                                    $pro_advisors = explode(',', $pro['advisors']);
                                                                    foreach ($alladvisor as $advisor) {
                                                                        foreach ($pro_advisors as $adv) {
                                                                            ?>
                                                                            <option <?php if ($adv == $advisor['id'])
                                                                                echo 'selected'; ?> value="<?php echo $advisor['id']; ?>"> <?php echo $advisor['name']; ?> </option>

                                                                            <?php
                                                                        }
                                                                        ?>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                                -->
                                                            <div class="form-group">
                                                                <label for="customFile">تعديل الصورة الرئيسية <span
                                                                        class='badge badge-info'> مقاس
                                                                        تقريبا (300px * 230px) </span></label>
                                                                <div class="custom-file">
                                                                    <input  type="file" class="custom-file-input"
                                                                        id="customFile" accept='image/*' name="main_image">
                                                                    <label class="custom-file-label" for="customFile">اختر
                                                                        الصورة</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="customFile">تعديل صورة الهيدر (1200px * 550px)
                                                                </label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input"
                                                                        id="customFile" accept='image/*'
                                                                        name="header_image">
                                                                    <label class="custom-file-label" for="customFile">اختر
                                                                        الصورة</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="customFile">تعديل صورة المميزات (80px * 80px)
                                                                </label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input"
                                                                        id="customFile" accept='image/*' name="adv_image">
                                                                    <label class="custom-file-label" for="customFile">اختر
                                                                        الصورة</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="description"> صور الاعتمادات </label>
                                                                <input type="file" name='more_images[]' class='form-control'
                                                                    accept='image/*' multiple>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Company-2" class="block"> رقم التواصل </label>
                                                                <input type="text" name="contact_number"
                                                                    class="form-control"
                                                                    value="<?php echo $pro['contact_number']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="edit_cat"
                                                                class="btn btn-primary waves-effect waves-light "> تعديل
                                                            </button>
                                                            <button type="button" class="btn btn-default waves-effect "
                                                                data-dismiss="modal">رجوع</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- ADD NEW CATEGORY MODAL   -->
                <div class="modal fade" id="add-Modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">أضافة مشروع </h4>
                            </div>
                            <form action="main.php?dir=projects&page=add" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="Company-2" class="block"> اسم المشروع </label>
                                        <input required id="Company-2" name="name" type="text"
                                            class="form-control required">
                                    </div>
                                    <div class="form-group">
                                        <label for="Company-2" class="block"> القسم </label>
                                        <select name="cat_id" id="" class="form-control select2">
                                            <option value="" class=""> -- اختر القسم -- </option>
                                            <?php
                                            $stmt = $connect->prepare("SELECT * FROM categories");
                                            $stmt->execute();
                                            $allcat = $stmt->fetchAll();
                                            foreach ($allcat as $cat) {
                                                ?>
                                                <option value="<?php echo $cat['id']; ?>"> <?php echo $cat['name']; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Company-2" class="block"> الوصف </label>
                                        <textarea style="height: 120px;" id="Company-2" name="description"
                                            class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="Company-2" class="block"> وصف مختصر </label>
                                        <textarea style="height: 120px;" id="Company-2" name="short_desc"
                                            class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="Company-2" class="block"> مميزات المشروع <span
                                                class="badge badge-info"> افصل بين كل ميزة ب "," </span> </label>
                                                <input type="text" name="project_adv_head" class="form-control">
                                        <textarea style="height: 120px;" id="Company-2" name="project_adv"
                                            class="form-control"></textarea>
                                    </div>
                                    <!--
                                    <div class="form-group">
                                        <label for="Company-2" class="block"> المستشارين </label>
                                        <select name="advisors[]" id="" class="form-control select2" multiple>
                                            <option value="" class=""> -- اختر المستشارين -- </option>
                                            <?php
                                            $stmt = $connect->prepare("SELECT * FROM project_advisor");
                                            $stmt->execute();
                                            $alladvisor = $stmt->fetchAll();
                                            foreach ($alladvisor as $advisor) {
                                                ?>
                                                <option value="<?php echo $advisor['id']; ?>"> <?php echo $advisor['name']; ?> </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                        -->
                                    <div class="form-group">
                                        <label for="customFile"> الصورة الرئيسية <span class='badge badge-info'> مقاس
                                                تقريبا (300px * 230px) </span></label>
                                        <div class="custom-file">
                                            <input required type="file" class="custom-file-input" id="customFile"
                                                accept='image/*' name="main_image">
                                            <label class="custom-file-label" for="customFile">اختر الصورة</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="customFile"> صورة الهيدر (1200px * 550px) </label>
                                        <div class="custom-file">
                                            <input required type="file" class="custom-file-input" id="customFile"
                                                accept='image/*' name="header_image">
                                            <label class="custom-file-label" for="customFile">اختر الصورة</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="customFile"> صورة المميزات (80px * 80px) </label>
                                        <div class="custom-file">
                                            <input required type="file" class="custom-file-input" id="customFile"
                                                accept='image/*' name="adv_image">
                                            <label class="custom-file-label" for="customFile">اختر الصورة</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description"> صور الاعتمادات <span class='badge badge-danger'>
                                                اختياري </span> </label>
                                        <input type="file" name='more_images[]' class='form-control' accept='image/*'
                                            multiple>
                                    </div>
                                    <div class="form-group">
                                        <label for="Company-2" class="block"> رقم التواصل </label>
                                        <input type="text" name="contact_number" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="add_cat"
                                        class="btn btn-primary waves-effect waves-light "> حفظ </button>
                                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">
                                        رجوع </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>