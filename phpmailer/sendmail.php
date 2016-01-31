 <?php
//Nhúng thư viện phpmailer
require_once('class.phpmailer.php');

//Khởi tạo đối tượng
$mail = new PHPMailer();

/* Thông tin gửi mail */
$mail->IsSMTP();                              // Gọi đến class xử lý SMTP
$mail->Host       = "smtp.gmail.com"; // SMTP server
$mail->SMTPDebug  = 2;                   // Bật SMTP debug (cho việc kiểm tra lỗi)
$mail->SMTPAuth   = true;                 // Sử dụng đăng nhập vào account
$mail->SMTPSecure = "tls";               // Phương thức mã hóa
$mail->Host       = "smtp.gmail.com";     // Thiết lập thông tin của SMPT
$mail->Port       = 587;                         // Thiết lập cổng gửi email của máy
$mail->Username   = "vsiitest123456@gmail.com"; // SMTP account username
$mail->Password   = "vsiitest123456abc";           // SMTP account password

// Thông tin người gửi và Email người gửi
$mail->SetFrom($_POST['email'],$_POST['hoten']);

//Thiết lập thông tin người nhận
$mail->AddAddress("vsiitest123456@gmail.com", "Site Administrator");

// Thiết lập email nhận email hồi đáp nếu người nhận nhấn nút Reply

$mail->AddReplyTo("vsiitest123456@gmail.com","Site Administrator");

/* Nội dung Email */

//Thiết lập tiêu đề
$mail->Subject    = $_POST['tieude'];

//Thiết lập định dạng font chữ
$mail->CharSet = "utf-8";

//Thiết lập nội dung chính của email
$body = $_POST['noidung'];
$mail->Body = $body;

if(!$mail->Send()) {  echo $mail->ErrorInfo;} 

  else 

    {  

          echo "<font color='black'><b>Gửi thành công, chúng tôi sẽ phản hồi trong thời gian sớm nhất, cảm ơn!</b></font>";

    }
?>