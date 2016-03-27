<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đằng nhập</title>
</head>
<style type="text/css">
    body{
        font-family:arial;
    }
    #wapper{
        border:1px solid #bbb;
        margin:auto;
        border-radius:5px;
        overflow:hidden;
        margin-top:200px;
        width:475px;
        background: #eee;
    }
    #bor{
        height:180px;
        width:420px;
        background:url(images/khoa-bg.png) no-repeat #fff;
        float: right;
        margin:25px;
        border: 1px solid #ccc;
    }
    div.title{
        background:#777;
        height:35px ;
        line-height:30px;
        color:#fff;
        padding:0;
        margin:0;
        font-weight:bold;
        text-align:center;
    }
    form.lgin{
        padding-top:40px;
        font-size:13px;
        padding-left:100px;
    }
    input[type='text'],input[type='password']{
        border:1px solid #ccc;
        padding:3px 7px;
    }
    input.sublogin{
        padding:4px 10px;
        background:#ccc;
        border:none;
        margin:10px 10px 0px 0px;
        cursor:pointer;
    }
    input.sublogin:hover{
        background:#777;
        color:#fff
    }
</style>
<body>
    <div id="wapper">
    <div class="title">Đăng nhập</div>
    <div id="bor">
        <center>
            <form class="lgin" method="POST" action="controller/login.php">
            <table>
            <tr>
                <td>Tên đăng nhập:</td>
                <td><input class="user" type="text" name="username" required /></td>
            </tr>
            <tr>
                 <td>Mật khẩu:</td>
                 <td><input class="pass" type="password" name="password" required /></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="sublogin" type="submit" name="login" value="Đăng nhập"><input class="sublogin" type="reset" name="huy" value="hủy"></td>
            </tr>	
            </form>
        </center>
    </div>
    </div>
        </div>
</body>
</html>