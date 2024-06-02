
<main class="catalog  mb ">
    <div class="boxleft">
        
        <div class="  mb">
            <div class="box_title">
                ĐĂNG KÝ THÀNH VIÊN
            </div>
            <div class="box_content form_account">
                <form action="index.php?act=dangky" method="post">
                <div>
            <p>Email</p>
                <input type="email" name="email" placeholder="email">
                 </div>
                 <div>
             Tên đăng nhập <br>
            <input type="text" name="user"  placeholder="user">
                 </div>
              Mật khẩu
                    <div>
            <input type="password" name="pass"  placeholder="pass">
          </div>
          <input type="submit" value="Đăng ký" name="dangky">
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