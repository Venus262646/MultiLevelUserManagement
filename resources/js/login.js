$("#login_btn").click(function(e) {
  e.preventDefault();
  
  if(!$("#email").val()) {
    $("#empty_email").removeClass("hidden");
    return;
  }
  $("#empty_email").addClass("hidden");

  if(!$("#password").val()) {
    $("#empty_password").removeClass("hidden");
    return;
  }
  $("#empty_password").addClass("hidden");
  
  $.ajax({
    url: "/login_validate",
    method: "POST",
    data: {
      email: $("#email").val(),
      password: $("#password").val()
    },
    dataType: "json",
    success: function(response) {
      alert("success");
    }
  })
});

$('.close').click(function() {
  $(this).parent().addClass("hidden");
});
