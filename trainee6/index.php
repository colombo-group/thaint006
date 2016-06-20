<?php
ob_start();
session_start();
include_once('ketnoi.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trang Chủ</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>

	<div id="header">
    	<ul>
        	<li><a href="index.php">Trang chủ</a></li>
            <li><a href="index.php?page_layout=dang_nhap">Đăng nhập</a></li>
            <li><a href="index.php?page_layout=dang_ki">Đăng kí</a></li>
            <li><a href="index.php?page_layout=doi_mk">Đổi mật khẩu</a></li>
            <?php if(isset($_SESSION['dn_ten'])){echo '<li><a href="index.php?page_layout=dang_xuat">Đăng xuất</a></li>';}?>
        </ul>
        <p style="font-size:16px; color:#FF0; padding:20px 0px 0px 20px">Xin chào <?php if(isset($_SESSION['dn_ten']))
		{ echo $_SESSION["dn_ten"];} else{echo ", hãy đăng kí nếu bạn chưa có tài khoản";}?></p>
    </div>
    <?php
	if(isset($_GET['page_layout'])){
    switch($_GET['page_layout']){
		case'dang_nhap':include_once('dang_nhap.php');
			break;
		case'dang_ki':include_once('dang_ki.php');
			break;
		case'doi_mk':include_once('doi_mk.php');
			break;
		case'dang_xuat':include_once('dang_xuat.php');
			break;
		case'chi_tiet':include_once('chi_tiet.php');
			break;
		case'chinh_sua':include_once('chinh_sua.php');
			break;
		}
	}
	 else {include_once('danh_sach.php');}
	?>
</body>
</html>