<main class="catalog  mb ">
<div class="boxleft">
<div class="row2">
<form action="index.php?act=billcomfilm" method="post">
<div class="row2 mb10 formds_loai ">           
<div class="box_title">
                THÔNG TIN ĐẶT HÀNG
            </div> 
            <table>
                <?php
                if(isset($_SESSION['user'])){
                    $name=$_SESSION['user']['user'];
                    $address=$_SESSION['user']['address'];
                    $email=$_SESSION['user']['email'];
                    $tel=$_SESSION['user']['tel'];
                }else{
                    $name="";
                    $address="";
                    $email="";
                    $tel="";
                }
                ?>
                <tr>
                    <td>NGƯỜI ĐẶT HÀNG</td>
                    <Td><input type="text" name="name"  value="<?=$name?>"></td>
                </tr>
                <tr>
                    <td>ĐỊA CHỈ</td>
                    <Td><input type="text" name="address"  value="<?=$address?>"></td>
                </tr>
                <tr>
                    <td>EMAIL</td>
                    <Td><input type="text" name="email"  value="<?=$email?>"></td>
                </tr>
                <tr>
                    <td>ĐIỆN THOẠI</td>
                    <Td><input type="text" name="tel"  value="<?=$tel?>"></td>
                </tr>
            </table>
</div>
            <div class="row2">
            <div class="box_title">
                PHƯƠNG THỨC THANH TOÁN
            </div>
            <div class="row2 form_content ">
                <table>
                    <tr>
                        <td><input type="radio" name="pttt" checked>  Trả tiền khi nhận hàng  </td>
                        <td> <input type="radio" name="pttt" >  Chuyển khoản ngân hàng    </td>
                        <td>  <input type="radio" name="pttt" >  Thanh toán online   </td>
                    </tr>
                </table>
</div> 
            </div>
            </form>
            <div class="box_title">
                GIỎ HÀNG
            </div> 
            <div class="row2 form_content ">
            <div class="row2 mb10 formds_loai ">
                <table>
                    <!-- <tr>
                        <th>Hình</th>
                        <th>Sản Phẩm</th>
                        <th>Đơn Giá</th>
                        <th>Số Lượng</th>
                        <th>Thành Tiền </th>
                        <th>Thao Tác </th>
                    </tr> -->
                    <?php
                    viewcart(0);
                    ?>
                </table>
                <div class="mr20">
                <a href="index.php?act=billconfirm"><input type="submit" value="Đồng Ý Đặt Hàng" name="dongydathang"></a>
</div>
            </div>
            </div>
</div> 

        </div>
        
<?php
    include "view/boxright.php";
?>
</main>