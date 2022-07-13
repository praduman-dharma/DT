jQuery('#form').validate({
    rules:{
        name:"required",
        email:{
            required:true,
            email:true,
        },
        phone:{
            required:true,
            minlength:10,
            maxlength:10,
        },
        user:"required",
        country:{
            required:true,
        },
        // pass:"required",        // for multiple validation of password field
        pass:{
            required:true,
            minlength:6,
        },
        cpass:{
            required:true,
            minlength:6,
            equalTo:'#t5',
        }
    },
    messages:{
        name:"Please enter your name",
        email:{
            required:"Please enter your email",
            email:"Please enter valid email"
        },
        phone:{
            required:"Please enter your number",
            minlength:"Enter valid phone number",
            maxlength:"Enter valid phone number"
        },
        user:"Please enter username",
        country:{
            required:"Please select your Country",
        },
        pass:{
            required:"Please enter your password",
            minlength:"Please enter minimum 6 letters",
        },
    },

    submitHandler:function(form){
        form.submit();
    }
});