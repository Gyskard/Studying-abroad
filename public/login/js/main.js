$user = $('#user');
$password = $('#password');

$('button').click(function (e) {
    notValid('hide');
    if ($user.val() === "") {
        e.preventDefault();
        $user.addClass("is-invalid")
    }
    if ($password.val() === "") {
        e.preventDefault();
        $password.addClass("is-invalid");
        $('.invalid-feedback:eq(1)').show()
    }
});

$user.on('input', function() {
    if ($user.hasClass("is-invalid") && $user.val() !== "") {
        $user.removeClass("is-invalid")
    }
    notValid('hide');
});

$password.on('input', function() {
    if ($password.hasClass("is-invalid") && $password.val() !== "") {
        $password.removeClass("is-invalid");
        $('.invalid-feedback:eq(1)').hide()
    }
    notValid('hide');
});

function notValid(action) {
    if (action === 'show') {
        $('#notValid').show()
    }
    else if (action === 'hide') {
        $('#notValid').hide()
    }
}