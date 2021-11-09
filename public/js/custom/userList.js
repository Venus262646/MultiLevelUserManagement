function gotoProfile(user_id) {
  window.location.href = window.location.origin + "/profile/" + user_id;
};

function togglePanel(user_id) {

  $('.class_part_' + user_id).toggleClass('hidden');
}

function createNewUser(parent_id) {
    window.location.href = window.location.origin + "/user/createNewUser/Admin/" + parent_id;
}

function editUser(parent_id) {
    window.location.href = window.location.origin + "/user/editUser/" + parent_id;
}

$(document).ready(function(){
    $("table .employee-photo, table .employee-name").on("click", function(e) {
        let user_id = $(this).parent().find('input').val();
        window.location.href = window.location.origin + "/profile/" + user_id;
    });
});
