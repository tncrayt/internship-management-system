<?php
session_start();
if ($_SESSION["login"] && $_SESSION["kullanici"]["role_ad"] == "öğrenci"){ ?>

    <!DOCTYPE html>
    <!--
    This is a starter template page. Use this page to start your new project from
    scratch. This page gets rid of all links and provides the needed markup only.
    -->
    <html lang="tr">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Öğrenci | ÇÖMÜ STAJ TAKİP</title>

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
        <?php include "../templates/ogrenci-sidebar.php"?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Staj Başvuru Durumu</h1>
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
                    <table class="table table-bordered">
                        <thead>
                        <tr>

                            <th scope="col">Ad Soyad</th>
                            <th scope="col">Müdür Onay </th>
                            <th scope="col">Danışman Onay </th>
                            <th scope="col">Oluşturulma Tarihi</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>

                            <?php

                            require "../config.php";

                            $query = $db->prepare("SELECT concat(kullanicilar.ad,\" \",kullanicilar.soyad) as ad_soyad,staj_kayit.mudur_onay,staj_kayit.danisman_onay,staj_kayit.create_tarih,staj_tarih.id  FROM staj_kayit
INNER JOIN kullanicilar ON kullanicilar.id=staj_kayit.ogrenci_id
INNER JOIN ogrenci_detay ON ogrenci_detay.ogrenci_id=staj_kayit.ogrenci_id
INNER JOIN staj_tarih ON staj_tarih.id=staj_kayit.staj_tarih_id
INNER JOIN sosyal_guvence ON sosyal_guvence.id=staj_kayit.sigorta
INNER JOIN donemler ON staj_tarih.donem_id=donemler.id WHERE kullanicilar.id =:id");
                            $query->execute([
                                    "id"=>$_SESSION["kullanici"]["id"]
                            ]);
                            $kayitlar=$query->fetchAll();

                            ?>

                            <?php foreach ($kayitlar as $kayit): ?>

                            <tr>
                            <th><?= $kayit["ad_soyad"]; ?></th>
                            <td>
                                <?php
                                if ($kayit["mudur_onay"]==0){
                                    echo "<span class=\"text-danger font-weight-bold\">Onaylanmadı</span>";
                                }else{
                                    echo "<span class=\"text-success font-weight-bold\">Onaylandı</span>";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($kayit["danisman_onay"]==0){
                                    echo "<span class=\"text-danger font-weight-bold\">Onaylanmadı</span>";
                                }else{
                                    echo "<span class=\"text-success font-weight-bold\">Onaylandı</span>";
                                }
                                ?>
                            </td>
                            <td><?= $kayit["create_tarih"]; ?></td>
                            <td>
                                <a class="btn btn-info" href="<?php echo "pdf/index.php?id=".$_SESSION["kullanici"]["id"] ?>" >Dosyayı İndir</a>
                                <a class="btn btn-danger" href="<?php echo "../ajax/staj_kayit_sil.php?id=".$kayit["id"]?>" >Sil</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>
                    <!-- /.row -->
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