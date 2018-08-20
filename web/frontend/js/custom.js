

$(document).ready(()=>{
        
    /**
     * Toggle Comment form when click button
     */
    $('#showCommentFormBtn, #cancelCommentBtn').on('click', ()=>{
        $('#addCommentFormWrapper').slideToggle();
    })


    /**
     * AJAX Query to publish a new comment
     */
    $this = $( "#addCommentForm" ).submit(event=>{
        if($($this)[0].checkValidity())
        {
            event.preventDefault();

            $.ajax({
                type: 'POST',
                url: $($this).attr('action'),
                data: $($this).serialize()
            })
            .done(data=>{
                if(data == 'SUCCESS')
                    $('#successCommentSendModal').modal('toggle');
                else{
                    $('#failCommentSendModal').modal('toggle');
                    return;
                }
                
                // Wrap comment form
                $('#addCommentFormWrapper').slideToggle();

                // Reload comments
                $.get('./?a=getCommentsForPost&id=' + $('#inputPostID').val())
                .done(data=>{
                    $('#postCommentsWrapper').html(data);
                })

            })
            .fail(()=>{
                $('#failCommentSendModal').modal('toggle');
            })
        }
    });

})