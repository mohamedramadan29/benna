<?php
$page_title = ' مجموعة  بناء -  اخر التدوينات  ';
session_start();
include 'init.php';
if (isset($_GET['post_id']) && is_numeric($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
    $stmt = $connect->prepare("SELECT * FROM posts WHERE id= ? LIMIT 1");
    $stmt->execute(array($post_id));
    $post = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) {
        ?>
        <div class="category"
            style="background-image: url(admin/posts/images/<?php echo $post['main_image']; ?>); background-size: cover; background-position: center; ">
            <div class="overlay">
                <div class="container">
                    <div class="data">
                        <div class="row">
                            <div class="col-12">
                                <div class="info">
                                    <h2>
                                        <?php echo $post['name']; ?>
                                    </h2>
                                    <p> <a href="index"> الرئيسية </a> / <a href='blog'>مدونة بناء </a> /
                                        <?php echo $post['name']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- START POST CATEGORY  -->
        <?php
        $stmt = $connect->prepare("SELECT * FROM posts WHERE id = ? ORDER BY id DESC");
        $stmt->execute(array($post_id));
        $post_data = $stmt->fetch();
        ?>
        <div class="post_category">
            <div class="container-fluid">
                <div class="data">
                    <h2>
                        <?php echo $post_data['name']; ?>
                    </h2>
                    <div>
                        <?php echo $post_data['description']; ?>
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