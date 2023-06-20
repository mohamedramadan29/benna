<?php
$page_title = ' مجموعة  بناء - المستشارين  ';
session_start();
include 'init.php';
?>
<div class="category"
    style="background-image: url(uploads/advisor.jpg); background-size: cover; background-position: center; ">
    <div class="overlay" style="background-color: transparent;">
        <div class="container">
            <div class="data">
                <div class="row">
                    <div class="col-12">
                        <div class="info">
                            <h2>
                                المستشارين
                            </h2>
                            <p> <a href="index"> الرئيسية </a> /
                                المستشارين
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- start project Adv  -->
<div class="project_advisors">
    <div class="container">
        <div class="data">
            <div class="row">
                <?php

                $stmt = $connect->prepare("SELECT * FROM project_advisor");
                $stmt->execute();
                $advisors_data = $stmt->fetchAll();
                foreach ($advisors_data as $advisor_data) {
                    ?>
                    <div class="col-lg-4">
                        <div class="info">
                            <img src="admin/advisors/images/<?php echo $advisor_data['image']; ?>" alt="">
                            <h4>
                                <?php echo $advisor_data['name']; ?>
                            </h4>
                            <p>
                                <?php echo $advisor_data['speical_name']; ?>
                            </p>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <?php

                ?>

            </div>
        </div>
    </div>
</div>
<!-- end project adv  -->

<?php
include $tem . 'footer.php';
?>