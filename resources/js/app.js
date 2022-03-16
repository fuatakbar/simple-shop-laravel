require('./bootstrap');
window.$ = window.jQuery = require('jquery');

$(document).ready(function(){
    // registration section
    $('.register input[name="avatar[]"]').on('change', function(e){
        let imgPath = URL.createObjectURL(e.target.files[0]);
        $('.register img#avatarPreview').attr('src', imgPath);
    })
})
