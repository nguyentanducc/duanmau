<?php   
    session_start();
    include "model/pdo.php";
    include "model/sanpham.php";
    include "model/danhmuc.php";
    include "model/binhluan.php";
    include "model/taikhoan.php";
    include "model/thongke.php";
    include "model/cart.php";
    include "view/header.php";
    include "global.php";
    
    if(!isset($_SESSION['mycart'])) $_SESSION['mycart']=[];
    $spnew = loadall_sanpham_home();
    $dsdm = loadall_danhmuc();
    $dstop10 = loadall_sanpham_top10();
    if(isset($_GET['act'])&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch($act){
            case "sanpham":
                if(isset($_POST['keyword']) &&  $_POST['keyword'] != 0 ){
                    $kyw = $_POST['keyword'];
                }else{
                    $kyw = "";
                }
                if(isset($_GET['iddm']) && ($_GET['iddm']>0)){
                    $iddm=$_GET['iddm'];
                }else{
                    $iddm=0;
                }
                $dssp=loadall_sanpham($kyw,$iddm);
                $tendm= load_ten_dm($iddm);
                include "view/sanpham.php";
                break;
            case "sanphamct":
                if(isset($_POST['guibinhluan'])){
                    insert_binhluan($_POST['idpro'], $_POST['noidung']);
                }
                if(isset($_GET['idsp']) && $_GET['idsp'] > 0){
                    $sanpham = loadone_sanpham($_GET['idsp']);
                    $sanphamcl = load_sanpham_cungloai($_GET['idsp'], $sanpham['iddm']);
                    $binhluan = loadall_binhluan($_GET['idsp']);
                    include "view/chitietsanpham.php";
                }else{
                    include "view/home.php";            
                }
                break;
            case "dangky":
                if(isset($_POST['dangky']) && ($_POST['dangky'])){
                    $email=$_POST['email'];
                    $user=$_POST['user'];
                    $pass=$_POST['pass'];
                    $hashed_password = md5($pass);
                    insert_taikhoan($email,$user,$hashed_password);
                    $thongbao="Đã đăng ký thành công .Vui lòng đăng nhập để đặt hàng hoặc bình luận!";  
                }
                include "view/dangky.php";
                break;
            case "dangnhap":
                
                    if(isset($_POST['dangnhap']) && ($_POST['dangnhap'])){
                        $user=$_POST['user'];
                        $pass=$_POST['pass'];
                        $passdb=getpass($user);
                        $kt=$passdb['pass'];
                    if ((md5($pass) == $kt)) {
                        $checkuser=checkuser($user,md5( $pass));
                        if(is_array($checkuser)){
                        $_SESSION['user']=$checkuser;
                     $thongbao="Bạn đã đăng nhập thành công"; 
                     header('Location:index.php');}
                    } else {
                      $checkuser=checkuser($user, $pass);
                        if(is_array($checkuser)){
                        $_SESSION['user']=$checkuser;
                        // $thongbao="Bạn đã đăng nhập thành công"; 
                        header('Location:index.php');
                    }
                    else {
                        $thongbao="Tài khoản không tồn tại . Vui lòng kiểm tra hoặc Đăng Ký";
                }
            }
        }
        include "view/dangky.php";

                    break;
            case "edit_taikhoan":
                        if(isset($_POST['capnhat']) && ($_POST['capnhat'])){
                            $user=$_POST['user'];
                            $pass=$_POST['pass'];
                            $email=$_POST['email'];
                            $tel=$_POST['tel'];
                            $address=$_POST['address'];
                            $id=$_POST['id'];
                            update_taikhoan($id,$user,$pass,$email,$address,$tel);
                            $_SESSION['user']=checkuser($user,$pass);
                            header('Location:index.php?act=edit_taikhoan'); 
                        }

                        include "view/taikhoan/edit_taikhoan.php";
                        
                        break;
            case "quenmk":
                            if(isset($_POST['guiemail']) && ($_POST['guiemail'])){
                                
                                $email=$_POST['email'];
                                $checkemail=checkemail($email);
                                if(is_array($checkemail)){
                                    $thongbao="Mật Khẩu Của Bạn Là: ".$checkemail['pass'];
                                }else{
                                    $thongbao="Email này không tồn tại ";
                                } 
                            }
    
                            include "view/taikhoan/quenmk.php";
                            
                            break;
            case "quenmk2":
                if(isset($_POST['guiemail']) && ($_POST['guiemail'])){
                    $email=$_POST['email'];
                    $sendMailMess=sendEmail($email);
                }    
                include "view/taikhoan/quenmk2.php";
                break;
            case "thoat":
                session_unset();
                header('Location:index.php'); 
                break;
            case "addtocart":
                if(isset($_POST['addtocart'])&&($_POST['addtocart'])){
                    $id=$_POST['id'];
                    $name=$_POST['name'];
                    $img=$_POST['img'];
                    $price=$_POST['price'];
                    $soluong=1;
                    $ttien=$soluong*$price;
                    $spadd=[$id,$name,$img,$price,$soluong,$ttien]; 
                    array_push($_SESSION['mycart'],$spadd);
                }
                include "view/cart/viewcart.php";
                break;
            case "delcart": 
                if(isset($_GET['idcart'])){
                    array_splice($_SESSION['mycart'],$_GET['idcart'],1);
                }else{
                    $_SESSION['mycart']=[];
                }
                header('Location: index.php?act=addtocart');
                break;
            case "bill";
            include "view/cart/bill.php";
            break;    
            case "billconfirm":
                // if(isset($_POST['dongydathang'])&&($_POST['dongydathang'])){
                //     $name=$_POST['user'];
                //     $email=$_POST['email'];
                //     $address=$_POST['address'];
                //     $tel=$_POST['tel'];
                //     $pttt=$_POST['pttt'];
                //     $ngaydathang=date('Y-m-d');
                //     $tongdonhang=tongdonhang();
                //     $idbill=insert_bill($name,$email,$address,$tel,$ngaydathang,$tongdonhang,$pttt);
                //     //insert into cart :session['mycart']&bill
                //     foreach($session['mycart'] as $cart){
                //         insert_cart($_SESSION['user']['id'],$cart[0],$cart[2],$cart[1],$cart[3],$cart[4],$cart[5]);
                //     }
                // }
                include "view/cart/billconfirm.php";
                break;
                

    }       
    }else{
        include "view/home.php";
    }
   
    include "view/footer.php";
?>