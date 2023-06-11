<?php
$page_title = ' مجموعة  بناء  ';
session_start();
include 'init.php';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $cat_id = $_GET['id'];
    $stmt = $connect->prepare("SELECT * FROM categories where id = ?");
    $stmt->execute(array($cat_id));
    $cat_data = $stmt->fetch();
    $cat_name = $cat_data['name'];
    $cat_image = $cat_data['main_image'];
    $cat_desc = $cat_data['description'];
    $count = $stmt->rowCount();
    if ($count > 0) {
?>

        <!-- START HERO SECTION  -->
        <div class="category" style="background-image: url(admin/benna_categories/images/<?php echo $cat_image; ?>); background-size: cover; background-position: center;min-height:80vh; ">
            <div class="overlay" style="background-color:transparent">
                <div class="container">
                    <div class="data">
                        <div class="row">
                            <div class="col-12">
                                <div class="info">
                                    <h2>
                                        <?php echo $cat_name ?> </h2>
                                    <p> <a href="index"> الرئيسية </a> / <?php echo $cat_name; ?> </p>
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
                                <h2> <?php echo $cat_name; ?> :</h2>
                                <p> <?php echo $cat_desc; ?> </p>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="info">
                                <img src="admin/benna_categories/images/<?php echo $cat_image; ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END ABOUT US -->
        <!-- START CATEGORIES  -->
        <div class="categories">
            <div class="container-fluid">
                <div class="data">
                    <h2> المشاريع </h2>
                    <div class="row">
                        <?php
                        $stmt = $connect->prepare("SELECT * FROM projects WHERE cat_id=?");
                        $stmt->execute(array($cat_id));
                        $projects = $stmt->fetchAll();
                        foreach ($projects as $project) {
                        ?>
                            <div class="col-lg-4">
                                <a href="project?id=<?php echo $project['id']; ?>">
                                    <div class="info">
                                        <div class="image">
                                            <img src="admin/projects/images/<?php echo $project['image']; ?>" alt="">
                                        </div>
                                        <div class="info_text">
                                        <a href="project?id=<?php echo $project['id']; ?>" class="link_text"> <?php echo $project['name']; ?> </a>
                                        <p style="padding: 0 15px;line-height: 2;color: #000;"> <?php echo $project['short_desc']; ?> </p>
                                   </div>
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
<?php

        include $tem . 'footer.php';
    } else {
        header("Location:index");
        exit();
    }
}

?>