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
    $SosyalLinkFacebook     = $Ayarlar["SosyalLinkFacebook"];
    $SosyalLinkTwitter      = $Ayarlar["SosyalLinkTwitter"];
    $SosyalLinkLinkedIn     = $Ayarlar["SosyalLinkLinkedIn"];
    $SosyalLinkInstagram    = $Ayarlar["SosyalLinkInstagram"];
    $SosyalLinkYouTube	    = $Ayarlar["SosyalLinkYouTube"];
    $SosyalLinkPinterest    = $Ayarlar["SosyalLinkPinterest"];
}else{
    //echo "Site Ayar Sorgusu Hatalı";
    die();
}

$MetinlerSorgusu  = $VeritabaniBaglantisi->prepare("SELECT * FROM sozlesmelervemetinler LIMIT 1");
$MetinlerSorgusu->execute();  //Çalıştır
$MetinlerSayisi   = $MetinlerSorgusu->rowCount(); //Kayıt var mı yok mu?
$Metinler         = $MetinlerSorgusu->fetch(PDO::FETCH_ASSOC);

if($MetinlerSayisi>0){
    $HakkimizdaMetni               = $Metinler["HakkimizdaMetni"];
    $UyelikSozlesmesiMetni         = $Metinler["UyelikSozlesmesiMetni"];
    $KullanimKosullariMetni        = $Metinler["KullanimKosullariMetni"];
    $GizlilikSozlesmesiMetni       = $Metinler["GizlilikSozlesmesiMetni"];
    $MesafaliSatisSozlesmesiMetni  = $Metinler["MesafaliSatisSozlesmesiMetni"];
    $TeslimatMetni                 = $Metinler["TeslimatMetni"];
    $IptalIadeDegisimMetni         = $Metinler["IptalIadeDegisimMetni"];
}else{
    //echo "Metinler Sorgusu Hatalı";
    die();
}





?>