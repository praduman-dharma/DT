jQuery('#form').validate({
    rules:{
        email:{
            required:true,
            email:true,
        },
        pass:{
            required:true,
            minlength:6,
        },
    },
    messages:{
        email:{
            required:"Please enter your email",
            email:"Please enter valid email"
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