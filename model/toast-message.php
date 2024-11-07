<?php
function showSuccessToast($message)
{
    echo '<div id="toast-js">
    <div class="toast-js toast--success-js">
        <div class="toast__icon-js">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="toast__body-js">
            <h3 class="toast__title-js">Thành công!</h3>
            <p class="toast__msg-js">' . $message . '</p>
        </div>
        <div class="toast__close-js">
            <i class="fas fa-times"></i>
        </div>
    </div>
</div>';
}
function showErrorToast($message)
{
    echo '<div id="toast-js">
    <div class="toast-js toast--error-js">
        <div class="toast__icon-js">
            <i class="fas fa-exclamation-circle"></i>
        </div>
        <div class="toast__body-js">
            <h3 class="toast__title-js">Thất bại!</h3>
            <p class="toast__msg-js">' . $message . '</p>
        </div>
        <div class="toast__close-js">
            <i class="fas fa-times"></i>
        </div>
    </div>
</div>';
}
if (isset($_POST['success'])) {
    showSuccessToast($_POST['message']);
}
