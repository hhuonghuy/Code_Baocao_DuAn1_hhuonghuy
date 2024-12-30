<?php
function getall_sanpham(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM sanphams");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}

function insert_sanpham($iddm, $tensp, $gia, $img, $soluong, $mota){
    $conn=connectdb();
    $sql = "INSERT INTO sanphams (ID_dm, Tensp, Gia, Hinhanh, Soluong, Mota)
    VALUES ('$iddm', '$tensp', '$gia', '$img', '$soluong', '$mota')";
    // use exec() because no results are returned
    $conn->exec($sql);
}

function getonesp($id){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM sanphams where ID=".$id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}

function updatesp($id, $tensp, $img, $gia, $iddm, $soluong, $mota){
    $conn=connectdb();
    if($img==""){
        $sql = "UPDATE sanphams SET Tensp='".$tensp."', Gia='".$gia."', ID_dm='".$iddm."', Soluong='".$soluong."', Mota='".$mota."' WHERE ID=".$id;
    }
    else{
        $sql = "UPDATE sanphams SET Tensp='".$tensp."', Gia='".$gia."', ID_dm='".$iddm."', Hinhanh='".$img."', Soluong='".$soluong."', Mota='".$mota."' WHERE ID=".$id;
    }
    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute();
}

function delsp($id){
    $conn=connectdb();
    $sql = "DELETE FROM sanphams WHERE ID=".$id;
    // use exec() because no results are returned
    $conn->exec($sql);
}
?>