<?php
function loadall_sanpham_home(){
    $sql="SELECT * FROM sanpham WHERE is_deleted = 0 order by id desc limit 0,9";
    $listsanpham=pdo_query($sql);
    return  $listsanpham;   
}
function loadall_sanpham_top10(){
    $sql="SELECT * FROM sanpham WHERE is_deleted = 0 order by luotxem desc limit 0,10";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham($keyw="",$iddm=0){
    $sql="SELECT * FROM sanpham WHERE is_deleted = 0";
    // where 1 tức là nó đúng
    if($keyw!=""){
        $sql.=" and name like '%".$keyw."%'";
    }
    if($iddm>0){
        $sql.=" and iddm ='".$iddm."'";
    }
    $sql.=" order by id desc";
    $listsanpham=pdo_query($sql);
    return  $listsanpham;
}

// 
// function loadone_sanpham($id){
//     $sql = "select * from sanpham where id = $id";
//     $result = pdo_query_one($sql);
//     return $result;
// }
function load_sanpham_cungloai($id, $iddm){
    $sql = "select * from sanpham where iddm = $iddm and id <> $id";
    $result = pdo_query($sql);
    return $result;
}
///
function insert_sanpham($tensp,$giasp,$hinh,$mota,$iddm){
    $sql= "insert into sanpham(name,price,img,mota,iddm) values('$tensp','$giasp','$hinh','$mota','$iddm')";
    pdo_execute($sql);  
}
function delete_sanpham($id){
    $sql="delete from `sanpham` where sanpham.id=".$id;
    
    pdo_execute($sql);
}
function loadone_sanpham($id){
    $sql="select * from sanpham where id=".$id ;
    $sanpham=pdo_query_one($sql); 
return $sanpham;
}

function update_sanpham($id,$iddm,$tensp,$giasp,$mota,$hinh){
    if($hinh!=""){
    $sql="UPDATE sanpham set iddm ='".$iddm."', name ='".$tensp."',price ='".$giasp."',mota ='".$mota."',img ='".$hinh."' where id=".$id;
    }else{
    $sql="update sanpham set iddm ='".$iddm."', name ='".$tensp."',price ='".$giasp."',mota ='".$mota."' where id=".$id;}
     pdo_execute($sql);
}
function an_sp($id){
    $sql = "UPDATE sanpham SET is_deleted = 1 WHERE id =" .$id;
                    pdo_execute($sql);
}
function hien_sp($id){
    $sql = "UPDATE sanpham SET is_deleted = 0 WHERE id =" .$id;
                    pdo_execute($sql);
}