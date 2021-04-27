<?php
if(isset($_SESSION["Yonetici"])){
?>


DASHBOARD / PANO SAYFASI


<?php
}else{
	header("Location:index.php?SKD=1");
	exit();
}
?>