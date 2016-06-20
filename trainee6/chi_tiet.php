<?php
$id = $_GET['id'];
$sql = "SELECT * FROM profile WHERE ID =".$id;
$query = mysql_query($sql);
$row = mysql_fetch_array($query);

$sql1 = mysql_query("SELECT * FROM profile WHERE nguoi_gt = '".$row['TEN_DN']."'");
$row1 = mysql_fetch_array($sql1);

$quyen = '';
if(isset($_SESSION['quyen'])){
	$quyen = $_SESSION['quyen'];
} else{
	$quyen = 4;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chi tiết</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div class="main" style="padding:20px 0px 20px 20px; height:300px">
    <div id="left">
        <img src="anh/<?php if($row['ANH']!=''){echo $row['ANH'];} else{echo 'user.jpg';}?>" alt="anh_dai_dien" style="width:300px; height:300px"/>
    </div>
    
    <div id="right">
    	<ul>
            <li><p>Họ Tên: <span><?php echo $row['TEN'];?></span></p></li>
            <?php 
                if($quyen!=4){
            ?>
            <li><p>Email: <span><?php echo $row['EMAIL'];?></span></p></li>
            <li><p>Phone: <span><?php echo $row['PHONE'];?></span></p></li>
            <li><p>Mô tả: <span><?php echo $row['MO_TA'];?></span></p></li>
            <li><p>Danh sách giới thiệu: <span><?php echo $row1['TEN_DN'] ;?></span></p></li>
            <?php
                } else{echo '<span style="color: red;">Hãy đăng nhập để xem được nhiều hơn</span>';}
            ?>
        </ul>
    </div>
    
</div>
</body>
</html>
