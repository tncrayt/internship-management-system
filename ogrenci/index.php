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
                            <h1 class="m-0">Kayıt Başvurusu Oluştur</h1>
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
                    <?php
                         require "../config.php";
                        $query = $db->prepare ("SELECT * fROM staj_kayit WHERE ogrenci_id=:id");
                        $query->execute([
                                "id" => $_SESSION["kullanici"]["id"],
                        ]);

                        $data = $query->fetch();

                        $kayit_sayi = $query->rowCount();



                    ?>


                    <?php if ($kayit_sayi): ?>
                        <div class="alert alert-danger" role="alert">
                            Staj Kayıt işlemi sadece bir kez yapılabilir düzenleme işlemleri için lütfen başvuru durumum sayfasını kullanınız!
                        </div>

                    <?php else: ?>
                        <form class="row g-3 w-75" action="../ajax/staj_basvuru_kayit.php" method="post">
                            <?php
                            require "../config.php";



                            $query = $db->query("SELECT * FROM donemler");
                            $donemler = $query->fetchAll();

                            $query = $db->query("SELECT * FROM sosyal_guvence");
                            $sosyals = $query->fetchAll();
                            //print_r($bolumler);


                            ?>

                            <input type="hidden" name="id" value="<?= $_SESSION["kullanici"]["id"] ?>">

                            <div class="col-md-6 mb-3">
                                <label for="inputEmail4" class="form-label">Tc Kimlik No</label>
                                <input type="number" name="tc" class="form-control" id="inputEmail4" placeholder="xxxxxxxxxxx">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputPassword4" class="form-label">Telefon Numarası</label>
                                <input type="number" name="tel" class="form-control" id="inputPassword4" placeholder="(5xx)-(xxx)-(xx)-(xx)">
                            </div>




                            <div class="col-md-12 mb-3">
                                <label for="inputPassword4" class="form-label">Öğretim Yılı</label>
                                <select id="ogr_yıl" class="form-select form-control">
                                    <option value="err">Öğretim Yılını Seçiniz</option>
                                    <?php foreach ($donemler as $donem): ?>
                                        <option value="<?= $donem["id"] ?>"><?= $donem["donem_yil"]?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="hft_saat" class="form-label">Haftalık Çalışma Gün Sayısı</label>
                                <select  id="hft_saat"  class="form-select form-control">
                                    <option value="err">Lütfen Gün Seçiniz</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="inputPassword4" class="form-label">Staja Başlama Tarihi</label>
                                <select  id="baslangic" name="staj_tarih" class="form-select form-control">
                                    <option value="err">Başlangıç Tarihi Seçiniz</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="inputPassword4" class="form-label">Staj Bitiş Tarihi</label>
                                <select disabled id="bitis" class="form-select form-control">
                                    <option value="err">Bitiş Tarihi</option>
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="inputState" class="form-label d-block">Sosyal Güvenceniz</label>
                                <select id="inputState" name="sigorta" class="form-select form-control">
                                    <?php foreach ($sosyals as $sosyal): ?>
                                        <option value="<?= $sosyal["id"] ?>"><?= $sosyal["ad"]?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="inputAddress" class="form-label">İkametgâh Adresi</label>
                                <textarea class="form-control" name="adres" id="" rows="6" placeholder="İkametgah adresi giriniz..."></textarea>
                            </div>


                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Kurumun Adı</label>
                                <input type="text" class="form-control" name="k_ad" placeholder="Kurum adı">
                            </div>

                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Adresi</label>
                                <input type="text" class="form-control" name="k_adres" placeholder="Kurumun adresi">
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Hizmet Alanı</label>
                                <input type="text" class="form-control" name="k_hizmet_alan" placeholder="Hizmet alanı">
                            </div>
                            <div class="col-6">
                                <label for="inputAddress" class="form-label">Telefon No. </label>
                                <input type="text" class="form-control" name="k_no" placeholder="(5xx)-(xxx)-(xx)-(xx)">
                            </div>
                            <div class="col-6">
                                <label for="inputAddress" class="form-label">Faks No. </label>
                                <input type="text" class="form-control" name="k_faks_no" placeholder="(xxx)-(xxx)-(xx)-(xx)">
                            </div>
                            <div class="col-6">
                                <label for="inputAddress" class="form-label">E-posta Adresi</label>
                                <input type="text" class="form-control" name="k_eposta" placeholder="Kuruma ait E-Posta adresi">
                            </div>

                            <div class="col-6">
                                <label for="inputAddress" class="form-label">Web Adresi  </label>
                                <input type="text" class="form-control" name="k_webadres" placeholder="www.xxxx.com">
                            </div>

                            <div class="col-12 my-4">
                                <button type="submit" class="btn btn-success">Başvuruyu Tamamla</button>
                            </div>





                        </form>
                    <?php endif; ?>


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

    <script>
        $("#hft_saat").change(function () {
            let saat = $(this).val();
            let yil = $("#ogr_yıl").val();
            $.ajax({
                type : 'POST',
                url : '../ajax/form_data.php',
                data:{
                    datas:{
                        hafta_saat:saat,
                        yil:yil
                    }
                },
                success:function(data) {
                    $("#baslangic").html(data);
                }
            })
        });

        $("#baslangic").change(function () {
            let id = $("#baslangic").val();
            $.ajax({
                type : 'POST',
                url : '../ajax/form_data.php',
                data:{
                    staj_tarih_id:id
                },
                success:function(data) {
                    $("#bitis").html(data);
                }
            })
        })
    </script>
    </body>

    </html>

<?php }else{
    header("Location:../index.php");
}
?>