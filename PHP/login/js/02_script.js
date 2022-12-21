jQuery('#form').validate({
    rules:{
        name:{
            lettersonly: true,
            required: true,
        },
        email:{
            required:true,
            email:true,
        },
        gender:{ required:true },
        my_image:{
            required: true,
            accept:"jpg,png,jpeg,gif",
        },  
        country:{
            required:true,
        },
        pass:{
            required:true,
            minlength:6,
        },
    },
    messages:{
        name:{
            lettersonly:"please enter characters only",
            required:"Please enter your name",
        },
        email:{
            required:"Please enter your email",
            email:"Please enter valid email"
        },
        gender:{
            required:"Please select a Gender",
            },
        my_image:{
            required: "Select Image",
            accept: "Only image type jpg/png/jpeg/gif is allowed",
        },  
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