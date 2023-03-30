var table;
$(document).ready(function () {
     table = $('#table_search_customer').DataTable({
        //edit show
        "pageLength": 10,
        "lengthMenu": [
            [5, 10, 15, -1],
            [5, 10, 15, "All"]
        ],
    });

});

$(function (e) {

    $("#checkbox_customer").click(function () {
        $(".checkbox1").prop('checked', $(this).prop('checked'));
    });

    $("#deleteCheckbox").click(function (e) {
        
        e.preventDefault();
        var socheckerd = document.querySelectorAll('input[name="id"]:checked').length;
        if (socheckerd > 0) {
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa?',
                text: "Bạn sẽ không khôi phục lại được dữ liệu này!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý!'
            }).then((result) => {
                if (result.isConfirmed) {

                    var allid = [];
                    $("input:checkbox[name=id]:checked").each(function () {
                        allid.push($(this).val());
                    });

                    $.ajax({
                        url: "/admin/listcustomer/delete",
                        type: "DELETE",
                        data: {
                            _token: $("input[name=_token]").val(),
                            id: allid,
                        },
                        success: function (response) {
                            
                        }
                    })
                    window.location.href = this.getAttribute('href');
                    
                }
            })

        } else {

            Swal.fire(
                'Không thể thực hiện!',
                'Bạn cần chọn hàng để xóa!',
                'warning'
            )
        }

    })
    // add
    $("#add_mail_customer").click(function(e) {
        // $("add_customergmail1").modal();
        e.preventDefault();
        var socheckerd = document.querySelectorAll('input[name="id"]:checked').length;
        if (socheckerd == 1) {
            var id = [];
            $("input:checkbox[name=id]:checked").each(function() {
                id.push($(this).val());
                // alert(id);
                $("#add_customergmail1").modal('show');
                $.ajax({
                    url: "/admin/listcustomer/addcutomeremail/" + id,
                    type: "GET",
                    success: function(response) {
                        // console.log(response);
                        $('#customergmailadd').html(
                            '<option value="' + response.customer[0].id + '">' + response.customer[0].customername + '</option>'
                        );
                    }
                })
            });
        } else if (socheckerd == 0) {
            $("#add_customergmail2").modal('show');
            // alert('Bạn chỉ được chọn 1 hàng mà bạn cần chỉnh sửa')

        } else {
            Swal.fire(
                'Không thể thực hiện!',
                'Bạn chỉ được chọn 1 hàng mà bạn cần thêm mail!',
                'warning'
            )
        }

    });
    $("#edit_mail_customer").click(function(e) {
        e.preventDefault();
        var socheckerd = document.querySelectorAll('input[name="id"]:checked').length;
        if (socheckerd == 1) {
            var id = [];
            $("input:checkbox[name=id]:checked").each(function() {
                id.push($(this).val());
                // alert(id);
                $("#edit_customergmail").modal('show');
                $.ajax({
                    url: "/admin/listcustomer/edit_emailcustomer/" + id,
                    type: "GET",
                    success: function(response) {
                        // console.log(response.customer[0]);
                        var len = 0;
                        len = response.customer_mail.length;
                        // console.log(len);
                        $('#customer_name').val(response.customer[0].customername);
                        if (len > 0) {
                            $('#listmail option').remove(option);
                            var option;
                            for (var i = 0; i < len; i++) {
                                option = '<option value="' + response.customer_mail[i].id + '">' + response.customer_mail[i].email + '</option>'
                                $('#listmail').append(option);
                            }
                        }
                       
                    }
                })
            });
        } else if (socheckerd > 1) {
            // alert('Bạn chỉ được chọn 1 hàng mà bạn cần chỉnh sửa')
            Swal.fire(
                'Không thể thực hiện!',
                'Bạn chỉ được chọn 1 hàng mà bạn cần chỉnh sửa!',
                'warning'
            )
        } else {
            // alert('Bạn cần chọn 1 hàng để chỉnh sửa!')
            Swal.fire(
                'Không thể thực hiện!',
                'Bạn cần chọn 1 hàng để chỉnh sửa!',
                'warning'
            )
        }

    });
});

