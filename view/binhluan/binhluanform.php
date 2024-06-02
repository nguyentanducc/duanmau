<?php
{ob_start();

session_start();
$idpro=$_REQUEST['idpro'];
include "../../model/pdo.php";
include "../../model/binhluan.php";
$dsbl=loadall_binhluan($idpro);
var_dump($dsbl);
die;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binh luan</title>
    <link rel="stylesheet" href="../../css/css.css">
</head>
<body>
<div class="mb">
        <div class="box_title">BÌNH LUẬN</div>
        <div class="box_content2 product_portfolio binhluan">
            <table>
                <?php
                      foreach($dsbl as $value){
                        //   extract($bl);
                          echo '<tr><td>' .$value['noidung'].'</td>';
                          echo '<td>' .$iduser.'</td>';
                          echo '<td>' .$value['ngaybinhluan'].'</td></tr>';

                      }
                      ?>
            </table>
        </div>
        <div class="box_search">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                <input type="hidden" name="idpro" value="<?=$idpro?>">
                <input type="text" name="noidung">
                <input type="submit"  name="guibinhluan" value="Gửi Bình Luận">
            </form>
        </div>
        <?php
        if(isset($_POST['guibinhluan'])&&($_POST['guibinhluan'])){
            $noidung=$_POST['noidung'];
            $idpro=$_POST['idpro'];
            $iduser=$_SESSION['user']['id'];
            $ngaybinhluan=date('Y-m-d');
            insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan);
            header("Location:".$_SERVER['HTTP_REFERER']);
        }
        
        ?>
             
    </div>
</body>
</html>
<?php  ob_end_flush()
                                                                                                        };?>