<?php
// Jalankan file ini SEKALI saja di browser untuk reset user password jadi '123456'
$conn = new mysqli("localhost", "root", "", "latihan1");
$pass = password_hash("123456", PASSWORD_DEFAULT);
$conn->query("UPDATE users SET password = '$pass' WHERE username IN ('admin', 'user')");
echo "Password reset berhasil. Username: admin/user, Password: 123456";
?>