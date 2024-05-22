$("#form-add-product").validate({
    rules: {
        product_name: {
            required: true
        },
        product_price: {
            required: true,
            number: true
        }   
    },
    messages: {
        product_name: {
            required: "Chưa nhập tên sản phẩm",
        },
        product_price: {
            required: "Chưa nhập giá sản phẩm",
            number:"Nhập đúng định dạng số"
        }   
    },
    submitHandler: function(form) {
        $(form).submit();
    }
});
// $("#form-reset-password").validate({
//     rules: {
//         new_password: {
//             required: true,
//             minlength: 6
//         },
//         new_password_confirmation: {
//             required: true,
//             minlength: 6
//         }   
//     },
//     messages: {
//         new_password: {
//             required: "Chưa nhập mật khẩu",
//             minlength:"Độ dài nhỏ nhất là 6 kí tự"
//         },
//         new_password_confirmation: {
//             required: "Chưa nhập mật khẩu",
//             minlength:"Độ dài nhỏ nhất là 6 kí tự"
//         }   
//     },
//     submitHandler: function(form) {
//         $(form).submit();
//     }
// });


// $("#form-login-customer").validate({
//     rules: {
//         email_account: {
//             required: true,
//             email: true
//         },
//         password_account: {
//             required: true,
//             minlength: 6
//         }   
//     },
//     messages: {
//         email_account: {
//             required: "Chưa nhập email",
//             email:"Nhập đúng định dạng email"
//         },
//         password_account: {
//             required: "Chưa nhập password",
//             minlength:"Độ dài nhỏ nhất là 6 kí tự"
//         }   
//     },
//     submitHandler: function(form) {
//         $(form).submit();
//     }
// });

// $("#form-register-customer").validate({
//     rules: {
//         customer_name: {
//             required: true
//         },
//         customer_email: {
//             required: true,
//             email: true
//         },
//         customer_phone: {
//             required: true,
//             number: true
//         },
//         customer_password: {
//             required: true,
//             minlength: 6
//         },   
//     },
//     messages: {
//         customer_name: {
//             required: "Chưa nhập tên"
//         },
//         customer_email: {
//             required: "Chưa nhập email",
//             email:"Nhập đúng định dạng email"
//         },
//         customer_phone: {
//             required: "Chưa nhập số điện thoại",
//             number: "Nhập đúng định dạng số"
//         },
//         customer_password: {
//             required: "Chưa nhập password",
//             minlength:"Độ dài nhỏ nhất là 6 kí tự"
//         }   
//     },
//     submitHandler: function(form) {
//         $(form).submit();
//     }
// });