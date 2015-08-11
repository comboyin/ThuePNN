<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script type="text/javascript" src="js_css/jquery-1.8.3.min.js"></script>	
	
	<script type="text/javascript" src="js_css/jquery.yiiactiveform.js"></script>
	<script type="text/javascript" src="js_css/bootstrap.js"></script>
	<script type="text/javascript" src="js_css/jquery.yiiactiveform.js"></script>
	
	<script type="text/javascript" src="js_css/jquery.dataTables.js"></script>
	<script type="text/javascript" src="js_css/DT_bootstrap.js"></script>
	<script type="text/javascript" src="js_css/MyLib.js"></script>
	<title>TRA CỨU TỜ KHAI THUẾ PNN</title>
	<link href="js_css/reset.css" rel="stylesheet" type="text/css">
	<link href="js_css/general.css" rel="stylesheet" type="text/css">
	

	
		
	<script type="text/javascript" src="js_css/jquery.jcarousel.min.js"></script>    
	<script type="text/javascript" src="js_css/extras.js"></script>
	<link href="js_css/skin.css" rel="stylesheet" type="text/css">
	<link href="js_css/bootstrap.css" rel="stylesheet" type="text/css">
	
	<!-- jquery ui  -->
	<link href="js_css/skin.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js_css/jquery-ui.js"></script>
	<link href="js_css/jquery-ui.css" rel="stylesheet" type="text/css">
	
	<!--BEGIN Nếu rt == 'HoSo' thì load các file css và js này  -->
	<?php if(isset($_GET['rt']) && $_GET['rt']=='HoSo'):?>
	<!--BEGIN file tree  -->
	
		<script src="js_css/FileTree/jquery.easing.js"></script>
			<script src="js_css/FileTree/jqueryFileTree.js"></script>
	<link rel="stylesheet" href="js_css/FileTree/jqueryFileTree.css">


	<!--END file tree  -->
	
    <link rel="stylesheet" href="js_css/jpage/css/jPages.css">
    <link rel="stylesheet" href="js_css/jpage/css/animate.css">
    <link rel="stylesheet" href="js_css/hoso.css">
    <link rel="stylesheet" href="js_css/Magnific-Popup/dist/magnific-popup.css">
    
    <script type="text/javascript" src="js_css/jpage/js/highlight.pack.js"></script>
    <script type="text/javascript" src="js_css/jpage/js/tabifier.js"></script>
    <script type="text/javascript" src="js_css/jpage/js/js.js"></script>
    <script src="js_css/jpage/js/jPages.js"></script>
    <script src="js_css/Magnific-Popup/dist/jquery.magnific-popup.js"></script>
    <?php endif;?>
    
    
	<!--[if lt IE 7]>
	<script type="text/javascript" src="/themes/classic/js/DD_belatedPNG.js"></script>
	<![endif]-->
	<!--[if IE 9]>
	<style>
		#header #menu li a { padding: 0 16px; }
	</style>
	<![endif]-->
	<?php
		function sw_get_current_weekday() {
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$weekday = date("l");
			$weekday = strtolower($weekday);
			switch($weekday) {
				case 'monday':
					$weekday = 'Thứ hai';
					break;
				case 'tuesday':
					$weekday = 'Thứ ba';
					break;
				case 'wednesday':
					$weekday = 'Thứ tư';
					break;
				case 'thursday':
					$weekday = 'Thứ năm';
					break;
				case 'friday':
					$weekday = 'Thứ sáu';
					break;
				case 'saturday':
					$weekday = 'Thứ bảy';
					break;
				default:
					$weekday = 'Chủ nhật';
					break;
			}
			
			return $weekday.', '.date('d - m - Y, H:i:s');
		}
	?>	
</head>

<body id="container">
		<div class="container-wrapper">
			<!-- header -->
			<div id="header">
				<?php require_once('source/slides.php');?>
				<?php require_once('source/topmenu.php');?>
								
				<div class="date-search">
					<p><?php echo sw_get_current_weekday(); ?></p>
					<p class="welcome" style="text-transform: uppercase">CHI CỤC THUẾ QUẬN 5 - ĐỘI THUẾ LIÊN PHƯỜNG 5</p>
				</div>
				
			</div>		
			<!-- header.end -->
			-
			
			<!-- main -->
			<div id="main">
				<div id="main-content-web">
						<?php include 'source/router.php';?>            
				</div>
			</div>	

		</div>
			<!-- main.end -->
	

	<!-- footer -->
	<div id="footer">
		<?php include_once 'source/footer.php';?>
	</div>	

</body>
</html>