<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require './phpmailer/src/Exception.php';
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';

if(isset($_POST['send'])){
    // Send email with code
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username ='ngoanth.22it@vku.udn.vn';
    $mail->Password ='zuvnxxkwzziodddf';
    $mail->SMTPSecure = 'ssl';
    $mail->Port =465;
    $mail->setFrom('ngoanth.22it@vku.udn.vn');
    $mail->addAddress($_POST["mail"]);
    $mail->isHTML(true);
    $mail->Subject = '=?UTF-8?B?' . base64_encode('THÔNG TIN TẬP THỬ') . '?=';
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
      
    $now = new DateTime();
    if ($now->format('H') >= 15) {
      $now->modify('+5 days');
    } else {
      $now->modify('+4 days');
    }

    $now->setTime(15, 0, 0);
    $result = $now->format('Y-m-d H:i:s');

    $mail->Body = "Họ và tên: " . $_POST["ten"] . "<br>Số Điện thoại: " . $_POST["sdt"] . "<br>Thời gian đến tập: " . $result
    . "<br>Các CLB tập gym ở Đà Nẵng:"
    . "<ul>"
    . "<li>Quận Hải Châu:"
    . "<ul>"
    . "<li>Galaxy Fitness & Yoga Center - Địa chỉ: 06 Phan Đăng Lưu, Hải Châu, ĐN</li>"
    . "<li>H Private Fitness - Địa chỉ: 144 Ông Ích Khiêm, Hải Châu, ĐN</li>"
    . "</ul>"
    . "</li>"
    . "<li>Quận Cẩm Lệ:"
    . "<ul>"
    . "<li>VPT Fitness 2 - Địa chỉ: 43 Nguyễn Nhàn, Cẩm Lệ, ĐN</li>"
    . "</ul>"
    . "</li>"
    . "<li>Quận Thanh Khê:"
    . "<ul>"
    . "<li>California Fitness & Yoga - Địa chỉ: 155 Nguyễn Văn Linh, Quận Thanh Khê, Đà Nẵng</li>"
    . "<li>Elite Fitness And Yoga - Địa chỉ: Tầng 7 255-257 Hùng Vương, Tĩnh Trung, Thanh Khê</li>"
    . "</ul>"
    . "</li>"
    . "<li>Quận Sơn Trà:"
    . "<ul>"
    . "<li>HD Fitness Center - Địa chỉ: 996 Ngô Quyền, Sơn Trà</li>"
    . "</ul>"
    . "</li>"
    . "</ul>"
    . "<br> Xin hãy đến CLB gần bạn nhất để được tư ván và trải nghiệm thực tế";
    $mail->send();

    echo "<script>alert('send success');</script>";
    require_once 'dangkitapthu.html';
}
?>