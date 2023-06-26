<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'D:\xampp\htdocs\BWD_2023_CenterGym\phpmailer\src\Exception.php';
require 'D:\xampp\htdocs\BWD_2023_CenterGym\phpmailer\src\PHPMailer.php';
require 'D:\xampp\htdocs\BWD_2023_CenterGym\phpmailer\src\SMTP.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$ten = $_SESSION['ten']; 
$mail_to = $_SESSION['mail']; 
$phone = $_SESSION['phone'];
$birth = $_SESSION['birth'];
$gender = $_SESSION['gender'];

// Khởi tạo đối tượng PHPMailer
$mail = new PHPMailer(true);

try {
    // Cấu hình SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ngoanth.22it@vku.udn.vn';
    $mail->Password = 'zuvnxxkwzziodddf';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // Cấu hình email
    $mail->setFrom('ngoanth.22it@vku.udn.vn');
    $mail->addAddress($mail_to);
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->Subject = '=?UTF-8?B?' . base64_encode('BILL HOÀN THÀNH ĐĂNG KÝ') . '?=';

    // Tạo nội dung email
    $mail_content = "Chào bạn $ten,<br><br>";
    $mail_content .= "Bạn vừa đăng ký tập luyện 12 tháng tại trung tâm thể hình của chúng tôi với các thông tin sau:<br><br>";
    $mail_content .= "Email: $mail_to<br>";
    $mail_content .= "Số điện thoại: $phone<br>";
    $mail_content .= "Ngày sinh: $birth<br>";
    $mail_content .= "Giới tính: $gender<br><br>";
    $mail_content .= "Cảm ơn bạn đã tin tưởng trung tâm thể hình của chúng tôi, chúc bạn sớm nâng cao sức khỏe và thể hình như mong muốn.";

    // Thiết lập nội dung email
    $mail->Body = $mail_content;

    // Gửi email
    $mail->send();

echo "<script>alert('Gửi email thành công');</script>";

header("Location: /BWD_2023_CenterGym/chinhsachgia.html");

exit();
} catch (Exception $e) {
    // Hiển thị thông báo lỗi nếu có lỗi xảy ra
    echo "Gửi email thất bại: {$mail->ErrorInfo}";
}

?>