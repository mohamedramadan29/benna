<?php
$page_title = ' مجموعة  بناء  ';
session_start();
include 'init.php';
$stmt = $connect->prepare("SELECT * FROM home_page ORDER BY id LIMIT 1");
$stmt->execute();
$page_data = $stmt->fetch();
$banner_head = $page_data['banner_head'];
$banner_desc = $page_data['banner_desc'];
$banner_image = $page_data['banner_image'];
$about_head = $page_data['about_head'];
$about_description = $page_data['about_description'];
$about_image = $page_data['about_image'];
$category_head = $page_data['category_head']; 
$credits = $page_data['page_credites'];
$images = explode(",", $credits);
$countfile = count($images) - 1;
$parteners = $page_data['parteners'];
$parteners_images = explode(",", $parteners);
$countfile_partener = count($parteners_images) - 1;

?>
<!-- START HERO SECTION  -->
<div class="hero" style="background-image:url(admin/pages/home_images/<?php echo $banner_image ?>);">
    <div class="overlay" style="background-color: rgba(0, 0, 0, 0.4);">
        <div class="container">
            <div class="data">
                <div class="row">
                    <div class="col-12">
                        <div class="info">
                            <h2>
                                <?php echo $banner_head ?>
                            </h2>
                            <p class="animate__animated animate__fadeInUp animate__delay-0.6s">
                                <?php echo $banner_desc ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END HERO SECTION  -->
<!-- START SUB INFO 
<div class="how_work">
    <div class="container">
        <div class="data">
            <div class="row">
                <div class="col-lg-3">
                    <div class="info">
                        <span> <i class="fa fa-lightbulb"></i> </span>
                        <h4> افكار مبدعة </h4>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="info">
                        <span> <i class="fa fa-arrow-circle-up"></i> </span>
                        <h4>جودة عالية</h4>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="info">
                        <span> <i class="fa fa-fire"></i> </span>
                        <h4> التحدي القيادى </h4>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="info">
                        <span> <i class="fab fa-angellist"></i> </span>
                        <h4> دعم متواصل </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
-->
<!-- END SUB INFO  -->
<!-- START ABOUT US  -->
<div class="about_us">
    <div class="container">
        <div class="data">
            <div class="row">
                <div class="col-lg-6">
                    <div class="info">
                        <h2>
                            <?php echo $about_head ?>
                        </h2>
                        <p>
                            <?php echo $about_description ?>
                        </p>
                        <a href="about_us" class="btn button"> قراءة المزيد </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info">
                        <img src="admin/pages/home_images/<?php echo $about_image ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END ABOUT US -->
<!-- START CATEGORIES  -->
<div class="categories" style='padding-bottom:20px'>
    <div class="container-fluid">
        <div class="data">
            <h2>
                <?php echo $category_head ?>
            </h2>
            <div class="row">
                <?php
                $stmt = $connect->prepare("SELECT * FROM categories ORDER BY id LIMIT 3");
                $stmt->execute();
                $allcat = $stmt->fetchAll();
                foreach ($allcat as $cat) {
                    ?>
                    <div class="col-lg-4">
                        <a href="category?id=<?php echo $cat['id']; ?>">
                            <div class="info">
                                <div class="image">
                                    <img src="admin/benna_categories/images/<?php echo $cat['main_image']; ?>" alt="">
                                </div>
                                <a class="link_text" href="category?id=<?php echo $cat['id']; ?>"> <?php echo $cat['name']; ?> </a>
                            </div>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- END CATEGORIES  -->
<!-- START Main Category   -->
      <div class="about_us" style="padding-top:20px">
            <div class="container">
                <div class="data">
                    <?php
                    $stmt = $connect->prepare("SELECT * FROM categories ORDER BY id DESC LIMIT 1");
                    $stmt->execute();
                    $cat_data = $stmt->fetch();
                    $cat_name = $cat_data['name'];
                    $cat_image = $cat_data['main_image'];
                    $cat_desc = $cat_data['description'];
                    $cat_short_desc = $cat_data['short_description'];
                    $count = $stmt->rowCount();
                    
                    ?>
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="info">
                            <img src="admin/benna_categories/images/<?php echo $cat_image; ?>" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="info">
                                <h2> <?php echo $cat_name; ?> :
                            </h2>
                            <p>
                                <?php echo $cat_short_desc; ?>
                            </p>
                        <a href="category?id=<?php echo $cat_data['id'] ?>" class="btn button"> تفاصيل القسم  </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- END Main Category -->
<!-- START parteners   -->
<div class="brands">
    <div class="container">
        <div class="data">
            <h2 style="margin-bottom: 50px;color: var(--main-color);font-size: 35px;"> شركاءنا </h2>
            <div class="row" style="display: flex; align-items:center">
                <div class="col-lg-1"></div>
                <?php
                for ($i = 0; $i < $countfile_partener; ++$i) { ?>
                    <div class="col-lg-2">
                        <div class="">
                            <img style="max-width: 100%;" src="admin/pages/home_images/parteners/<?= $parteners_images[$i] ?>"
                                class="img-fluid mb-2" alt="المعرض" />
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- END parteners -->
<!-- START BRANDS  -->
<div class="brands">
    <div class="container">
        <div class="data">
            <h2 style="margin-bottom: 50px;color: var(--main-color);font-size: 35px;"> الاعتمادات </h2>
            <div class="row" style="display: flex; align-items:center">
                <div class="col-lg-1"></div>
                <?php 
                for ($i = 0; $i < $countfile; ++$i) { ?>
                <div class="col-lg-2">
                    <div class=""> 
                        <img style="max-width: 100%;" src="admin/pages/home_images/<?= $images[$i] ?>" class="img-fluid mb-2"alt="المعرض" />
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- END BRANDS -->

<?php

include $tem . 'footer.php';