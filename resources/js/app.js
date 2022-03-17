require('./bootstrap');

$(document).ready(function(){
    // registration section
    $('.register input[name="avatar[]"]').on('change', function(e){
        let imgPath = URL.createObjectURL(e.target.files[0]);
        $('.register img#avatarPreview').attr('src', imgPath);
    })

    // user lists admin section
    $(function () {
        $('.user-list.data-table').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            ajax: `${window.location.origin}/admin/user-list`,
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
})
