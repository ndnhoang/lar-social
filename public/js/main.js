var post_id = 0;
$('.post .interaction .edit').on("click", function(e) {
    e.preventDefault();
    var post_body = $(this).parents('.post').find('.post-body').text();
    post_id = $(this).parents('.post').data('postid');
    $('#post_body').val(post_body);
    $('#edit_modal').modal();
});
$('#modal_save').on('click', function(e) {
    $.ajax({
        method: 'POST',
        url: url,
        data: {body: $('#post_body').val(), post_id: post_id, _token: token}
    })
    .done(function(msg) {
        console.log(msg['message']);
    });
});