<?php
function viewcart($del){
  global $img_path;
                    $tong=0;
                    $i = 0;
                    if($del==1){
                        $xoasp_th='<th>Thao Tác </th>';
                        }else{
                            $xoasp_th='';
                            $xoasp_td='';
                        }
                        echo '<tr>
                        <th>Hình</th>
                        <th>Sản Phẩm</th>
                        <th>Đơn Giá</th>
                        <th>Số Lượng</th>
                        <th>Thành Tiền </th>
                        '.$xoasp_th.'
                    </tr>';
                    foreach($_SESSION['mycart'] as $cart){
                        $hinh=$img_path.$cart[2];
                        $ttien=$cart[3]*$cart[4];
                        $tong+=$ttien;
                        if($del==1){
                        $xoasp_td='<a href="index.php?act=delcart&idcart='.$i.'"><input  class="mr20" type="button" value="Xóa" onclick="return confirm(\'Bạn có chắc muốn xóa\')"></a>';
                        
                        }else{
                            $xoasp_td='';
                        }
                        echo
                        '
                        <tr>
                        <td><img src="'.$hinh.'" alt="" height="200 "></td>
                        <td>'.$cart[1].'</td>
                        <td>'.$cart[3].'</td>
                        <td>'.$cart[4].'</td>
                        <td>'.$ttien.'</td>
                        <td>'.$xoasp_td.'</td>
                        </tr>';
                        $i+=1;
                    }
                    echo '<tr>
                    <td colspan="4">Tổng Đơn Hàng</td>
                    <td>'.$tong.'</td>
                    <td></td>
                    </tr>
                    ';
                   
}
function tongdonhang(){
    
                      $tong=0;
                      
                      foreach($_SESSION['mycart'] as $cart){
                         $ttien=$cart[3]*$cart[4];
                         $tong+=$ttien;
                         
                          
                      }
                    return  $tong;
                     
  }
  function insert_bill($name,$email,$address,$tel,$ngaydathang,$tongdonhang,$pttt){
    $sql="insert into bill(bill_name,bill_email,bill_address,bill_tel,bill_pttt,,ngaydathang,total) values('$name','$email','$address','$tel','$pttt','$ngaydathang','$tongdonhang ')";
    return pdo_execute_return_lastInsertID($sql);
}
function insert_cart($iduser,$idpro,$img,$name,$price,$soluong,$thanhtien,$idbill){
    $sql="insert into cart(iduser,idpro,img,name,price,soluong,,thanhtien,idbill) values('$iduser','$idpro','$img','$price','$soluong','$thanhtien','$idbill')";
    return pdo_execute_return_lastInsertID($sql);
}

?>