<?php 
    function loadall_binhluan($idpro){
        $sql = "
            SELECT binhluan.id, binhluan.noidung, taikhoan.user, binhluan.ngaybinhluan FROM `binhluan` 
            LEFT JOIN taikhoan ON binhluan.iduser = taikhoan.id
            LEFT JOIN sanpham ON binhluan.idpro = sanpham.id
            WHERE sanpham.id = $idpro;
        ";
        $listbl= pdo_query($sql);
        return $listbl;
    }
    // function insert_binhluan($idpro, $noidung){
    //     $date = date('Y-m-d');
    //     $sql = "
    //         INSERT INTO `binhluan`(`noidung`, `iduser`, `idpro`, `ngaybinhluan`) 
    //         VALUES ('$noidung','2','$idpro','$date');
    //     ";
    //     //echo $sql;
    //     //die;
    //     pdo_execute($sql);
    // }
function insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan){
    $sql="insert into binhluan(noidung,iduser,idpro,ngaybinhluan) values('$noidung','$iduser','$idpro','$ngaybinhluan')";
    pdo_execute($sql);
}

function loadall_binhluan1($idpro){
    $sql="SELECT * from binhluan where 1";
    if($idpro>0){
        $sql.=" AND idpro='".$idpro."'";
     }
     else{
        $sql.=" order by id desc";
    }
    $listbinhluan= pdo_query($sql);
    return $listbinhluan;
    var_dump($sql);
}

function delete_binhluan($id){
    $sql ="delete from binhluan where id=".$id;
    pdo_execute($sql);
}
?>