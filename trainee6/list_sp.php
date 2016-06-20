<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
	$sql="SELECT * FROM TBL_SANPHAM";
	$stmt = sqlsrv_query($con, $sql);
		if( $stmt === false) {
    	die( print_r( sqlsrv_errors(), true) );
	}
	
	while ($row = sqlsrv_fecth_array($stmt)){
		$sanpham[] = array(
			"id" => $row['ID_SANPHAM'],
			"ten" => $row['TEN_SP'],
			"id_ncc" => $row['ID_NCC'],
			"gia" => $row['GIA'],
			"anh" => $row['ANH_SP'],
			"bao_hanh" => $row['BAO_HANH'],
			"tinh_trang" => $row['TINH_TRANG'],
			"chi_tiet" => $row['CHI_TIET_SP'],
			"phu_kien" => $row['PHU_KIEN'],
			"trang_thai" => $row['TRANG_THAI'],
		);
		echo ('1111');
	}
?>
<body>
</body>
</html>