

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


    /**
     * AJAX Query to survey comment
     */
    $this = $( ".jQuery_class-survey-btn" ).on('click', function(){
        if(confirm('Le commentaire sera relu par un modérateur. \nÊtes-vous sûr de vouloir signaler ce commentaire ? \n\nMerci de ne pas abuser de cette fonction')){
            
            $.get('./?a=surveyComment&id=' + $(this).data('id'))
            .done(data=>{
                if(data == 'SUCCESS')
                    $('#successSurveyCommentModal').modal('toggle');
                else{
                    $('#failSurveyCommentModal').modal('toggle');
                    return;
                }
            })
            .fail(()=>{
                $('#failSurveyCommentModal').modal('toggle');
            })
        }
    })


    
    /**
     * AJAX Query to delete comment
     */
    $this = $( ".jQuery_class-survey-btn" ).on('click', function(){
        if(confirm('Le commentaire sera relu par un modérateur. \nÊtes-vous sûr de vouloir signaler ce commentaire ? \n\nMerci de ne pas abuser de cette fonction')){
            
            $.get('./?a=surveyComment&id=' + $(this).data('id'))
            .done(data=>{
                if(data == 'SUCCESS')
                    $('#successSurveyCommentModal').modal('toggle');
                else{
                    $('#failSurveyCommentModal').modal('toggle');
                    return;
                }
            })
            .fail(()=>{
                $('#failSurveyCommentModal').modal('toggle');
            })
        }
    })

    /**
     * Confirm deleting comment
     */
    $(".jQuery_class-delete-comment").on("click", function(e){
        return confirm('Êtes vous certain de vouloir supprimer ce commentaire ?');
    });
})