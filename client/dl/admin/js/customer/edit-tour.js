function click_load(){
	var giaTourKMDto=document.getElementById("giaTourKMDto");
	var soChoDto=document.getElementById("soChoDto");
	var giaTourDto=document.getElementById("giaTourDto");
	var number=/^[0-9.]+$/;
	var ngayKHDto=document.getElementById("ngayKHDto").value;

	if(this.loaitour.value < 1) {
      alert("Chọn loại tour");
      this.loaitour.focus();
      return false;
    }
	else if(this.idTourDto.value == "") {
      alert("Yêu cầu nhập mã tour");
      this.idTourDto.focus();
      return false;
    }
    else if(this.tourFromPlaceIdDto.value < 1) {
      alert("Chọn nơi khỏi hành");
      this.tourFromPlaceIdDto.focus();
      return false;
    }
    else if(!ngayKHDto.match(/^(0[1-9]|[12][0-9]|3[01])[\- \/.](?:(0[1-9]|1[012])[\- \/.](19|20)[0-9]{2})$/)) {
      alert("Định dạng chưa đúng");
      this.ngayKHDto.focus();
      return false;
    }
    else if(this.giaTourKMDto.value == "") {
      alert("Yêu cầu nhập giá tour KM");
      this.giaTourKMDto.focus();
      return false;
    }
    else if(!number.test(giaTourKMDto.value))
	{
		alert("Giá tour KM phải là số");
		giaTourKMDto.focus();
		return(false);
	}
	else if(this.soChoDto.value == "") {
      alert("Yêu cầu nhập số lượng");
      this.soChoDto.focus();
      return false;
    }
    else if(!number.test(soChoDto.value))
	{
		alert("Số lượng phải là số");
		soChoDto.focus();
		return(false);
	}
	else if(this.tourGuiderIdDto.value < 1) {
      alert("Chọn hướng dẫn viên");
      this.tourGuiderIdDto.focus();
      return false;
    }
    else if(this.tenTourDto.value == "") {
      alert("Yêu cầu nhập tên tour");
      this.soChoDto.focus();
      return false;
    }
    else if(this.tourArrivePlaceIdDto.value < 1) {
      alert("Chọn địa điểm đến");
      this.tourArrivePlaceIdDto.focus();
      return false;
    }
    else if(this.giaTourDto.value == "") {
      alert("Yêu cầu nhập giá tour");
      this.giaTourDto.focus();
      return false;
    }
    else if(!number.test(giaTourDto.value))
	{
		alert("Giá tour phải là số");
		giaTourDto.focus();
		return(false);
	}
	else if(this.idDichVuDto.value < 1) {
      alert("Chọn loại dịch vụ");
      this.idDichVuDto.focus();
      return false;
    }
    // else if(this.imageDto.value = "") {
    //   alert("Chọn hình đại diện");
    //   this.imageDto.focus();
    //   return false;
    // }
    else{
    	var full_url = document.URL;
		var url_array = full_url.split('&Id=');
		var id = url_array[url_array.length-1];
	    var idTourDto =$("#idTourDto").val();
	    var tourFromPlaceIdDto =$("#tourFromPlaceIdDto").val();
	    var ngayKHDto =$("#ngayKHDto").val();
	    var giaTourDto =$("#giaTourDto").val();
	    var soChoDto =$("#soChoDto").val();
	    var tourGuiderIdDto =$("#tourGuiderIdDto").val();
	    var tenTourDto =$("#tenTourDto").val();
	    var tourArrivePlaceIdDto =$("#tourArrivePlaceIdDto").val();
	    var ngayKTDto =$("#ngayKTDto").val();
	    var giaTourKMDto =$("#giaTourKMDto").val();
	    var idDichVuDto =$("#idDichVuDto").val();
	    //var imageDto =$("#imageDto").val();
	    var imageDto=document.getElementsByName("imageDto").value;
	    console.log(imageDto);
	    var activeDto =$("#activeDto").val();
	    var infoDto =CKEDITOR.instances['infoDto'].getData();
		var mydata = {
			idDto: id,
			idTourDto: idTourDto,
		   	tenTourDto: tenTourDto,
		   	infoDto: infoDto,
		   	imageDto: imageDto,
		   	soChoDto: soChoDto,
		   	giaTourDto: giaTourDto,
		   	giaTourKMDto: giaTourKMDto,
		   	ngayKHDto: ngayKHDto,
		   	ngayKTDto:ngayKTDto,
		   	idDichVuDto: idDichVuDto,
		   	viewDto: null,
		   	activeDto: activeDto,
		   	tourArrivePlaceIdDto: tourArrivePlaceIdDto,
		   	tourGuiderIdDto: tourGuiderIdDto,
		   	tourFromPlaceIdDto: tourFromPlaceIdDto,
		   	tourDeleteDateDto: null
		};
		console.log(mydata);
		$.ajax({
			url : "http://project-iuhhappytravel.rhcloud.com/spr-data/tour/updateTour",
			type: "POST",
			dataType: "json",
			contentType: "application/json", 
			data :JSON.stringify(mydata),
			beforeSend: function () {
                $('.add-edit').append('<div class="gif"><img src="images/preloader.GIF" /></div><div class="f_overlay"></div>');
            },
			success: function(data){ 

			},
			statusCode: {
				404:function(){
					alert("khong tim thay trang");
					document.location.href='index.php';
				},
				200:function(){
					alert("Cập nhật thành công");
					document.location.href='index.php?page=list-tour';
				},
				500:function(){
					alert("Lỗi cập nhật!!! Vui lòng kiểm tra dữ liệu nhập vào");
					document.location.href='index.php?page=edit-tour&Id=' + id;
				}
			}
		});
	}
}
