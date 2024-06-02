<?php
function loadall_taikhoan(){
    $sql= "select * from taikhoan order by id desc";
    $listtaikhoan=pdo_query($sql);
    return  $listtaikhoan;
   
}
function insert_taikhoan($email,$user,$pass){
    $sql="insert into taikhoan(email,user,pass) values('$email','$user','$pass')";
    pdo_execute($sql);
}
function checkuser($user,$pass){
    $sql = "select * from taikhoan where user='".$user."'  AND pass= '".$pass."' ";
    $result = pdo_query_one($sql);
    return $result;
}
function update_taikhoan($id,$user,$pass,$email,$address,$tel){
   
    $sql="update taikhoan set user='".$user."', pass='".$pass."',email='".$email."',address='".$address."',tel='".$tel."' where id=".$id;
    
     pdo_execute($sql);
}
function checkemail($email){
    $sql = "select * from taikhoan where email='".$email."'";
    $result = pdo_query_one($sql);
    return $result;
}
function loadone_taikhoan($id){
    $sql="select * from taikhoan where id=".$_GET['id'];
    $taikhoan=pdo_query_one($sql); 
return $taikhoan;
}
function update_taikhoan1($id,$user,$pass,$email,$address,$tel,$role){
   
    $sql="update taikhoan set user='".$user."', pass='".$pass."',email='".$email."',address='".$address."',tel='".$tel."',role='".$role."' where id=".$id;
    
     pdo_execute($sql);
}
function delete_taikhoan($id){
    $sql = "delete from taikhoan where id=".$id;
    pdo_execute($sql);
}
function sendEmail($email){
    $sql="select * from taikhoan where email='$email'";
    $taikhoan=pdo_query_one($sql);
    if($taikhoan !=false){
        sendEmailpass($email,$taikhoan['user'],$taikhoan['pass']);
        return "đã gửi email thành công, vui lòng check mail";
    }else {
        return "Email của bạn nhập không có trong hệ thống";
    }
}
function sendEmailpass($email,$username,$pass){
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer\PHPMailer\PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'sandbox.smtp.mailtrap.io    ';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'a9026b29140418';                     //SMTP username
    $mail->Password   = 'ee319ed0b26b89';                               //SMTP password
    $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('duanmau@example.com', 'DuAnMau');
    $mail->addAddress($email, $username);     //Add a recipient
    

        

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Nguoi dung quen mat khau';
    $mail->Body    = 'Mat khau cua ban la '.$pass;
   

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
function getpass($user){
    $sql="select pass from taikhoan where user='".$user."'";
    $result = pdo_query_one($sql);
    return $result;
}

?>