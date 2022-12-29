// SWEETALERT START
$(document).ready(function () {
    $('.deleteAction').click(function (e) {
        e.preventDefault();

        let delete_link = $(this).attr('delete_link');
        let csrf = $(this).find("input[name='_token']").val();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: delete_link,
                    type: "POST",
                    data: { "_token": csrf, '_method': 'DELETE' },
                    success: function (response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "This data has been deleted!",
                            confirmButtonColor: "#66BB6A",
                            type: "success"
                        }).then(function () {
                            location.reload();
                        });
                    }
                });
            }
        })
    });
});


$(document).on("click", ".open_modal", function (e) {
    e.preventDefault();

    let modalTitle = $(this).attr('modal_title');
    let modalType = $(this).attr('modal_type');
    let modalSize = $(this).attr('modal_size');
    let className = $(this).attr('class_name');

    if (modalType == 'Create') {
        successButton = 'Save';
    } else if (modalType == 'Update') {
        successButton = 'Update';
    }

    let divId = $(this).attr("#selector");
    let modal_url = $(this).attr('href');



    $.ajax({
        type: "GET",
        url: modal_url,
        dataType: "html",
        success: function (response) {
            if (modalType != 'Show') {
                bootbox.dialog({
                    title: modalTitle,
                    message: `<div  id="${divId}"></div>`,
                    size: modalSize,
                    buttons: {
                        close: {
                            label: "Close",
                            className: className,
                        },

                        success: {
                            label: successButton,
                            className: 'btn btn-success',
                            callback: function () {
                                $('#' + divId + ' form').submit();
                                return false;
                            },
                        },
                    },
                });
            } else {
                bootbox.dialog({
                    title: modalTitle,
                    message: `<div  id="${divId}"></div>`,
                    size: modalSize,
                    buttons: {
                        cancel: {
                            label: "Close",
                            className: className,
                        },
                    },
                });
            }

            $("#" + divId).html(response);

        }
    });
});

