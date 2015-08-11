var hoso = function() {
	
	var _idhoso = '';
	var _GhiChu = '';
	var _idloai = '';
	var _MaSoThue = '';
	var _img = '';
	return {
		init : function() {
			
			// khoi tao phan trang
			initJpage();
			
			//khoi tao file tree
			$('#fileTreeDemo_1').fileTree({ root: '../hoso/', script: 'connectors/jqueryFileTree.php' }, function(file) {
				$("span.ChooseFile").html(file);
			});
			
			
			//lay ten HKD cho dialogThemHoSo
			function timHKD(MaSoThue){
				
				$('#dialogThemHoSo span.TenGoi').html('');
				
				$('img.loadingNNT').css('display','inline');
				data ={MaSoThue:MaSoThue,Action:'TimNNT'}
				$.get(baseUrl('source/DanhBaController.php'),data,function(json){
					$('img.loadingNNT').css('display','none');
					if(json.length==1){
						$('#dialogThemHoSo span.TenGoi').html(json[0]['tengoi']);
					}
				},'json');	
				
			}
			// key up  - tìm danh bạ
			$("input[name='MaSoThueThem']").on( "keyup", function(e){
				var MaSoThue = $("input[name='MaSoThueThem']").val();
				timHKD(MaSoThue);
			} );
			
			$("button.SubmitSua").click(function(e){
				e.preventDefault();
				Sua();
			});
			function Sua(){

			
				MaSoThue = $("input[name='MaSoThueThem']").val().trim();
				
				GhiChu = $("textarea[name='GhiChu']").val().trim();
				
				idLoai = $("#selectLoaiHoSo option:selected").val().trim();
				
				
				imgTemp = $("span.ChooseFile").html();
				
				img = imgTemp.substring(3,imgTemp.length);
				
					
					data = {
							Action : 'SuaHoSo',
							MaSoThue : MaSoThue,
							GhiChu : GhiChu,
							idLoai : idLoai,
							img : img,
							idhoso : _idhoso
						};
					$.post(baseUrl('source/HoSoController.php'),data,function(json){
						
						if(json['kq']==true){
							setTimeout(function(){
								$("#dialogThemHoSo").dialog("close");
							},700);
							$("div.ThongBao").html("Sửa thành công !");
							LoadHoSo(MaSoThue);
						}else{
							$("div.ThongBao").html(json['mess']);
						}
					},'json')
				
				
			}

			function Them(){
				/*var fd = new FormData();
				
				fd.append('fileToUpload',
						$('input[name="fileToUpload"]')[0].files[0]);
				
					$.ajax({
						url : baseUrl('source/upload.php'),
						data : fd,
						processData : false,
						contentType : false,
						type : 'POST',
						success : function(html) {
							
							
						}
					});*/
				
				
				
				MaSoThue = $("input[name='MaSoThueThem']").val().trim();
				
				GhiChu = $("textarea[name='GhiChu']").val().trim();
				
				idLoai = $("#selectLoaiHoSo option:selected").val().trim();
				
				
				
				// "../hoso/database_thuepnn55c76af2dc619.png"
				namePathFile = $("span.ChooseFile").html().trim();
				img = namePathFile.substring(3,namePathFile.length);
				
				data = {
						Action : 'ThemHoSo',
						MaSoThue : MaSoThue,
						GhiChu : GhiChu,
						idLoai : idLoai,
						img : img
					};
				$.post(baseUrl('source/HoSoController.php'),data,function(json){
					
					if(json['kq']==true){
						setTimeout(function(){
							$("#dialogThemHoSo").dialog("close");
						},700);
						$("div.ThongBao").html("Thêm thành công !");
						LoadHoSo(MaSoThue);
					}else{
						$("div.ThongBao").html(json['mess']);
					}
					
				},'json')
			
			    
				
				
			}
			
			$("button.SubmitThem").click(function(e){
				e.preventDefault();
				
				
				Them();
				
				
				
			});

			// Khởi tạo dialog them
			$("#dialogThemHoSo").dialog({
				autoOpen : false,
				modal : true,
				width : 'auto'
			});
			// Khởi tạo dialog them
			$("#dialogSuaImg").dialog({
				autoOpen : false,
				modal : true,
				width : 'auto'
			});
			// nhất nút thoát dialogThem
			$('button.thoat').click(function() {
				$("#dialogThemHoSo").dialog("close");

			});
			// click them ho so
			$("button.themHoSo").click(
					function() {
						//hien button them - an button Sua
						$("button.SubmitThem").css('display','inline');
						$("button.SubmitSua").css('display','none');
						$("input[name='fileToUpload']").css('display','inline');
						// load loai ho so
						masothue = $("input[name='MaSoThue']").val().trim();
						timHKD(masothue);
						$("input[name='MaSoThueThem']").val(masothue);
						data = {
							Action : 'LoadDSLoaiHS'
						};

						$.get(baseUrl('source/HoSoController.php'), data,
								function(html) {
									$('#selectLoaiHoSo').empty().append(html);
									;
								});

						$("#dialogThemHoSo").dialog("open");
					})
			// in hoso
			function printImage(image) {
				var printWindow = window.open('', 'Print Window',
						'height=400,width=600');
				printWindow.document
						.write('<html><head><title>Print Window</title>');
				printWindow.document.write('</head><body ><img src=\'');
				printWindow.document.write(image.src);
				printWindow.document.write('\' /></body></html>');
				printWindow.document.close();
				printWindow.print();
			}

			

			$('button.printHoSo').live('click', function() {
				var figureTag = $(this).parents('figure')[0];
				var image = $('img', figureTag)[0];
				printImage(image);
			});
			
			$('button.Xoa').live('click', function() {
				var mfptitle = $(this).parents('div.mfp-title')[0];
				// idhoso
				var idhoso = $('span', mfptitle).html().trim();
				
				data = {
						Action : 'Xoa',
						idhoso : idhoso
				}
				$.post(baseUrl('source/HoSoController.php'),data,function(json){
					if(json['kq']==true){
						$.magnificPopup.close();
						$("h2.ThongBao").html('Xóa thành công !');
						if($("input[name='MaSoThue']").val().trim().length == 0){
							LoadHoSoAll();
						}else if($("input[name='MaSoThue']").val().trim().length>0){
							MaSoThue = $("input[name='MaSoThue']").val().trim();
							LoadHoSo(MaSoThue);
						}
						
						
					}else if(json['kq']==false){
						$.magnificPopup.close();
						$("h2.ThongBao").html('Xóa KHÔNG thành công !');
					}
					setTimeout(function(){
						$("h2.ThongBao").html('');
					},3000);
				},'json');
				
			});
			$("button.submitSuaImg").click(function(e){
				e.preventDefault();
				

				var fd = new FormData();
				
				fd.append('fileToUpload',
						$('input[name="fileToUploadImg"]')[0].files[0]);
				
					$.ajax({
						url : baseUrl('source/upload.php'),
						data : fd,
						processData : false,
						contentType : false,
						type : 'POST',
						success : function(html) {
							
							file =  html;
							
							
							
							if(file.length > 0 ){
								// "../hoso/database_thuepnn55c76af2dc619.png"
								img = file.substring(3,file.length);
								
								data = {
										Action : 'SuaImg',
										idhoso : _idhoso,
										img : img
									};
								$.post(baseUrl('source/HoSoController.php'),data,function(json){
									
									if(json['kq']==true){
										setTimeout(function(){
											$("#dialogSuaImg").dialog("close");
										},700);
										$("div.ThongBao").html("Cập nhật image thành công !");
										
										if($("input[name='MaSoThue']").val().trim().length == 0){
											LoadHoSoAll();
										}else if($("input[name='MaSoThue']").val().trim().length>0){
											MaSoThue = $("input[name='MaSoThue']").val().trim();
											LoadHoSo(MaSoThue);
										}
										
									}else{
										$("div.ThongBao").html(json['mess']);
									}
									
								},'json')
							}else{
								$("div.ThongBao").html("Upload file không thành công !");
							}
							
							
						}
					});
			    
				
			});
			$("button.SuaImg").live('click',function(){
				var mfptitle = $(this).parents('div.mfp-title')[0];
				// idhoso
				_idhoso = $('span', mfptitle).html().trim();
				$.magnificPopup.close();
				$("#dialogSuaImg").dialog('open');
			});
			$('button.Sua').live('click', function() {
				var mfptitle = $(this).parents('div.mfp-title')[0];
				// idhoso
				_idhoso = $('span', mfptitle).html().trim();
				_MaSoThue = $('span.MaSoThue',mfptitle).html().trim();
				_GhiChu = $('span.GhiChu',mfptitle).html().trim();
				_idloai = $('span.idloai',mfptitle).html().trim();
				_img = '../'+$('span.img',mfptitle).html().trim();
				// load loai ho so
				
				timHKD(_MaSoThue);
				$("input[name='MaSoThueThem']").val(_MaSoThue);
				$("textarea[name='GhiChu']").val(_GhiChu);
				$("span.ChooseFile").val();
				$("#selectLoaiHoSo").val(_idloai);
				$("span.ChooseFile").html(_img);
				data = {
					Action : 'LoadDSLoaiHS'
				};

				$.get(baseUrl('source/HoSoController.php'), data,
						function(html) {
							$('#selectLoaiHoSo').empty().append(html);
							;
						});
				
				$.magnificPopup.close();
				$("#dialogThemHoSo").dialog("open");
				
				//hien button them - an button Sua
				$("button.SubmitThem").css('display','none');
				$("button.SubmitSua").css('display','inline');
				$("input[name='fileToUpload']").css('display','none');
				
			});

			$('.zoom').magnificPopup(
							{
								delegate : 'a',
								type : 'image',
								closeOnContentClick : false,
								closeBtnInside : false,
								mainClass : 'mfp-with-zoom mfp-img-mobile',
								image : {
									verticalFit : true,
									titleSrc : function(item) {
										return item.el.attr('title') + '<span style="display:none;">'+item.el.attr('idhoso')+'</span>' + '<span style="display:none;" class="MaSoThue">'+item.el.attr('MaSoThue')+'</span>' +
														'<span style="display:none;" class="GhiChu">'+item.el.attr('ghichu')+'</span>' +
														'<span style="display:none;" class="idloai">'+item.el.attr('idloai')+'</span>' +
														'<span style="display:none;" class="img">'+item.el.attr('img')+'</span>'
												+ '<button class="btn printHoSo">Print</button>' + 
												'<button style="margin-left:10px" class="btn Sua">Sửa</button>' +
												'<button style="margin-left:10px" class="btn Xoa">Xóa</button>';
									}
								},
								gallery : {
									enabled : true
								},
								zoom : {
									enabled : true,
									duration : 300, // don't foget to change the
													// duration also in CSS
									opener : function(element) {
										return element.find('img');
									}
								}
							});
			
			$("button.LoadHoSoAll").click(function(){

				$("input[name='MaSoThue']").val('');
				$("span.TenGoi").html('');
				$("span.DiaChi").html('');
				LoadHoSoAll();
			});
			function LoadHoSoAll(){

				$('span.TenGoi').html('');
				// destroy
				$("#ContentHoSo").html('');
				$("div.holder").jPages("destroy");

				// show loading
				$('img.loadingNNT').css('display', 'inline');
				data = {
					Action : 'LoadHS_ALL'
				}
				$.get(baseUrl('source/HoSoController.php'),
								data, function(json) {
									/*
									 * Trả về 1 phần từ
									 * json[0]['TenGoi']
									 * json[0]['Content']
									 */
									$('img.loadingNNT').css('display',
											'none');
									count = json['count'];

									if (count > 0) {
										$('span.TenGoi').html('');
										$("#ContentHoSo").html(
												json['Content']);
										initJpage();

									}
								}, 'json');
			}
			function LoadHoSo(MaSoThue){
				
				$('span.TenGoi').html('');
				// destroy
				$("#ContentHoSo").html('');
				$("div.holder").jPages("destroy");

				// show loading
				$('img.loadingNNT').css('display', 'inline');
				data = {
					MaSoThue : MaSoThue,
					Action : 'LoadHS_MST'
				}
				$.get(baseUrl('source/HoSoController.php'),
								data, function(json) {
									/*
									 * Trả về 1 phần từ
									 * json[0]['TenGoi']
									 * json[0]['Content']
									 */
									$('img.loadingNNT').css('display',
											'none');
									count = json['count'];
									$("input[name='MaSoThue']").val(MaSoThue);
									$('span.TenGoi').html(
											json['TenGoi']);
									$('span.DiaChi').html(
											json['DiaChi']);
									if (count > 0) {
										
										$("#ContentHoSo").html(
												json['Content']);
										initJpage();

									}
								}, 'json');
			}
			
			// key up - tìm hồ sơ theo MST
			$("input[name='MaSoThue']").on(
					"keyup",
					function(e) {

						var MaSoThue = $("input[name='MaSoThue']").val();
						LoadHoSo(MaSoThue);
					});

			function initJpage() {
				$("div.holder").jPages({
					containerID : "ContentHoSo",
					perPage : 5,
					startPage : 1,
					startRange : 1,
					midRange : 5,
					endRange : 1
				});

			}

		}
	};
}();

jQuery(document).ready(function() {

	hoso.init();
});