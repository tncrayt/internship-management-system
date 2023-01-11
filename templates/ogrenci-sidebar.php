<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../ogrenci/index.php" class="brand-link">
        <img src="../dist/img/comu_logo_4.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: 1">
        <span class="brand-text font-weight-light">Çömü Staj Takip</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional)
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <?php
                    $ad_soyad = $_SESSION["kullanici"]["ad"]." ".$_SESSION["kullanici"]["soyad"];
                ?>
                <a href="#" class="d-block"><?php echo $ad_soyad; ?></a>
            </div>
        </div>
 -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="../ogrenci/index.php" class="nav-link">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <p>
                            Staj Başvurusu
<!--                            <i class="right fas fa-angle-left"></i>-->
                        </p>
                    </a>
<!--                    <ul class="nav nav-treeview">-->
<!--                        <li class="nav-item">-->
<!--                            <a href="#" class="nav-link">-->
<!--                                <i class="far fa-circle nav-icon"></i>-->
<!--                                <p>Öğrenci Ekle/Düzenle</p>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="nav-item">-->
<!--                            <a href="#" class="nav-link">-->
<!--                                <i class="far fa-circle nav-icon"></i>-->
<!--                                <p>Öğrenci </p>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                    </ul>-->
                </li>

                <li class="nav-item">
                    <a href="../ogrenci/basvuru-durum.php" class="nav-link">
                        <i class="fa-solid fa-building-columns"></i>
                        <p>
                            Başvuru Durumum
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>