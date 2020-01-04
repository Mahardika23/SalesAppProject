

$.validator.addMethod( "alphanumeric", function( value, element ) {
	return this.optional( element ) || /^\w+$/i.test( value );
}, "Letters, numbers, and underscores only please" );

$.validator.addMethod( "number", function( value, element ) {
    return this.optional(element) || /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/i.test(value);
}, "Numbers only please" );


$(document).ready(function () {
    $('#form-addsales').validate({
        rules:{
            nama_sales: {
                required:true,
                minlength:8,
                alphanumeric:true
            },
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
                }
            },
        
    
    }

    );
})