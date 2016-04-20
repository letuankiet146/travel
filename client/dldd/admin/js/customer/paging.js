(function($){
	$.fn.zPaging = function (options){
		//=================================================
		//Các giá trị mặt định của options
		//=================================================
		var defaults = {
				"rows": "#rows",
				"rowsContact": "#rowsContact",
				"pages": "#pages",
				"status": "#status",
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
		var rowsContact = $(options.rowsContact);
		var pages = $(options.pages);
		var status = $(options.status);
		var paging = $(options.paging);
		var btnPrevious = $(options.btnPrevious);
		var btnNext = $(options.btnNext);
		var txtCurrentPage = $(options.txtCurrentPage);
		var lblpageInfo = $(options.pageInfo);
		var aRows = '';
		var aStatus = '';
		
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
				url: 'controller/list-customer.php?type=count&items=' + options.items,
				type: 'GET',
				dataType: 'json'
			})
			.done(function(data) {
				options.total = data.total;
				pageInfo();
				loadData(options.currentPage);
				loadDataContact(options.currentPage);
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
						loadDataContact(currentPageValue);
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
				loadDataContact(p);
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
				loadDataContact(p);
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
			$.ajax({
				url: 'controller/list-customer.php?type=list',
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
					var str = 	'<tr item-id="' + val.customer_id + '">'+
									'<td>' + val.customer_code + '</td>'+
									'<td>' + val.customer_name + '</td>'+
									'<td>' + val.customer_email + '</td>'+
									'<td class="text-center" id="from">' + val.customer_phone + '</td>'+
									'<td class="text-center" id="to">3</td>'+
									'<td class="text-center">'+
										'<select class="status" id="customerGroupDto">'+
											'<option value="' + val.customer_group +'">' + val.group_users_name +'</option>'+
											'<option value="0">-----------------</option>'+
											'<option value="7">Khách vãng lai</option>'+
											'<option value="8">Khách hàng tiềm năng</option>'+
											'<option value="9">Khách hàng thân thiết</option>'+
											'<option value="10">Khách VIP</option>'+
										'</select>'+
										'<div id="load_status"></div>'+
									'</td>'+
									'<td class="text-center"><a id="update" href="#" title="Xem &#38; Sửa"><i class="fa fa-info-circle"></i></a></td>'+
									'<td class="text-center"><a id="remove" href="#" title="Xóa"><i class="fa fa-trash-o"></i></a></td>'+
									'<td><input type="checkbox" name="chk[]" class="chk" value="' + val.customer_id + '"></td>'+
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
					aStatus = options.rows + " tr td select.status";
					$(aStatus).on("change", function(e){
						update_status(this);
					});

					aRows = options.rows + " tr td a#update";
					$(aRows).on("click", function(e){
						$(this).closest('.right').find('.add-edit').fadeIn("700");
						var itemID = $(this).closest('tr').attr("item-id");
						$.ajax({
							url: 'views/customer/edit-customer.php?customer_id=' + itemID,
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
		//Hàm load các thông tin ý kiến khách hàng đưa vào #rowsContact
		//=================================================
		function loadDataContact(page){
			$.ajax({
				url: 'controller/list-customer.php?type=list1',
				type: 'POST',
				dataType: 'json',
				cache: false,
				data:{
					"items": options.items,
					"currentPage": page
				}
			})
			.done(function(data) {
				if(data.length>0){
					rowsContact.empty();
					$.each(data, function(i, val) {
					var dayStart= val.tour_day_start; 
					var fdayStart = $.datepicker.formatDate( "dd-mm-yy", new Date(dayStart) );
					var dayEnd = val.tour_day_end; 
					var fdayEnd = $.datepicker.formatDate( "dd-mm-yy", new Date(dayEnd) );
					var str = 	'<tr item-id="' + val.tour_id + '">'+
									'<td><input type="checkbox" name="" value=""></td>'+
									'<td>' + val.tour_code + '</td>'+
									'<td>' + val.tour_code + '</td>'+
									'<td>' + val.tour_name + '</td>'+
									'<td class="text-center">'+
										'<select class="status">'+
											'<option value="' + val.tour_active +'">' + val.status_name +'</option>'+
											'<option value="0">-----------------</option>'+
											'<option value="1">Đã phẩn hồi</option>'+
											'<option value="2">Chưa phản hồi</option>'+
										'</select>'+
										'<div id="load_status"></div>'+
									'</td>'+
									'<td class="text-center"><a id="update" href="index.php?page=edit-customer&Id=' + val.tour_id + '" title="Xem &#38; Sửa"><i class="fa fa-info-circle"></i></a></td>'+
									'<td class="text-center"><a id="remove" href="#" title="Xóa"><i class="fa fa-trash-o"></i></a></td>'+
								'</tr>';
					rowsContact.append(str);
					});
					// lay top hop the a.
					aRows = options.rowsContact + " tr td a#remove";
					$(aRows).on("click", function(e){
						var x = confirm("Bạn có chắc chắn xóa không?");
						if(x){
							deleteItem(this);
						}
					});
					aStatus = options.rowsContact + " tr td select.status";
					$(aStatus).on("change", function(e){
						update_status(this);
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
						url: 'http://localhost:8080/spr-data/customer/delete/' + itemID + '/' + idUserAdd,
						type: 'GET',
						dataType: 'json',
						statusCode: {
							404:function(){
								alert("khong tim thay trang.");
							},
							200:function(){
								$.ajax({
									url: 'controller/list-customer.php?type=one&id=' + lastID,
									type: 'GET',
									dataType: 'json'
								})
								.done(function(data) {
									if(data != false){
										var str = 	'<tr item-id="' + data.customer_id + '">'+
														'<td>' + data.customer_code + '</td>'+
														'<td>' + data.customer_name + '</td>'+
														'<td>' + data.customer_email + '</td>'+
														'<td class="text-center" id="from">' + data.customer_phone + '</td>'+
														'<td class="text-center" id="to">3</td>'+
														'<td class="text-center">'+
															'<select class="status" id="customerGroupDto">'+
																'<option value="' + data.customer_group +'">' + data.group_users_name +'</option>'+
																'<option value="0">-----------------</option>'+
																'<option value="7">Khách vãng lai</option>'+
																'<option value="8">Khách hàng tiềm năng</option>'+
																'<option value="9">Khách hàng thân thiết</option>'+
																'<option value="10">Khách VIP</option>'+
															'</select>'+
															'<div id="load_status"></div>'+
														'</td>'+
														'<td class="text-center"><a id="update" href="index.php?page=edit-customer&Id=' + data.customer_id + '" title="Xem &#38; Sửa"><i class="fa fa-info-circle"></i></a></td>'+
														'<td class="text-center"><a id="remove" href="#" title="Xóa"><i class="fa fa-trash-o"></i></a></td>'+
														'<td><input type="checkbox" class="chk" name="chk[]" value="' + data.customer_id + '" /></td>'+
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

		//=================================================
		//Hàm update status
		//=================================================
		function update_status(obj){
			var status =$(obj).closest('tr').find('.status').val();
			var itemID = $(obj).closest('tr').attr("item-id");
			var idUserAdd =$("#idUserAdd").val();
    		var customerGroupDto =$("#customerGroupDto").val();
			var mystatus = {
				"customerIdDto": itemID,
			    "customerGroupDto": customerGroupDto,
			    "idUserAdd": idUserAdd
			};
			console.log(mystatus);
			$.ajax({
				url: 'http://localhost:8080/spr-data/customer/update/',
				type: 'POST',
				contentType: 'application/json',
				data:JSON.stringify(mystatus),
				beforeSend: function(){
					$(obj).closest('tr').find('#load_status').append('<img src="images/loader.gif" />');
				},
				success: function(data){

				},
				statusCode: {
					404:function(){
						alert("khong tim thay trang");
					},
					200:function(){
						setTimeout(function(){
							$(obj).closest('tr').find('#load_status').css("display","none");
						}, 2000);
					}
				}
			});
		//});
		}
	}
})(jQuery);
$(document).ready(function(e) {
	// var obj = {'items' : sodong};
	var obj = {'items' : 9};
	$("#paging").zPaging(obj);
});