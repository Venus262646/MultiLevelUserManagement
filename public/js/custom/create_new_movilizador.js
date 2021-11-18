jQuery(".form-create-new-movilizador").validate({
    rules: {
      "username": {
          required: !0,
          minlength: 10,
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
      },
      "phone_number_confirm": {
          required: !0,
          equalTo: '#phone_number',
      },
      /*"phone_number_2": {
          required: !0,
          digits: true,
          minlength: 10,
          maxlength: 10,
      },*/
      "exterior_no": {
          required: !0,
          maxlength: 8,
          minlength: 8,
      },
      "interior_no": {
          required: !0,
          maxlength: 6,
          minlength: 6,
      },
      "street": {
          required: !0,
          maxlength: 80,
      },
      "postal_code_code": {
          required: !0,
          digits: true,
          minlength: 5,
          maxlength: 5,
      },
      "elector_key": {
          required: !0,
          minlength: 18,
          maxlength: 18,
      },
      "facebook_link": {
          required: !0,
          maxlength: 40,
      },
      "twitter_link": {
          required: !0,
          maxlength: 40,
      },
      "instagram_link": {
          required: !0,
          maxlength: 40,
      },
      "assigned_electoral_sections": {
          required: !0,
          digits: true
    //   },
    //   "image": {
    //       required: !0,
      }
    },
    messages: {
      "phone_number_confirm": {
          equalsTo: "This field must be equal to the phone number",
      },
      "postal_code_code": {
          minlength: "This field consists of 5 numbers",
          maxlength: "This field consists of 5 numbers",
      },
      "elector_key": {
          minlength: "This field consists of 18 characters(6 generic letters, 6 digits, 6 alphanumeric characters)",
          maxlength: "This field consists of 18 characters(6 generic letters, 6 digits, 6 alphanumeric characters)",
      },
      "exterior_no": {
          maxlength: "This field consists of 8 alphanumeric characters",
          minlength: "This field consists of 8 alphanumeric characters",
      },
      "interior_no": {
          maxlength: "This field consists of 6 alphanumeric characters",
          minlength: "This field consists of 6 alphanumeric characters",
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

  function onChangeState() {

    $('#section').parent().find('button').trigger('click');

    $('.section').css('display', 'none');
    $('.section_part_' + $('#state').val()).css('display', 'block');

    $('#section').val(0);
    $('#section').parent().find('div.filter-option-inner-inner').html('choose');

    $('#assigned_state').val($('#state').val());
    $('#assigned_state').parent().find('div.filter-option-inner-inner').html($('#assigned_state_' + $('#assigned_state').val()).html());

    onChangeSection();
}

  function onChangeEdad(value) {
    // $('#section').parent().find('button').trigger('click');

    // $('.section').css('display', 'none');
    // $('.section_part_' + $('#state').val()).css('display', 'block');

    // $('#section').val(0);
    // $('#section').parent().find('div.filter-option-inner-inner').html('choose');

    // $('#assigned_state').val($('#state').val());
    // $('#assigned_state').parent().find('div.filter-option-inner-inner').html($('#assigned_state_' + $('#assigned_state').val()).html());

    if( value == '16' || value == '17' )
        $('#edad_result').html('CURP *');
    else $('#edad_result').html('Clave de Elector *');
  }

  function onChangeSection() {
    $('#townhall').parent().find('button').trigger('click');
    $('#town').parent().find('button').trigger('click');

    $('.postal_code').css('display', 'none');
    $('.postal_code_part_' + $('#section').val()).css('display', 'block');
    $('.colonia').css('display', 'none');
    $('.colonia_part_' + $('#section').val()).css('display', 'block');
    $('.townhall').css('display', 'none');
    $('.townhall_part_' + $('#section').val()).css('display', 'block');
    $('.town').css('display', 'none');
    $('.town_part_' + $('#section').val()).css('display', 'block');

    $('#postal_code_id').val(0);
    $('#postal_code_code').val("");
    $('#colonia_id').val(0);
    $('#colonia_name').val("");
    $('#townhall').val(0);
    $('#townhall').parent().find('div.filter-option-inner-inner').html('choose');
    $('#town').val(0);
    $('#town').parent().find('div.filter-option-inner-inner').html('choose');
  }

  function onChooseColonia(colonia_id, colonia_name) {
      $('#colonia_id').val(colonia_id);
      $('#colonia_name').val(colonia_name);
  }

  function onChoosepostal_code(postal_code_id, postal_code_code) {
      $('#postal_code_id').val(postal_code_id);
      $('#postal_code_code').val(postal_code_code);
  }

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

$(document).ready(function(){
    onChangeState();
    $("#current_wizard").val(1);
    onChooseColonia();
    onChoosepostal_code();

    $("#colonia_name").val($("#colonia_name").data('id'));
    $("#postal_code_code").val($("#postal_code_code").data('id'));
});
