<?php
if(isset($_SESSION['dn_ten']) && isset($_SESSION['pass'])){
	$ten_dn = $_SESSION['dn_ten'];
	$pass = $_SESSION['pass'];
    if(isset($_POST['submit'])){
	if($_POST['mat_khau_cu']==''){
		$error_mk_cu = '<span style="color:red">(*)</span>';
	} elseif($_POST['mat_khau_cu']!=$pass){
		$error_mk_cu = '<span style="color:red">Mật khẩu sai</span>';
	} else{
		$mk_cu = $_POST['mat_khau_cu'];
	}

	if($_POST['mat_khau']==''){
		$error_mat_khau = '<span style="color:red">(*)</span>';
	}
	elseif(strlen($_POST['mat_khau'])<6){
		$error_mat_khau = '<span style="color:red">Mật khẩu phái có ít nhất 6 kí tự</span>';
	} else{
		$mat_khau = $_POST['mat_khau'];
	}
	//	
	if($_POST['nhap_lai']==''){
		$error_nhap_lai = '<span style="color:red">(*)</span>';
	}
	else{		
		if($_POST['nhap_lai']!=$_POST['mat_khau']){
			$error_nhap_lai = '<span style="color:red">Mật khẩu không trùng nhau. Nhập lại.</span>';
		}
		else
		$nhap_lai = $_POST['nhap_lai'];
	}
	if(isset($mk_cu) && isset($mat_khau) && isset($nhap_lai)){
		$sql = "UPDATE profile SET MAT_KHAU = '".$mat_khau."' WHERE TEN_DN = '".$ten_dn."'";
		$query = mysql_query($sql);
		header('location:index.php');
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sửa Thông Tin</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div class="main">
<form method="post">
<table>
	<tr>
    	<td colspan="2"><h2>ĐỔI MẬT KHẨU</h2></td>
    </tr>
    
    <tr>
    	<td>Mật Khẩu Cũ:</td>
        <td><input type="password" placeholder="Mật khẩu cũ" name="mat_khau_cu" /><?php if(isset($error_mk_cu)){echo $error_mk_cu;}?></td>
    </tr>
    
    <tr>
    	<td>Mật Khẩu Mới:</td>
        <td><input type="password" placeholder="Ít nhất 6 ký tự gồm chữ cái và số" name="mat_khau" /><?php if(isset($error_mat_khau)){echo $error_mat_khau;}?></td>
    </tr>
    
    <tr>
    	<td>Nhập Lại Mật Khẩu:</td>
        <td><input type="password" placeholder="Nhập lại mật khẩu " name="nhap_lai" /><?php if(isset($error_nhap_lai)){echo $error_nhap_lai;}?></td>
    </tr>
    
</table>
<button type="submit" name="submit" class="button">HOÀN THÀNH</button>
</form>
</div>
</body>
<?php
}
else{
	header('location:index.php?page_layout=dang_nhap');
}
?>
</html>
