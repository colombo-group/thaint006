<?php
include_once('check.php');

$id = $_GET['id'];
$sql = "SELECT * FROM profile WHERE ID= ".$id;
$query = mysql_query($sql);
$row = mysql_fetch_array($query);
if (isset($_POST['submit']) && $_POST['submit'] != '') {
    if ($_POST['ho_ten'] == '') {
        $error_ho_ten = '<span style="color:red">(*)</span>';
    } else {
        $ho_ten = $_POST['ho_ten'];
    }
    //
    if ($_POST['ten_dn'] == '') {
        $error_ten_dn = '<span style="color:red">(*)</span>';
    } elseif ($_POST['ten_dn'] != $row['TEN_DN']) {
        if (mysql_num_rows(mysql_query("SELECT TEN_DN FROM profile WHERE TEN_DN='" . $_POST["ten_dn"] . "'")) > 0) {
            $error_ten_dn = '<span style="color:red">Tên đăng nhập đã tồn tại. Vui lòng chọn tên khác </span>';
        } else {
            $ten_dn = $_POST['ten_dn'];
        }
    } else {
        $ten_dn = $row['TEN_DN'];
    }
    //	
    if ($_POST['email'] == '') {
        $error_email = '<span style="color:red">(*)</span>';
    } elseif ($_POST['email'] != $row['EMAIL']) {
        if (!checkMail($_POST["email"])) {
            $error_email = '<span style="color:red">Email không hợp lệ.</span>';
        } else {
            if (mysql_num_rows(mysql_query("SELECT EMAIL FROM profile WHERE EMAIL='" . $_POST["email"] . "'")) > 0) {
                $error_email = '<span style="color:red">Email đã tồn tại. Vui lòng chọn email khác </span>';
            } else {
                $email = $_POST['email'];
            }
        }         
    } else {
             $email = $row['EMAIL'];
        }
    //	
    if ($_POST['phone'] == '') {
        $error_phone = '<span style="color:red">(*)</span>';
    } elseif ($_POST['phone'] != $row['PHONE']) {
        if (mysql_num_rows(mysql_query("SELECT PHONE FROM profile WHERE PHONE='" . $_POST["phone"] . "'")) > 0) {
            $error_phone = '<span style="color:red">SĐT đăng nhập đã tồn tại. Vui lòng chọn số khác </span>';
        } else {
            $phone = $_POST['phone'];
        }
    } else {
        $phone = $row['PHONE'];
    }


    //	
    if ($_FILES['anh_dd']['name'] == '') {
        $anh_dd = $_POST['anh_dd'];
       // $anh_dd = $row['ANH'];
    } else {
        $anh_dd = $_FILES['anh_dd']['name'];
        $tmp_name = $_FILES['anh_dd']['tmp_name'];
    }
    //	
    if ($_POST['mo_ta'] == '') {
        $error_mo_ta = '<span style="color:red">(*)</span>';
    } else {
        $mo_ta = $_POST['mo_ta'];
    }
    //
    if (empty($error_ho_ten) && empty($error_ten_dn) && empty($error_email) && empty($error_phone) && empty($error_ho_ten) && empty($error_anh_dd) && empty($error_mo_ta)) {
        //$anh_dd = $_FILES['anh_dd']['name'];
        //$tmp_name = $_FILES['anh_dd']['tmp_name'];
        $upload_file = move_uploaded_file($tmp_name, 'anh/' . $anh_dd);

        $sql1 = "UPDATE profile SET TEN='" . $ho_ten . "', TEN_DN='" . $ten_dn . "', EMAIL='" . $email . "', PHONE='" . $phone . "', ANH='" . $anh_dd . "', MO_TA='" . $mo_ta . "' WHERE ID=" . $id . "";
        $query1 = mysql_query($sql1);
        header('location:index.php?page_layout=chi_tiet&id=' . $id . '');
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
<div class="main" >
<form method="post" enctype="multipart/form-data">
<table>
	<tr>
    	<td colspan="2"><h2> CHỈNH SỬA THÔNG TIN</h2></td>
    </tr>
	<tr>
    	<td>Họ Tên:</td>
        <td><input type="text" placeholder="Họ tên đầy đủ của bạn" name="ho_ten" value="<?php echo $row['TEN']?>" /><?php if(isset($error_ho_ten)){echo $error_ho_ten;}?></td>
    </tr>
    
    <tr>
    	<td>Tên Đăng Nhập:</td>
        <td><input type="text" placeholder="Dùng để đăng nhập vào trang web" name="ten_dn" value="<?php echo $row['TEN_DN']?>" /><?php if(isset($error_ten_dn)){echo $error_ten_dn;}?></td>
    </tr>
    
    <tr>
    	<td>Email:</td>
        <td><input type="text" placeholder="Email của bạn" name="email" value="<?php echo $row['EMAIL']?>" /><?php if(isset($error_email)){echo $error_email;}?></td>
    </tr>
    
    <tr>
    	<td>Phone:</td>
        <td><input type="text" placeholder="Số điện thoại của bạn" name="phone" value="<?php echo $row['PHONE']?>" /><?php if(isset($error_phone)){echo $error_phone;}?></td>
    </tr>
    
    <tr>
    	<td>Ảnh Đại Diện:</td>
        <td><input type="file" name="anh_dd" /><input type="hidden" name="anh_dd" value="<?php echo $row['ANH'];?>" /></td>
    </tr>
    
    <tr>
    	<td>Mô Tả:</td>
        <td><textarea cols="30" rows="6" name="mo_ta" placeholder="Hãy giới thiệu về bản thân"><?php echo $row['MO_TA'];?></textarea><?php if(isset($error_mo_ta)){echo $error_mo_ta;}?></td>
    </tr>
</table>
<button type="submit" name="submit" class="button" value="submit">HOÀN THÀNH</button>
</form>
</div>
</body>
</html>
