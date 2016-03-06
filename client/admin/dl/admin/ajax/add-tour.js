

function click_load(){
// 	$(document).ready(function(){
//     var yourArray = [];
//     $("body.cke_show_borders").find("p").each(function(){
//         if(($.trim($(this).html()).length>0)){
//          yourArray.push($(this).html());
//         }
//     });
//     console.log(yourArray);
// });


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
    var imageDto =$("#imageDto").val();
    var infoDto =CKEDITOR.instances['infoDto'].getData();
    console.log(infoDto);
	var mydata = {
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
	   	activeDto: 1,
	   	tourArrivePlaceIdDto: tourArrivePlaceIdDto,
	   	tourGuiderIdDto: tourGuiderIdDto,
	   	tourFromPlaceIdDto: tourFromPlaceIdDto,
	   	tourDeleteDateDto: null
	};
	$.ajax({
		url : "http://project-iuhhappytravel.rhcloud.com/spr-data/tour/addTour",
		type: "POST",
		dataType: "json",
		contentType: "application/json", 
		data :JSON.stringify(mydata),
		success: function(data){ 
			//location.reload();
		},
		statusCode: {
			404:function(){
				alert("khong tim thay trang");
			},
			200:function(){
				alert("Tạo tour thành công");
				location.reload();

			}
		}
	});

}