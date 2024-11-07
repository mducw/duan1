<?php 

include_once('pdo.php');
function insert_tai_khoan($ho_ten,$ten_dang_nhap,$mat_khau,$email){
    $sql="INSERT INTO user (ho_ten,ten_dang_nhap,mat_khau,email) VALUE (?,?,?,?) ";
    return pdo_execute($sql,$ho_ten,$ten_dang_nhap,$mat_khau,$email);
}
function checkuser($ten_dang_nhap,$mat_khau)
{
    $sql = "SELECT * FROM user where ten_dang_nhap= ? AND mat_khau= ?";
    $sp = pdo_query_one($sql,$ten_dang_nhap,$mat_khau);
    return $sp;
}
function kiem_tra_nguoi_dung_ton_tai($ten_dang_nhap)
{
    $sql = "SELECT count(*) FROM user WHERE ten_dang_nhap=?";
    return pdo_query_value($sql, $ten_dang_nhap) > 0;
}
function kiem_tra_email_ton_tai($email)
{
    $sql = "SELECT count(*) FROM user WHERE email=?";
    return pdo_query_value($sql, $email) > 0;
}
function account_update($id_khach_hang, $ho_ten, $email, $phone, $hinh_anh, $dia_chi) {
    if ($hinh_anh != "") {
        $sql = "UPDATE user SET ho_ten = ?, email = ?, phone = ?, hinh_anh = ?, dia_chi = ? WHERE id_khach_hang = ?";
        pdo_query($sql, $ho_ten, $email, $phone, $hinh_anh, $dia_chi, $id_khach_hang);
    } else {
        $sql = "UPDATE user SET ho_ten = ?, email = ?, phone = ?, dia_chi = ? WHERE id_khach_hang = ?";
        pdo_query($sql, $ho_ten, $email, $phone, $dia_chi, $id_khach_hang);
    }
}
function taikhoan_select_by_id($id_khach_hang){
    $sql = "SELECT * FROM user WHERE id_khach_hang =?";
    return pdo_query_one($sql,$id_khach_hang);
}
function update_pass($email,$mat_khau){
    $sql= "UPDATE user SET mat_khau = ? WHERE email = ?";
    pdo_execute($sql,$mat_khau,$email);
}
function check_email($email){
    $sql= "SELECT ten_dang_nhap FROM user WHERE email = ?";
    return pdo_query_one($sql,$email);
}
function user_send_reset_password($email, $resetCode)
{
    global $SMTP_USERNAME;
    global $SMTP_PASSWORD;

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    try {
        //Server settings
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug = 0; // Enable verbose debug output
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = $SMTP_USERNAME; // SMTP username
        $mail->Password = $SMTP_PASSWORD; // SMTP password
        $mail->SMTPSecure = 'ssl'; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port = 465; // TCP port to connect to
        // Config send & receive
        $mail->setFrom($SMTP_USERNAME, 'CookyFood');
        $mail->addAddress($email);
        $mail->isHTML(true);

        $subject = 'Thiết lập lại mật khẩu đăng nhập CookyFood';
        $message = "<div style='width: 484px; margin: 0 auto; font-size: 15px;'>";
        $message .= "<div style='text-align: center; margin-bottom: 37px;'><img src='https://res.cloudinary.com/do9rcgv5s/image/upload/v1696750251/cooky%20market%20-%20PHP/extwq2ppklepp82jtwfh.png' alt='Cong Dinh' width='179px'/></div>";
        $message .= "Xin chào quý khách, <br><br>";
        $message .= "Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu CookyFood của bạn.<br><br>";
        $message .= 'Mã xác nhận của bạn là: <strong style="color: #f22726">' . $resetCode . '</strong><br><br>';
        $message .= "Nếu bạn không yêu cầu thiết lập lại mật khẩu, vui lòng bỏ qua email này.<br><br>";
        $message .= "Cảm ơn bạn đã tham gia và đồng hành cùng CookyFood.<br><br><br>";
        $message .= "Trân trọng, <br>";
        $message .= "Đội ngũ CookyFood";
        $message .= "</div>";

        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>