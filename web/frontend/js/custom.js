

$(document).ready(()=>{
        
    /**
     * Comment form toggle
     */
    $('#showCommentFormBtn, #cancelCommentBtn').on('click', ()=>{
        $('#addCommentFormWrapper').slideToggle();
    })


    /**
     * Comment form submit
     */
    /*
    $('#sendCommentBtn').on('click', ()=>{
    if($("#addCommentForm").valid())
        $('#successCommentSendModal').modal('toggle');
    })
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
                else
                    $('#failCommentSendModal').modal('toggle');
            })
            .fail(()=>{
                $('#failCommentSendModal').modal('toggle');
            })
        }
    });
    
})