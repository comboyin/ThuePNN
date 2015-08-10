<?php include_once 'conections/config_pnn.php';?>
<?php 
    $sql_danhba = "select * from danhba";
    $rs_danhba = mysql_query($sql_danhba);
    $danhbas = [];
    while ($r = mysql_fetch_array($rs_danhba)){
        $danhbas[] = $r;
    }
    
?>
<h2 class="ThongBao"></h2>
<button class="them">Thêm mới</button>
<button class="restart">Làm mới</button>
<div id="dialogThem" title="Thêm nhật ký mới">
	<form class="form-horizontal">
	   <div class="ThongBao"></div>
		<div class="control-group">
			<label class="control-label">Mã Số Thuế: </label>
			<div class="controls input-icon">
				<input type="text" name="MaSoThue" style="height: 30px;"> 
				    
					<span style="display: none"
					class="input-success tooltips check_"> 
					<i class="icon-exclamation-sign"></i>
				</span>

			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Tên gọi: </label>
			<div class="controls input-icon">
				<input type="text" name="TenGoi" style="height: 30px;">

			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Số nhà: </label>
			<div class="controls input-icon">
				<input type="text" name="SoNha" style="height: 30px;">

			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label">Tên đường: </label>
			<div class="controls input-icon">
				<input type="text" name="TenDuong" style="height: 30px;">

			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label">Todp: </label>
			<div class="controls input-icon">
				<input type="text" name="Todp" style="height: 30px;">

			</div>
		</div>
		

		<div class="form-actions">
               <button style="display: none;" type="button" class="btn btn-success SubmitThem">Thêm</button>
               <button style="display: none;" type="button" class="btn btn-success SubmitSua">Sửa</button>
               <button type="button" class="btn btn-danger thoat">Thoát</button>
		</div>


	</form>

</div>
<img class="loading" style="margin-left: 10px; display: none;"
	src="images/ajax-loader.gif">

<span style="width: 10px;"></span>

<table cellspacing="0" class="table table-striped table-bordered"
	width="100%" id="TableDanhBa">
	<thead>
		<tr>
			<th>IDdanhba</th>
			<th>Mã số thuế</th>
			<th>Tên gọi</th>
			<th>Số nhà</th>
			<th>Tên đường</th>
			<th>Todp</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($danhbas as $danhba):?>
	   <tr>
	      <td><?php echo $danhba['iddanhba']?></td>
	      <td><?php echo $danhba['masothue']?></td>
	      <td><?php echo $danhba['tengoi']?></td>
	      <td><?php echo $danhba['sonha']?></td>
	      <td><?php echo $danhba['tenduong']?></td>
	      <td><?php echo $danhba['todp']?></td>
	      <td><a class="edit">Sửa</a></td>
	      <td><a class="delete">Xóa</a></td>
	   </tr>
	<?php endforeach;?>
	</tbody>
</table>


<script type="text/javascript" src="js_css/danhba.js"></script>
