$(function () {
  "use strict";

  // Preloader
  $(window).on("load", function () {
    $("#preloader").fadeOut();
    $("#preloader-status").delay(250).fadeOut("slow");
    $("body").delay(250).css({
      "overflow-x": "hidden",
    });
  });

  $(".ajax_request").on("click", function (e) {
    e.preventDefault();

    let button = $(e.target);
    let form_data = button.parents("form").serialize();
    let form_url = button.parents("form").attr("action");
    let form_name = button.parents("form").attr("name");

    let button_id = button.attr("id");

    $.ajax({
      type: "POST",
      url: form_url,
      data: form_data,
      dataType: "json",
      beforeSend: function (xhr, settings) {
        settings.data += "&" + form_name + "=" + form_name;
      },
      success: function (res) {
        //ajax post redirect url
        if (res[0].url !== undefined) {
          window.location.href = res[0].url;
          return false;
        }

        console.log(res);
        let new_csrf_code = res[0].csrf_fg;

        $('input[name="csrf_fg"]').val(new_csrf_code);
      },
      complete: function (res) {
        //sweetalert start
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: res.responseJSON[0].responseMessage,
          showConfirmButton: false,
          timer: 1500,
          backdrop: `rgba(0,80,170,0.4) left top no-repeat`,
        });
        //sweetalert end
      },
      error: function (xhr, status, res) {
        Swal.fire({
          position: "top-end",
          icon: "error",
          title: "error",
          showConfirmButton: false,
          timer: 1500,
          backdrop: `rgba(244,67,54,0.4) left top no-repeat`,
        });
      },
    }); //end ajax

    return false;
  });
});
