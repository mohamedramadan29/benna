<?php
$page_title = ' مجموعة  بناء  ';
session_start();
include 'init.php';
?>
<!-- START HERO SECTION  -->
<div class="category" style="background-image: url(uploads/background.jpg); background-size: cover; background-position: center; ">
    <div class="overlay">
        <div class="container">
            <div class="data">
                <div class="row">
                    <div class="col-12">
                        <div class="info">
                            <h2>
                                بناء الجهات</h2>
                            <p> <a href="index"> الرئيسية </a> / بناء الجهات </p>
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
                        <h2>مجموعة بناء للخدمات والمنتجات التربوية والتعليمية:</h2>
                        <p> بلور فكرتها وأسسها الدكتور غسان بن محمد الصديقي أوائل عام 1424هـ
                            لغرض تقديم برامج واستشارات تربوية وخدمات علمية ودورات تدريبية ومقاييس شخصية وفق أسس علمية حديثة في التربية وبناء الإنسان للمساهمة في تحقيق المجتمع الرائد. ومجموعة بناء عبارة عن نطاق واسع من المنتجات التربوية التي تُعنى ببناء الإنسان في جميع أبعاده الشخصية وصولاً به إلى الشخصية السويَّة الفاعلة المؤثِّرة في تنمية مجتمعها وريادته . </p>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info">
                        <img src="uploads/about.jpg" alt="">
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
                <div class="col-lg-4">
                    <div class="info">
                        <img src="uploads/cat1.webp" alt="">
                        <a href="project"> بناء القيادات </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info">
                        <img src="uploads/cat1.webp" alt="">
                        <a href="#"> بناء الشباب الطفل</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info">
                        <img src="uploads/cat1.webp" alt="">
                        <a href="#">بناء الجهات</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CATEGORIES  -->
<?php

include $tem . 'footer.php';
