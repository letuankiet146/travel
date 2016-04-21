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
				url: 'controller/list-handbook.php?type=count&items=' + options.items,
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
				url: 'controller/list-handbook.php?type=list',
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
						var dayStart= val.date_create; 
						var fdayStart = $.datepicker.formatDate( "dd-mm-yy", new Date(dayStart) );
						var str = 	'<tr item-id="' + val.id + '">'+
										'<td>' + val.code + '</td>'+
										'<td>' + val.name + '</td>'+
										'<td class="text-center" id="from">' + fdayStart + '</td>'+
										'<td class="text-center" id="to">' + val.area +'</td>'+
										'<td class="text-center">'+
											'<select class="status">'+
												'<option value="' + val.status +'">' + val.status_name +'</option>'+
												'<option value="0">-----------------</option>'+
												'<option value="7">Hiển thị</option>'+
												'<option value="8">Không hiển thị</option>'+
											'</select>'+
											'<div id="load_status"></div>'+
										'</td>'+
										'<td class="text-center"><a id="update" href="#" title="Xem &#38; Sửa"><i class="fa fa-pencil"></i></a></td>'+
										'<td class="text-center"><a id="remove" href="#" title="Xóa"><i class="fa fa-trash-o"></i></a></td>'+
										'<td><input  type="checkbox" name="chk[]" class="chk" value="' + val.id + '"></td>'+
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
							url: 'views/handbook/edit-handbook.php?handbook_id=' + itemID,
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
				durartion: 3000,
				done: function(){
					$.ajax({
						// url: 'controller/list-handbook.php?type=delete&id=' + itemID,
						url: 'http://103.47.194.91:8080/spr-data/handbook/delete/' + itemID + '/' + idUserAdd,
						type: 'GET',
						dataType: 'json',
						statusCode:{
							200:function(){
								init();
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
			var mystatus = {
				id: itemID,
			   	statuDto: status,
			   	idUserAdd:idUserAdd
			};
			console.log(mystatus);
			$.ajax({
				url: 'http://103.47.194.91:8080/spr-data/handbook/update',
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
					},
					500:function(){
						alert("Lỗi server!!!");
					}
				}
			});
		//});
		}
	}
})(jQuery);
$(document).ready(function(e) {
	var obj = {'items' : 8};
	$("#paging").zPaging(obj);
});