<h2 class="ThongBao"></h2>
<p>
<form class="form-inline">
	Từ ngày: <input type="text" name="NgayBD" style="height: 30px" /> Đến
	ngày: <input type="text" name="NgayKT" style="height: 30px" />

</form>
<button class="load">Load danh sách</button>
<button class="them">Thêm mới</button>
<div id="dialogThem" title="Thêm nhật ký mới">
	<form class="form-horizontal">
	   <div class="ThongBao"></div>
		<div class="control-group">
			<label class="control-label">Mã Số Thuế (*)</label>
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
				<img class="loadingNNT"
					style="margin-left: 10px; display: none;"
					src="images/ajax-loader.gif"> 
					
					<span class='TenGoi'></span>

			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Ngày (dd-mm-yyyy): </label>
			<div class="controls input-icon">
				<input type="text" name="Ngay" style="height: 30px;"> 

			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Nội dung (*):</label>
			<div class="controls input-icon">
				<textarea rows="3" cols="3" name="NoiDung"></textarea>

			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Trang thái(*):</label>
			<div class="">
				<input type="checkbox" name="TrangThai" checked="checked"> 

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
</p>
<span style="width: 10px;"></span>

<table cellspacing="0" class="table table-striped table-bordered"
	width="100%" id="TableNhatKy">
	<thead>
		<tr>

			<th>ID NK</th>
			<th>Mã số thuế</th>
			<th>Tên gọi</th>
			<th>Ngày</th>
			<th>Nội dung</th>
			<th>Trạng thái</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>


<script type="text/javascript" src="js_css/nhatky.js"></script>
