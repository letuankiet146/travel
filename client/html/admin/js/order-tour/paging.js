(function($){
	$.fn.zPaging = function (options){
		//=================================================
		//Các giá trị mặt định của options
		//=================================================
		var defaults = {
				"rows": "#rows",
				"pages": "#pages",
				"status": "#status",
				"paging": "#paging",
				"items": 3,
				"height": 93,
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
		var orderDetail = $(options.orderDetail);
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
				url: 'controller/order-tour.php?type=count&items=' + options.items,
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
				url: 'controller/order-tour.php?type=list',
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
					rows.empty();
					$.each(data, function(i, val) {
						var dayOrder= val.form_order_date; 
						var form_order_date = $.datepicker.formatDate( "dd-mm-yy", new Date(dayOrder) );
						var str = 	'<tr item-id="' + val.form_order_id + '">'+
										'<td>' + val.form_order_code + '</td>'+
										'<td>'+
											'<div>Họ tên: <strong>' + val.customer_name + '</strong><span class="red"> (' + val.group_users_name + ')</span></div>'+
											'<div>Email : ' + val.customer_email + '</div>'+
											'<div>Điện thoại : ' + val.customer_phone + '</div>'+
											'<div>Địa chỉ : ' + val.customer_address + '</div>'+
										'</td>'+
										'<td class="text-center">' + form_order_date + '</td>'+
										'<td class="text-center">' + numeral(val.form_order_money).format('0,0') + '</td>'+
										'<td class="text-center">'+
											'<select class="status" id="formOrderIsPayDto">'+
												'<option value="' + val.form_order_is_pay + '">' + val.status_name + '</option>'+
												'<option value="0">---------------</option>'+
												'<option value="5">Đã thanh toán</option>'+
												'<option value="6">Chưa thanh toán</option>'+
											'</select>'+
											'<div id="load_status"></div>'+
										'</td>'+
										'<td class="text-center"><a class="btn-view" href="#" title="Xem chi tiết"><i class="fa fa-info-circle"></i></a></td>'+
										'<td class="text-center"><a id="remove" href="#" title="Xóa"><i class="fa fa-trash-o"></i></a></td>'+
										'<td><input class="chk" type="checkbox" name="chk[]" value="' + val.form_order_id + '"></td>'+
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
					aRows = options.rows + " tr td a.btn-view";
					$(aRows).on("click", function(e){
						$(this).closest('.right').find('.add-edit').fadeIn(500);
						var itemID = $(this).closest('tr').attr("item-id");
						$.ajax({
							url: 'views/order-tour/order-detail.php',
							type: 'POST',
							dataType: 'text',
							data:{itemID: itemID},
							// context: document.body,
						})
						.done(function(data) {
							$("#orderDetail").html(data);
						})
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
						url: 'http://103.47.194.91:8080/spr-data/delete/' + itemID + '/' + idUserAdd,
						type: 'GET',
						dataType: 'json',
						statusCode:{
							404:function(){
								alert("Không tìm thấy trang.");
							},
							200:function(){
								$.ajax({
									url: 'controller/order-tour.php?type=one&id=' + lastID,
									type: 'GET',
									dataType: 'json'
								})
								.done(function(data) {
									if(data != false){
										var dayOrder= data.form_order_date; 
										var form_order_date = $.datepicker.formatDate( "dd-mm-yy", new Date(dayOrder) );
										var str = 	'<tr item-id="' + data.form_order_id + '">'+
															'<td>' + data.form_order_code + '</td>'+
															'<td>'+
																'<div>Họ tên: <strong>' + data.customer_name + '</strong><span class="red"> (' + data.group_users_name + ')</span></div>'+
																'<div>Email : ' + data.customer_email + '</div>'+
																'<div>Điện thoại : ' + data.customer_phone + '</div>'+
																'<div>Địa chỉ : ' + data.form_order_id + '</div>'+
															'</td>'+
															'<td class="text-center">' + form_order_date + '</td>'+
															'<td class="text-center">' + numeral(data.form_order_money).format('0,0') + '</td>'+
															'<td class="text-center">'+
																'<select class="status" id="formOrderIsPayDto">'+
																	'<option value="' + data.form_order_is_pay + '">' + data.status_name + '</option>'+
																	'<option value="0">---------------</option>'+
																	'<option value="5">Đã thanh toán</option>'+
																	'<option value="6">Chưa thanh toán</option>'+
																'</select>'+
															'</td>'+
															'<td class="text-center"><a class="btn-view" href="#" title="Xem chi tiết"><i class="fa fa-info-circle"></i></a></td>'+
															'<td class="text-center"><a id="remove" href="#" title="Xóa"><i class="fa fa-trash-o"></i></a></td>'+
															'<td><input class="chk" type="checkbox" name="chk[]" value="' + data.form_order_id + '"></td>'+
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
			var formOrderIsPayDto =$("#formOrderIsPayDto").val();
			var mystatus = {
				"formOrderIdDto": itemID,
				"formOrderIsPayDto": formOrderIsPayDto,
				"idUserAdd": idUserAdd
			};
			console.log(mystatus);
			$.ajax({
				url: 'http://103.47.194.91:8080/spr-data/updateOrderTour',
				type: "POST",
				dataType: "json",
				contentType: "application/json", 
				data :JSON.stringify(mystatus),
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
						init();
					}
				}
			});
		}
	}
})(jQuery);
$(document).ready(function(e) {
	// var obj = {'items' : sodong};
	var obj = {'items' : 6};
	$("#paging").zPaging(obj);
});