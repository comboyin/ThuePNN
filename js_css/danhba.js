


var danhba = function () {

	var _iddanhba = '';
	var TableDanhBa;
	
	return {
		init : function () {

			$("button.SubmitThem").click(function(e){
				e.preventDefault();
				$('img.loading').css('display','inline');
				Action = 'Them';
				MaSoThue =$("input[name='MaSoThue']").val().trim();
				TenGoi=$("input[name='TenGoi']").val().trim();
				SoNha=$("input[name='SoNha']").val().trim();
				TenDuong=$("input[name='TenDuong']").val().trim();
				Todp=$("input[name='Todp']").val().trim();
				
				data={
						Action : Action,
						MaSoThue :MaSoThue ,
						TenGoi :TenGoi,
						SoNha:SoNha,
						TenDuong :TenDuong,
						Todp:Todp
				};
				$.post(baseUrl('source/DanhBaController.php'),data,function(json){
					$('img.loading').css('display','none');
					kq = json;
					// nếu thành công 
					if(kq['kq']==true){
						$("div.ThongBao").css('color','green');
						$("div.ThongBao").html('Thêm thành công !');
						setTimeout(function(){ 
							$("#dialogThem").dialog('close');
							resetTable();
							}, 700);
					}
					// nếu thất bại
					else{
						$("div.ThongBao").css('color','red');
						$("div.ThongBao").html(kq['mess']);
					}
					setTimeout(function(){ 
						
						$("div.ThongBao").html('');
						}, 700);
				},'json');
				
			});
			
			
			$("button.SubmitSua").click(function(e){
				e.preventDefault();
				$('img.loading').css('display','inline');
				Action = 'Sua';
				MaSoThue =$("input[name='MaSoThue']").val().trim();
				TenGoi=$("input[name='TenGoi']").val().trim();
				SoNha=$("input[name='SoNha']").val().trim();
				TenDuong=$("input[name='TenDuong']").val().trim();
				Todp=$("input[name='Todp']").val().trim();
				
				data={
						Action : Action,
						iddanhba : _iddanhba,
						MaSoThue :MaSoThue ,
						TenGoi :TenGoi,
						SoNha:SoNha,
						TenDuong :TenDuong,
						Todp:Todp
				};
				$.post(baseUrl('source/DanhBaController.php'),data,function(json){
					$('img.loading').css('display','none');
					kq = json;
					// nếu thành công 
					if(kq['kq']==true){
						$("div.ThongBao").css('color','green');
						$("div.ThongBao").html('Sửa thành công !');
						setTimeout(function(){ 
							$("#dialogThem").dialog('close');
							resetTable();
							
							}, 700);
					}
					// nếu thất bại
					else{
						$("div.ThongBao").css('color','red');
						$("div.ThongBao").html(kq['mess']);
					}
					setTimeout(function(){ 
						$("div.ThongBao").html('');
						}, 700);
				},'json');
				
			});
			
			
			function deleteAllRows() {

				var oSettings = TableDanhBa.fnSettings();
				var iTotalRecords = oSettings.fnRecordsTotal();
				for (i = 0; i <= iTotalRecords; i++) {
					TableDanhBa.fnDeleteRow(0, null, true);
				}

			}
			
			$("button.restart").click(function(e){
				resetTable();
			});
			
			function resetTable(){
				deleteAllRows();
				loadDanhBa();
			}
			
			function loadDanhBa(){
				$("img.loading").css('display','inline');
				$.get(baseUrl('source/DanhBaController.php'),{Action:'LoadDanhBa'},function(json){
					DATA = json;
					for (i = 0; i < DATA.length; i++) {
						TableDanhBa
						.fnAddData([
								DATA[i]['iddanhba'],
								DATA[i]['masothue'],
								DATA[i]['tengoi'],
								DATA[i]['sonha'],
								DATA[i]['tenduong'],
								DATA[i]['todp'],
								'<a class="edit" href="">Edit</a>',
								'<a class="delete" href="">Delete</a>',
								]);
						
					}

					$("img.loading").css('display','none');
				},'json')
			}
			
			$("#dialogThem").dialog(
					{ 
						autoOpen: false,
						modal: true,
						width:'auto'
							}
			);
			
			$("button.them").click(function(){
				$("button.SubmitThem").css('display','inline');
				$("button.SubmitSua").css('display','none');
				$("div.ThongBao").html('');
				$("input[name='MaSoThue']").val('');
				$("input[name='TenGoi']").val('');
				$("input[name='SoNha']").val('');
				$("input[name='TenDuong']").val('');
				$("input[name='Todp']").val('');
				$("#dialogThem").dialog('open');
				
			});
			
			$("a.edit").live('click',function(e){
				e.preventDefault();
				$("button.SubmitThem").css('display','none');
				$("button.SubmitSua").css('display','inline');
				$("div.ThongBao").html('');
				tr = $(this).parents('tr')[0];
				var aData = TableDanhBa.fnGetData(tr);
				
				_iddanhba = aData[0].trim();
				MaSoThue = aData[1].trim();
				TenGoi = aData[2].trim();
				SoNha = aData[3].trim();
				TenDuong = aData[4].trim();
				
				  Todp = aData[5].trim();
				
				$("input[name='MaSoThue']").val(MaSoThue);
				$("input[name='TenGoi']").val(TenGoi);
				$("input[name='SoNha']").val(SoNha);
				$("input[name='TenDuong']").val(TenDuong);
				$("input[name='Todp']").val(Todp);
				$("#dialogThem").dialog('open');
			});
			
			$("a.delete").live('click',function(e){
				e.preventDefault();
				$('img.loading').css('display','inline');
				
				$("h2.ThongBao").html('');
				tr = $(this).parents('tr')[0];
				
				var aData = TableDanhBa.fnGetData(tr);
				
				_iddanhba = aData[0].trim();
				$.post(baseUrl('source/DanhBaController.php'),{Action : 'Xoa',iddanhba:_iddanhba},function(json){
					$('img.loading').css('display','none');
					kq = json;
					// nếu thành công 
					if(kq['kq']==true){
						$("h2.ThongBao").css('color','green');
						$("h2.ThongBao").html('Xóa thành công !');
						resetTable();

					}
					// nếu thất bại
					else if(kq['kq']==false){
						$("h2.ThongBao").css('color','red');
						$("h2.ThongBao").html(kq['mess']);
						
					}
					setTimeout(function(){ 
						
						$("h2.ThongBao").html('');
						}, 3000);
					
				},'json');
				
				
			});
			
			$("button.thoat").click(function(){
				$("#dialogThem").dialog('close');
				
				
			});
			
			TableDanhBa = $('#TableDanhBa')
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
						'aTargets' : [1],
						'bSortable' : false,
						
					},
					{
						'aTargets' : [0],
						'bVisible' : false,
						
					}
				]
			});
			
		}
	};
}
();

jQuery(document).ready(function () {

	danhba.init();
});