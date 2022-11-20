/*
    Sweetalert Function Start
*/

$('.serviceDeleteBtn').click(function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //let delete_id = $(this).closest("tr").find('.service_delete_id').val();
    //alert(delete_id);
    //let delete_url = $(this).attr("href");
    //alert(delete_url);
    let delete_link = $(this).attr("delete_link");
    //alert(delete_link);

    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this Data",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                let data = {
                    "_token": $('input[name = "csrf-token"]').val(),
                    //"id" : delete_id
                }

                $.ajax({
                    type: "DELETE",
                    // url: "blog/delete/"+delete_id,
                    url: delete_link,
                    data: "data",

                    success: function (response) {
                        swal(response.status, {
                            icon: "success",
                        })
                            .then((result) => {
                                location.reload();
                            });
                    }
                });

            }
        });
});

/*
   Sweetalert Function End
*/
/*
$(document).on("click", ".open-modal", function (e) {
    e.preventDefault();
    let modalTitle = $(this).attr('#modal-title');
    let modalType = $(this).attr('#modal-type');
    let modalSize = $(this).attr('#modal-size');
    let className = $(this).attr('#class-name');
    if (modalType == 'create') {
        successButton = 'Save';
    } else if (modalType == 'update') {
        successButton = 'Update';
    }

    let selector = $(this).attr("selector");
    let url = $(this).attr('href');



    $.ajax({
        type: "GET",
        url: url,
        dataType: "html",
        success: function (response) {
            if (modalType != 'Show') {
                bootbox.dialog({
                    title: modalTitle,
                    message: `<div  id="${selector}"></div>`,
                    size: modalSize,
                    buttons: {
                        cancel: {
                            label: "Cancel",
                            className: className,
                        },

                        ok: {
                            label: "OK",
                            className: className,
                            callback: function () {
                                $('#' + selector + 'form').submit();
                                return false;
                            },
                        },
                    },
                });
            } else {
                bootbox.dialog({
                    title: modalTitle,
                    message: `<div  id="${selector}"></div>`,
                    size: modalSize,
                    buttons: {
                        cancel: {
                            label: "Close",
                            className: className,
                        },
                    },
                });
            }

            $("#" + selector).html(response);
            //$('#submit_btn').removeAttr('disabled', 'disabled');
        }
    });
}); */

