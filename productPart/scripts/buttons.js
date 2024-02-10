
$(document).ready(function () {
  $("#cards").on("click", ".deleteBtn", function (e) {
    e.preventDefault();
    window.location.href = "controllers/delete.php?id=" + $(this).attr("data-id");
  });
  $("#cards").on("click", ".editBtn", function (e) {
    e.preventDefault();
    window.location.href = "views/edit.php?id=" + $(this).attr("data-id");
  });
});
