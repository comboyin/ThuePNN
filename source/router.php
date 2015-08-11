<?php
	$rt='';
	if(isset($_GET['rt'])){
		$rt = $_GET['rt'];
	}


	if($rt=='NhatKy'){
		require_once 'source/NhatKyView.php';
	}
	else if($rt=='HoSo'){
		require_once 'source/HoSoView.php';
	}
	else if($rt=='DanhBa')
	{
		require_once 'source/DanhBaView.php';
	}else {
		require_once 'source/TrangChu.php';
	}
?>

