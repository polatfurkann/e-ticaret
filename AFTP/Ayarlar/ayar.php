<?php
try{
    $VeritabaniBaglantisi    =new PDO("mysql:host=localhost;dbname=eticaret;charset=UTF8", "root", "");
}catch(PDOException $Hata){
    //echo "Bağlantı Hatası<br />" . $Hata->getMessage();
    die();
}

$AyarlarSorgusu  = $VeritabaniBaglantisi->prepare("SELECT * FROM ayarlar LIMIT 1");
$AyarlarSorgusu->execute();  //Çalıştır
$AyarSayisi      = $AyarlarSorgusu->rowCount(); //Kayıt var mı yok mu?
$Ayarlar         = $AyarlarSorgusu->fetch(PDO::FETCH_ASSOC);

if($AyarSayisi>0){
    $SiteAdi             = $Ayarlar["SiteAdi"];
    $SiteTitle           = $Ayarlar["SiteTitle"];
    $SiteDescription     = $Ayarlar["SiteDescription"];
    $SiteKeywords        = $Ayarlar["SiteKeywords"];
    $SiteCopyrightMetni  = $Ayarlar["SiteCopyrightMetni"];
    $SiteLogosu          = $Ayarlar["SiteLogosu"];
    $SiteEmailAdresi     = $Ayarlar["SiteEmailAdresi"];
    $SiteEmailSifresi    = $Ayarlar["SiteEmailSifresi"];
}else{
    //echo "Site Ayar Sorgusu Hatalı";
    die();
}





?>