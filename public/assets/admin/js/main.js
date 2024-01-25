function actionDelete(e) {
    e.preventDefault();
    const urlRequest = $(this).attr('href');
    let that = $(this);
    Swal.fire({
        title: "Are you sure you want to delete?",
        text: "Delete cannot be restored!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function(data) {
                    if (data.code === 200) {
                        that.parent().parent().remove();
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    });
}

$(() => {
    $("#list-datatable").DataTable();
    //event click button logout
    $('#modal-logout').on('shown.bs.modal', () => {
        $('.btnOk').click(() => {
            $('#form-logout').submit();
        });
    });
    //event click button delete
    $(document).on('click', '.btnDelete', actionDelete);
});