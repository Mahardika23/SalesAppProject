
$.validator.addMethod( "alphanumeric", function( value, element ) {
	return this.optional( element ) || /^\w+$/i.test( value );
}, "Letters, numbers, and underscores only please" );

$.validator.addMethod( "number", function( value, element ) {
    return this.optional(element) || /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/i.test(value);
}, "Numbers only please" );


$(document).ready(function () {
    $('#form-regist').validate({
        rules:{
            name: {
                required:true,
                minlength:8,
                alphanumeric:true
            },
            password:{
                required:true,
                minlength:8 
            },
            password_confirmation:{
                required:true,
                equalTo:"#password"
            },
            nama_toko:{
                required:true,
                maxlength:100 
            },
            nama_pemilik:{
                required:true

            },
            email_pemilik:{
                required:true,
                email:true
            },
            no_telp:{
                required:true,
                number:true,
                minlength:11,
                maxlength:13
                
            },
            province_id:{
                required:true
            },
            regency_id:{
                required:true
            },
            district_id:{
                required:true
            },
            village_id:{
                required:true
            },
            alamat_toko:{
                required:true,
            }
        },
        messages: {
            name:{
                required: "Kolom Username belum terisi",
                minlength: "Username harus terdiri dari minimal 8 karakter"
                }
            },
        
    
    }

    );
})