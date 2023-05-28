<?php
$page_title = ' مجموعة  بناء - المدونة ';
session_start();
include 'init.php';
?>
<div class="category"
    style="background-image: url(uploads/blog.jpg); background-size: cover; background-position: center; ">
    <div class="overlay">
        <div class="container">
            <div class="data">
                <div class="row">
                    <div class="col-12">
                        <div class="info">
                            <h2>
                                مدونة بناء
                            </h2>
                            <p> <a href="index"> الرئيسية </a> /
                                مدونة بناء
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- START POST CATEGORY  -->
<div class="post_category">
    <div class="container-fluid">
        <div class="data">
            <h2> التصنيفات </h2>
            <div class="row">
                <?php
                $stmt = $connect->prepare("SELECT * FROM category_posts ORDER BY id DESC");
                $stmt->execute();
                $allcat = $stmt->fetchAll();
                foreach ($allcat as $cat) {
                    ?>
                    <div class="col-lg-4">
                        <div class="info">
                            <img src="admin/post_categories/images/<?php echo $cat['main_image']; ?>" alt="">
                            <div class="info_data">
                                <span class="badge badge-danger"> <?php echo $cat['name']; ?> </span>
                                <p> <?php echo $cat['description']; ?> </p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- END POST CATEGORY  -->

<?php
include $tem . 'footer.php';
?>