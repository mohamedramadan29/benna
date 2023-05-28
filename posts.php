<?php
$page_title = ' مجموعة  بناء -  اخر التدوينات  ';
session_start();
include 'init.php';
if (isset($_GET['cat_id']) && is_numeric($_GET['cat_id'])) {
    $cat_id = $_GET['cat_id'];
    $stmt = $connect->prepare("SELECT * FROM category_posts WHERE id= ? LIMIT 1");
    $stmt->execute(array($cat_id));
    $cat = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) {
        ?>
        <div class="category"
            style="background-image: url(admin/post_categories/images/<?php echo $cat['main_image']; ?>); background-size: cover; background-position: center; ">
            <div class="overlay">
                <div class="container">
                    <div class="data">
                        <div class="row">
                            <div class="col-12">
                                <div class="info">
                                    <h2>
                                        <?php echo $cat['name']; ?>
                                    </h2>
                                    <p> <a href="index"> الرئيسية </a> / <a href='blog'>مدونة بناء </a> /
                                        <?php echo $cat['name']; ?>
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
                    <h2> اخر التدوينات </h2>
                    <div class="row">
                        <?php
                        $stmt = $connect->prepare("SELECT * FROM posts WHERE cat_id = ? ORDER BY id DESC");
                        $stmt->execute(array($cat_id));
                        $allposts = $stmt->fetchAll();
                        $post_count = $stmt->rowCount();
                        if ($post_count > 0) {
                            foreach ($allposts as $post) {
                                ?>
                                <div class="col-lg-4">
                                    <a href='post?post_id=<?php echo $post['id']; ?>'>
                                        <div class="info">
                                            <img src="admin/posts/images/<?php echo $post['main_image']; ?>" alt="">
                                            <div class="info_data">
                                                <span class="badge badge-danger">
                                                    <?php echo $post['name']; ?>
                                                </span>
                                                <p>
                                                    <?php echo $post['short_desc']; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php
                            }
                        }else{
                            ?>
                            <p class='alert alert-info text-center' role='alert'>  لا يوجد تدونيات </p> 
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
    <?php
    } else {
        header('Location:blog');
        exit();
    }
} else {
    header('Location:blog');
    exit();
}
?>