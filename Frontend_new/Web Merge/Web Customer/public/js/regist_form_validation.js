$("#smartwizard").on("leaveStep", function (e, anchorObject, stepNumber, stepDirection) {
    if ($('#form-regist').valid()) {
        return true;
    } else {
        return false;
    }
});
$.validator.addMethod("alphanumeric", function (value, element) {
    return this.optional(element) || /^\w+$/i.test(value);
}, "Hanya diperbolehkan huruf, angka, dan underscore");

$.validator.addMethod("number", function (value, element) {
    return this.optional(element) || /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/i.test(value);
}, "Harap masukkan nomor telepon yang valid");


$(document).ready(function () {
    $('#form-regist').validate({
        rules: {
            name: {
                required: true,
                minlength: 8,
                alphanumeric: true
            },
            email: {
                required: true,
                email: true,
                remote: "/checkemailvalidity",
            },
            password: {
                required: true,
                minlength: 8
            },
            password_confirmation: {
                required: true,
                equalTo: "#password"
            },
            nama_toko: {
                required: true,
                maxlength: 100
            },
            nama_pemilik: {
                required: true

            },
            email_pemilik: {
                required: true,
                email: true,


            },
            no_telp: {
                required: true,
                number: true,
                minlength: 11,
                maxlength: 14

            },
            province_id: {
                required: true
            },
            regency_id: {
                required: true
            },
            district_id: {
                required: true
            },
            village_id: {
                required: true
            },
            alamat_toko: {
                required: true,
            }
        },
        messages: {
            name: {
                required: "Kolom belum terisi",
                minlength: "Username harus terdiri dari minimal 8 karakter"
            }
            ,
            email: {
                required: "Kolom belum terisi",
                remote: "Email sudah terdaftar",
                email: "Harap masukkan alamat email yang valid",
            },
            password: {
                required: "Kolom belum terisi",
                minlength: "Password harus terdiri dari minimal 8 karakter"
            },
            password_confirmation: {
                required: "Kolom belum terisi",
                equalTo: "Password konfirmasi tidak cocok",
            },
            nama_toko: {
                required: "Kolom belum terisi",
                maxlength: "Maksimal 100 karakter",
            },
            nama_pemilik: {
                required: "Kolom belum terisi",

            },
            email_pemilik: {
                required: "Kolom belum terisi",
                email: "Harap masukkan alamat email yang valid",
            },
            no_telp: {
                required: "Kolom belum terisi",
                minlength: "Silahkan masukkan setidaknya 11 karakter",
                maxlength: "Maksimal 14 karakter",

            },
            province_id: {
                required: "Kolom belum terisi",
            },
            regency_id: {
                required: "Kolom belum terisi",
            },
            district_id: {
                required: "Kolom belum terisi",
            },
            village_id: {
                required: "Kolom belum terisi",
            },
            alamat_toko: {
                required: "Kolom belum terisi",
            }
        },


    }

    );
})