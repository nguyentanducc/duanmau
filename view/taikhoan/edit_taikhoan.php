
<main class="catalog  mb ">
    <div class="boxleft">
        
        <div class="  mb">
            <div class="box_title">
                CẬP NHẬT TÀI KHOẢN
            </div>
            <div class="box_content form_account">
                <?php 
                if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
                    extract($_SESSION['user']);
                }
                ?>
                <form action="index.php?act=edit_taikhoan" method="post">
                <div>
            <p>Email</p>
                <input type="email" name="email" placeholder="email" value="<?=$email?>">
                 </div>
                 <div>
             Tên đăng nhập <br>
            <input type="text" name="user"  placeholder="user" value="<?=$user?>">
                 </div>
              Mật khẩu <br>
                    <div>
            <input type="password" name="pass"  placeholder="pass" value="<?=$pass?>">
          </div>
                Địa Chỉ <br>
          <div>
            <input type="text" name="address"  placeholder="address" value="<?=$address?>">
          </div>
                Điện Thoại
          <div>
            <input type="text" name="tel"  placeholder="tel "value="<?=$tel?>">
          </div>
          <input type="hidden" name="id" value="<?=$id?>">
          <input type="submit" value="Cập nhật" name="capnhat">
          <input type="reset" value="Nhập lại">
                </form>
                <h3 class="thongbaoo" style="color:red">
                <?php
                if(isset($thongbao)&&($thongbao!="")){
                    echo $thongbao;
                }
                 ?>
                </h3>
            </div>
        </div> 
        </div>
    
    <?php
    include "view/boxright.php";
?>
    
  

</main>