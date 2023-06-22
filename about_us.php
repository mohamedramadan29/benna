<?php
$page_title = ' عن بناء   ';
session_start();
include 'init.php';
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
$images = explode(",", $more_images);
$countfile = count($images) - 1;
?>
<!-- START HERO SECTION  -->
<div class="category" style="background-image: url(admin/pages/about_images/<?php echo $banner_image ?>); background-size: cover; background-position: center; ">
    <div class="overlay" style="background-color: transparent;">
        <div class="container">
            <div class="data">
                <div class="row">
                    <div class="col-12">
                        <div class="info">
                            <h2>
                                <?php echo $banner_head; ?>
                            </h2>
                            <p> <a href="index"> الرئيسية </a> /
                                <?php echo $banner_head; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END HERO SECTION  -->
<!-- START MAIN BACKGROUND -->
<div class="main_about">
    <div class="container">
        <div class="data">
            <div class="main_info">
                <h2>
                    <?php echo $about_head; ?>
                </h2>
                <h6>
                    <?php echo $about_short_head; ?>
                </h6>
                <p>
                    <?php echo $about_description; ?>
                </p>
            </div>
            <!--
            <div class="row">
                <div class="col-lg-12">
                    <div class="info">
                        <h3>
                            <?php echo $about_head_short1; ?>
                        </h3>
                        <p>
                            <?php echo $about_desc_short1; ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="info">
                        <h3>
                            <?php echo $about_head_short2; ?>
                        </h3>
                        <p>
                            <?php echo $about_desc_short2; ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="info">
                        <h3>
                            <?php echo $about_head_short3; ?>
                        </h3>
                        <p>
                            <?php echo $about_desc_short3; ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="info">
                        <h3>
                            <?php echo $about_head_short4; ?>
                        </h3>
                        <p>
                            <?php echo $about_desc_short4; ?>
                        </p>
                    </div>
                </div>
            </div>
-->
        </div>
    </div>
</div>
<!-- END MAIN BACKGROUND -->
<!-- START BENNA CAT -->
<!-- START ABOUT US  -->
<div class="about_us">
    <div class="container">
        <div class="data">
            <div class="row">
                <div class="col-lg-6">
                    <div class="info">
                        <h2>
                            <?php echo $benna_main_head; ?>
                        </h2>
                        <strong style="color: var(--third-color);">
                            <?php echo $benna_head1; ?>
                        </strong>
                        <p>
                            <?php echo $benna_desc1; ?>
                        </p>
                    </div>
                    <div class="info">
                        <strong style="color: var(--third-color);">
                            <?php echo $benna_head2; ?>
                        </strong>
                        <p>
                            <?php echo $benna_desc2; ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info">
                        <img src="admin/pages/about_images/<?php echo $benna_main_image ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END ABOUT US -->
<!-- START ABOUT US  -->
<div class="about_us" style="padding-top: 50px;">
    <div class="container">
        <div class="data">
            <div class="row">
                <div class="col-lg-6">
                    <div class="info">
                        <strong style="color: var(--third-color);">
                            <?php echo $vision_head; ?>
                        </strong>
                        <p>
                            <?php echo $vision_desc; ?>
                        </p>
                    </div>
                    <div class="info">
                        <strong style="color: var(--third-color);">
                            <?php echo $message_head; ?>
                        </strong>
                        <p>
                            <?php echo $message_desc; ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info">
                        <img src="admin/pages/about_images/<?php echo $vision_image ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END ABOUT US --> 
<!-- START BRANDS  -->
<div class="brands">
    <div class="container">
        <div class="data">
            <h2 style="margin-bottom: 50px;color: var(--main-color);font-size: 35px;"> اعتماداتنا </h2>
            <div class="row" style="display: flex; align-items:center">
                <div class="col-lg-1"></div>
                <?php
                for ($i = 0; $i < $countfile; ++$i) { ?>
                    <div class="col-lg-2">
                        <div class="">
                            <img style="max-width: 100%;" src="admin/pages/about_images/<?= $images[$i] ?>" class="img-fluid mb-2" alt="المعرض" />
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- END BRANDS     -->

<?php

include $tem . 'footer.php';
