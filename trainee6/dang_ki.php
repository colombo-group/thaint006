<?php

if(isset($_SESSION['dn_ten'])&& isset($_SESSION['pass'])){
	header('location:index.php');
}
else{
?>
<?php
include_once('check.php');

if(isset($_POST['submit']) && $_POST['submit'] != ''){
	if($_POST['ho_ten']==''){
		$error_ho_ten = '<span style="color:red">(*)</span>';		
	}
	else
		$ho_ten = $_POST['ho_ten'];
	//
	if($_POST['ten_dn']==''){
		$error_ten_dn = '<span style="color:red">(*)</span>';
	} else{
		if ( mysql_num_rows(mysql_query("SELECT TEN_DN FROM profile WHERE TEN_DN='".$_POST["ten_dn"]."'"))>0){
        	$error_ten_dn = '<span style="color:red">Tên đăng nhập đã tồn tại. Vui lòng chọn tên khác </span>';
    	}
    	else
    	$ten_dn = $_POST['ten_dn'];
	}
	//	
	if($_POST['email']==''){
		$error_email = '<span style="color:red">(*)</span>';
	} else{		
		if (!checkMail($_POST["email"]))
		{
			$error_email = '<span style="color:red">Email không hợp lệ.</span>';
		} 
		else{
			if ( mysql_num_rows(mysql_query("SELECT EMAIL FROM profile WHERE EMAIL='".$_POST["email"]."'"))>0)
			{
				$error_email = '<span style="color:red">Email đã tồn tại. Vui lòng chọn email khác </span>';
			} else{
				$email = $_POST['email'];	
			}
		}
	}
		
	//	
	if($_POST['phone']==''){
		$error_phone = '<span style="color:red">(*)</span>';
	} else{		
		if ( mysql_num_rows(mysql_query("SELECT PHONE FROM profile WHERE PHONE='".$_POST["phone"]."'"))>0){
        	$error_phone = '<span style="color:red">SĐT đăng nhập đã tồn tại. Vui lòng chọn số khác </span>';
    	} else{
			$phone = $_POST['phone'];
		}
	}
        //
        if($_POST['nguoi_gt']!=''){
            $ngt = $_POST['nguoi_gt'];
            $sql1 = mysql_query("SELECT * FROM profile WHERE TEN_DN='".$ngt."' OR EMAIL ='".$ngt."'");
            if(mysql_num_rows($sql1)<=0){
                $error_ngt = '<span style="color:red">Người này chưa có tài khoản</span>';
            } 
        }
	//	
	if($_POST['mat_khau']==''){
		$error_mat_khau = '<span style="color:red">(*)</span>';
	}
	elseif(strlen($_POST['mat_khau'])<6){
		$error_mat_khau = '<span style="color:red">Mật khẩu phải có ít nhất 6 kí tự</span>';
	} else{
		$mat_khau = $_POST['mat_khau'];
	}
	//	
	if($_POST['nhap_lai']==''){
		$error_nhap_lai = '<span style="color:red">(*)</span>';
	}
	else{		
		if($_POST['nhap_lai']!=$mat_khau){
			$error_nhap_lai = '<span style="color:red">Mật khẩu không trùng nhau. Nhập lại.</span>';
		}
		else
		$nhap_lai = $_POST['nhap_lai'];
	}
	//	
	//if(isset($_FILES['anh_dd']) && $_FILES['anh_dd']['name']!=''){
		//$anh_dd = $_FILES['anh_dd']['name'];
		//$tmp_name = $_FILES['anh_dd']['tmp_name'];
	//}
	if(empty($error_ho_ten) && empty($error_ten_dn) && empty($error_ngt) && empty($error_email) && empty($error_phone) && empty($error_mat_khau) && empty($error_nhap_lai)){
		
		if(isset($_FILES['anh_dd']) && $_FILES['anh_dd']['name']!=''){
			//die();
			//echo "ok";
			$anh_dd = $_FILES['anh_dd']['name'];
			$tmp_name = $_FILES['anh_dd']['tmp_name'];
			$upload_file = move_uploaded_file($tmp_name, 'anh/'.$anh_dd);
                }
		$sql = "INSERT INTO profile(TEN, TEN_DN, EMAIL, PHONE, ANH, MAT_KHAU, ID_QUYEN, nguoi_gt) VALUES ('$ho_ten', '$ten_dn', '$email', '$phone', '$anh_dd', '$mat_khau', 3, '$ngt') ";
		$query = mysql_query($sql);
		header('location:index.php?page_layout=dang_nhap');
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng kí</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div class="main">
<form method="post" enctype="multipart/form-data">
<table>
	<tr>
    	<td colspan="2"><h2> ĐĂNG KÍ TÀI KHOẢN</h2></td>
    </tr>
	<tr>
    	<td>Họ Tên:</td>
        <td><input type="text" placeholder="Họ tên đầy đủ của bạn" name="ho_ten" /><?php if(isset($error_ho_ten)){echo $error_ho_ten;}?></td>
    </tr>
    
    <tr>
    	<td>Tên Đăng Nhập:</td>
        <td><input type="text" placeholder="Dùng để đăng nhập vào trang web" name="ten_dn" /><?php if(isset($error_ten_dn)){echo $error_ten_dn;}?></td>
    </tr>
    
    <tr>
    	<td>Email:</td>
        <td><input type="text" placeholder="Email của bạn" name="email" /><?php if(isset($error_email)){echo $error_email;}?></td>
    </tr>
    
    <tr>
    	<td>Phone:</td>
        <td><input type="text" placeholder="Số điện thoại của bạn" name="phone" /><?php if(isset($error_phone)){echo $error_phone;}?></td>
    </tr>
    
    <tr>
    	<td>Người Giới Thiệu:</td>
        <td><input type="text" placeholder="Người giới thiệu" name="nguoi_gt" /><?php if(isset($error_ngt)){echo $error_ngt;}?></td>
    </tr>
    
    <tr>
    	<td>Mật Khẩu:</td>
        <td><input type="password" placeholder="Ít nhất 6 ký tự gồm chữ cái và số" name="mat_khau" /><?php if(isset($error_mat_khau)){echo $error_mat_khau;}?></td>
    </tr>
    
    <tr>
    	<td>Nhập Lại Mật Khẩu:</td>
        <td><input type="password" placeholder="Nhập lại mật khẩu " name="nhap_lai" /><?php if(isset($error_nhap_lai)){echo $error_nhap_lai;}?></td>
    </tr>
    
    <tr>
    	<td>Ảnh Đại Diện:</td>
        <td><input type="file" name="anh_dd" /><?php if(isset($error_anh_dd)){echo $error_anh_dd;}?></td>
    </tr>
    
</table>
<button type="submit" name="submit" class="button" value="submit">Đăng Kí</button>
</form>
</div>
</body>
<?php
}
?>
</html>