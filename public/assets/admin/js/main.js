$(() => {
    $("#list-datatable").DataTable();
    //event click button delete
    $('.btnDelete').click(actionDelete);
    //event click button logout
    $('.btnLogout').click(logout);
});

const actionDelete = e => {
    e.preventDefault();
    const elementClicked = e.currentTarget;
    const urlRequest = elementClicked.href;
    Swal.fire({
        title: "Are you sure you want to delete?",
        text: "Delete cannot be restored!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then(result => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: data => {
                    if (data.code === 200) {
                        elementClicked.closest('tr').remove();
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "bottom-end",
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "success",
                            title: "Deleted successfully"
                        });
                    }
                },
                error: error =>  {
                    console.log(error);
                }
            });
        }
    });
}

const logout = e => {
    e.preventDefault();
    Swal.fire({
        title: "Are you sure you want to sign out?",
        text: "Click ok to exit",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "OK"
        }).then(result => {
        if (result.isConfirmed) {
           $('.formLogout').submit();
        }
    });
}