<?php
require 'connect.php';
if(isset($_POST['btn-reg'])){
    echo "<pre>";
    print_r($_POST);
    $username = $_POST[`Tentk`];
    $password = $_POST[`Matkhau`];
    if(!empty($username)&&!empty($password)){
        //echo "<pre>";
        //print_r($_POST);

        $sql = "INSERT INTO `users` (`Tentk`, `Matkhau`) value('$username', '$password')";
    
        if($conn->query($sql)===TRUE){
            echo "Lưu dữ liệu thành công";
        }else{
            echo "Lỗi {$sql}".$conn->error;
        }
    }else{
        echo "ban can nhap username va password";
    }
}
?>
<br>
<a href="view/login.php">Qua trang admin</a>