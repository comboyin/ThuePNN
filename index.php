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
</head>

<body>
<div id="container">
    <div class="container-wrapper">
        <!-- header -->
        <style>
			#header .date-search .search .btn { width:44px; }
			#header .date-search .search .text { width: 153px; }
           
		</style>
		<div id="header">
			<?php require_once('source/slides.php');?>
			<?php require_once('source/topmenu.php');?>
							
			<div class="date-search">
				<p>Thứ năm, 30 - 07 - 2015,  11:15, GMT+7</p>
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
            <iframe frameborder="0" src="http://personnel.stu.edu.vn/tim-kiem.html" style="width:100%; height:1px" id="iframeGSearch" __idm_frm__="4">
                [Your user agent does not support frames or is currently configured  not to display frames. However, you may visit the related document.]
            </iframe>
        </div>
<!-- main.end -->
<!-- footer -->
<?php include_once 'source/footer.php';?>

</body></html>