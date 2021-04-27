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
    $SiteAdi                = $Ayarlar["SiteAdi"];
    $SiteTitle              = $Ayarlar["SiteTitle"];
    $SiteDescription        = $Ayarlar["SiteDescription"];
    $SiteKeywords           = $Ayarlar["SiteKeywords"];
    $SiteCopyrightMetni     = $Ayarlar["SiteCopyrightMetni"];
    $SiteLogosu             = $Ayarlar["SiteLogosu"];
    $SiteLinki              = $Ayarlar["SiteLinki"];
    $SiteEmailAdresi        = $Ayarlar["SiteEmailAdresi"];
    $SiteEmailSifresi       = $Ayarlar["SiteEmailSifresi"];
    $SiteEmailHostAdresi    = $Ayarlar["SiteEmailHostAdresi"];
    $SosyalLinkFacebook     = $Ayarlar["SosyalLinkFacebook"];
    $SosyalLinkTwitter      = $Ayarlar["SosyalLinkTwitter"];
    $SosyalLinkLinkedIn     = $Ayarlar["SosyalLinkLinkedIn"];
    $SosyalLinkInstagram    = $Ayarlar["SosyalLinkInstagram"];
    $SosyalLinkYouTube	    = $Ayarlar["SosyalLinkYouTube"];
    $SosyalLinkPinterest    = $Ayarlar["SosyalLinkPinterest"];
    $DolarKuru              = $Ayarlar["DolarKuru"];
    $EuroKuru               = $Ayarlar["EuroKuru"];
    $UcretsizKargoBaraji    = $Ayarlar["UcretsizKargoBaraji"];
    $ClientID               = $Ayarlar["ClientID"];
    $StoreKey               = $Ayarlar["StoreKey"];
    $ApiKullanicisi         = $Ayarlar["ApiKullanicisi"];
    $ApiSifresi             = $Ayarlar["ApiSifresi"];
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

if(isset($_SESSION["Kullanici"])){
    $KullaniciSorgusu  = $VeritabaniBaglantisi->prepare("SELECT * FROM uyeler WHERE EmailAdresi = ? LIMIT 1");
    $KullaniciSorgusu->execute([$_SESSION["Kullanici"]]);  //Çalıştır
    $KullaniciSayisi   = $KullaniciSorgusu->rowCount(); //Kayıt var mı yok mu?
    $Kullanici         = $KullaniciSorgusu->fetch(PDO::FETCH_ASSOC);

    if($KullaniciSayisi>0){
        $KullaniciID        = $Kullanici["id"];
        $EmailAdresi        = $Kullanici["EmailAdresi"];
        $Sifre              = $Kullanici["Sifre"];
        $IsimSoyisim        = $Kullanici["IsimSoyisim"];
        $TelefonNumarasi    = $Kullanici["TelefonNumarasi"];
        $Cinsiyet           = $Kullanici["Cinsiyet"];
        $Durumu             = $Kullanici["Durumu"];
        $KayitTarihi        = $Kullanici["KayitTarihi"];
        $KayitIpAdresi      = $Kullanici["KayitIpAdresi"];
        $AktivasyonKodu     = $Kullanici["AktivasyonKodu"];
    }else{
        //echo "Kullanıcı Sorgusu Hatalı";
        die();
    }
}

if(isset($_SESSION["Yonetici"])){
	$YoneticiSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM yoneticiler WHERE KullaniciAdi = ? LIMIT 1");
	$YoneticiSorgusu->execute([$_SESSION["Yonetici"]]);
	$YoneticiSayisi			=	$YoneticiSorgusu->rowCount();
	$Yonetici				=	$YoneticiSorgusu->fetch(PDO::FETCH_ASSOC);

	if($YoneticiSayisi>0){
		$YoneticiID					=	$Yonetici["id"];
		$YoneticiKullaniciAdi		=	$Yonetici["KullaniciAdi"];
		$YoneticiSifre				=	$Yonetici["Sifre"];
		$YoneticiIsimSoyisim		=	$Yonetici["IsimSoyisim"];
		$YoneticiEmailAdresi		=	$Yonetici["EmailAdresi"];
		$YoneticiTelefonNumarasi	=	$Yonetici["TelefonNumarasi"];
	}else{
		//echo "Yönetici Sorgusu Hatalı";
		die();
	}
}
?>