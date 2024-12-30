<?php

function deldm($id){
    $conn=connectdb();
    $sql = "DELETE FROM danhmucs WHERE ID=".$id;
    // use exec() because no results are returned
    $conn->exec($sql);
}

function getonedm($id){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM danhmucs where ID=".$id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}

function updatedm($id, $tendm){
    $conn=connectdb();
    $sql = "UPDATE danhmucs SET Tendm='".$tendm."' WHERE ID=".$id;
    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute();
}

function themdm($tendm){
    $conn=connectdb();
    $sql = "INSERT INTO danhmucs (Tendm)
    VALUES ('$tendm')";
    // use exec() because no results are returned
    $conn->exec($sql);
}

function getall_dm(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM danhmucs");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
?>