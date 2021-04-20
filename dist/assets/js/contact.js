$(document).ready(function (e) {
    $("#form").on('submit', (function (e) {
        e.preventDefault();
        $("#mail-status").hide();
        $('#send-message').show();
        $('#loader-icon').hide();
        $.ajax({
            url: "contact1.php",
            type: "POST",
            dataType: 'json',
            data: {
                "お名前": $('input[name="お名前"]').val(),
                "会社名": $('input[name="会社名"]').val(),
                "メールアドレス": $('input[name="メールアドレス"]').val(),
                "電話番号": $('input[name="電話番号"]').val(),
                "件名": $('input[name="件名"]').val(),
                "お問い合わせ内容": $('textarea[name="お問い合わせ内容"]').val(),
                "g-recaptcha-response": $('textarea[id="g-recaptcha-response"]').val()
            },
            success: function (response) {
                $("#mail-status").show();
                $('#loader-icon').hide();
                if (response.type == "error") {
                    $('#send-message').show();
                    $("#mail-status").attr("class", "error");
                } else if (response.type == "message") {
                    $('#send-message').hide();
                    $("#mail-status").attr("class", "success");
                }
                $("#mail-status").html(response.text);
            },
            error: function () {}
        });
    }));
});