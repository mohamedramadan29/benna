<?php
$page_title = ' مجموعة  بناء  ';
session_start();
include 'init.php';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $project_id = $_GET['id'];
 
    $stmt = $connect->prepare("SELECT * FROM projects WHERE id = ?");
    $stmt->execute(array($project_id));
    $project_data = $stmt->fetch();
    $cat_id = $project_data['cat_id'];
    $name = $project_data['name'];
    $short_desc = $project_data['short_desc'];
    $description = $project_data['description'];
    $advisors = $project_data['advisors'];
    $project_advatage = $project_data['project_adv'];
    $image = $project_data['image'];
    $header_image = $project_data['header_image'];
    $adv_image = $project_data['advan_image'];
    $contact_number = $project_data['contact_number'];
    $image_credit = $project_data['image_credits'];
    if(!empty($image_credit) && $image_credit != ','){
        $images = explode(",", $image_credit);
        $countfile = count($images) - 1;
    }else{
        $countfile = '';
    }
    $count = $stmt->rowCount();
    // get category data 

    $stmt = $connect->prepare("SELECT * FROM categories WHERE id = ?");
    $stmt->execute(array($cat_id));
    $category_data = $stmt->fetch();
    $cat_name = $category_data['name'];
    if ($count > 0) {
?>
        <!-- START HERO SECTION  -->
        <div class="category" style="background-image: url(admin/projects/images/<?php echo $header_image ?>); background-size: cover; background-position: center; min-height:80vh">
            <div class="overlay" style="background-color:transparent">
                <div class="container">
                    <div class="data">
                        <div class="row">
                            <div class="col-12">
                                <div class="info">
                                    <h2>
                                        <?php echo $name; ?> </h2>
                                    <p> <a href="index"> الرئيسية </a> / <a href="category?id=<?php echo $cat_id ?>"> <?php echo $cat_name ?> </a>/ <?php echo $name; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END HERO SECTION  -->
        <!-- START ABOUT US  -->
        <div class="about_us">
            <div class="container">
                <div class="data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="info">
                                <h2> عن البرنامج : </h2>
                                <p> <?php echo $description; ?> </p>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="info">
                                <img src="admin/projects/images/<?php echo $image ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END ABOUT US -->
        <!-- start project Adv  -->
        <div class="project_adv">
            <div class="container">
                <div class="data">
                    <h3> مميزات البرنامج : </h3>
                    <div class="row">
                        <?php
                        $project_advatage = explode(',', $project_advatage);
                        foreach ($project_advatage as $adv) {
                        ?>
                            <div class="col-lg-4">
                                <div class="info">
                                    <img src="admin/projects/images/<?php echo $adv_image ?>" alt="">
                                    <p> <?php echo $adv; ?> </p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- end project adv  -->
        <!-- start project Adv  
        <div class="project_advisors">
            <div class="container">
                <div class="data">
                    <h3> المستشارين : </h3>
                    <div class="row">
                        <?php
                        $advisors = explode(',', $advisors);
                        foreach ($advisors as $advisor) {
                            $stmt = $connect->prepare("SELECT * FROM project_advisor WHERE id = ?");
                            $stmt->execute(array($advisor));
                            $advisor_data = $stmt->fetch();
                        ?>
                            <div class="col-lg-4">
                                <div class="info">
                                    <img src="admin/advisors/images/<?php echo $advisor_data['image']; ?>" alt="">
                                    <h4> <?php echo $advisor_data['name']; ?> </h4>
                                    <p> <?php echo $advisor_data['speical_name']; ?> </p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
     end project adv  -->
        <!-- START BRANDS  -->
<div class="brands">
    <div class="container">
        <div class="data">
            <div class="row" style="display: flex; align-items:center">
                <div class="col-lg-1"></div>
                <?php 
                                for ($i = 0; $i < $countfile; ++$i) { ?>
                                    <div class="col-lg-2">
                                        <div class="">
                                            <img style="max-width: 100%;" src="admin/pages/home_images/<?= $images[$i] ?>"
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
                <!-- END BRANDS -->
<?php

        include $tem . 'footer.php';
    }
}
?>