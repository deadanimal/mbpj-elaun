function closeModal(modalId) {
    $("#"+modalId + "").removeClass('fade').modal("hide");
    $("#"+modalId + "").modal("dispose");

}