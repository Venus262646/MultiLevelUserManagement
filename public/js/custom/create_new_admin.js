$.validator.addMethod(
    "regex",
    function(value, element, regexp) {
        let re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
    },
    "Please check your input."
);

jQuery(".form-create-new-admin").validate({
  rules: {
      "username": {
        required: !0,
        minlength: 10,
        regex: "^(?=.*[a-z])(?=.*[A-Z])(?=(.*[!@#\$%\^&\*]){2})",
      },
      "password": {
        required: !0,
        minlength: 8,
      },
      "email": {
        required: !0,
        email: 1,
      },
      "phone_number": {
          required: !0,
          digits: true,
          minlength: 10,
          maxlength: 10,
      }/*,
      "phone_number_2": {
          required: !0,
          digits: true,
          minlength: 10,
          maxlength: 10,
      }
      "image": {
          required: !0,
      }*/
  },
  messages: {
      "username": {
        regex: "User must have upper and lower case letters and at least 2 special characters.",
      },
      "phone_number": {
          minlength: "The field must be 10 numbers",
          maxlength: "The field must be 10 numbers",
      }/*,
      "phone_number_2": {
        minlength: "The field must be 10 numbers",
        maxlength: "The field must be 10 numbers",
      },*/
  },

  ignore: [],
  errorClass: "invalid-feedback animated fadeInUp",
  errorElement: "div",
  errorPlacement: function(e, a) {
      jQuery(a).parents(".form-group > div").append(e)
  },
  highlight: function(e) {
      jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
  },
  success: function(e) {
      jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-valid")
  }

});

function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];

        if(file){
            var reader = new FileReader();

            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
                $("#photo_data").val(reader.result );
            }

            reader.readAsDataURL(file);
        }
    }
