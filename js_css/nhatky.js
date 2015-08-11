


var nhatky = function () {

	var _id = '';
	
	var tableNhatKy
	return {
		init : function () {
			
			
			function LoadDanhSachMST(MaSoThue){

				$("img.loading").css('display','inline');
				
				

				data = {
						Action : 'LoadDanhSachMST',
						MaSoThue : MaSoThue
				}
				
				$.get(baseUrl('source/NhatKyController.php'),data,function(json){
					deleteAllRows();
					tengoi = json['TenGoi'];
					diachi = json['DiaChi'];
					
					$("span.TenGoi").html(tengoi);
					$("span.DiaChi").html(diachi);
					
					DATA = json['data'];
					for (i = 0; i < DATA.length; i++) {
						date =  DATA[i]['ngay'].split(" ")[0];
						ngay = date.split('-')[2];
						thang = date.split('-')[1];
						nam = date.split('-')[0];
						
						StringDate = ngay+'-'+thang+'-'+nam;
						
						tableNhatKy
						.fnAddData([
								DATA[i]['id'],
								DATA[i]['masothue'],
								DATA[i]['tengoi'],
								StringDate,
								DATA[i]['noidung'],
								DATA[i]['trangthai'],
								'<a class="edit" href="">Edit</a>',
								'<a class="delete" href="">Delete</a>',
								]);
						
					}

					$("img.loading").css('display','none');
	
				},'json');
			}
			
			
			$("input[name='MaSoThueLoad']").on( "keyup", function(e){
				var MaSoThue = $("input[name='MaSoThueLoad']").val();
				
				LoadDanhSachMST(MaSoThue);
			} );
			
			$("input[name='MaSoThueLoad']").on( "blur", function(e){
				var MaSoThue = $("input[name='MaSoThueLoad']").val();
				LoadDanhSachMST(MaSoThue);
			} );
			
			$("input[name='NgayBD']").datepicker({
				dateFormat : 'dd-mm-yy',
				beforeShow: function (textbox, instance) {
		            instance.dpDiv.css({
		                    marginTop: (-textbox.offsetHeight) + 'px',
		                    marginLeft: textbox.offsetWidth + 'px'
		            });
				}
			});
			
			$("input[name='NgayKT']").datepicker({
				dateFormat : 'dd-mm-yy'
			});
			
			$("input[name='Ngay']").datepicker({
				dateFormat : 'dd-mm-yy'
			});
			
			
			
			// even them 
			$("button.SubmitThem").click(function(e){
				e.preventDefault();
				
				Action = 'Them';
				MaSoThue = $("input[name='MaSoThue']").val().trim();
				Ngay = $("input[name='Ngay']").val().trim();
				NoiDung = $("textarea[name='NoiDung']").val().trim();
				TrangThai = $("input[name='TrangThai']").attr("checked") ? 1 : 0;
				data={
						Action : Action,
						MaSoThue :MaSoThue ,
						Ngay :Ngay,
						NoiDung:NoiDung,
						TrangThai :TrangThai
				};
				$("div.ThongBao").css('color','green');
				$("div.ThongBao").html('Loading...');
				$.post(baseUrl('source/NhatKyController.php'),data,function(json){
					
					kq = json[0];
					// nếu thành công 
					if(kq==true){
						$("div.ThongBao").css('color','green');
						$("div.ThongBao").html('Thêm thành công !');
						setTimeout(function(){ 
							$("#dialogThem").dialog('close');
							LoadDanhSach();
							}, 700);
					}
					// nếu thất bại
					else{
						$("div.ThongBao").css('color','red');
						$("div.ThongBao").html('Thêm KHÔNG thành công !');
					}
				},'json');
				
			});
			// key up  - tìm danh bạ
			$("input[name='MaSoThue']").on( "keyup", function(e){
				$('span.TenGoi').html('');
				var MaSoThue = $("input[name='MaSoThue']").val();
				$('img.loadingNNT').css('display','inline');
				data ={MaSoThue:MaSoThue,Action:'TimNNT'}
				$.get(baseUrl('source/DanhBaController.php'),data,function(json){
					$('img.loadingNNT').css('display','none');
					if(json.length==1){
						$('span.TenGoi').html(json[0]['tengoi']);
					}
				},'json');	
			} );
			
			
			
			//Khởi tạo dialogThem
			$( "#dialogThem" ).dialog({ 
				autoOpen: false,
				modal: true,
				width:'auto'
					});
			
			// nhấn nút thêm => tạo mở dialog
			$('button.them').click(function(){

				$("button.SubmitSua").css('display','none');
				$("button.SubmitThem").css('display','inline');
				
				$( "#dialogThem" ).dialog( "open" );
				
			});
			
			// nhất nút thoát dialogThem
			$('button.thoat').click(function(){
				$( "#dialogThem" ).dialog( "close" );
				
			});
			
			// Load danh sách
			$("button.load").click(function(e){
				$("input[name='MaSoThueLoad']").val('');
				$("span.TenGoi").html('');
				$("span.DiaChi").html('');
				LoadDanhSach();
			});
			// nhat nut edit show dialog
			$("a.edit").live('click',function(e){
				e.preventDefault();

				$("button.SubmitSua").css('display','inline');
				$("button.SubmitThem").css('display','none');
				$("h2.ThongBao").html("");
				row = $(this).parents('tr')[0];
				
				_id = $('td',row)[0].innerHTML;
				$("input[name='MaSoThue']").val($('td',row)[1].innerHTML);
				$("span.TenGoi").html($('td',row)[2].innerHTML);
				$("input[name='Ngay']").val($('td',row)[3].innerHTML);
				$("textarea[name='NoiDung']").val($('td',row)[4].innerHTML);
				TrangThai = $('td',row)[5].innerHTML;
				if(TrangThai==1){
					$("input[name='TrangThai']").attr('checked',true);
				}else{
					$("input[name='TrangThai']").attr('checked',false);
				}
				$("#dialogThem").dialog('open');
			});
			
			// nhan nut sua
			$("button.SubmitSua").on('click',function(e){
				e.preventDefault();
				Action = 'Sua';
				MaSoThue = $("input[name='MaSoThue']").val().trim();
				Ngay = $("input[name='Ngay']").val().trim();
				NoiDung = $("textarea[name='NoiDung']").val().trim();
				TrangThai = $("input[name='TrangThai']").attr("checked") ? 1 : 0;
				data={
						id : _id,
						Action : Action,
						MaSoThue :MaSoThue ,
						Ngay :Ngay,
						NoiDung:NoiDung,
						TrangThai :TrangThai
				};
				
				$.post(baseUrl('source/NhatKyController.php'),data,function(json){
					kq = json[0];
					
					if(kq == true){
						$("div.ThongBao").html("Sửa thành công !");
					}else{
						$("div.ThongBao").html("Sửa KHÔNG thành công !");
					}
					
					setTimeout(function(){
						$("#dialogThem").dialog('close');
						LoadDanhSach();
					},700);
				},'json');
			});
			
			// nhất nút delete 
			$("a.delete").live('click',function(e){
				e.preventDefault();
				$("h2.ThongBao").html("");
				row = $(this).parents('tr')[0];
				
				id = $('td',row)[0].innerHTML;
				data = {
						Action : 'Xoa',
						id : id
				}
				$.post(baseUrl('source/NhatKyController.php'),data,function(json){
					$("h2.ThongBao").html(json[0]);
					LoadDanhSach();
					setTimeout(function(){
						$("h2.ThongBao").html("");
					},3000);
				},'json');
			});
			
			
			
			
			//Load danh sách 
			function LoadDanhSach(){
				
				$("img.loading").css('display','inline');
				deleteAllRows();
				var NgayBD = $("input[name='NgayBD']").val().trim();
				var NgayKT = $("input[name='NgayKT']").val().trim();
				
				
				
				data = {
						'Action' : 'LoadDanhSach',
						'NgayBD' : NgayBD,
						'NgayKT' : NgayKT
				}
				
				$.get(baseUrl('source/NhatKyController.php'),data,function(json){
					
					DATA = json;
					for (i = 0; i < DATA.length; i++) {
						date =  DATA[i]['ngay'].split(" ")[0];
						ngay = date.split('-')[2];
						thang = date.split('-')[1];
						nam = date.split('-')[0];
						
						StringDate = ngay+'-'+thang+'-'+nam;
						
						tableNhatKy
						.fnAddData([
								DATA[i]['id'],
								DATA[i]['masothue'],
								DATA[i]['tengoi'],
								StringDate,
								DATA[i]['noidung'],
								DATA[i]['trangthai'],
								'<a class="edit" href="">Edit</a>',
								'<a class="delete" href="">Delete</a>',
								]);
						
					}

					$("img.loading").css('display','none');
	
				},'json');
				
			}
			
			
			
			
			
			
			tableNhatKy = $('#TableNhatKy')
			.dataTable({
				"aLengthMenu" : [[5, 15, 20, -1],
					[5, 15, 20, "All"]// change per
					// page values
					// here
				],
				// new 
				
				
				//*************************************
				"sScrollY": "350px",
				"sScrollX": "100%",
				/*"bScrollCollapse": true,*/
				//*************************************
				
				
				"bAutoWidth":false,
				"iDisplayLength" : -1,
				"sDom" : "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
				"sPaginationType" : "bootstrap",
				"oLanguage" : {
					"sLengthMenu" : "_MENU_",
					"oPaginate" : {
						"sPrevious" : "Prev",
						"sNext" : "Next"
					}
				},
				"aoColumnDefs" : [{
						'bSortable' : false,
						'aTargets' : [0]
					}
				]
			});
			
			function deleteAllRows() {

				var oSettings = tableNhatKy.fnSettings();
				var iTotalRecords = oSettings.fnRecordsTotal();
				for (i = 0; i <= iTotalRecords; i++) {
					tableNhatKy.fnDeleteRow(0, null, true);
				}

			}
		}
	};
}
();

jQuery(document).ready(function () {

	nhatky.init();
});