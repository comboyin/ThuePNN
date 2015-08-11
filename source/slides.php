<link href="js_css/stylesheet.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js_css/jquery.min1.js"></script>
<script type="text/javascript" src="js_css/slideshow1.js"></script>
<script type="text/javascript" src="js_css/slideshow_init1.js"></script>

<?php include_once "conections/config_pnn.php";?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
	<tbody>
	<tr>
		<td width="15%" align="center" bgcolor="#FFFFFF"><img src="images/LOGO_THUE.png" width="140px" height="140px"></td>
		<td width="85%%" align="center">
			<div id="mygallery" class="stepcarousel">
				<div class="belt">
					<?php
						$slide=mysql_query("select tenslide from slide");
						while($rslide=mysql_fetch_array($slide))
						{
							$ten=$rslide["tenslide"];
					?>
					<div class="panel">							
						<img src="images/slides/<?php echo $ten;?>" height="169" width="100%">
					</div>	
					<?php
						}
					?>

				</div>
			</div>
		</td>
	</tr>
	</tbody>
</table>
