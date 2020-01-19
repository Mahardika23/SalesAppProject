

$.validator.addMethod( "alphanumeric", function( value, element ) {
	return this.optional( element ) || /^\w+$/i.test( value );
}, "Letters, numbers, and underscores only please" );

$.validator.addMethod( "number", function( value, element ) {
    return this.optional(element) || /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/i.test(value);
}, "Numbers only please" );

$.validator.addMethod("alpha", function(value, element) {
    return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
 });

$(document).ready(function () {
    $('#form-addsales').validate({
        rules:{
            nama_sales: {
                required:true,
                alpha:true
            },
            name: {
                required:true,
                minlength:8,
                alphanumeric:true
            },
            email_distributor:{
                required:true,
                email:true,
                remote:"/checkemailvalidity",

            },
            password:{
                required:true,
                minlength:8 
            },
            password_confirmation:{
                required:true,
                equalTo:"#password"
            },
            no_telp:{
                required:true,
                number:true,
                minlength:11,
                maxlength:13
                
            }
        },
        messages: {
            name:{
                required: "Kolom belum terisi",
                minlength: "Kolom harus terdiri dari minimal 8 karakter"
            },
            email_distributor:{
                    remote:"email sudah terdaftar",
            },
            nama_sales:{
                required: "Kolom belum terisi",
                alpha:"Kolom nama harus berisi alfabet"
            }
            },
        
    
    }

    );
})