    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav mr-auto">

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fa fa-envelope"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
            <span class="dropdown-item dropdown-header">15 اشعار</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              test
              <span class="float-left text-muted text-sm"> </span>
            </a>

            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">عرض جميع الإخطارات</a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="main.php?dir=dashboard&page=dashboard" class="brand-link">
        <span class="brand-text font-weight-light"> مجموعه بناء  </span>
        <img src="uploads/logo.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="box-shadow: none;">
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="uploads/logo.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"> <?php echo  $_SESSION['admin_username']; ?> </a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="main.php?dir=dashboard&page=dashboard" class="nav-link">
                <p>
                  الرئيسية
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <p>
                  الاقسام الرئيسية
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="main.php?dir=benna_categories&page=report" class="nav-link">
                    <p> جميع الأقسام </p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <p>
                  المستشارين 
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="main.php?dir=advisors&page=report" class="nav-link">
                    <p> جميع المستشارين </p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <p>
                  المشاريع
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="main.php?dir=projects&page=report" class="nav-link">
                    <p> جميع المشاريع </p>
                  </a>
                </li>
              </ul>
            </li>
            <span style='border:2px dotted  #fff; display:block;'></span>
              <li class="nav-item">
              <a href="#" class="nav-link">
                <p>
                  الصفحات الرئيسية 
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="main.php?dir=pages&page=home" class="nav-link">
                    <p> الرئيسية   </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="main.php?dir=pages&page=about" class="nav-link">
                    <p> من نحن    </p>
                  </a>
                </li>
              </ul>
            </li>
            <span style='border:2px dotted  #fff; display:block;'></span>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <p>
                  المدونة
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="main.php?dir=post_categories&page=report" class="nav-link">
                    <p> الاقسام  </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="main.php?dir=posts&page=report" class="nav-link">
                    <p> المقالات   </p>
                  </a>
                </li>
              </ul>
            </li>
            <span style='border:2px dotted  #fff; display:block;'></span>
                <li class="nav-item">
              <a href="#" class="nav-link">
                <p>
                  المتجر
                </p>
              </a>  
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                <p>
                  الأقسام
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="main.php?dir=shop_categories&page=report" class="nav-link">
                    <p> جميع الأقسام </p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <p>
                  المنتجات
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="main.php?dir=products&page=report" class="nav-link">
                    <p> جميع المنتجات </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="main.php?dir=products&page=add" class="nav-link">
                    <p> اضافة منتج </p>
                  </a>
                </li>
              </ul>
            </li>
            <!--
            <li class="nav-item">
              <a href="#" class="nav-link">
                <p>
                  الطلبات
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="main.php?dir=orders&page=report" class="nav-link">
                    <p> جميع الطلبات </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="main.php?dir=orders&page=add" class="nav-link">
                    <p> اضافة طلب </p>
                  </a>
                </li> 
                <li class="nav-item">
                  <a href="main.php?dir=orders&page=archieve" class="nav-link">
                    <p> ارشيف الطلبات   </p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <p>
                  الموظفين
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="main.php?dir=employee&page=report" class="nav-link">
                    <p> جميع الموظفين </p>
                  </a>
                </li>
              </ul>
            </li>
  -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <p>
                  المستخدمين
                </p>
              </a>
            </li> 
 
            <li class="nav-item">
              <a href="logout" class="nav-link" style="color: #e74c3c;">
                <p>
                  تسجيل خروج
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>