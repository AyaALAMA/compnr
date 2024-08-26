document.addEventListener('DOMContentLoaded', function() {
    const deleteCommentBtns = document.querySelectorAll('.delete-comment-btn');

    deleteCommentBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            const commentId = btn.parentNode.dataset.commentId;

            fetch('delete-comment.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams({
                    'comment_id': commentId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Comment deleted successfully!');
                    btn.parentNode.remove();
                } else {
                    alert('Failed to delete comment');
                }
            });
        });
    });
});