<script>
function del(){
	var conf = confirm("Bạn có chắc muốn xóa?");
	return conf;
}
</script>


<?php
ob_start();
include_once('ketnoi.php');

if(isset($_GET['page'])){
	$page = $_GET['page'];
} else{
	$page = 1;
}
$num =10;
$sort = 'ID';
if(isset($_POST['submit'])){
    if($_POST['num'] == 'unselect'){
        $num = 10;
    } else{
        $num = $_POST['num'];
    }
    
    if($_POST['sort'] == 'unselect'){
        $sort = 'ngay';
    } else{
        $sort = 'TEN';
    }
}
$row_per_page= $num;
$per_row = $page*$row_per_page-$row_per_page;
$sql = "SELECT * FROM profile INNER JOIN privilege ON profile.ID_QUYEN = privilege.ID_QUYEN ORDER BY ".$sort." ASC LIMIT ".$per_row.", ".$row_per_page;
$query = mysql_query($sql);

$list_page='';
$total_row = mysql_num_rows(mysql_query("SELECT * FROM profile"));
$total_page = ceil($total_row/$row_per_page);

for($i=1; $i<=$total_page; $i++){
	if($page==$i){
		$list_page .= '<span>'.$i.'</span> ';
	}
	else{
		$list_page .= '<a href="index.php?page='.$i.'">'.$i.'</a> ';
	}
}

$quyen = '';
if(isset($_SESSION['quyen'])){
	$quyen = $_SESSION['quyen'];
} else{
	$quyen = 4;
}

$ten_dn = '';
if(isset($_SESSION['dn_ten'])){
	$ten_dn = $_SESSION['dn_ten'];
} else{
	$ten_dn = 4;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Trang Chủ</title>
</head>

<body>
<div class="main">
    <h2 style=" margin-bottom:20px; float:left; padding-left:10px; padding-right: 20px; ">Danh Sách Người Dùng</h2>
    <form method="post" style="padding-top: 5px;">
        <select name="num" id="num">
            <option value="unselect" selected="selected">Số lượng hiển thị</option>
            <option value=10>10</option>
            <option value=20>20</option>
            <option value=50>50</option>
            <option value=100>100</option>
        </select>
        
        <select name="sort" id="sort">
            <option value="unselect" selected="selected">Sắp xếp theo ngày</option>
            <option value="1">Sắp xếp theo tên</option>
        </select>
        <input type="submit" name="submit" value="Hiển thị"/>
    </form>
    <div style="margin: 0px 150px 50px; clear: both; ">
            <div class="prd" style="width: 10%">ID</div>
            <div class="prd" style="width: 20%">Ảnh</div>
            <div class="prd" style="width: 30%">Họ Tên</div>
            <div class="prd" style="width: 20%">Chi Tiết</div>
            <?php if($quyen ==1 || $quyen==2) 
			echo '<div class="prd" style="width: 9%">Sửa</div>';?>
            <?php if($quyen ==1 || $quyen==2) 
			echo '<div class="prd" style="width: 9%">Xóa</div>';?>
            
    </div>
    <?php
        $stt=1;
        while($row = mysql_fetch_array($query)){$id=$row['ID']; $ten = $row['TEN_DN'];
    ?>
    <div style="margin: 0px 150px 50px; clear: both">
            <div class="prd1" style="width: 10%"><?php echo $stt;?></div>
            <div class="prd1" style="width: 20%; padding-top: 0px; height: 50px"><img src="anh/<?php if($row['ANH'] != ''){echo $row['ANH'];} else{echo 'user.jpg';}?>" width="50px" height="50px"/></div>
            <div class="prd1" style="width: 30%"><?php echo $row['TEN'];?></div>
            <div class="prd1" style="width: 20%"><a href="index.php?page_layout=chi_tiet&id=<?php echo $id;?>">Chi Tiết</a></div>
            <?php if($quyen ==1 || $quyen==2 || $ten_dn == $ten) 
			echo '<div class="prd1" style="width: 9%"><a href="index.php?page_layout=chinh_sua&id='.$id.'">Sửa</a></div>';?>
            <?php if($quyen ==1 || $quyen==2) 
			echo '<div class="prd1" style="width: 9%"><a onclick="return del();" href="xoa_user.php?id='.$id.'">Xóa</a></div>';?>
            
    </div>
    <?php
        $stt++;}
    ?>
   
    <div style="float:right; margin-right:30px; font-weight:bold; color:#F60; font-size:20px;"><?php echo $list_page;?></div>
</div>
</body>
</html>
