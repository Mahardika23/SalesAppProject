

$.validator.addMethod("alphanumeric", function (value, element) {
    return this.optional(element) || /^\w+$/i.test(value);
}, "Letters, numbers, and underscores only please");

$.validator.addMethod("number", function (value, element) {
    return this.optional(element) || /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/i.test(value);
}, "Numbers only please");


$(document).ready(function () {
    $('#form-login').validate({
        rules: {
            email: {
                required: true,
                email: true,

            },
            password: {
                required: true,
                minlength: 8
            }

        },
        messages: {
            password: {
                required: "Kolom belum terisi",
                minlength: "Password terdiri dari minimal 8 karakter"
            },
            email: {
                required: "Kolom belum terisi",
                email: "Harap masukkan alamat email yang valid",
            }
        },
    }

    );
})