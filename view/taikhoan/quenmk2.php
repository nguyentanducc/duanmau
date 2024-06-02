
<main class="catalog  mb ">
    <div class="boxleft">
        
        <div class="  mb">
            <div class="box_title">
                Quên Mật Khẩu
            </div>
            <div class="box_content form_account">
                <form action="index.php?act=quenmk2" method="post">
                <div>
            <p>Email</p>
                <input type="email" name="email" placeholder="email">
                 </div>
          <input type="submit" value="Gửi" name="guiemail">
          <input type="reset" value="Nhập lại">
                </form>
                <h3 class="thongbaoo" style="color:red">
                <?php
                
                if(isset($sendMailMess)&&($sendMailMess!="")){
                    echo $sendMailMess;
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