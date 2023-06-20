<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <a class="navbar-brand" href="index"> <img style="max-width: 120px;" src="uploads/logo.png" alt=""> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" id="index" aria-current="page" href="index">الرئيسية</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="about_us" href="about_us">عن بناء </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            الاقسام
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php
            $stmt = $connect->prepare("SELECT * FROM categories");
            $stmt->execute();
            $allcat = $stmt->fetchAll();
            foreach ($allcat as $cat) {
            ?>
              <li><a class="dropdown-item" href="category?id=<?php echo $cat['id']; ?>"> <?php echo $cat['name']; ?> </a>
              </li>
            <?php
            }
            ?>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="advisors" href="advisors"> المستشارين </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="blog" href="blog"> المدونة </a>
        </li>
        <!--
        <li class="nav-item">
          <a class="nav-link" id="blog" href="shop"> المتجر </a>
        </li>
          -->
      </ul>
    </div>
  </div>
</nav>