

<!--END js va css Phân trang  -->


<h2 class="ThongBao"></h2>
<form class="form-horizontal">
	<div class="control-group">
		<label class="control-label">Mã Số Thuế:</label>
		<div class="controls input-icon">
			<input type="text" name="MaSoThue" style="height: 30px;"> <span
				style="display: none" class="input-success tooltips check_"> <i
				class="icon-exclamation-sign"></i>
			</span>

		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Tên gọi: </label>
		<div class="controls input-icon">
			<img class="loadingNNT" style="margin-left: 10px; display: none;"
				src="images/ajax-loader.gif"> <span class='TenGoi'></span>

		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label">Địa chỉ: </label>
		<div class="controls input-icon">
			<span class='DiaChi'></span>

		</div>
	</div>

</form>

<button class="themHoSo">Thêm mới hồ sơ</button>

<button class="LoadHoSoAll">Load toàn bộ hồ sơ</button>
<div id="dialogSuaImg" title="Cập nhật image">
    <form class="form-horizontal">
        <div class="control-group">
			<label class="control-label">img: </label>
			<div class="controls input-icon">
				<input accept=".jpg,.png" type="file" name="fileToUploadImg" style="height: 30px;">

			</div>
		</div>
		<div class="form-actions">
			 
            <button type="button" class="btn btn-success SubmitSuaImg">Sửa</button>
			<button type="button" class="btn btn-danger thoat">Thoát</button>
		</div>
    </form>
</div>

<div id="dialogThemHoSo" title="Thêm hồ sơ">
	<form class="form-horizontal">
		<div class="ThongBao"></div>
		<div class="control-group">
			<label class="control-label">Mã Số Thuế:</label>
			<div class="controls input-icon">
				<input type="text" name="MaSoThueThem" style="height: 30px;"> <span
					style="display: none" class="input-success tooltips check_"> <i
					class="icon-exclamation-sign"></i>
				</span>

			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Tên gọi: </label>
			<div class="controls input-icon">
				<img class="loadingNNT" style="margin-left: 10px; display: none;"
					src="images/ajax-loader.gif"> <span class='TenGoi'></span>

			</div>
		</div>
		
		<div class="example">
			<h3>Danh mục hồ sơ</h3>
			<div id="fileTreeDemo_1" class="FileFreeChoose"></div>
		</div>
		
		
		
		<div class="control-group">
			<label class="control-label">Hình ảnh đang chọn: 
			
			
			<h4></h4><span style="color: red;" class="ChooseFile"></span></h4>
			
			
			</label>
			
				
			
		</div>
		<div class="control-group">
			<label class="control-label">Ghi chú:</label>
			<div class="controls input-icon">
				<textarea rows="3" cols="3" name="GhiChu"></textarea>

			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Loại hồ sơ:</label>
			<div class="">
				<select id="selectLoaiHoSo">
				</select>

			</div>
		</div>

		<div class="form-actions">
			 <button style="display: none;" type="button" class="btn btn-success SubmitThem">Thêm</button>
            <button style="display: none;" type="button" class="btn btn-success SubmitSua">Sửa</button>
			<button type="button" class="btn btn-danger thoat">Thoát</button>
		</div>


	</form>

</div>


<div class="hr-list">
	<p class="title">
		<strong>Hồ sơ pháp lý</strong>
	</p>
	<a name="listPerson"></a>
	<div class="content clear-fix" id="listPersonItems"
		style="height: 300px;">
		<!-- Loading box. Start -->

		<div
			style="float: left; text-align: center; width: 980px; border: 1px solid #C6EAFA; height: 175px;">

			<div class="holder"></div>

			<!-- item container -->
			<div class="zoom">
				<ul id="ContentHoSo" class="clear-fix" style="width: 900px; height: 250px;">
				
				</ul>
			</div>

		</div>

	</div>
</div>


<script src="js_css/hoso.js"></script>


