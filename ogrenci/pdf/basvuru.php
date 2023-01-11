<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>MYO Staj Yönergesi</title>
    <style>

      *,
      *::before,
      *::after {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
          font-family: "DejaVu Sans", sans-serif;
      }

      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        table-layout: fixed;
        margin-top: 15px;
      }

      body {
          font-size: 0.70rem;
          padding: 0px 35px;
      }

      td {
        border: 1px solid black;
        text-align: left;
        padding: 5px;
      }

      .header {
           text-align: center;
           font-weight: bold;
           font-size: 12px;
           margin-top: 65px;
       }
      .header2 {
          font-weight: bold;
          font-size: 12px;
          padding-left: 50px;
          padding-top: 15px;
      }

      .logo {
        position: absolute;
        top: 10px;
      }
      .text_center{
          text-align: center;
      }
    </style>
  </head>

  <body>
    <img src="logo.png"  alt="" width="80" height="80" class="logo" />
    <h2 class="header">
      ÇANAKKALE ONSEKİZ MART ÜNİVERSİTESİ <br />
      ÇANAKKALE SOSYAL BİLİMLER MESLEK YÜKSEKOKULU <br />
      STAJ BAŞVURU VE KABUL FORMU
    </h2>

    <span>İlgili Makama,</span>
    <p>
      Meslek Yüksekokulumuz öğrencilerinin, Eğitim-Öğretim programlarımız gereği
      öğrenim süresi sonuna kadar, kuruluş ve işletmelerde staj yapma
      zorunluluğu bulunmaktadır.
    </p>
    <p>
      Zorunlu olarak staja tâbi tutulan öğrencimizin stajını kuruluşunuzda
      yapmasının tarafınızdan kabul edilmesi durumunda, 5510 Sayılı “Sosyal
      Sigortalar ve Genel Sağlık Sigortası Kanunu” gereği sigortalılığın
      başlangıcı, sona ermesi ve bildirim yükümlülüğü Kurumumuz tarafından
      yapılacaktır
    </p>

    <table>
      <tr>
        <td>Adı Soyadı</td>
        <td colspan="3"><?=$kayitlar["ad_soyad"]?></td>
      </tr>
      <tr>
        <td>Öğrenci Numarası</td>
        <td><?=$kayitlar["ogrenci_no"]?></td>
        <td>Öğretim Yılı</td>
        <td><?=$kayitlar["donem_yil"]?></td>
      </tr>
      <tr>
        <td>T.C. Numarası</td>
        <td><?=$kayitlar["tc"]?></td>
        <td>Telefon Numarası</td>
        <td><?=$kayitlar["tel"]?></td>
      </tr>

      <tr>
        <td>Bölümü</td>
        <td colspan="3"><?=$kayitlar["bolum_ad"]?></td>
      </tr>

      <tr>
        <td>E-posta Adresi</td>
        <td colspan="3"><?=$kayitlar["email"]?></td>
      </tr>

      <tr>
        <td>İkametgâh Adresi</td>
        <td colspan="3">
            <?=$kayitlar["adres"]?>
        </td>
      </tr>

        <tr>
            <td>Sosyal Güvencesi var mı?</td>
            <td colspan="3"><?=$kayitlar["ad"]?></td>
        </tr>

      <tr>
        <td>Staja Başlama Tarihi</td>
        <td colspan="2"><?=$kayitlar["staj_baslangic"]?></td>
        <td>Haftalık Çalışma Gün Sayısı</td>
      </tr>
      <tr>
        <td>Staja Başlama Tarihi</td>
        <td colspan="2"><?=$kayitlar["staj_bitis"]?></td>
        <td><?=$kayitlar["haftalik_gun_sayi"]?></td>
      </tr>
    </table>

    <table>
        <tr>
            <th colspan="4">STAJ YAPILAN İŞ YERİNİN (İŞ YERİ TARAFINDAN DOLDURULUCAK)</th>
        </tr>
        <tr>
            <td>Kurumun Adı</td>
            <td colspan="3"><?=$kayitlar["k_ad"]?></td>
        </tr>
        <tr>
            <td>Adresi</td>
            <td colspan="3"><?=$kayitlar["k_adres"]?></td>
        </tr>
        <tr>
            <td>Hizmet Alanı</td>
            <td colspan="3"><?=$kayitlar["k_hizmet_alan"]?></td>
        </tr>


        <tr>
            <td>Telefon No</td>
            <td><?=$kayitlar["k_no"]?></td>
            <td>Faks No.</td>
            <td><?=$kayitlar["k_faks_no"]?></td>
        </tr>
        <tr>
            <td>E-Posta Adresi</td>
            <td><?=$kayitlar["k_eposta"]?></td>
            <td>Web Adresi</td>
            <td><?=$kayitlar["k_webadres"]?></td>
        </tr>


    </table>

    <table>
        <tr>
            <th colspan="4">KURUM YETKİLİSİNİN (İŞ YERİ TARAFINDAN DOLDURULUCAK)</th>
        </tr>
        <tr>
            <td>Adı Soyadı</td>
            <td></td>
            <td rowspan="3" class="text_center">İmza / Kaşe</td>
            <td rowspan="3"></td>
        </tr>
        <tr>
            <td>Görevi/ Unvanı</td>
            <td></td>
        </tr>

        <tr>
            <td>Tarih</td>
            <td></td>
        </tr>


    </table>

    <table>
        <tr>
            <th>ÖĞRENCİ</th>
            <th>DANIŞMAN</th>
            <th>STAJ KOMİSYONU BAŞKANI</th>
            <th>SİGORTA GİRİŞİ</th>
        </tr>
        <tr>
            <td>
                Yukarıda adı geçen kurum/işyerinde,
                belirtilen tarihler arasında 30 işgünü
                stajımı yapacağımı, bu tarihler dışında
                staj yapmayacağımı taahhüt eder, aksi
                durumda stajımın iptal edileceğini
                kabul ederim.
            </td>
            <td></td>
            <td></td>
            <td></td>

        </tr>

        <tr>
            <td>Öğrencinin Adı Soyadı:</td>
            <td>Onay</td>
            <td>Onay</td>
            <td>Onay</td>
        </tr>
        <tr>
            <td><?=$kayitlar["ad_soyad"]?></td>
            <td><?= $danisman["danisman_ad"] ?></td>
            <td>Ümit Demir</td>
            <td></td>
        </tr>
        <tr>
            <td>Tarih:</td>
            <td>Tarih:</td>
            <td>Tarih:</td>
            <td>Tarih:</td>
        </tr>
        <tr>
            <td>İmza:</td>
            <td></td>
            <td></td>
            <td></td>

        </tr>

    </table>

  </body>
</html>
