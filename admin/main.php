<?php
ob_start();
$pagetitle = 'Home';
session_start();
include 'init.php';
if(isset($_SESSION['admin_username'])){

if (isset($_SESSION['admin_username'])) {
    include 'include/navbar.php';
}
if (isset($_SESSION['username'])) {
    include 'include/emp_navbar.php';
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php
    $page = '';
    if (isset($_GET['page']) && isset($_GET['dir'])) {
        $page = $_GET['page'];
        $dir = $_GET['dir'];
    } else {
        $page = 'manage';
    }
    // start Website Routes 
    // STRAT DASHBAORD
    if ($dir == 'dashboard' && $page == 'dashboard') {
        include 'dashboard.php';
    } elseif ($dir == 'dashboard' && $page == 'emp_dashboard') {
        include 'emp_dashboard.php';
    }
    // END DASHBAORD


    // START main BEANNA CATEGORIES 
    if ($dir == 'benna_categories' && $page == 'add') {
        include "benna_categories/add.php";
    } elseif ($dir == 'benna_categories' && $page == 'edit') {
        include "benna_categories/edit.php";
    } elseif ($dir == 'benna_categories' && $page == 'delete') {
        include 'benna_categories/delete.php';
    } elseif ($dir == 'benna_categories' && $page == 'report') {
        include "benna_categories/report.php";
    }
    // START main BEANNA Projects
    if ($dir == 'projects' && $page == 'add') {
        include "projects/add.php";
    } elseif ($dir == 'projects' && $page == 'edit') {
        include "projects/edit.php";
    } elseif ($dir == 'projects' && $page == 'delete') {
        include 'projects/delete.php';
    } elseif ($dir == 'projects' && $page == 'report') {
        include "projects/report.php";
    }
    // START main BEANNA Advisors  
    if ($dir == 'advisors' && $page == 'add') {
        include "advisors/add.php";
    } elseif ($dir == 'advisors' && $page == 'edit') {
        include "advisors/edit.php";
    } elseif ($dir == 'advisors' && $page == 'delete') {
        include 'advisors/delete.php';
    } elseif ($dir == 'advisors' && $page == 'report') {
        include "advisors/report.php";
    }
    // START PAGES 
    if ($dir == 'pages' && $page == 'home') {
        include "pages/home.php";
    } elseif ($dir == 'pages' && $page == 'edit_home') {
        include "pages/edit_home.php";
    } elseif ($dir == 'pages' && $page == 'about') {
        include 'pages/about.php';
    } elseif ($dir == 'pages' && $page == 'edit_about') {
        include "pages/edit_about.php";
    }
    // END PAGES 
    // START POST CATEGORY 

    if ($dir == 'post_categories' && $page == 'add') {
        include "post_categories/add.php";
    } elseif ($dir == 'post_categories' && $page == 'edit') {
        include "post_categories/edit.php";
    } elseif ($dir == 'post_categories' && $page == 'delete') {
        include 'post_categories/delete.php';
    } elseif ($dir == 'post_categories' && $page == 'report') {
        include "post_categories/report.php";
    }

    // START POSTS 

    if ($dir == 'posts' && $page == 'add') {
        include "posts/add.php";
    } elseif ($dir == 'posts' && $page == 'edit') {
        include "posts/edit.php";
    } elseif ($dir == 'posts' && $page == 'delete') {
        include 'posts/delete.php';
    } elseif ($dir == 'posts' && $page == 'report') {
        include "posts/report.php";
    }
    // START shop  Category
    if ($dir == 'shop_categories' && $page == 'add') {
        include "shop_categories/add.php";
    } elseif ($dir == 'shop_categories' && $page == 'edit') {
        include "shop_categories/edit.php";
    } elseif ($dir == 'shop_categories' && $page == 'delete') {
        include 'shop_categories/delete.php';
    } elseif ($dir == 'shop_categories' && $page == 'report') {
        include "shop_categories/report.php";
    }
 // START products
    if ($dir == 'products' && $page == 'add') {
        include "products/add.php";
    } elseif ($dir == 'products' && $page == 'edit') {
        include "products/edit.php";
    } elseif ($dir == 'products' && $page == 'delete') {
        include 'products/delete.php';
    } elseif ($dir == 'products' && $page == 'report') {
        include "products/report.php";
    } elseif ($dir == 'products' && $page == 'get_variation') {
        include "products/get_variation.php";
    }
    // END BENNA CATEGROIES 

    // START orders
    if ($dir == 'orders' && $page == 'add') {
        include "orders/add.php";
    } elseif ($dir == 'orders' && $page == 'add_order') {
        include "orders/add_order.php";
    } elseif ($dir == 'orders' && $page == 'edit') {
        include "orders/edit.php";
    } elseif ($dir == 'orders' && $page == 'delete') {
        include 'orders/delete.php';
    } elseif ($dir == 'orders' && $page == 'report') {
        include "orders/report.php";
    } elseif ($dir == 'orders' && $page == 'order_details') {
        include "orders/order_details.php";
    } elseif ($dir == 'orders' && $page == 'add_step') {
        include "orders/add_step.php";
    } elseif ($dir == 'orders' && $page == 'edit_step') {
        include "orders/edit_step.php";
    } elseif ($dir == 'orders' && $page == 'edit_step') {
        include "orders/edit_step.php";
    } elseif ($dir == 'orders' && $page == 'prepare_order') {
        include "orders/prepare_order.php";
    } elseif ($dir == 'orders' && $page == 'quality_order') {
        include "orders/quality_order.php";
    } elseif ($dir == 'orders' && $page == 'order_delivery') {
        include "orders/order_delivery.php";
    } elseif ($dir == 'orders' && $page == 'accounting') {
        include "orders/accounting.php";
    } elseif ($dir == 'orders' && $page == 'order_products_rev') {
        include "orders/order_products_rev.php";
    } elseif ($dir == 'orders' && $page == 'order_invoice') {
        include "orders/order_invoice.php";
    } elseif ($dir == 'orders' && $page == 'order_done') {
        include "orders/order_done.php";
    } elseif ($dir == 'orders' && $page == 'archieve') {
        include "orders/archieve.php";
    }
    // START employee
    if ($dir == 'employee' && $page == 'add') {
        include "employee/add.php";
    } elseif ($dir == 'employee' && $page == 'edit') {
        include "employee/edit.php";
    } elseif ($dir == 'employee' && $page == 'delete') {
        include 'employee/delete.php';
    } elseif ($dir == 'employee' && $page == 'report') {
        include "employee/report.php";
    } elseif ($dir == 'employee' && $page == 'edit_profile') {
        include "employee/edit_profile.php";
    }
    // START Woocommerce
    if ($dir == 'woocommerce' && $page == 'add') {
        include "woocommerce/add.php";
    } elseif ($dir == 'woocommerce' && $page == 'product') {
        include "woocommerce/product.php";
    } elseif ($dir == 'woocommerce' && $page == 'report') {
        include "woocommerce/report.php";
    }

    // START USER PROFILE
    if ($dir == 'profile' && $page == 'report') {
        include "profile/report.php";
    } elseif ($dir == 'profile' && $page == 'edit') {
        include "profile/edit.php";
    }
    ?>

</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>



<?php
include $tem . "footer.php";

}else{
    header("Location:index");
    exit();
}