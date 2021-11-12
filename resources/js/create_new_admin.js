jQuery(".form-create-new-admin").validate({
  rules: {
      "nombre": {
          required: !0,
          minlength: 10
      },
      "segundo_nombre": {
          required: !0,
          minlength: 1
      },
      "apellido_paterno": {
          required: !0,
          minlength: 1
      },
      "apellido_materno": {
          required: !0,
          minlength: 1
      },
      "email": {
          required: !0,
          email: true
      },
      "phone_number": {
          required: !0,
          digits: true
      },
      /*"phone_number_2": {
          required: !0,
          digits: true
      },*/
  },
  messages: {
      "nombre": {
          required: "Please enter a nombre",
          minlength: "Admin nombre must consist of at least 10 characters"
      },
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