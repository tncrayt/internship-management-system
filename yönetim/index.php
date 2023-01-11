<?php
session_start();
if ($_SESSION["login"] && $_SESSION["kullanici"]["role_ad"] == "müdür"){ ?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="tr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Yönetici | ÇÖMÜ STAJ TAKİP</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <script src="https://kit.fontawesome.com/1f952dc3e7.js" crossorigin="anonymous"></script>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal" data-slide="true" href="#" role="button">
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Çıkış Yap</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      Çıkış yapmak istediğinize emin misiniz ?
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                      <a href="../cikis.php" type="button" class="btn btn-danger">Çıkış</a>
                  </div>
              </div>
          </div>
      </div>

    <!-- Main Sidebar Container -->
   <?php include "../templates/yonetim-sidebar.php"?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Gösterge Paneli</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                <li class="breadcrumb-item active">Gösterge Paneli</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-lg-3 col-6">
                <?php
                    require "../config.php";
                    $query= $db->prepare("SELECT * FROM kullanicilar WHERE rol_id=:kid");
                    $query->execute([
                            "kid"=>4
                    ]);
                    $ogrenci_sayi = $query->rowCount();
                ?>
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $ogrenci_sayi ?></h3>
                  <p>Kayıtlı Öğrenciler</p>
                </div>
                <div class="icon">
                  <i class="fa-solid fa-user-graduate"></i>
                </div>
                <a href="#" class="small-box-footer">
                  Detaylı Bilgi <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
              <?php
              $query= $db->prepare("SELECT * FROM kullanicilar WHERE rol_id=:kid");
              $query->execute([
                  "kid"=>2
              ]);
              $danisman_sayi = $query->rowCount();
              ?>
            <div class="col-lg-3 col-6">

              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $danisman_sayi ?></h3>
                  <p>Danışmanlar</p>
                </div>
                <div class="icon">
                  <i class="fa-solid fa-building-columns"></i>
                </div>
                <a href="#" class="small-box-footer">
                  Detaylı Bilgi <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
              <?php
              $query= $db->prepare("SELECT * FROM kullanicilar WHERE rol_id=:kid");
              $query->execute([
                  "kid"=>3
              ]);
              $personel_sayi = $query->rowCount();
              ?>
            <div class="col-lg-3 col-6">

              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $personel_sayi ?></h3>
                  <p>Personeller</p>
                </div>
                <div class="icon">
                  <i class="fa-solid fa-user-tie"></i>
                </div>
                <a href="#" class="small-box-footer">
                  Detaylı Bilgi <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
              <br>







            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->

            <div class="row">
                <div class="col-lg-3 col-6">
                    <?php
                    require "../config.php";
                    $query= $db->query("SELECT staj_kayit.id as kayit_id,ad,soyad,ogrenci_no,tel FROM staj_kayit
INNER JOIN ogrenci_detay ON staj_kayit.ogrenci_id=ogrenci_detay.ogrenci_id
INNER JOIN kullanicilar ON staj_kayit.ogrenci_id=kullanicilar.id
WHERE  staj_kayit.mudur_onay=0 AND staj_kayit.danisman_onay=1");

                    $ogrenci_sayi = $query->rowCount();
                    ?>
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3 class="text-white"><?php echo $ogrenci_sayi  ?></h3>
                            <p class="text-white">Onay Bekleyen Stajlar</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-calendar-check"></i>
                        </div>
                        <a href="#" class="small-box-footer" style="color: white!important;">
                            Detaylı Bilgi <i class="fas fa-arrow-circle-right text-white"></i>
                        </a>
                    </div>
                </div>
                <?php
                $query= $db->query("SELECT staj_kayit.id as kayit_id,ad,soyad,ogrenci_no,tel FROM staj_kayit
INNER JOIN ogrenci_detay ON staj_kayit.ogrenci_id=ogrenci_detay.ogrenci_id
INNER JOIN kullanicilar ON staj_kayit.ogrenci_id=kullanicilar.id
WHERE staj_kayit.mudur_onay=1");

                $danisman_sayi = $query->rowCount();
                ?>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo $danisman_sayi ?></h3>
                            <p>Onaylanmış Toplam Stajlar</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Detaylı Bilgi <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>


            </div>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->

      <!-- Default to the left -->
      <strong>Copyright &copy; 2022-2023 <a href="https://www.comu.edu.tr/">Çanakkale 18 Mart Üniversitesi</a>.</strong>
      Tüm
      Hakları Saklıdır.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
</body>

</html>

<?php }else{
header("Location:../index.php");
}
?>