<?php 
    include('admin/connectDB.php');
    include('include/tour/function.php');

    include('header.php');
    $page="";
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        switch ($page) {
            case 'trang-chu':include("trang-chu.php");break;
            case 'gioi-thieu':include("gioi-thieu.php");break;
            case 'tour-noi-dia':include("tour-noi-dia.php");break;
            case 'tour-quoc-te':include("tour-quoc-te.php");break;
            case 'cam-nang-du-lich':include("cam-nang-du-lich.php");break;
            case 'lien-he':include("lien-he.php");break;
            case 'chi-tiet-tour':include("chi-tiet-tour.php");break;
            case 'dat-tour':include("dat-tour.php");break;
            case 'tour-giam-gia':include("tour-giam-gia.php");break;
            case 'tour-sap-khoi-hanh':include("tour-sap-khoi-hanh.php");break;
            case 'tour-di-nhieu':include("tour-di-nhieu.php");break;
            case 'thanh-toan':include("thanh-toan.php");break;
            case 'ket-qua-tim-kiem':include("ket-qua-tim-kiem.php");break;
            default:include("404.php");break;
        }
    }
    else{
        include("trang-chu.php");
    }
    include('footer.php');
?>