<?php
session_start();
session_destroy();
header("location:index.php?page_layout=dang_nhap");
?>