$(document).ready(function() {
    $(".action-button").click(function() {
        var commentId = $(this).closest(".comment").data("comment-id");
        var action = $(this).data("action");

        $.ajax({
            url: "save_rating.php",
            method: "POST",
            data: { comment_id: commentId, action: action },
            success: function(response) {
                alert(response); // Exiba uma mensagem de sucesso
                // Atualize a interface do usuário conforme necessário
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });
});
