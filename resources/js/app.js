require('./bootstrap');

$(document).ready(function(){
    // registration section
    $('.register input[name="avatar[]"]').on('change', function(e){
        let imgPath = URL.createObjectURL(e.target.files[0]);
        $('.register img#avatarPreview').attr('src', imgPath);
    })

    // user lists admin section
    $(function () {
        var userListTable = $('.user-list.data-table').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            ajax: `${window.location.origin}/admin/user-list`,
            columns: [
                {data: 'id', name: 'id'},
                {data: 'avatar', name: 'avatar', orderable: false, searchable: false},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });

    $('.user-list.data-table').on('click', '#btn-approve', function(){
        if (confirm("Are you sure want to verify this user?")) {
            let el = $(this);
            let userId = el.data('user-id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'PUT',
                url: `${window.location.origin}/admin/user-list/approve/${userId}`,
                success: function(res) {
                    changeButtonApproved(res.success, el)
                },
                error: function(err) {
                    console.log(err)
                }
            })
        }
    })
})

function changeButtonApproved(is_approved, el) {
    if (is_approved) {
        $(el).removeAttr('id', 'btn-approve').removeClass('btn-primary').addClass('btn-success').text('Verified');
    }
}
