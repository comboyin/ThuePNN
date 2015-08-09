
var hoso = function() {

	return {
		init : function() {
			
			function printImage(image)
			{
			        var printWindow = window.open('', 'Print Window','height=400,width=600');
			        printWindow.document.write('<html><head><title>Print Window</title>');
			        printWindow.document.write('</head><body ><img src=\'');
			        printWindow.document.write(image.src);
			        printWindow.document.write('\' /></body></html>');
			        printWindow.document.close();
			        printWindow.print();
			}
			
			
			initJpage();
			
			$('button.printHoSo').live('click',function(){
				var figureTag = $(this).parents('figure')[0];
				var image = $('img',figureTag)[0];
				printImage(image);
			});
			
			$('.zoom').magnificPopup({
				delegate: 'a',
				type: 'image',
				closeOnContentClick: false,
				closeBtnInside: false,
				mainClass: 'mfp-with-zoom mfp-img-mobile',
				image: {
					verticalFit: true,
					titleSrc: function(item) {
						return item.el.attr('title') + '<button class="printHoSo">Print</button>';
					}
				},
				gallery: {
					enabled: true
				},
				zoom: {
					enabled: true,
					duration: 300, // don't foget to change the duration also in CSS
					opener: function(element) {
						return element.find('img');
					}
				}
			});
			// key up  - tìm hồ sơ theo MST
			$("input[name='MaSoThue']").on( "keyup", function(e){
				
				var MaSoThue = $("input[name='MaSoThue']").val();
				$('span.TenGoi').html('');
				// destroy
				$("#ContentHoSo").html('');
				$("div.holder").jPages("destroy");
				
				// show loading
				$('img.loadingNNT').css('display','inline');
				data ={
						MaSoThue : MaSoThue,
						Action : 'LoadHS_MST'
					}
				$.get(baseUrl('source/HoSoController.php'),data,function(json){
					/*
					 * Trả về 1 phần từ
					 * json[0]['TenGoi']
					 * json[0]['Content']
					 * */
					$('img.loadingNNT').css('display','none');
					count = json['count'];
					
					if(count>0){
						$('span.TenGoi').html(json['TenGoi']);
						$("#ContentHoSo").html(json['Content']);
						initJpage();
						
					}
				},'json');	
			} );
			
			function initJpage(){
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