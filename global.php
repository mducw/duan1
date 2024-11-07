<?php 
// PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'vendors/PHPMailer/src/Exception.php';
require_once 'vendors/PHPMailer/src/PHPMailer.php';
require_once 'vendors/PHPMailer/src/SMTP.php';

$imagePath ="./uploads/";
function displayToastrMessageSuccess($message_success)
{
    echo '<script>';
    echo 'toastr.success("' . $message_success . '", "Thành công")';
    echo '</script>';
}
function displayToastrMessageError($message_error)
{
    echo '<script>';
    echo 'toastr.error("' . $message_error . '", "Thất bại")';
    echo '</script>';
}
function displayToastrMessageWarning($message_warning)
{
    echo '<script>';
    echo 'toastr.warning("' . $message_warning . '", "Cảnh báo")';
    echo '</script>';
}
function formatCurrency($amount)
{
    return number_format($amount) . 'đ';
}


// PHPMailer config
$SMTP_USERNAME = "dinhdcph14290@fpt.edu.vn";
$SMTP_PASSWORD = "efflqcdnskpoeqms";
?>