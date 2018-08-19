
$('#showCommentFormBtn, #cancelCommentBtn').on('click', ()=>{
    $('#addCommentForm').slideToggle();
})

$('#sendCommentBtn').on('click', ()=>{
  $('#successCommentSendModal').modal('toggle');
})
