function closeNotif() {
    $(".box-notification-ok").slideToggle();
    $(".box-notification-error").slideToggle();

    let close = '1';

    $.ajax({
        type: 'POST',
        url: '../close_notif_info.php',
        data: {
            close_msgbox_info: close,
            close_msgbox_error: close
        },
        success: function() {}
    });
}

setTimeout(closeNotif, 10000);