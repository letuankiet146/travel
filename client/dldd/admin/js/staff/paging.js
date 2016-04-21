(function($){
	$.fn.zPaging = function (options){
		//=================================================
		//Các giá trị mặt định của options
		//=================================================
		var defaults = {
				"rows": "#rows",
				"pages": "#pages",
				"update": "#update",
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
		var status = $(options.status);
		var paging = $(options.paging);
		var btnPrevious = $(options.btnPrevious);
		var btnNext = $(options.btnNext);
		var txtCurrentPage = $(options.txtCurrentPage);
		var lblpageInfo = $(options.pageInfo);
		var aRows = '';
		var aUpdate = '';
		
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
				url: 'controller/list-staff.php?type=count&items=' + options.items,
				type: 'GET',
				dataType: 'json'
			})
			.done(function(data) {
				options.total = data.total;
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
			paging.css("min-height",trHeight);
		}
		//=================================================
		//Hàm load các thông tin database đưa vào #rows
		//=================================================
		function loadData(page){
			$.ajax({
				url: 'controller/list-staff.php?type=list',
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
						var dayStart= val.staff_date_start; 
						var fdayStart = $.datepicker.formatDate( "dd-mm-yy", new Date(dayStart) );
						var str = 	'<tr item-id="' + val.staff_id + '">'+
										'<td>' + val.staff_code + '</td>'+
										'<td>' + val.staff_name + '</td>'+
										'<td class="text-center" id="from">' + val.staff_phone + '</td>'+
										'<td class="text-center" id="to">' + val.staff_email +'</td>'+
										'<td class="text-center">' + fdayStart +'</td>'+
										'<td class="text-center">'+ val.group_users_name + '</td>'+
										'<td class="text-center"><a id="update" href="#" title="Xem &#38; Sửa"><i class="fa fa-pencil"></i></a></td>'+
										'<td class="text-center"><a id="remove" href="#" title="Xóa"><i class="fa fa-trash-o"></i></a></td>'+
										'<td><input  type="checkbox" name="chk[]" class="chk" value="' + val.staff_id + '"></td>'+
									'</tr>';
						rows.append(str);
					});
					// lay top hop the a.
					aRows = options.rows + " tr td a#remove";
					$(aRows).on("click", function(e){
						var x = confirm("Bạn có chắc chắn xóa không?");
						if(x){
							deleteItem(this);
						}
					});
					aUpdate = options.rows + " tr td a#update";
					$(aUpdate).on("click", function(e){
						$(this).closest('.right').find('.add-edit').fadeIn("700");
						var itemID = $(this).closest('tr').attr("item-id");
						$.ajax({
							url: 'views/staff/edit-staff.php?staff_id=' + itemID,
							type: 'POST',
							dataType: 'text',
						})
						.done(function(data) {
							$("#title").html("Thông tin chi tiết");
							$("#loadingAjax").html(data);
						});
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
			var lastID = $(rows).children(':last').attr("item-id");
			var idUserAdd =$("#idUserAdd").val();
			
			//  ẩn item được xóa
			$(parent).fadeOut({
				durartion: 300,
				done: function(){
					$.ajax({
						url: 'http://103.47.194.91:8080/spr-data/staff/delete/' + itemID + '/' + idUserAdd,
						type: 'GET',
						dataType: 'json',
						statusCode: {
							404:function(){
								alert("khong tim thay trang.");
							},
							200:function(){
								$.ajax({
									url: 'controller/list-staff.php?type=one&id=' + lastID,
									type: 'GET',
									dataType: 'json'
								})
								.done(function(data) {
									if(data != false){
										var dayStart= data.staff_date_start; 
										var fdayStart = $.datepicker.formatDate( "dd-mm-yy", new Date(dayStart) );
										var str = 	'<tr item-id="' + data.staff_id + '">'+
														'<td>' + data.staff_code + '</td>'+
														'<td>' + data.staff_name + '</td>'+
														'<td class="text-center" id="from">' + data.staff_phone + '</td>'+
														'<td class="text-center" id="to">' + data.staff_email +'</td>'+
														'<td class="text-center">' + fdayStart +'</td>'+
														'<td class="text-center">'+ data.group_users_name + '</td>'+
														'<td class="text-center"><a id="update" href="#" title="Xem &#38; Sửa"><i class="fa fa-pencil"></i></a></td>'+
														'<td class="text-center"><a id="remove" href="#" title="Xóa"><i class="fa fa-trash-o"></i></a></td>'+
														'<td><input  type="checkbox" name="chk[]" class="chk" value="' + data.staff_id + '"></td>'+
													'</tr>';
										str = $(str).hide().appendTo(rows);
										$(str).fadeIn(150);
										init();
									}
								});
							}
						}
					});
					if(itemID == lastID && $(rows).children().length == 1){
						options.currentPage = options.currentPage - 1;
					}
					$(this).remove();
				}
			});	
		}
	}
})(jQuery);
$(document).ready(function(e) {
	var obj = {'items' : 8};
	$("#paging").zPaging(obj);
});