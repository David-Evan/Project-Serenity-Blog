
$('#showCommentFormBtn, #cancelCommentBtn').on('click', ()=>{
    $('#addCommentFormWrapper').slideToggle();
})

$('#sendCommentBtn').on('click', ()=>{
  if($("#addCommentForm").valid())
    $('#successCommentSendModal').modal('toggle');
})
