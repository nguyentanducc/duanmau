<main class="catalog  mb ">
    <div class="boxleft">
        
        <div class="  mb">
            <div class="box_title">
                GIỎ HÀNG
            </div> 
            <div class="row2 form_content ">
            <div class="row2 mb10 formds_loai ">
                <table>
                   
                    <?php
                    viewcart(1);
                    ?>
                </table>
                <div class="mr20">
           <a href="index.php?act=bill"><input type="button" value="Tiếp Tục Đặt Hàng"> </a><a href="index.php?act=delcart"> <input type="button"value="Xóa Giỏ Hàng" ></a>
        </div>
            </div>
        </div> 
       
        </div>
      
        </div>
        
    <?php
    include "view/boxright.php";
?>
    
  

</main>