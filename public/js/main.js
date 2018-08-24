var post_id = 0;
var post_element = null;
$('.post .interaction .edit').on("click", function(e) {
    e.preventDefault();
    post_element = $(this).parents('.post').find('.post-body');
    var post_body = post_element.text();
    post_id = $(this).parents('.post').data('postid');
    $('#post_body').val(post_body);
    $('#edit_modal').modal();
});
$('#modal_save').on('click', function(e) {
    $.ajax({
        method: 'POST',
        url: url_edit,
        data: {body: $('#post_body').val(), post_id: post_id, _token: token}
    })
    .done(function(msg) {
        post_element.text(msg['new_body']);
        $('#edit_modal').modal('hide');
    });
});
$('.like').on('click', function(e) {
    e.preventDefault();
    var isLike = e.target.previousElementSibling == null;
    post_id = $(this).parents('.post').data('postid');
    $.ajax({
        method: 'POST',
        url: url_like,
        data: {isLike: isLike, post_id: post_id, _token: token}
    })
    .done(function(msg) {
        e.target.innerText = isLike ? e.target.innerText == 'Like' ? 'You like this post' : 'Like' : e.target.innerText === 'Dislike' ? 'You dont\'t like this post' : 'Dislike';
        if (isLike) {
            e.target.nextElementSibling.innerText = 'Dislike';
        } else {
            e.target.previousElementSibling.innerText = 'Like';
        }
    });
}); 