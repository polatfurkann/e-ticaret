<?php
$IPAdresi        = $_SERVER["REMOTE_ADDR"];
$ZamanDamgasi    = time();
$TarihSaat       = date("d.m.Y H:i:s", $ZamanDamgasi);

function Guvenlik($Deger){
    $BoslukSil = trim($Deger);
    $TaglariTemizle = strip_tags($BoslukSil);
    $EtkisizYap = htmlspecialchars($TaglariTemizle);
    $Sonuc = $EtkisizYap;
    return $Sonuc;
}












?>