(function($){
	$.fn.zPaging = function (options){
		//console.log("alo ola");
		//=================================================
		//Các giá trị mặt định của options
		//=================================================
		var defaults = {
				"rows": "#rows",
				"pages": "#pages",
				"paging": "#paging",
				"items": 3,
				"height": 57,
				"currentPage": 1,
				"total" : 0,
				"btnPrevious" : ".goprev",
				"btnNext" : ".gonext",
				"txtCurrentPage": "#CurrentPage",
				"pageInfo" : "#pageInfo"
			};
		options = $.extend(defaults, options);
		//=================================================
		//Các biến sử dụng trong Plugin
		//=================================================
		var rows = $(options.rows);
		var pages = $(options.pages);
		var paging = $(options.paging);
		var btnPrevious = $(options.btnPrevious);
		var btnNext = $(options.btnNext);
		var txtCurrentPage = $(options.txtCurrentPage);
		var lblpageInfo = $(options.pageInfo);
		var aRows = '';
		
		//=================================================
		//Khởi tạp các hàm
		//=================================================
		init();
		setRowsHeight();

		//=================================================
		//Ham khỏi động
		//=================================================
		function init(){
			// lay tong so trang
			$.ajax({
				url: 'controller/list-tour.php?type=count&items=' + options.items,
				type: 'GET',
				dataType: 'json'
			})
			.done(function(data) {
				options.total = data.total;
				//console.log(options);
				pageInfo();
				loadData(options.currentPage);
			});

			//Gán sự kiện vào btnPrevious  - btnNext - txtCurrentPage
			setCurrentPage(options.currentPage);
			
			btnPrevious.on("click", function(e){
				goPrevious();
				e.stopImmediatePropagation();
			});
			
			btnNext.on("click", function(e){
				goNext();
				e.stopImmediatePropagation();
			});

			txtCurrentPage.on("keyup", function(e){
				if(e.keyCode == 13){
					var currentPageValue = parseInt($(this).val());
					if(isNaN(currentPageValue) || currentPageValue <= 0 || currentPageValue > options.total){
						alert("Giá trị nhập vào không phù hợp");
					}
					else{
						loadData(currentPageValue);
						options.currentPage = currentPageValue;
						pageInfo();
					}
				}
			});


		}

		//=================================================
		//Hàm xử lý khi nhấn nut btnPrevious
		//=================================================
		function goPrevious(){

			if(options.currentPage != 1){
				var p = options.currentPage - 1;
				loadData(p);
				setCurrentPage(p);
				options.currentPage = p;
				pageInfo();
			}
		}

		//=================================================
		//Hàm xử lý khi nhấn nut btnNext
		//=================================================
		function goNext(){
			if(options.currentPage != options.total){
				var p = options.currentPage + 1;
				loadData(p);
				setCurrentPage(p);
				options.currentPage = p;
				pageInfo();
			}
		}
		//=================================================
		//Hàm xử lý giá trị vào
		//trong ô textbox currentPage
		//=================================================
		function setCurrentPage(value){
			txtCurrentPage.val(value);
		}

		//=================================================
		//Hàm hiển thị thông tin phân trang
		//=================================================
		function pageInfo(){
			lblpageInfo.text("Page " + options.currentPage + " of " + options.total);
		}

		//=================================================
		//Hàm thiết lập chiều cao
		//=================================================
		function setRowsHeight(){
			var trHeight = (options.items * options.height + 34) + "px";
			paging.css("height",trHeight);
		}
		//=================================================
		//Hàm load các thông tin database đưa vào #rows
		//=================================================
		function loadData(page){
			//console.log("loadata");
			$.ajax({
				url: 'controller/list-tour.php?type=list',
				type: 'POST',
				dataType: 'json',
				cache: false,
				data:{
					"items": options.items,
					"currentPage": page
				}
			})
			.done(function(data) {
				// console.log(data);
				if(data.length>0){
					rows.empty();
					$.each(data, function(i, val) {
					var str = 	'<tr item-id="' + val.tour_id + '">'+
									'<td><input type="checkbox" name="" value=""></td>'+
									'<td>' + val.tour_code + '</td>'+
									'<td>' + val.tour_name + '</td>'+
									'<td class="text-center">' + val.tour_day_start + '</td>'+
									'<td class="text-center">' + val.tour_day_end +'</td>'+
									'<td class="text-center">' + val.tour_seat_number +'</td>'+
									'<td>'+
										'<select>'+
											'<option value="1">Đang thực hiện</option>'+
											'<option value="2">Chưa thực hiện</option>'+
											'<option value="4">Đã thực hiện</option>'+
										'</select>'+
									'</td>'+
									'<td class="text-center"><a href="#" title="Cập nhật"><i class="fa fa-refresh"></i></a></td>'+
									'<td class="text-center"><a href="#" title="Sửa"><i class="fa fa-pencil"></i></a></td>'+
									'<td class="text-center"><a id="remove" href="#" title="Xóa"><i class="fa fa-trash-o"></i></a></td>'+
								'</tr>';
					rows.append(str);
					});
					// lay top hop the a.
					aRows = options.rows + " tr td a#remove";
					//console.log(aRows);
					$(aRows).on("click", function(e){
						deleteItem(this);
					});
				}
			});	
		}

		//=================================================
		//Hàm xóa một dòng trong #rows
		//=================================================
		function deleteItem(obj){
			var parent = $(obj).closest('tr');
			var itemID = $(parent).attr("item-id");
			var lastID = $(rows).children(':last').attr("item-id");;
			//console.log(lastID);
			//console.log(itemID);
			
			
			//  ẩn item được xóa
			$(parent).fadeOut({
				durartion: 300,
				done: function(){
					$.ajax({
						url: 'controller/list-tour.php?type=delete&id=' + itemID,
						type: 'GET',
						dataType: 'json'
					});
					if(itemID == lastID && $(rows).children().length == 1){
						options.currentPage = options.currentPage - 1;
					}
					init();
					$(this).remove();
				}
			});

			$.ajax({
				url: 'controller/list-tour.php?type=one&id=' + lastID,
				type: 'GET',
				dataType: 'json'
			})
			.done(function(data) {
				//console.log(data);
				if(data != false){
					var str = 	'<tr item-id="' + data.tour_id + '">'+
									'<td><input type="checkbox" name="" value=""></td>'+
									'<td>' + data.tour_code + '</td>'+
									'<td>' + data.tour_name + '</td>'+
									'<td class="text-center">' + data.tour_day_start + '</td>'+
									'<td class="text-center">' + data.tour_day_end +'</td>'+
									'<td class="text-center">' + data.tour_seat_number +'</td>'+
									'<td>'+
										'<select>'+
											'<option value="1">Đang thực hiện</option>'+
											'<option value="2">Chưa thực hiện</option>'+
											'<option value="4">Đã thực hiện</option>'+
										'</select>'+
									'</td>'+
									'<td class="text-center"><a href="#" title="Cập nhật"><i class="fa fa-refresh"></i></a></td>'+
									'<td class="text-center"><a href="#" title="Sửa"><i class="fa fa-pencil"></i></a></td>'+
									'<td class="text-center"><a id="remove" href="#" title="Xóa"><i class="fa fa-trash-o"></i></a></td>'+
								'</tr>';
					str = $(str).hide().appendTo(rows);
					$(str).fadeIn(300);
				}
			});
		}
	}
})(jQuery);
$(document).ready(function(e) {
	// var obj = {'items' : sodong};
	var obj = {'items' : 7};
	$("#paging").zPaging(obj);
});