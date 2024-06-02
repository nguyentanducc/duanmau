<?php
session_start();
session_destroy();
echo '<h1> Session đã hủy</h1>';
echo '<a href="1.php">Khởi tạo</a><br>';
echo '<a href="3.php">Huỷ session</a>';
?>