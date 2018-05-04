$(document).ready(function(){
  $('#search').focus()
  $('#search').on('keyup',function(){
    var search = $('#search').val()
    console.log(search);
  })
})
