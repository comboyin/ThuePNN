<?php include_once "conections/config_pnn.php";?>

<ul id="menu">
	<?php 
		$sql="SELECT * FROM menu WHERE isPublished=1 and isParent=1 order by 'thutu' ASC ";
		$queryParent = mysql_query($sql);  
						
	    while($pr = mysql_fetch_array($queryParent))
    	{
	?>            
		<li class="item"><a href="<?php echo $pr["linkMenu"];?>" class="<?php echo $pr["iclass"];?>"><span><?php echo $pr['titleMenu']; ?></span></a>
			<?php
				// Trong mỗi menu cha, ta lại tìm menu con để lặp
				$sql="SELECT * FROM menu WHERE isPublished = '1' and isParent = '2' and id_parent = '".$pr['idMenu']."' order by 'thutu' ASC ";
				$queryChild1 = mysql_query($sql);
								
				if(mysql_num_rows($queryChild1) != 0)  // Đếm số menu con, nếu ko có menu thì không thực hiện lặp menu con
				{
					echo  "<ul class='subMenuList'>";
					while($ch1 = mysql_fetch_array($queryChild1))
					{
			?>
						<li><a href="<?php echo $ch1['linkMenu'];?>"><span><?php echo $ch1['titleMenu'];?></span></a></li>	
			<?php 
					} 
					echo "</ul>";
				}
		echo "</li>";
		}	
		?>	
	<li class="last">&nbsp;</li>
</ul>
