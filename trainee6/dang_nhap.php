<?php
$status_login = true;
//if(isset($_SESSION['fail']['count'])){
//    $count = $_SESSION['fail']['count'];
//} else{
//    $count = 0;
//}
//var_dump($count);
if(isset($_SESSION['fail']['time']) && isset($_SESSION['start'])){
	$lock = time() - $_SESSION['fail']['time'] -  2*60*60;//60 * 60;
	$check = time() - $_SESSION['start'] - 60;
	if($check <= 0){
		if($_SESSION['fail']['count'] >=2){
			$status_login = false;
		}	
	}else{
		$_SESSION['fail']['count'] = 0;
	}
	if($lock > 0){
		$status_login = true;
		$_SESSION['fail']['count'] = 0;
	}
}
if(isset($_SESSION['dn_ten'])&& isset($_SESSION['pass'])){
	header('location:index.php');
}
else{
    if(isset($_POST['submit']) && $_POST['submit'] != ''){
	if($_POST['dn_ten']==''){
		$error = 'Vui lòng nhập đầy đủ Tài khoản & Mật khẩu.';	
	}	
	else{
		$dn_ten = $_POST['dn_ten'];	
	}
	
	if($_POST['pass']==''){
		$error = 'Vui lòng nhập đầy đủ Tài khoản & Mật khẩu.';	
	}	
	else{
		$pass = $_POST['pass'];	
	}
	
	if(isset($dn_ten) && isset($pass)){
		$sql = "SELECT * FROM profile WHERE TEN_DN = '".$dn_ten."' or EMAIL = '".$dn_ten."' and MAT_KHAU = '".$pass."'";
		$query = mysql_query($sql);
		}
		if(mysql_num_rows($query)>0){
                    $row=mysql_fetch_array($query);
			$_SESSION['dn_ten'] = $row['TEN_DN'];
			$_SESSION['pass'] = $pass;			
			$_SESSION['quyen'] = $row['ID_QUYEN'];
				header('location: index.php');
		}
		else{
			$error = 'Tài khoản hoặc mặt khẩu không hợp lệ';
                        //if(isset($_SESSION['fail']['count']))
                        $_SESSION['fail']['count'] += 1;
			$_SESSION['fail']['time'] = time();
			if($_SESSION['fail']['count'] == 1){
				$_SESSION['start'] = time();
			}
		}
		
		/*if(sqlsrv_has_rows($stmt)){
			$_SESSION['tk'] = $tk;
			$_SESSION['mk'] = $mk;
			header('location:Danh_Sach.php');		
		}
		else{
			$error = 'Tài khoản hoặc mặt khẩu không hợp lệ';
		}*/
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Đăng Nhập</title>
</head>

<body>

<form method="post">
    <?php if($status_login):?>
        <div class="main">
                <h2><?php if(isset($error)){?>
                                <script>
                                var str = '<?php echo $error?>';
                                        alert(str);
                                </script>

                        <?php 
                                }
                        ?></h2>
                <table>
                <tr>
                    <td>Email hoặc Tên đăng nhập:</td>
                    <td><input type="text" name="dn_ten" /></td>
                    </tr>

                <tr>
                    <td>Mật Khẩu:</td>
                    <td><input type="password" name="pass"  /></td>
                    </tr>
            </table>
            <button type="submit" value="1" class="button" name="submit">Đăng Nhập</button>
        </div>
    <?php else :?>
        <div style="color: red; text-align: center; margin-top: 100px; font-size: 20px;">
                Bạn đã đăng nhập sai quá 3 lần<br> 
                Đăng nhập bị khóa <br> 
                Vui lòng đăng nhập lại sau 2 tiếng nữa !
        </div>
    <?php endif;?>
</form>
</body>
<?php
}
?>
</html>
