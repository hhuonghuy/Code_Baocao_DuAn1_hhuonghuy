<?php
session_start();
ob_start();
include "../model/connectdb.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
//connectdb();

include "view/header.php";
//controller
if(isset($_GET['act'])){
    switch ($_GET['act']) {
        case 'danhmuc':
            $kq = getall_dm();
            include "view/danhmuc.php";
            break;

        case 'adddm':
            if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                $tendm = $_POST['tendm'];
                themdm($tendm);
            }
            $kq = getall_dm();
            include "view/danhmuc.php";
            break;

        case 'deldm':
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                deldm($id);
            }
            $kq = getall_dm();
            include "view/danhmuc.php";
            break;  

        case 'updatedmform':
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                $kqone=getonedm($id);

                $kq = getall_dm();
                include "view/updatedmform.php";
            }
            if(isset($_POST['id'])){
                $id=$_POST['id'];
                $tendm=$_POST['tendm'];
                updatedm($id, $tendm);

                $kq = getall_dm();
                include "view/danhmuc.php";
            }
            break;

        case 'sanpham':
            $dsdm = getall_dm();
            $kq =  getall_sanpham();

            include "view/sanpham.php";
            break;

        case 'sanpham_add':
            if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $gia = $_POST['gia'];
                $soluong = $_POST['soluong'];
                $mota = $_POST['mota'];
                $target_dir = "../uploaded/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                $img=$target_file;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                echo "Chỉ nhận ảnh JPG, JPEG, PNG hoặc GIF.";
                $uploadOk = 0;
                }
                if ($uploadOk==1) {
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                    insert_sanpham($iddm, $tensp, $gia, $img, $soluong ,$mota);
                }
            }
            $dsdm = getall_dm();
            $kq =  getall_sanpham();
            include "view/sanpham.php";
            break;

        case 'updatespform':
            $dsdm = getall_dm();
                
            if(isset($_GET['id'])&&($_GET['id']>0)){
                $spct = getonesp($_GET['id']);
            }
            $kq =  getall_sanpham();
        include "view/updatespform.php";
        break;

        case 'sanpham_update':
            $dsdm = getall_dm();
            
            if(isset($_POST['capnhat'])&&($_POST['capnhat']>0)){
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $gia = $_POST['gia'];
                $id = $_POST['id'];
                $soluong = $_POST['soluong'];
                $mota = $_POST['mota'];

                if($_FILES["hinh"]["name"]!=""){
                $target_dir = "../uploaded/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                $img=$target_file;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                    echo "Chỉ nhận ảnh JPG, JPEG, PNG hoặc GIF.";
                    $uploadOk = 0;
                }

                if ($uploadOk==1) {
                move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                //insert_sanpham($iddm, $tensp, $gia, $img);
                } 
                }
                else{
                    $img="";
                }
                updatesp($id, $tensp, $img, $gia, $iddm, $soluong, $mota);
            }
            $kq =  getall_sanpham();
        include "view/sanpham.php";
        break;

        case 'donhang':
            include "view/donhang.php";
           break;

        case 'taikhoan':
            include "view/login.php";
            break;
           
        default:
            include "view/home.php";
            break;
    }
}
else{
    include "view/home.php";
}

include "view/footer.php";
?>