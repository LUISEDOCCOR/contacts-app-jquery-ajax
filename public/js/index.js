$(document).ready(function () {
  //Modal info
  $(".btnModalContactInfo").on("click", function () {
    const id = $(this).data("id");
    $.ajax({
      url: "/api/contact?id=" + id,
      method: "GET",
      dataType: "json",
      success: function (data) {
        $("#containerContactInfo").text(data.notes);
        $("#containerContactName").text(data.name);
        document.getElementById("modalContactInfo").showModal();
      },
      error: function () {
        notyf.error("Error al obtener más datos");
      },
    });
  });
  $(".btnModalContactEdit").on("click", function () {
    const id = $(this).data("id");
    $.ajax({
      url: "/api/contact?id=" + id,
      method: "GET",
      dataType: "json",
      success: function (data) {
        $("#edit_contact_name").val(data.name);
        $("#edit_contact_number").val(data.number);
        $("#edit_contact_notes").text(data.notes);
        $("#edit_contact_id").val(id);
        document.getElementById("modalContactEdit").showModal();
      },
      error: function () {
        notyf.error("Error al obtener los datos");
      },
    });
  });
});
